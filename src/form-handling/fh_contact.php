<?php
// -----------------------------------------------------------------------------
// Valider les données envoyées en $_POST
// Stocker les erreurs de validation éventuelles
// et générer les messages appropriés
// -----------------------------------------------------------------------------
$errors = [];
$values = [];

// -----------------------------------------------------------------------------
// -> valider le nom (non vide, pas de chiffre)
// -----------------------------------------------------------------------------

// On vérifie que la clé existe AVANT de valider la valeur
if (array_key_exists('name', $_POST)) {

  $name = trim($_POST['name']);
  
  // On valide la valeur
  if (empty($name)) {
    $errors['name'] = 'Le champ "nom" est obligatoire.';
  } elseif (containsDigit($name)) {
    $errors['name'] = 'Le champ "nom" ne doit pas contenir de chiffre.';
  } else {
    $values['name'] = $name;
  }
}

// -----------------------------------------------------------------------------
// -> valider l'email (non vide, format valide)
// -----------------------------------------------------------------------------
if (array_key_exists('email', $_POST)) {

  $email = trim($_POST['email']);
  
  // On valide la valeur
  if (empty($email)) {
    $errors['email'] = 'Le champ "E-mail" est obligatoire.';
  } elseif (!isEmailValid($email)) {
    $errors['email'] = 'Le format de l\'email est invalide.';
  } else {
    $values['email'] = $email;
  }
}

// -----------------------------------------------------------------------------
// -> valider le téléphone si présent
// -----------------------------------------------------------------------------
if (array_key_exists('phone', $_POST)) {

  $phone = trim($_POST['phone']);
  
  // On valide la valeur si elle existe
  if (!empty($phone) && !isPhoneValid($phone)) {
    $errors['phone'] = 'Le format du numéro de téléphone est invalide.';
  } else {
    $values['phone'] = $phone;
  }
}


// -----------------------------------------------------------------------------
// -> valider le message (minimum 5 mots, max 350 characteres)
// -----------------------------------------------------------------------------
if (array_key_exists('message', $_POST)) {

  $message = trim($_POST['message']);
  
  // On valide la valeur
  if (empty($message)) {
    $errors['message'] = 'Le champ "message" est obligatoire.';
  } elseif (str_word_count($message) < 5) {
    $errors['message'] = 'Le champ "message" est trop court ! (5 mots minimum).';
  } elseif (strlen($message) > 350) {
    $errors['message'] = 'Le champ "message" est trop long ! (350 caractères maximum).';
  } else {
    $values['message'] = $message;
  }
}

// (TODO) Si pas d'erreur, on enregistre le message de contact en Base De Données


