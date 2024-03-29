<?php

namespace App\Model;

use \Exception;

class Room extends Model {


  private $name;

  private $slug;

  /**
   * The type of the room. Can be either "standard" or "premium".
   *
   * @var string
   */
  private $type;

  /**
   * The kind of bed in the room
   *
   * @var string
   */
  private $bed;

  /**
   * The price per night
   *
   * @var int
   */
  private $price;

  /**
   * The url of the main picture
   *
   * @var string
   */
  private $cover;

  /**
   * Room's description
   *
   * @var string
   */
  private $content;

  /**
   * The list of all options for this room.
   * @example "jacuzzi, minibar"
   * 
   * @var array[string]
   */
  private $options = [];

  public static function hydrate(array $data) {
    $room = new Room();

    // Système automatique (fonctionne uniquement si les champs de la base de 
    // données correspondent aux attributs du modèle !!!)
    // foreach ($data as $key => $value) {
    //   $setter = 'set' . ucfirst($key);
    //   if (method_exists($room, $setter)) {
    //     $room->$setter($value);
    //   }
    // }
    
    // Sinon, on le fait à la main :)
    $room
      ->setId($data['id'])
      ->setName($data['name'])
      ->setSlug($data['slug'])
      ->setType($data['type'])
      ->setPrice($data['price'])
      ->setBed($data['bed'])
      ->setCover($data['cover'])
      ->setContent($data['description'])
      ->setCreatedAt($data['createdAt'])
      ->setUpdatedAt($data['updatedAt']);

    return $room;
  }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Room
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     * @return Room
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }



  /**
   * Get the type of the room. Can be either "standard" or "premium".
   *
   * @return  string
   */ 
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set the type of the room. Can be either "standard" or "premium".
   *
   * @param  string  $type  The type of the room. Can be either "standard" or "premium".
   *
   * @return  self
   */ 
  public function setType(string $type)
  {
    if ($type !== "standard" && $type !== "premium") {
      throw new Exception('Type de chambre invalide.');
    }
    $this->type = $type;

    return $this;
  }

  /**
   * Get the kind of bed in the room
   *
   * @return  string
   */ 
  public function getBed()
  {
    return $this->bed;
  }

  /**
   * Set the kind of bed in the room
   *
   * @param  string  $bed  The kind of bed in the room
   *
   * @return  self
   */ 
  public function setBed(string $bed)
  {
    $this->bed = $bed;

    return $this;
  }

  /**
   * Get the price per night
   *
   * @return  int
   */ 
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Set the price per night
   *
   * @param  int  $price  The price per night
   *
   * @return  self
   */ 
  public function setPrice(int $price)
  {
    if ($price < 0) {
      throw new Exception('Le prix doit être supérieur à zéro.');
    }

    $this->price = $price;

    return $this;
  }

  /**
   * Get the url of the main picture
   *
   * @return  string
   */ 
  public function getCover()
  {
    return $this->cover;
  }

  /**
   * Set the url of the main picture
   *
   * @param  string  $cover  The url of the main picture
   *
   * @return  self
   */ 
  public function setCover(string $cover)
  {
    $this->cover = $cover;

    return $this;
  }

  /**
   * Get room's description
   *
   * @return  string
   */ 
  public function getContent()
  {
    return $this->content;
  }

  /**
   * Set room's description
   *
   * @param  string  $content  Room's description
   *
   * @return  self
   */ 
  public function setContent(string $content)
  {
    $this->content = $content;

    return $this;
  }

  /**
   * Get the list of all options for this room.
   *
   * @return  array[string]
   */ 
  public function getOptions()
  {
    return $this->options;
  }

  /**
   * Add an option to this room
   *
   * @param string $option 
   *
   * @return self
   */ 
  public function addOption(string $option)
  {
    if (!in_array($option, $this->options)) {
      $this->options[] = $option;
    }

    return $this;
  }

  /**
   * Remove the given option from this room
   *
   * @param string $option 
   *
   * @return self
   */ 
  public function removeOption(string $option)
  {
    $k = array_search($option, $this->options);
    if ($k !== false) {
      unset($this->options[$k]);
    }

    return $this;
  }
}