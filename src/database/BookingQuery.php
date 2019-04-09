<?php

namespace App\Database;

use \App\Model\Booking;
use \App\Model\Room;

class BookingQuery extends Query
{
  public const TABLE = 'booking';
  public const MODEL = Booking::class;

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
