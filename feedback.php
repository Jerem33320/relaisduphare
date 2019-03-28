<?php

require_once 'src/_constants.php';
require_once 'src/_utils.php';

$pageTitle = 'Créer un témoignage | Le Relais du Phare';
$pageDescription = "Votre séjour vous a plu ? Laissez nous un petit commentaire :)";

require_once 'src/includes/page-start.php';
include 'src/includes/header.php'

?>

<section id="section-feedback" class="">
  <div class="container">
    <header>
      <h2>Écrire un petit mot</h2>

      <p>
        Votre séjour au Relais du Phare vous a plu ?
        <br>
        Laissez nous un petit commentaire :)
      </p>
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
    
