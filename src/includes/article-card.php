<div class="card">
  <img src="public/img/<?= $article['image'] ?>" class="card-img-top" alt="..." />
  <div class="card-body">
    <p class="card-date">
      <?= $article['date'] ?>
    </p>
    <h5 class="card-title">
      <?= $article['title'] ?>
    </h5>
    <p class="card-text">
      <?php echo $article['content'] ?>
    </p>
  </div>
</div>
