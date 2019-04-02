
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
</div>