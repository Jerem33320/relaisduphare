<?php

require_once '_constants.php';
require_once '_utils.php';
require_once '_data.php';

// Avant d'utiliser les variables contenues $_GET, on doit les vérifier
if (
  !array_key_exists('type', $_GET) ||
  ($_GET['type'] !== 'standard' && $_GET['type'] !== 'premium') ||
  !array_key_exists('number', $_GET) ||
  !is_numeric($_GET['number']) ||
  !is_int((int) $_GET['number']) || 
  (int) $_GET['number'] <= 0
) {
  http_response_code(400);
  exit('Error 400: Bad Parameters.');
}

$type = $_GET['type'];
$number = (int) $_GET['number'];

// Les paramètres sont validés, on peut aller chercher la chambre demandée
$typedRooms = [];
foreach ($rooms as $room) {
  if ($room['type'] === $type) {
    $typedRooms[] = $room; // push la chambre dans le tableau
  }
}
// on essaye de trouver la chambre demandée
if (!array_key_exists($number - 1, $typedRooms)) {
  http_response_code(404);
  include_once '404.php';
  exit;
}

// On stocke la chambre trouvée dans une variable !
$room = $typedRooms[$number - 1];

// Fin du traitement (Model)


// Debut de l'affichage (View)
$pageTitle = 'Chambre ' . $room['type'] . ' ' . $number;

require_once 'includes/page-start.php';
include 'includes/header.php' 

?>


<section>
  <div class="container">

    <div class="row">
      <div class="col">
        <h1><?= $pageTitle ?></h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <p>
          <?= $room['content'] ?>
        </p>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="welcome-img-container">
          <img
            src="img/img_1.jpg"
            alt="Une chambre d'hôtel spacieuse et luxueuse"
          />
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-2">
        <?php if ($number > 1): ?>
          <a class="btn" href="<?= getRoomURL($type, $number - 1) ?>">
            Chambre précécente
          </a>
        <?php elseif ($type === 'premium'): ?>
          <a class="btn" href="<?= getRoomURL('standard', 1) ?>">
            Chambre standard
          </a>
        <?php endif ?>
      </div>
      <div class="col-lg-2 offset-lg-8">
        <?php if ($number < count($typedRooms)): ?>
          <a class="btn" href="<?= getRoomURL($type, $number + 1) ?>">
            Chambre suivante
          </a>
        <?php elseif ($type === 'standard'): ?>
          <a class="btn" href="<?= getRoomURL('premium', 1) ?>">
            Chambre premium
          </a>
        <?php endif ?>
      </div>
    </div>
  </div> <!-- //.container -->
</section>

<?php include_once 'includes/footer.php' ?>
<?php require_once 'includes/scripts.php' ?>
<?php require_once 'includes/page-end.php' ?>
    
