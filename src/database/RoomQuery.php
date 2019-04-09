<?php

namespace App\Database;

use \App\Model\Room;

class RoomQuery extends Query {

  public const TABLE = 'room';
  public const MODEL = Room::class;

}