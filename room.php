<?php
require_once '__bootstrap.php';

use \App\Database\RoomQuery;
use \App\Model\Booking;

// Avant d'utiliser les variables contenues $_GET, on doit les vérifier
if (
  !array_key_exists('slug', $_GET) ||
  !is_string($_GET['slug']) ||
  empty($_GET['slug'])
) {
  http_response_code(400);
  exit('Error 400: Bad Parameters.');
}


// Les paramètres sont validés, on peut aller chercher la chambre demandée
$room = RoomQuery::findOneBySlug($_GET['slug']);
if (empty($room)) {
  http_response_code(404);
  include_once 'src/404.php';
  exit;
}

// On stocke la chambre trouvée dans une variable !
$booking = new Booking();
$booking->setRoom($room);

// Fin du traitement (Model)


// Debut de l'affichage (View)
$pageTitle = 'Chambre ' . $room->getName();

require_once 'src/includes/page-start.php';
include 'src/includes/header.php' 

?>


<section>
  <div class="container">

    <div class="row">
      <div class="col">
        <h1><?= $pageTitle ?></h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">

      <div class="welcome-img-container">
          <img
            src="public/img/img_1.jpg"
            alt="Une chambre d'hôtel spacieuse et luxueuse"
          />
        </div>
        <p>
          <?= $room->getContent() ?>
        </p>
      </div>
      <div class="col-lg-4">

        <header>
          <h2>
            Réserver cette chambre
          </h2>
        </header>

        <?php include 'src/includes/form-booking.php' ?>
        
      </div>
    </div>

  </div> <!-- //.container -->
</section>

<?php include_once 'src/includes/footer.php' ?>
<?php require_once 'src/includes/scripts.php' ?>
<?php require_once 'src/includes/page-end.php' ?>
    
