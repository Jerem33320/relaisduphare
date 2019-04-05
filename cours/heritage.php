<?php

// https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/1666684-lheritage


/**
 * Représente une voiture
 * 
 * Toutes les voitures possèdent un moteur qui peut être démarré et arrété.
 */
class Car
{
  // Le mot clé protected permet de rendre une propriété (attribut ou méthode)
  // privée, SAUF pour les classes enfants qui peuvent également l'utiliser
  protected $engine = false;

  public function start()
  {
    $this->engine = true;
  }

  public function stop()
  {
    $this->engine = false;
  }

  public function isStarted()
  {
    var_dump($this->engine);
  }
}

/**
 * Une twingo est une voiture. Elle hérite donc de cette classe.
 * 
 * En PHP, on ne peut hériter que d'UNE SEULE classe.
 */
class Twingo extends Car
{
  public function horn()
  {
    echo nl2br("tut tut \n");
  }

  // Une classe enfant peut posséder ses propres propriétés (attributs / méthodes)
  // Ni son parent ni les classes "soeurs" ne pourront les utiliser
  public function parkInCity()
  {
    return true;
  }
}

/**
 * Une jeep renegade est aussi une voiture !
 */
class Renegade extends Car
{
  // La jeep ne klaxonne pas de la même facon que la twingo
  public function horn()
  {
    echo nl2br("TWOOOOT TWOOOOT \n");
  }

  // Une classe enfant peut redéfinir une méthode de la classe parent.
  public function start()
  {
    // On peut appeler la méthode start de la classe parent
    parent::start();

    // et rajouter du code propre à cette classe enfant
    echo nl2br("VROOM VROOM VROOM \n");
  }
}

echo nl2br("_______ TWINGO \n");
$twingo = new Twingo();
$twingo->start();
$twingo->horn();
$twingo->isStarted();

echo nl2br("_______ RENEGADE \n");
$ren = new Renegade();
$ren->start();
$ren->horn();
$ren->isStarted();