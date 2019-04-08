
<div class="testimony">
  <img
    src="<?= $review->getAvatar() ?>"
    alt="avatar"
    class="testimony-picture"
  />

  <p>
    <?= $review->getMark() ?>
  </p>
  <p>
    <?= htmlspecialchars($review->getMessage()) ?>
  </p>
  <p class="testimony-author">
    <?= htmlspecialchars($review->getAuthor()) ?>
  </p>

  <p>
    <i>
      Publié le : <?= $review->getCreatedAt()->format('d/m/Y') ?>
    </i>
  </p>
</div>