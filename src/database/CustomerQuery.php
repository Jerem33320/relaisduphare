<?php

namespace App\Database;

use \App\Model\Customer;

class CustomerQuery extends Query
{
  public const TABLE = 'customer';
  public const MODEL = Customer::class;

  public static function findOneByEmail(string $email) {
    $sql = "SELECT * FROM " . self::TABLE . " WHERE email = :email";
    $statement = Database::getInstance()->getPDO()->prepare($sql);
    $statement->bindValue(':email', $email);

    $statement->execute();

    $data = $statement->fetch(\PDO::FETCH_ASSOC);
    if (empty($data)) return null;

    return Customer::hydrate($data);
  }

  public static function create(Customer $customer)
  {
    $sql = "INSERT INTO " . self::TABLE . " (lastName, firstName, email, phone, gender) 
    VALUES (
      :lastName,
      :firstName,
      :email,
      :phone,
      :gender,
    )";

    $statement = Database::getInstance()->getPDO()->prepare($sql);
    $statement->bindValue(':lastName', $customer->getLastName());
    $statement->bindValue(':firstName', $customer->getFirstName());
    $statement->bindValue(':email', $customer->getEmail());
    $statement->bindValue(':phone', $customer->getPhone());
    $statement->bindValue(':gender', $customer->getGender());

    return $statement->execute();
  }

}
