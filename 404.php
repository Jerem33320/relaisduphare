<?php
require_once '__bootstrap.php';

$pageTitle = 'Le Relais du Phare : Hôtel 5 étoiles';

require_once 'src/includes/page-start.php';
include 'src/includes/header.php' ;

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


<?php include_once 'src/includes/footer.php' ?>

<?php 
  // require "src/scripts.php" if it hasn't already been included above 
  require_once 'src/includes/scripts.php' 
?>
<?php require_once 'src/includes/page-end.php' ?>



      
      
          