<a class="room" href="">
  <img src="public/img/<?= $room->getCover() ?>" alt="" />
  <p class="room-name">
    Chambre <?= $room->getType() ?>
    <span>
    (<?php //echo $room['options'] ?>)
    </span>
  </p>
  <p class="room-price"><?= $room->getPrice() ?> € / par nuit</p>
  <p class="room-bed">
    <?php if ($room->getBed() === 'queen-size'): ?>
      Lit Queen size (160 cm x 200 cm)
    <?php elseif ($room->getBed() === 'king-size'): ?>
      Lit King size (180 cm x 200 cm)
    <?php endif ?>
  </p>
</a>