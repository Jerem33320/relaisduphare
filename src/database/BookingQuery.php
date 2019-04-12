<?php

namespace App\Database;

use \App\Model\Booking;
use \App\Model\Room;

class BookingQuery extends Query
{
  public const TABLE = 'booking';
  public const MODEL = Booking::class;

  /**
   * Determines wheter a room is available on the given period
   * 
   * @TODO ensure valid params
   *
   * @param Room|int $room (instance or id)
   * @param Datetime|string $arrival ()
   * @param Datetime|string $departure
   * @return bool   true if the room is available
   * 
   */
  public static function isRoomFreeBetweenDates($room, $arrival, $departure) {

    $sql = "SELECT * 
      FROM `booking` 
      JOIN room 
        ON booking.room_id = room.id 
      WHERE (
        arrival < :departure AND arrival > :arrival 
        OR 
        departure BETWEEN :arrival AND :departure
      ) 
      AND room_id = :room ";

    $statement = Database::getInstance()->getPDO()->prepare($sql);
    $statement->bindValue(':arrival', $arrival);
    $statement->bindValue(':departure', $departure);
    $statement->bindValue(':room', $room, \PDO::PARAM_INT);
    $statement->execute();

    $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
   
    if (empty($data)) return true;

    return false;

  }

  /**
   * Find all free rooms on the given period
   *
   * @param \DateTime|string $arrival
   * @param \DateTime|string $departure
   * @return array|null
   */
  public static function findAvailableRooms($arrival, $departure) {

    // Cette requête SQL n'est pas très intuitive, mais elle fonctionne !
    // Elle permet de se passer de la clause OR utilisée dans la fonction du dessus
    $occupiedRoomIds = "SELECT DISTINCT room_id 
    FROM `booking` 
    WHERE arrival < :departure 
    AND departure > :arrival
    ";

    // On se sert de la sous-requête du dessus comme d'une table, sur laquelle
    // on peut refaire une autre requête
    $sql = "SELECT room.*, label as type 
      FROM room 
      JOIN room_type 
        ON room.type = room_type.id 
      WHERE room.id 
        NOT IN ($occupiedRoomIds)";

    $statement = Database::getInstance()->getPDO()->prepare($sql);
    $statement->bindValue(':arrival', $arrival);
    $statement->bindValue(':departure', $departure);
    $statement->execute();

    $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

    if (empty($data)) return null;

    $rooms = [];
    foreach ($data as $row) {
      $rooms[] = Room::hydrate($row);
    }

    return $rooms;
  }

  public static function create(Booking $booking)
  {
    $sql = "INSERT INTO " . self::TABLE . " (arrival, departure, customer_id, room_id, adults_count, children_count) 
    VALUES (
      :arrival,
      :departure,
      :customerId,
      :roomId,
      :adultsCount,
      :childrenCount
    )";

    $statement = Database::getInstance()->getPDO()->prepare($sql);
    $statement->bindValue(':arrival', $booking->getArrivalDate('Y-m-d'));
    $statement->bindValue(':departure', $booking->getDepartureDate('Y-m-d'));
    $statement->bindValue(':customerId', $booking->getCustomerId());
    $statement->bindValue(':roomId', $booking->getRoomId());
    $statement->bindValue(':adultsCount', $booking->getAdultsCount());
    $statement->bindValue(':childrenCount', $booking->getChildrenCount());

    return $statement->execute();
  }

}
