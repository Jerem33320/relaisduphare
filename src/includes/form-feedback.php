<?php 
require_once 'src/form-handling/fh_feedback.php';
?>

<form
  id="feedback-form"
  method="POST"
  action=""
>
  <?php if (!empty($success)) : ?>
  <div class="alert form-success" style="text-align: center;">
    Le formulaire a bien été envoyé !
  </div>

  <?php endif ?>
  <?php if (!empty($errors)) : ?>
  <div class="alert form-error" style="text-align: center;">
    Le formulaire contient des erreurs !
  </div>
  <?php endif ?>

  <div class="form-group">
    <label for="">Votre Nom</label>
    <input
      type="text"
      name="name"
      placeholder="ex: Jean Dupond"
      value="<?= $review->getAuthor() ?>"
    />
    <?php if (array_key_exists('name', $errors)) : ?>
      <div class="form-error">
        <?= $errors['name'] ?>
      </div>
    <?php endif ?>
  </div>
  
  <div class="form-group">
    <label for="">Votre E-Mail</label>
    <input
    type="email"
    name="email"
    placeholder="ex: jeandupond@mail.fr"
    value="<?= $review->getEmail() ?>"
    />
    <?php if (array_key_exists('email', $errors)) : ?>
      <div class="form-error">
        <?= $errors['email'] ?>
      </div>
    <?php endif ?>
  </div>

  <div class="form-group">
    <label for="">Votre message</label>
    <textarea name="message"><?= $review->getMessage() ?></textarea>

    <?php if (array_key_exists('message', $errors)) : ?>
      <div class="form-error">
        <?= $errors['message'] ?>
      </div>
    <?php endif ?>
    
  </div>

  <input type="submit" value="Envoyer" class="btn" />
</form>