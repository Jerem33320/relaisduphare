<?php

class Query
{
  public static function findAll()
  {
    // static::TABLE et non pas self::TABLE !!!!
    // @see https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/1666684-lheritage#/id/r-1666683
    $sql = "SELECT * FROM " . static::TABLE;
    return self::run($sql);
  }

  public static function findRandom(int $take)
  {
    $sql = "SELECT * FROM " . self::TABLE . " ORDER BY RAND() LIMIT $take";
    return self::run($sql);
  }

  public static function findById(int $id)
  {
    $sql = "SELECT * FROM " . static::TABLE . " WHERE id=:id";

    $statement = Database::getInstance()->getPDO()->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    // Si les champs de la DB correspondent au modèle Review
    // $statement->setFetchMode(PDO::FETCH_CLASS, Review::class);
    // $data = $statement->fetch();

    // Si les champs ne correspondent pas, on doit mapper à la main
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) return null;

    $model = static::MODEL;
    $review = $model::hydrate($data);
    return $review;
  }

  protected static function run(string $sql)
  {
    $data = Database::getInstance()
      ->query($sql)
      ->fetchAll(PDO::FETCH_ASSOC);
      // Si les champs de la base correspondent, il vaut mieux utiliser :
      // ->fetchAll(PDO::FETCH_CLASS, Review::class);

    // On map les objets "à la main", 
    // car les structures ne correspondent pas
    return self::map($data);
  }

  protected static function map($data)
  {
    $model = static::MODEL;

    $reviews = [];
    foreach ($data as $row) {
      $reviews[] = $model::hydrate($row);
    }
    return $reviews;
  }
}