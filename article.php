<?php
require_once '_data.php';

if (
  // Verifier qu'on demande une clé non nulle
  !array_key_exists('article', $_GET) ||
  !isset($_GET['article']) ||
  // Verifier que la clé demandée existe dans le tableau des articles
  !array_key_exists($_GET['article'], $articles)
) {
  exit("404: Article introuvable !");
  
  // ou sinon rediriger vers une autre adresse
  header('Location: index.php');
  exit;
}

$index = $_GET['article'];
$article = $articles[$index];

$pageTitle = $article['title'];
// $pageDescription = $article['abstract'];

require_once 'includes/page-start.php';
include 'includes/header.php' 

?>

<section 
  class="section-background" 
  style="background-image: url(img/<?= $article['image']?>); background-size: cover"
>
  <div class="container">
    <header>
      <h1>
        <?= $article['title'] ?>
      </h1>
    </header>
  </div>
</section>

<section>

  <div class="container">

  

  <div class="row">
    <div class="col-lg-4">
      <p>
        <?= $article['content'] ?>
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
      <a href="">Article précécent</a>
    </div>
    <div class="col-lg-2 offset-lg-8">
      <a href="">Article suivant</a>
    </div>
  </div>
</section>

<?php include_once 'includes/footer.php' ?>
<?php require_once 'includes/scripts.php' ?>
<?php require_once 'includes/page-end.php' ?>
    
