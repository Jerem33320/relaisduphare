<?php

namespace App\Database;

use \PDO;
use \App\Model\Room;

class RoomQuery extends Query {

  public const TABLE = 'room';
  public const MODEL = Room::class;

  /**
   * Fetches all rooms with the data from their type
   *
   * @return array
   */
  public static function findAllWithTypes() {

    $sql = "SELECT room.*, room_type.label as type FROM " . static::TABLE . " JOIN room_type ON room.type = room_type.id";
    return self::run($sql);
  }

  /**
   * Find all rooms with the given type
   *
   * @param string $typeLabel
   * @return array
   */
  public static function findByType(string $typeLabel) {

    $sql = "SELECT room.*, room_type.label as type " .
      "FROM " . static::TABLE . " JOIN room_type ON room.type = room_type.id " .
      "WHERE room_type.label=:type";

    $statement = Database::getInstance()->getPDO()->prepare($sql);
    $statement->bindValue(':type', $typeLabel);
    $statement->execute();
  
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (empty($data)) return null;
  
    return self::map($data);
  }
}
