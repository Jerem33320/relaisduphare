<?php

require_once '__bootstrap.php';

use \App\Database\RoomQuery;
use \App\Database\ReviewQuery;
use \App\Database\BookingQuery;

$pageTitle = 'Le Relais du Phare : Hôtel 5 étoiles';
$rooms = RoomQuery::findAllWithTypes();
$reviews = ReviewQuery::findBestMarks(3);

$results = [];

require_once 'src/includes/page-start.php';
include 'src/includes/header.php';

?>

<section id="section-jumbo" class="section-background">
  <div class="jumbo">
    <p>Bienvenue dans un hôtel 5 <span>★</span></p>
    <h1>Nature et convivialité</h1>
  </div>
</section>
<!-- //section-jumbo -->

<section id="section-welcome">
  <div class="container">
      <div id="registration-form">
          <form action="" method="post">
              <div class="row">
                  <div class="col col-lg-3">
                      <div class="form-group">
                          <label for="check-in">Arrivée</label>
                          <input id="check-in" name="check-in" type="date" />
                      </div>
                  </div>

                  <div class="col col-lg-3">
                      <div class="form-group">
                          <label for="check-out">Départ</label>
                          <input id="check-out" name="check-out" type="date" />
                      </div>
                  </div>

                  <div class="col col-lg-auto">
                      <div class="form-group">
                          <label for="adults">Adultes</label>
                          <input
                                  id="adults"
                                  name="adults"
                                  type="number"
                                  min="0"
                                  value="2"
                          />
                      </div>
                  </div>

                  <div class="col col-lg-auto">
                      <div class="form-group">
                          <label for="children">Enfants</label>
                          <input
                                  id="children"
                                  name="children"
                                  type="number"
                                  min="0"
                                  value="0"
                          />
                      </div>
                  </div>

                  <div class="col col-lg-3">
                      <input type="submit" class="btn btn-primary" />
                  </div>
              </div>
          </form>

          <!-- Resultats de la recherche -->
          <?php if (!empty($_POST)): ?>
              <?php if (empty($results)): ?>
                <div class="no-result">
                    Aucune chambre n'est disponible pendant cette période.
                </div>
              <?php else: ?>
                  <ul>
                  <?php foreach ($results as $room): ?>
                    <li>
                        <?php include 'src/includes/search-result.php'?>
                    </li>
                  <?php endforeach; ?>
                  </ul>
              <?php endif ?>
          <?php endif ?>
      </div>

    <div class="row">
      <div class="col-lg-4">
        <h2>Bienvenue !</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Accusantium alias suscipit tempore eveniet! Libero provident
          recusandae qui sit id inventore, officiis ab laudantium
          consectetur, ratione commodi, atque in veritatis iusto!
        </p>

        <div class="welcome-cta">
          <button class="btn">En savoir plus</button>
          <span>ou</span>
          <a href="#">Voir la vidéo</a>
        </div>
      </div>
      <div class="col-lg-7 offset-lg-1">
        <div class="welcome-img-container">
          <img
            src="public/img/img_1.jpg"
            alt="Une chambre d'hôtel spacieuse et luxueuse"
          />
          <picture>
            <img
              src="public/img/food-1.jpg"
              alt="Une femme qui apprécie son repas"
            />
          </picture>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- //section-welcome -->
<section id="section-rooms">
  <div class="container">
    <header>
      <h2>Chambres & Suites</h2>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
        delectus consectetur soluta nobis nihil assumenda, sunt, ea in
        totam, rem modi quibusdam harum quae tempore alias quod
        necessitatibus odio adipisci...
      </p>
    </header>

    <div class="row justify-content-center">
      <?php foreach ($rooms as $k => $room) : ?>
 
        <div class="col-lg-4">
          <?php require 'src/includes/room-card.php' ?>
        </div>

        <?php if ($k % 3 === 2) : ?>
          </div> <?php // ferme la .row ligne 115 ?>
          <!-- On ouvre une ligne "centrée" -->
          <div class="row justify-content-center"> 
        <?php endif ?>

      <?php endforeach ?>
    </div>
  </div>
</section>
<!-- //section-rooms -->
<section id="section-photos">
  <div class="container">
    <header>
      <h2>Photos</h2>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore,
        aliquam voluptatibus. Similique corporis ducimus expedita est qui
        minus quod explicabo esse fugit, fugiat reprehenderit quibusdam. A
        laudantium soluta sunt vero.
      </p>
    </header>

    <div class="slider-container">
      <div class="slider-arrow"></div>
      <div class="slider">
        <img src="public/img/slider-1.jpg" alt="" />
        <img src="public/img/slider-2.jpg" alt="" />
        <img src="public/img/slider-3.jpg" alt="" />
        <img src="public/img/slider-4.jpg" alt="" />
        <img src="public/img/slider-5.jpg" alt="" />
        <img src="public/img/slider-6.jpg" alt="" />
      </div>
      <div class="slider-arrow"></div>
      <div class="slider-dots"></div>
    </div>
  </div>
</section>
<!-- //section-photos -->

<section id="section-menu" class="section-background">
  <div class="container">
    <header>
      <h2>Notre Restaurant</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta
        culpa dolores dolor, omnis aspernatur aliquid consequatur in harum
        odit. Officia aut delectus minima nam laboriosam voluptatem ex
        exercitationem maiores maxime.
      </p>
    </header>

    <nav id="restaurant-nav">
      <ul>
        <li>
          <a href="#" class="active" data-menu="menu-1">Menu 1</a>
        </li>
        <li>
          <a href="#" data-menu="menu-2">Menu 2</a>
        </li>
        <li>
          <a href="#" data-menu="menu-enfant">Menu Enfant</a>
        </li>
      </ul>
    </nav>
    <div class="menus-container">
      <div class="menu" id="menu-1">
        <p class="menu-price">26 €</p>
        <h4>
          Entrées
        </h4>
        <ul>
          <li>
            Croustillants de chèvre, miel au piment d’Espelette, mesclun de
            salade
          </li>
          <li>
            Œuf mollet frit aux bretzels, lentilles au xérès et émulsion au
            lard fumé
          </li>
          <li>
            Petit tartare de bœuf médocain préparé par le chef, mesclun de
            salade
          </li>
          <li>
            Assiette de jambon Serrano et ses toasts grillés
          </li>
        </ul>
        <h4>
          Plats
        </h4>
        <ul>
          <li>
            Dos de lieu noir, beurre blanc à l’orange et mousseline de
            carotte
          </li>
          <li>
            Suprême de poulet rôti de Vensac, risotto crémeux aux
            champignons
          </li>
          <li>
            Salade Médocaine
          </li>
        </ul>
        <h4>
          Desserts
        </h4>
        <ul>
          <li>
            Crème brulée à la vanille de bourbon
          </li>
          <li>
            Tiramisu au café
          </li>
          <li>
            Glace 2 ou 3 boules
          </li>
        </ul>
      </div>

      <div class="menu" id="menu-2">
        <p class="menu-price">31 €</p>
        <h4>
          Entrées
        </h4>
        <ul>
          <li>
            Assiette de charcuterie, jambon Serrano et rillette d’oie
          </li>
          <li>
            Saumon fumé par nos soins, betteraves en pickles et crème légère
            au yuzu
          </li>
          <li>
            Cassolette d’escargots
          </li>
          <li>
            Mi-cuit de foie gras de canard, chutney de fruits de saison
          </li>
        </ul>

        <h4>
          Plats
        </h4>
        <ul>
          <li>
            Onglet de bœuf, sauce au poivre ou sauce à l’échalote et frites
            maison
          </li>
          <li>
            Filet de bar à la plancha, fondue de poireaux et crème aux
            herbes fraiches
          </li>
          <li>
            Quasi de veau rôti, crumble de noisette, pommes fondantes
          </li>
          <li>
            Noix de Saint-Jacques rôties, mousseline de butternut et crème
            safranée (Supplément 6.00€)
          </li>
        </ul>

        <h4>
          Desserts
        </h4>
        <ul>
          <li>
            Crème brulée à la vanille de bourbon
          </li>
          <li>
            Tiramisu au café
          </li>
        </ul>
      </div>

      <div class="menu" id="menu-enfant">
        <p class="menu-price">12.50 €</p>
        <p class="menu-details">(moins de 12 ans)</p>

        <h4>
          Boissons
        </h4>
        <ul>
          <li>
            Jus de fruits
          </li>
          <li>
            Coca Cola
          </li>
          <li>
            Ice Tea (20 cl)
          </li>
        </ul>
        <h4>
          Plats
        </h4>
        <ul>
          <li>
            Steak haché de bœuf français, frites maison
          </li>
          <li>
            Croquettes de poisson de Lacanau
          </li>
        </ul>
        <h4>
          Desserts
        </h4>
        <ul>
          <li>
            Mousse au chocolat
          </li>
          <li>
            Glace Smarties
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- //section-menu -->
<section id="section-testimonies>">
  <div class="container">
    <header>
      <h2>Nos clients témoignent</h2>
    </header>

    <div class="testimonies-slider">
      <?php foreach ($reviews as $review) : ?>
        <?php include 'src/includes/review.php' ?>
      <?php endforeach ?>
    </div>
  </div>
</section>
<!-- //section-testimonies -->
<section id="section-events">
  <div class="container">
    <header>
      <h2>Actualités</h2>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
        reprehenderit, quae nisi corrupti ut ipsa aut, assumenda deserunt
        voluptatum harum illum. Beatae vitae itaque nobis tenetur quam iure!
        Eius, cumque.
      </p>
    </header>

    <div class="row">
      <?php foreach ($articles as $article) : ?>
        <div class="col">
          <?php require 'src/includes/article-card.php' ?>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<!-- //section-events -->
<section id="section-contact" class="section-background">
  <div class="container">
    <header>
      <h2>Réservez maintenant</h2>
    </header>
    <?php include_once 'src/includes/form-contact.php' ?>
  </div>
</section>
<!-- //section-contact -->

<?php include_once 'src/includes/footer.php' ?>

<?php 
  // require "src/scripts.php" if it hasn't already been included above 
require_once 'src/includes/scripts.php'
?>
<?php require_once 'src/includes/page-end.php' ?>



      
      
          