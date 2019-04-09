<?php

namespace App\Model;

class Customer extends Model {

  const MALE = 'male';
  const FEMALE = 'female';
  const OTHER = 'other';

  /**
   * Customer's last name
   *
   * @var string
   */
  private $lastName;

  /**
   * Customer's first name
   *
   * @var string|null
   */
  private $firstName;

  /**
   * Customer's gender
   *
   * @var string|null
   */
  private $gender;

  /**
   * Customer's email
   *
   * @var string
   */
  private $email;

  /**
   * Customer's phone
   *
   * @var string|null
   */
  private $phone;

  /**
   * Get customer's name
   *
   * @return  string
   */ 
  public function getLastName()
  {
    return $this->lastName;
  }

  /**
   * Set customer's name
   *
   * @param  string  $lastName  Customer's lastName
   *
   * @return  self
   */ 
  public function setLastName(string $lastName)
  {
    if (empty($lastName)) {
      throw new \Exception("Invalid parameter \$lastName, musst be a non empty string");
    }
    $this->lastName = $lastName;

    return $this;
  }

  /**
   * Get customer's firstName
   *
   * @return  string
   */ 
  public function getFirstName()
  {
    return $this->firstName;
  }

  /**
   * Set customer's firstName
   *
   * @param  string  $firstName  Customer's firstName
   *
   * @return  self
   */ 
  public function setFirstName(string $firstName = null)
  {
    $this->firstName = $firstName;

    return $this;
  }

  /**
   * Get customer's gender
   *
   * @return  string|null
   */ 
  public function getGender()
  {
    return $this->gender;
  }

  /**
   * Set customer's gender
   *
   * @param  string|null  $gender  Customer's gender
   *
   * @return  self
   */ 
  public function setGender($gender)
  {
    if (
      !empty($gender) && 
      $gender !== self::MALE && 
      $gender !== self::FEMALE && 
      $gender !== self::OTHER
    ) {
      throw new \Exception(
        "Invalid parameter \$gender. Must be null, or one of " . self::MALE . 
        ", " . self::FEMALE . ", " . self::OTHER . "."
      );
    }

    $this->gender = $gender;

    return $this;
  }

  /**
   * Get customer's email
   *
   * @return  string
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set customer's email
   *
   * @param  string  $email  Customer's email
   *
   * @return  self
   */ 
  public function setEmail(string $email)
  {
    $email = trim($email);

    if (empty($email)) {
      throw new Exception("Parameter \$email cannot be null.");
    } elseif (!isEmailValid($email)) {
      throw new Exception("Invalid parameter \$email. Must be a valid email address format");
    }

    $this->email = $email;

    return $this;
  }

  /**
   * Get customer's phone
   *
   * @return  string|null
   */ 
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * Set customer's phone
   *
   * @param  string|null  $phone  Customer's phone
   *
   * @return  self
   */ 
  public function setPhone($phone)
  {
    $phone = trim($phone);
    if (!empty($phone) && !isPhoneValid($phone)) {
      throw new Exception("Invalid parameter \$phone. Must be a valid phone format");
    }

    $this->phone = $phone;

    return $this;
  }

  public static function hydrate(array $data) {

    $customer = new Customer();

    foreach ($data as $key => $value) {
      $setter = 'set' . ucfirst($key);
      if (method_exists($customer, $setter)) {
        $customer->$setter($value);
      }
    }

    return $customer;
  }
}