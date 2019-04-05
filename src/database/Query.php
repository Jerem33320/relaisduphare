<?php

require_once 'src/models/Review.php';

class Query
{

  public static function findAll()
  {
    $sql = "SELECT * FROM temoignages";
    return self::run($sql);
  }

  public static function findRandom(int $take)
  {
    $sql = "SELECT * FROM temoignages ORDER BY RAND() LIMIT $take";
    return self::run($sql);
  }

  public static function findBestMarks(int $take)
  {
    $sql = "SELECT * FROM temoignages ORDER BY mark DESC, RAND() LIMIT $take";
    return self::run($sql);
  }

  public static function findById(int $id)
  {
    if ($id === 0) return null;
    return new Review();
  }

  public static function create(Review $review)
  {
    $sql = "INSERT INTO `temoignages` (`name`, `email`, `content`, mark) 
    VALUES (:name, :email, :content, :mark)";

    // on prépare la requête avec l'object PDO
    // $statement = $this->database->getPDO()->prepare($sql);

    $statement = Database::getInstance()->getPDO()->prepare($sql);

    // on associe les paramètres aux attributs du modèle
    $statement->bindValue(':name', $review->getAuthor());
    $statement->bindValue(':email', $review->getEmail());
    $statement->bindValue(':content', $review->getMessage());
    $statement->bindValue(':mark', $review->getMark());

    // Finalement, on peut exécuter la requête
    return $statement->execute();
  }

  private static function run(string $sql)
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

  private static function map($data)
  {
    $reviews = [];
    foreach ($data as $row) {
      $reviews[] = self::hydrate(new Review(), $row);
    }
    return $reviews;
  }

  private static function hydrate(Review $review, array $row)
  {
    $review
      ->setId($row['id'])
      ->setEmail($row['email'])
      ->setMark($row['mark'])
      ->setAuthor($row['name'])
      ->setMessage($row['content']);

    return $review;
  }
}