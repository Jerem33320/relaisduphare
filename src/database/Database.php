<?php 

class Database
{
  // Constante de classe
  const CHARSET = 'utf8';

  // Attributs
  private $host;
  private $name;
  private $user;
  private $password;

  private $pdo;

  // Méthodes
  public function __construct($dbname, $username, $pwd, $host = 'localhost')
  {
    $this->name = $dbname;
    $this->user = $username;
    $this->password = $pwd;
    $this->host = $host;

    // Connect to database
    $this->pdo = new PDO(
      "mysql:host=$this->host;dbname=$this->name;charset=" . self::CHARSET,
      $this->user,
      $this->password
    );

    // Set error mode to exception
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function getPDO()
  {
    return $this->pdo;
  }

  public function query($sql)
  {
    return $this->pdo->query($sql);
  }
}

$database = new Database('relais-du-phare', 'root', '');




