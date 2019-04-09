<?php

use App\Database\BookingQuery;
use App\Model\Booking;

// -----------------------------------------------------------------------------
// Valider les données envoyées en $_POST
// Stocker les erreurs de validation éventuelles
// et générer les messages appropriés
// -----------------------------------------------------------------------------
$errors = [];
$success = false;

// On vérifie que la clé existe AVANT de valider la valeur
if (array_key_exists('email', $_POST)) {
  try {
    // TODO create customer before
    // $booking->setCustomer($_POST['email']);
    $booking->setCustomer(1);
  } catch (Exception $e) {
    $errors['name'] = $e->getMessage();
  }
}

if (array_key_exists('arrival', $_POST)) {
  try {
    $booking->setArrivalDate($_POST['arrival']);
  } catch (Exception $e) {
    $errors['arrival'] = $e->getMessage();
  }
}

if (array_key_exists('departure', $_POST)) {
  try {
    $booking->setDepartureDate($_POST['departure']);
  } catch (Exception $e) {
    $errors['departure'] = $e->getMessage();
  }
}

if (array_key_exists('adultsCount', $_POST)) {
  try {
    $booking->setAdultsCount($_POST['adultsCount']);
  } catch (Exception $e) {
    $errors['adultsCount'] = $e->getMessage();
  }
}

if (array_key_exists('childrenCount', $_POST)) {
  try {
    $booking->setChildrenCount($_POST['childrenCount']);
  } catch (Exception $e) {
    $errors['childrenCount'] = $e->getMessage();
  }
}

// Si on a envoyé des données et qu'il n'y a pas d'erreur, 
// on enregistre le message de contact en Base De Données
if (!empty($_POST) && empty($errors)) {

  $booking->setRoom($room);

  // On essaye d'insérer les données en BDD
  // et on stocke le résultat (true | false) dans une variable 
  try {

    $success = BookingQuery::create($booking);

  } catch (PDOException $e) {

    $code = $e->getCode(); 
  }
}

// On reset le formulaire si besoin
if ($success) {
  $booking = new Booking();
}