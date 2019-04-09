<?php

namespace App\Database;

use \App\Model\Room;

class RoomQuery extends Query {

  public const TABLE = 'room';
  public const MODEL = Room::class;

  public static function findAllWithTypes() {

    $sql = "SELECT room.*, room_type.label as type FROM " . static::TABLE . " JOIN room_type ON room.type = room_type.id";
    return self::run($sql);

  }
}
