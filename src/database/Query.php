<?php

require_once 'src/models/Review.php';

class Query
{
  private $database;

  public function __construct(Database $database)
  {
    $this->database = $database;
  }

  public function findAll()
  {
    $sql = "SELECT * FROM temoignages";
    return $this->run($sql);
  }

  public function findRandom(int $take)
  {
    $sql = "SELECT * FROM temoignages ORDER BY RAND() LIMIT $take";
    return $this->run($sql);
  }

  public function findBestMarks(int $take)
  {
    $sql = "SELECT * FROM temoignages ORDER BY mark DESC, RAND() LIMIT $take";
    return $this->run($sql);
  }

  public function create(Review $review)
  {
    $sql = "INSERT INTO `temoignages` (`name`, `email`, `content`, mark) 
    VALUES (:name, :email, :content, :mark)";

    // on prépare la requête avec l'object PDO
    $statement = $this->database->getPDO()->prepare($sql);

    // on associe les paramètres aux attributs du modèle
    $statement->bindValue(':name', $review->getAuthor());
    $statement->bindValue(':email', $review->getEmail());
    $statement->bindValue(':content', $review->getMessage());
    $statement->bindValue(':mark', $review->getMark());

    // Finalement, on peut exécuter la requête
    return $statement->execute();
  }

  private function run(string $sql)
  {
    $data = $this
      ->database
      ->query($sql)
      ->fetchAll(PDO::FETCH_ASSOC);
      // Si les champs de la base correspondent, il vaut mieux utiliser :
      // ->fetchAll(PDO::FETCH_CLASS, Review::class);

    // On map les objets "à la main", 
    // car les structures ne correspondent pas
    return $this->map($data);
  }

  private function map($data)
  {
    $reviews = [];
    foreach ($data as $row) {
      $reviews[] = $this->hydrate(new Review(), $row);
    }
    return $reviews;
  }

  private function hydrate(Review $review, array $row)
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