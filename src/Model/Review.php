<?php

namespace App\Model;

use \Exception;

class Review extends Model
{
  private $author;
  private $email;
  private $message;
  private $mark = 5;
 
  /**
   * Factory method
   *
   * Crée une nouvelle instance de Review, et la "remplit" avec les données 
   * envoyées en paramètres
   * On appelle ce process l'hydratation.
   * 
   * @param array $data un tableau de données à utiliser pour hydrater l'instance
   * @return Review la nouvelle instance hydratée
   */
  public static function hydrate(array $data)
  {
    $review = new Review();

    $review
      ->setId($data['id'])
      ->setEmail($data['email'])
      ->setMark($data['mark'])
      ->setAuthor($data['name'])
      ->setMessage($data['content'])
      ->setCreatedAt($data['createdAt'])
      ->setUpdatedAt($data['updatedAt']);

    return $review;
  }

  public function setAuthor($name)
  {
    $name = trim($name);

    if (empty($name)) {
      throw new Exception('Le champ "nom" est obligatoire.');
    } elseif (containsDigit($name)) {
      throw new Exception('Le champ "nom" ne doit pas contenir de chiffre.');
    }

    $this->author = $name;
    return $this;
  }

  public function getAuthor()
  {
    return $this->author;
  }


  /**
   * Get the value of message
   */
  public function getMessage()
  {
    return $this->message;
  }

  /**
   * Set the value of message
   *
   * @return  self
   */
  public function setMessage($message)
  {
    $message = trim($message);

    if (empty($message)) {
      throw new Exception('Le champ "message" est obligatoire.');
    } elseif (str_word_count($message) < 1) {
      throw new Exception('Le champ "message" est trop court ! (5 mots minimum).');
    } elseif (strlen($message) > 350) {
      throw new Exception('Le champ "message" est trop long ! (350 caractères maximum).');
    }

    $this->message = $message;
    return $this;
  }

  /**
   * Get the value of mark
   */
  public function getMark()
  {
    return $this->mark;
  }

  /**
   * Set the value of mark
   *
   * @return  self
   */
  public function setMark($mark)
  {

    if (is_string($mark)) {
      $mark = intval($mark);
    }

    if (!is_numeric($mark)) {
      throw new Exception('Le champ "note" doit être un nombre');
    } elseif ($mark < 0 || $mark > 5) {
      throw new Exception('Le champ "note" doit être compris entre 0 et 5');
    }

    $this->mark = $mark;
    return $this;
  }

  /**
   * Get the value of email
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */
  public function setEmail($email)
  {
    $email = trim($email);

    if (empty($email)) {
      throw new Exception('Le champ "E-mail" est obligatoire.');
    } elseif (!isEmailValid($email)) {
      throw new Exception('Le format de l\'email est invalide.');
    }

    $this->email = $email;

    return $this;
  }

  public function getAvatar()
  {
    return 'http://i.pravatar.cc/48?img=' . $this->id;
  }

}