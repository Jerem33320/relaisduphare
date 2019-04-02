<?php

require_once 'src/models/Review.php';

// -----------------------------------------------------------------------------
// Valider les données envoyées en $_POST
// Stocker les erreurs de validation éventuelles
// et générer les messages appropriés
// -----------------------------------------------------------------------------
$errors = [];
$success = false;

$review = new Review();

// -----------------------------------------------------------------------------
// -> valider le nom (non vide, pas de chiffre)
// -----------------------------------------------------------------------------

// On vérifie que la clé existe AVANT de valider la valeur
if (array_key_exists('name', $_POST)) {
  try {
    $review->setAuthor($_POST['name']);
  } catch (Exception $e) {
    $errors['name'] = $e->getMessage();
  }
}

if (array_key_exists('mark', $_POST)) {
  try {
    $review->setMark($_POST['mark']);
  } catch (Exception $e) {
    $errors['mark'] = $e->getMessage();
  }
}

// -----------------------------------------------------------------------------
// -> valider l'email (non vide, format valide)
// -----------------------------------------------------------------------------
if (array_key_exists('email', $_POST)) {
  try {
    $review->setEmail($_POST['email']);
  } catch (Exception $e) {
    $errors['email'] = $e->getMessage();
  }
}

// -----------------------------------------------------------------------------
// -> valider le message (minimum 5 mots, max 350 characteres)
// -----------------------------------------------------------------------------
if (array_key_exists('message', $_POST)) {

  try {
    $review->setMessage($_POST['message']);
  } catch (Exception $e) {
    $errors['message'] = $e->getMessage();
  }
}

// Si on a envoyé des données et qu'il n'y a pas d'erreur, 
// on enregistre le message de contact en Base De Données
if (!empty($_POST) && empty($errors)) {

  // Connection à la base de données
  require_once 'src/database/Database.php';

  $query = "INSERT INTO `temoignages` (
    `name`, `email`, `content`
    ) VALUES (
    '" . $review->getAuthor() . "', 
    '" . $review->getEmail() . "', 
    '" . $review->getMessage() . "'
    )";

  // On essaye d'insérer les données en BDD
  // et on stocke le résultat (true | false) dans une variable 
  try {
    $success = (boolean)$database->query($query);
  } catch (PDOException $e) {
    $code = $e->getCode();

    switch ($code) {
      case '23000':
        $errors['email'] = 'Cet email est déjà utilisé !';
        break;
    }
  }
}

// On reset le formulaire si besoin
if ($success) {
  $review = new Review();
}