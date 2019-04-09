<?php

use App\Database\BookingQuery;
use App\Database\CustomerQuery;
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

  if (empty($_POST['email'])) {
    $errors['email'] = "L'adresse email est obligatoire.";
  } else {
    try {
      $customer = CustomerQuery::findOneByEmail($_POST['email']);
      if (empty($customer)) {
        // TODO create customer before
      } else {
        $booking->setCustomer($customer);
      }
    } catch (Exception $e) {
      $errors['name'] = $e->getMessage();
    }
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
    switch ($code) {
      case '23000':
        $subcode = $e->errorInfo[1];

        // Erreur sur une contrainte de clé étrangère : la référence n'existe pas
        if ($subcode === 1452) { 
          $failedConstraint = preg_match("/REFERENCES `(customer|room)`/", $e->errorInfo[2], $match);
          if ($match[1] === 'customer') {
            $errors['email'] = 'Aucun compte client ne correspond';
          } elseif ($match[1] === 'room') {
            $errors[] = 'Cette chambre n\'existe pas.';
          } else {
            $errors[] = '[UNKNOWN_ERROR] Aie aie aie !'; // ????
          }
        } 
        else if ($subcode === 1048) { // Erreur sur une contrainte de clé étrangère : valeur requise manquante
          $errors['email'] = "Aucun compte ne correspond à cette adresse email.";
        }
        break;
      
      default:
        throw $e;
    }
  }
}

// On reset le formulaire si besoin
if ($success) {
  $booking = new Booking();
}