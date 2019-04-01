<div class="testimony">
  <img
    src="<?= htmlspecialchars($testimony['avatar']) ?>"
    alt="avatar"
    class="testimony-picture"
  />

  <p>
    <?= htmlspecialchars($testimony['content']) ?>
  </p>
  <p class="testimony-author">
    <?= htmlspecialchars($testimony['name']) ?>
  </p>
</div>