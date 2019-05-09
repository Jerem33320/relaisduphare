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
$success = false;

// On vérifie que la clé existe AVANT de valider la valeur
if (array_key_exists('email', $_POST)) {

  if (empty($_POST['email'])) {
    $errors['email'] = "L'adresse email est obligatoire.";
  } else {
    try {
      // On regarde si le client existe en base de données
      $customer = CustomerQuery::findOneByEmail($_POST['email']);
      
      // Et on le crée si besoin
      if (empty($customer)) { 

        // Créer une nouvelle instance du modèle
        $customer = new Customer();
        $customer->setEmail($_POST['email']);
        $customer->setLastName(explode('@', $_POST['email'])[0]);

        // L'enregistrer en base de données
        CustomerQuery::create($customer);

        // Mettre à jour l'instance avec les données toutes fraiches de la base 
        // de données. (id, createdAt, ...)
        $customer = CustomerQuery::findById(Database::getInstance()->getPDO()->lastInsertId());
      }
      
      // Définir le client pour cette réservation
      $booking->setCustomer($customer);
      
    } catch (Exception $e) {
      $errors['email'] = $e->getMessage();
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
  } catch (Exception $e) {

      if ($e->getMessage() === "ROOM_NOT_AVAILABLE") {
          $errors['room'] = 'La chambre n\'est pas dispo sur ces dates :(';
      } else {
          // rethrow error
          throw $e;
      }
  }
}

// On reset le formulaire si besoin
if ($success) {
  $booking = new Booking();
}