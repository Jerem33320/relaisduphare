<?php

require_once 'src/_constants.php';
require_once 'src/_utils.php';
require_once 'src/database/Database.php';
require_once 'src/database/Query.php';

if (isset($_GET['id'])) {
  // "mode" mise à jour d'une Review
  $review = Query::findById($_GET['id']);

  if (empty($review)) {
    http_response_code(404);
    include_once '404.php';
    exit;
  }

  $pageTitle = "Modifier le témoignage #" . $_GET['id'];
} else {
  // "mode" création de Review
  $review = new Review();

  $pageTitle = 'Créer un témoignage | Le Relais du Phare';
  $pageDescription = "Votre séjour vous a plu ? Laissez nous un petit commentaire :)";
}

require_once 'src/includes/page-start.php';
include 'src/includes/header.php'

?>

<section id="section-feedback" class="">
  <div class="container">
    <header>

      <?php if (isset($_GET['id'])) : ?>
        <h2><?= "Modifier le témoignage #" . $_GET['id'] ?></h2>
      <?php else : ?>
        <h2>Écrire un petit mot</h2>
        <p>
          Votre séjour au Relais du Phare vous a plu ?
          <br>
          Laissez nous un petit commentaire :)
        </p>
      <?php endif ?>
      
    </header>
    
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <?php include_once 'src/includes/form-feedback.php' ?>
      </div>
    </div>
  </div>
</section>

<?php include_once 'src/includes/footer.php' ?>
<?php require_once 'src/includes/scripts.php' ?>
<?php require_once 'src/includes/page-end.php' ?>
    
