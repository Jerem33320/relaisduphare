<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Relais du phare</title>

    <link
      href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap-grid.min.css
      "
    />

    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/slider.css" />
  </head>
  <body>
    <header id="navbar" class="top">
      <a href="#">Relais du phare</a>

      <span
        >Site pédagogique <img id="logo" src="img/logo-infrep.png" alt=""
      /></span>
      <!-- <nav id="main-navigation">
        <ul>
          <li><a href="">Chambres</a></li>
          <li><a href="">Photos</a></li>
          <li><a href="">Evènements</a></li>
        </ul>
      </nav> -->
    </header>

    <section id="section-jumbo" class="section-background">
      <div class="jumbo">
        <p>Bienvenue dans un hôtel 5 <span>★</span></p>
        <h1>Nature et convivialité</h1>
      </div>
    </section>
    <!-- //section-jumbo -->

    <section id="section-welcome">
      <div class="container">
        <form id="registration-form" action="">
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
                src="img/img_1.jpg"
                alt="Une chambre d'hôtel spacieuse et luxueuse"
              />
              <picture>
                <img
                  src="img/food-1.jpg"
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
        <div class="row">
          <div class="col-lg-4">
            <div class="room">
              <img src="img/img_1.jpg" alt="" />
              <p class="room-name">
                Chambre Standard <span>(Rez de chaussée)</span>
              </p>
              <p class="room-price">98 € / par nuit</p>
              <p class="room-bed">Lit Queen size (160 cm x 200 cm)</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="room">
              <img src="img/img_2.jpg" alt="" />
              <p class="room-name">
                Chambre standard <span>(Balcon ou Fenêtre Arquée)</span>
              </p>
              <p class="room-price">120 € / par nuit</p>
              <p class="room-bed">Lit Queen size (160 cm x 200 cm)</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="room">
              <img src="img/img_3.jpg" alt="" />
              <p class="room-name">Chambre standard <span>(Terrasse)</span></p>
              <p class="room-price">130 € / par nuit</p>
              <p class="room-bed">Lit Queen size (160 cm x 200 cm)</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="room">
              <img src="img/slider-5.jpg" alt="" />
              <p class="room-name">Chambre premium <span>(Balcon)</span></p>
              <p class="room-price">150 € / par nuit</p>
              <p class="room-bed">Lit King size (180 cm x 200 cm)</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="room">
              <img src="img/slider-7.jpg" alt="" />
              <p class="room-name">Chambre premium <span>(Terrasse)</span></p>
              <p class="room-price">170 € / par nuit</p>
              <p class="room-bed">Lit King size (180 cm x 200 cm)</p>
            </div>
          </div>
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
            <img src="img/slider-1.jpg" alt="" />
            <img src="img/slider-2.jpg" alt="" />
            <img src="img/slider-3.jpg" alt="" />
            <img src="img/slider-4.jpg" alt="" />
            <img src="img/slider-5.jpg" alt="" />
            <img src="img/slider-6.jpg" alt="" />
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
          <div class="testimony">
            <img
              src="http://i.pravatar.cc/150?img=1"
              alt=""
              class="testimony-picture"
            />
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Assumenda impedit est nostrum eaque! Corporis aperiam, omnis
              quisquam nemo enim qui possimus repudiandae totam, deleniti
              veritatis iste quia dicta voluptatibus laudantium.
            </p>
            <p class="testimony-author">
              Jean Smith
            </p>
          </div>
          <div class="testimony">
            <img
              src="http://i.pravatar.cc/150?img=32"
              alt=""
              class="testimony-picture"
            />
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Doloribus enim natus consectetur accusamus!
            </p>
            <p class="testimony-author">
              John Doe
            </p>
          </div>
          <div class="testimony">
            <img
              src="http://i.pravatar.cc/150?img=68"
              alt=""
              class="testimony-picture"
            />
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
              quos quisquam, tenetur id, praesentium delectus non laborum quia
              quo optio eveniet expedita, quidem magni quas. Soluta autem
              deleniti labore perferendis!
            </p>
            <p class="testimony-author">
              Jack Dan
            </p>
          </div>
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
          <div class="col">
            <div class="card">
              <img src="img/img_1.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-date">5 Mars, 2019</p>
                <h5 class="card-title">30 idées cadeaux pour les voyageurs</h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Excepturi voluptates ipsam beatae ex sint? Bosed ...
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="img/img_2.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-date">26 Février, 2019</p>
                <h5 class="card-title">
                  5 astuces pour rendre votre vol plus confortable
                </h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Fugiat odio, laborum temporibus ...
                </p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card">
              <img src="img/img_3.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-date">23 Février, 2019</p>
                <h5 class="card-title">
                  5 Emplois qui vous permettent de gagner de l'argent en
                  voyageant
                </h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit...
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- //section-events -->
    <section id="section-contact" class="section-background">
      <div class="container">
        <header>
          <h2>Réservez maintenant</h2>
        </header>
        <form
          id="contact-form"
          name="contact"
          method="POST"
          data-netlify="true"
        >
          <label for="">Votre Nom</label>
          <input
            type="text"
            name="name"
            placeholder="ex: Jean Dupond"
            required
          />
          <label for="">Votre E-Mail</label>
          <input
            type="email"
            name="email"
            placeholder="ex: jeandupond@mail.fr"
            required
          />
          <label for="">Votre Téléphone</label>
          <input
            type="phone"
            name="phone"
            placeholder="ex: +33 6 00 11 22 33"
            required
          />
          <label for="">Votre message</label>
          <textarea name="content" required></textarea>
          <input type="submit" value="Envoyer" class="btn" />
        </form>
      </div>
    </section>
    <!-- //section-contact -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col">
            <ul>
              <li><a href="#">A propos de nous</a></li>
              <li><a href="#">Termes & Conditions</a></li>
              <li><a href="#">Confidentialité</a></li>
              <li><a href="#section-rooms">Chambres</a></li>
            </ul>
          </div>
          <div class="col">
            <ul>
              <li><a href="#">Lien 1</a></li>
              <li><a href="#">Lien 2</a></li>
              <li><a href="#">Lien 3</a></li>
              <li><a href="#">Lien 4</a></li>
            </ul>
          </div>
          <div class="col">
            <div class="footer-infos">
              <h6>
                <i class="fas fa-map-marker-alt"></i>
                Addresse
              </h6>
              <p>
                Le Relais du Phare <br />
                4 rue de la Marée Haute <br />
                33750 Le Verdon les Bains
              </p>
            </div>

            <div class="footer-infos">
              <h6>
                <i class="fas fa-phone"></i>
                Téléphone
              </h6>
              <p>
                +(33)5 56 09 64 31
              </p>
            </div>

            <div class="footer-infos">
              <h6>
                <i class="fas fa-envelope"></i>
                Email
              </h6>
              <p>
                contact.lerelaisduphare@gmail.com
              </p>
            </div>
          </div>

          <div class="col">
            <p>
              Inscrivez vous à la newsletter
            </p>
            <form action="" id="newsletter-form">
              <input type="email" placeholder="email" />
              <button type="submit">
                <i class="fas fa-paper-plane"></i>
              </button>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col col-lg-6">
            <p class="legals">
              Page fictive à but pédagogique, développée par la promotion
              full-stack 2019 de l'INFREP. <br />
              Basé sur un template
              <a href="https://colorlib.com" target="_blank">Colorful</a>
            </p>
          </div>
          <div class="col col-lg-3 offset-lg-3">
            <div class="socials-container">
              <a href="" class="social-link"
                ><i class="fab fa-tripadvisor"></i
              ></a>
              <a href="" class="social-link"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a href="" class="social-link"><i class="fab fa-twitter"></i></a>
              <a href="" class="social-link"
                ><i class="fab fa-instagram"></i
              ></a>
              <a href="" class="social-link"><i class="fab fa-vimeo-v"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"
    ></script>

    <script src="js/index.js"></script>
    <script src="js/slider.js"></script>
  </body>
</html>
