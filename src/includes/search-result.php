<div class="search-result">

    <img src="public/img/<?= $room->getCover() ?>" alt="" />

    <p class="room-name">
        <?= $room->getName() ?>
        Chambre <?= $room->getType() ?>
    </p>

    <p class="room-price"><?= $room->getPrice() ?> € / par nuit</p>

    <a href="chambres/<?= $room->getSlug() ?>" class="btn">Réserver</a>
</div>

