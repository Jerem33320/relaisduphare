<?php
require_once '_constants.php';
require_once '_data.php';

$pageTitle = 'Le Relais du Phare : Hôtel 5 étoiles';

require_once 'includes/page-start.php';
include 'includes/header.php' ;

?>

<section>

  <header class="not-found">
    <h1>Oops !</h1>
    <p>La page que vous avez demandée n'existe pas.</p>
    

    <div class="row justify-content-between">
      <?php if (!empty($_SERVER['HTTP_REFERER'])): ?>
      <div class="col">
        <a class="btn" href="<?php $_SERVER['HTTP_REFERER']?>">Revenir à la page précédende</a>
      </div>
      <?php endif ?>
      <div class="col">
        <a class="btn" href="">Aller à la page d'accueil</a>
      </div>
    </div>
  </header>
</section>
<div class="row">
  <div class="col">
  </div>
</div>


<?php include_once 'includes/footer.php' ?>

<?php 
  // require "scripts.php" if it hasn't already been included above 
  require_once 'includes/scripts.php' 
?>
<?php require_once 'includes/page-end.php' ?>



      
      
          