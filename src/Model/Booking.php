<?php

namespace App\Model;

class Booking extends Model {

  /**
   * A room can't have less than one adult
   */
  const MIN_ADULT_COUNT = 1;
  const MIN_CHILDREN_COUNT = 0;

  /**
   * The arrival date
   *
   * @var \DateTime
   */
  private $arrivalDate;
  
  /**
   * The departure date
   *
   * @var \DateTime
   */
  private $departureDate;
  
  /**
   * The customer (id or instance)
   *
   * @var int|Customer
   */
  private $customer;

  /**
   * The room booked (id or instance)
   *
   * @var int|Room
   */
  private $room;

  /**
   * Number of adults
   *
   * @var int
   */
  private $adultsCount = 1;
  
  /**
   * Number of children
   *
   * @var int
   */
  private $childrenCount = 0;

  /**
   * Get the creation timestamp of the instance
   *
   * @return  \DateTime
   */ 
  public function getArrivalDate($format = null)
  {
    if (!empty($format) && !empty($this->arrivalDate)) {
      return $this->arrivalDate->format($format);
    }
    
    return $this->arrivalDate;
  }

  /**
   * Set the creation timestamp of the instance
   *
   * @param $arrivalDate  The creation timestamp of the instance
   *
   * @return  self
   */ 
  public function setArrivalDate($arrivalDate)
  {
    // Try to transform a Mysql date (string) into a valid instance of \DateTimeTime
    if (is_string($arrivalDate)) {
      $arrivalDate = \DateTime::createFromFormat('Y-m-d', $arrivalDate);
    }

    // Throw if invalid date
    if (!($arrivalDate instanceof \DateTime)) {
      throw new Exception('Invalid date for arrivalDate.');
    }

    $this->arrivalDate = $arrivalDate;

    return $this;
  }

  /**
   * Get the creation timestamp of the instance
   *
   * @return  \DateTime
   */ 
  public function getDepartureDate($format = null)
  {
    if (!empty($format) && !empty($this->departureDate)) {
      return $this->departureDate->format($format);
    }
    
    return $this->departureDate;
  }

  /**
   * Set the creation timestamp of the instance
   *
   * @param $departureDate  The creation timestamp of the instance
   *
   * @return  self
   */ 
  public function setDepartureDate($departureDate)
  {
    // Try to transform a Mysql date (string) into a valid instance of \DateTimeTime
    if (is_string($departureDate)) {
      $departureDate = \DateTime::createFromFormat('Y-m-d', $departureDate);
    }

    // Throw if invalid date
    if (!($departureDate instanceof \DateTime)) {
      throw new Exception('Invalid date for departureDate.');
    }

    $this->departureDate = $departureDate;

    return $this;
  }

  /**
   * Get the customer (id or instance)
   *
   * @return  int|Customer
   */ 
  public function getCustomer()
  {
    return $this->customer;
  }

  /**
   * Get the customer's id
   *
   * @return int
   */ 
  public function getCustomerId()
  {
    if ($this->customer instanceof Customer) {
      return $this->customer->getId();
    }
    return $this->customer;
  }

  /**
   * Set the customer (id or instance)
   *
   * @param  int|Customer  $customer  The customer (id or instance)
   *
   * @return  self
   */ 
  public function setCustomer($customer)
  {
    $this->customer = $customer;

    return $this;
  }

  /**
   * Get the room booked (id or instance)
   *
   * @return  int|Room
   */ 
  public function getRoom()
  {
    return $this->room;
  }

  /**
   * Get the room's id
   *
   * @return int
   */ 
  public function getRoomId()
  {
    if ($this->room instanceof Room) {
      return $this->room->getId();
    }
    return $this->room;
  }

  /**
   * Set the room booked (id or instance)
   *
   * @param  int|Room  $room  The room booked (id or instance)
   *
   * @return  self
   */ 
  public function setRoom($room)
  {
    $this->room = $room;

    return $this;
  }

  /**
   * Get number of adults
   *
   * @return  int
   */ 
  public function getAdultsCount()
  {
    return $this->adultsCount;
  }

  /**
   * Set number of adults
   *
   * @param  int  $adultsCount  Number of adults
   *
   * @return  self
   */ 
  public function setAdultsCount(int $adultsCount)
  {
    if ($adultsCount < self::MIN_ADULT_COUNT) {
      throw new \Exception("Invalid parameter \$adultsCount. 
        Must be greater than " . self::MIN_ADULT_COUNT. ", $adultsCount given.");
    }

    $this->adultsCount = $adultsCount;

    return $this;
  }

  /**
   * Get number of children
   *
   * @return  int
   */ 
  public function getChildrenCount()
  {
    return $this->childrenCount;
  }

  /**
   * Set number of children
   *
   * @param  int  $childrenCount  Number of children
   *
   * @return  self
   */ 
  public function setChildrenCount(int $childrenCount)
  {
    if ($childrenCount < self::MIN_CHILDREN_COUNT) {
      $childrenCount = self::MIN_CHILDREN_COUNT;
    }
    $this->childrenCount = $childrenCount;

    return $this;
  }

  public static function hydrate(array $data) {

    $instance = new Booking();

    $instance
      ->setArrivalDate($data['arrival'])
      ->setDepartureDate($data['departure'])
      ->setAdultsCount($data['adults_count'])
      ->setChildrenCount($data['children_count'])
      ->setRoom($data['room_id'])
      ->setCustomer($data['customer_id']);

    return $instance;
  }
}