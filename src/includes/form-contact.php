<?php 
require_once 'src/form-handling/fh_contact.php';
?>

<form
  id="contact-form"
  method="POST"
  action="contact.php"
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
      value="<?= array_key_exists('name', $values) ? $values['name'] : '' ?>"
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
    value="<?= array_key_exists('email', $values) ? $values['email'] : '' ?>"
    />
    <?php if (array_key_exists('email', $errors)) : ?>
      <div class="form-error">
        <?= $errors['email'] ?>
      </div>
    <?php endif ?>
  </div>

  <div class="form-group">
    <label for="">Votre Téléphone</label>
    <input
      type="phone"
      name="phone"
      placeholder="ex: +33 6 00 11 22 33"
      value="<?= array_key_exists('phone', $values) ? $values['phone'] : '' ?>"
    />
    <?php if (array_key_exists('phone', $errors)) : ?>
      <div class="form-error">
        <?= $errors['phone'] ?>
      </div>
    <?php endif ?>
  </div>

  <div class="form-group">
    <label for="">Votre message</label>
    <textarea name="message"><?= array_key_exists('message', $values) ? $values['message'] : '' ?></textarea>

    <?php if (array_key_exists('message', $errors)) : ?>
      <div class="form-error">
        <?= $errors['message'] ?>
      </div>
    <?php endif ?>
    
  </div>

  <input type="submit" value="Envoyer" class="btn" />
</form>