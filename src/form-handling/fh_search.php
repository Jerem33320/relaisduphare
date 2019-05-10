<?php

use App\Database\Database;
use App\Database\BookingQuery;
use App\Database\CustomerQuery;
use App\Model\Booking;
use App\Model\Customer;

// -----------------------------------------------------------------------------
// Valider les données envoyées en $_POST
// Stocker les erreurs de validation éventuelles
// et générer les messages appropriés
// -----------------------------------------------------------------------------
$errors = [];
$results = [];

$arrival = null;
$departure = null;

// Validation des données du formulaire ( incomplète !!!)
if (array_key_exists('arrival', $_POST)) {
  if (!empty($_POST['arrival'])) {
    $arrival = $_POST['arrival'];
  } else {
    $errors['arrival'] = 'La date d\'arrivée est obligatoire';
  }
}
else {
    $errors['arrival'] = 'La date d\'arrivée est obligatoire';
}

if (array_key_exists('departure', $_POST)) {
    if (!empty($_POST['departure'])) {
        $departure = $_POST['departure'];
    } else {
        $errors['departure'] = 'La date de départ est obligatoire';
    }
}
else {
    $errors['departure'] = 'La date de départ est obligatoire';
}


// Si on a envoyé des données et qu'il n'y a pas d'erreur,
// on fait la recherche en base de données
if (!empty($_POST) && empty($errors)) {
  $results = BookingQuery::findAvailableRooms($arrival, $departure);
}