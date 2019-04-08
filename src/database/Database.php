<?php 

/**
 * Représente une connexion à la base de données
 * 
 * Cette classe utilise le design pattern Singleton
 * 
 * Cela signifie qu'on ne peut construire qu'UNE SEULE INSTANCE de cette classe.
 * Pour cela, on utilise la fonction getInstance(). La première fois qu'on appelle 
 * cette méthode, une nouvelle instance est crée, puis si on rappelle la méthode 
 * au cours de l'exécution du programme, la MÊME instance est retournée.
 * 
 * (On remarque que le constructeur de cette classe est privé. C'est assez rare,
 * mais très utile quand c'est justifié)
 * 
 * @example
 * $database = Database::getInstance('my-database', 'user42', 'p4ssw0rD');
 * $database2 = Database::getInstance();
 * $database3 = Database::getInstance();
 * 
 * var_dump($database === $database2); // true
 * var_dump($database === $database3); // true
 * var_dump($database2 === $database3); // true
 * 
 * @see https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/1668103-les-design-patterns#/id/r-1668060
 */
class Database
{
  // Constante de classe
  const CHARSET = 'utf8';

  // Variable statique
  private static $instance;

  // Attributs d'instance
  private $host;
  private $name;
  private $user;
  private $password;
  private $pdo;

  /**
   * Get the instance of the database connection. If the database is not connected
   * (ie: on first call), the connection is first established, then returned
   *
   * @param string $dbname The database's name
   * @param string $username The database's user
   * @param string $pwd The database's user's password
   * @param string $host The server hosting the database
   * 
   * @return Database the database instance
   * 
   * @throws Exception if no parameters are sent on first call
   */
  public static function getInstance(
    string $dbname = null,
    string $username = null,
    string $pwd = null,
    string $host = 'localhost'
  ) {
    // On vérifie qu'une instance existe
    if (empty(self::$instance)) { 
      // si elle n'existe pas, on en crée une nouvelle
      // et on la stocke (pour les prochains appels de getInstance)
      if (empty($host) || empty($dbname) || empty($username)) {
        throw new Exception('Invalid parameters for Database constructor !!!');
      }

      self::$instance = new Database($dbname, $username, $pwd, $host);
    } else {
      // TODO verifier qu'on essaye de se connecter à la meme base de données
      // Si le host ou le dbname ont changé
      // connecter une nouvelle instance avec les nouveaux identifiants
    }

    return self::$instance;
  }

  // Méthodes
  private function __construct($dbname, $username, $pwd, $host = 'localhost')
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
