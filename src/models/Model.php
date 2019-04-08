<?php

abstract class Model {

  /**
   * The id of the instance
   *
   * @var int
   */
  protected $id;
  
  /**
   * The creation timestamp of the instance
   *
   * @var \DateTime
   */
  protected $createdAt;
  
  /**
   * The last update timestamp of the instance
   *
   * @var \DateTime
   */
  protected $updatedAt;

  abstract public static function hydrate(array $data);

  /**
   * Get the id of the instance
   *
   * @return  int
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the id of the instance
   *
   * @param  int  $id  The id of the instance
   *
   * @return  self
   */ 
  public function setId(int $id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the creation timestamp of the instance
   *
   * @return  \DateTime
   */ 
  public function getCreatedAt($format = null)
  {
    if (!empty($format)) {
      return $this->createdAt->format($format);
    }
    
    return $this->createdAt;
  }

  /**
   * Set the creation timestamp of the instance
   *
   * @param $createdAt  The creation timestamp of the instance
   *
   * @return  self
   */ 
  public function setCreatedAt($createdAt)
  {
    // Try to transform a Mysql date (string) into a valid instance of \DateTime
    if (is_string($createdAt)) {
      $createdAt = \DateTime::createFromFormat('Y-m-d H:i:s', $createdAt);
    }

    // Throw if invalid date
    if (!($createdAt instanceof \DateTime)) {
      throw new Exception('Invalid date for createdAt.');
    }

    $this->createdAt = $createdAt;

    return $this;
  }

  /**
   * Get the last update timestamp of the instance
   *
   * @return  \DateTime
   */ 
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }

  /**
   * Set the last update timestamp of the instance
   *
   * @param  \DateTime  $updatedAt  The last update timestamp of the instance
   *
   * @return  self
   */ 
  public function setUpdatedAt($updatedAt)
  {
    // Try to transform a Mysql date (string) into a valid instance of \DateTime
    if (is_string($updatedAt)) {
      $updatedAt = \DateTime::createFromFormat('Y-m-d H:i:s', $updatedAt);
    }

    // Throw if invalid date
    if (!is_null($updatedAt) && !($updatedAt instanceof \DateTime)) {
      throw new Exception('Invalid date for updatedAt.');
    }

    $this->updatedAt = $updatedAt;

    return $this;
  }
}