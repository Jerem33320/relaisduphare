<div class="room">
  <img src="img/<?= $room['cover'] ?>" alt="" />
  <p class="room-name">
    Chambre <?= $room['type'] ?><span>(<?= $room['options'] ?>)</span>
  </p>
  <p class="room-price"><?= $room['price'] ?> € / par nuit</p>
  <p class="room-bed">
    <?php if ($room['bed'] === 'queen-size'): ?>
      Lit Queen size (160 cm x 200 cm)
    <?php elseif ($room['bed'] === 'king-size'): ?>
      Lit King size (180 cm x 200 cm)
    <?php endif ?>
  </p>
</div>