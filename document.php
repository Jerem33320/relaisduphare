<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <h1>Mais le php c'est mieux : Bonjour <?php echo $_GET['user'] ?></h1>
    <h1>Mais le php c'est mieux : Bonjour <?= $_GET['user'] ?></h1>

    <ul>
      <?php 
        for ($i=0; $i < 10; $i++) { 

          if (true) {
          ?>
          <li class="list-item">Item <?php echo $i?></li>
          <?php
          }
        }
      ?>

      <?php for ($i=0; $i < 10; $i++): ?>
        <li class="list-item">Item <?= $i?></li>
      <?php endfor ?>

    </ul>
    

    <p>
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio
      accusantium repudiandae dicta repellat ab, libero necessitatibus assumenda
      et mollitia sapiente aspernatur, atque facere beatae hic! Consequuntur
      sunt soluta minima amet!
    </p>
  </body>
</html>
