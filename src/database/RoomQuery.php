<?php

require_once 'src/database/Query.php';
require_once 'src/models/Room.php';

class RoomQuery extends Query {

  public const TABLE = 'room';
  public const MODEL = Room::class;

}