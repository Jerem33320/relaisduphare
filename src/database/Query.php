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

    $data = $this
      ->database
      ->query($sql)
      ->fetchAll(PDO::FETCH_ASSOC);
      // Si les champs de la base correspondent, il vaut mieux utiliser :
      // ->fetchAll(PDO::FETCH_CLASS, Review::class);

    // On map les objets "à la main", 
    // car les structures ne correspondent pas
    $reviews = [];
    foreach ($data as $row) {
      $review = new Review();
      $review
        ->setId($row['id'])
        ->setEmail($row['email'])
        ->setMark($row['mark'])
        ->setAuthor($row['name'])
        ->setMessage($row['content']);

      $reviews[] = $review;
    }

    return $reviews;
  }

  public function findRandom()
  {
  }

  public function create()
  {
  }
}