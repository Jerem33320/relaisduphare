<?php

// Chargement automatique des classes
require __DIR__ . '/vendor/autoload.php';

use \App\Database\Database;

// Chargement de l'environnement
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
$dotenv->required('DB_NAME')->notEmpty();
$dotenv->required('DB_USER')->notEmpty();
$dotenv->required('DB_HOST')->notEmpty();
$dotenv->required('DB_PASSWORD'); // can be empty !

// Chargement des fichers importants pour l'application
require_once 'src/_constants.php';
require_once 'src/_utils.php';
require_once 'src/_data.php';

// Connexion à la base de données
Database::getInstance(
  $_ENV['DB_NAME'], 
  $_ENV['DB_USER'], 
  $_ENV['DB_PASSWORD'], 
  $_ENV['DB_HOST'] 
);