<?php

namespace App\Database;

use \App\Model\Review;

class ReviewQuery extends Query
{
  public const TABLE = 'temoignages';
  public const MODEL = Review::class;

  public static function findBestMarks(int $take)
  {
    $sql = "SELECT * FROM temoignages ORDER BY mark DESC, RAND() LIMIT $take";
    return self::run($sql);
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

  public static function update(Review $review)
  {
    $sql = "UPDATE `temoignages` SET name=:name,email=:email,mark=:mark,content=:content WHERE id=:id";

    // on prépare la requête avec l'object PDO
    $statement = Database::getInstance()->getPDO()->prepare($sql);

    // on associe les paramètres aux attributs du modèle
    $statement->bindValue(':name', $review->getAuthor());
    $statement->bindValue(':email', $review->getEmail());
    $statement->bindValue(':mark', $review->getMark());
    $statement->bindValue(':content', $review->getMessage());
    $statement->bindValue(':id', $review->getId());

    // Finalement, on peut exécuter la requête
    return $statement->execute();
  }
}