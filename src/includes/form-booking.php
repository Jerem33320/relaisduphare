<?php 
require_once 'src/form-handling/fh_booking.php';
?>

<form
  id="booking-form"
  method="POST"
  action=""
>
  <?php if (!empty($success)) : ?>
  <div class="alert form-success" style="text-align: center;">
    Votre réservation a bien été enregistrée. A bientôt :)
  </div>

  <?php endif ?>
  <?php if (!empty($errors)) : ?>
  <div class="alert form-error" style="text-align: center;">
    Le formulaire contient des erreurs !
  </div>
  <?php endif ?>

  <div class="form-group">
    <label for="">Votre email</label>
    <input
      name="email"
      type="email"
      value=""
    />

    <?php if (array_key_exists('email', $errors)) : ?>
      <div class="form-error">
        <?= $errors['email'] ?>
      </div>
    <?php endif ?>
    
  </div>

  <div class="form-group">
    <label for="">Date d'arrivée</label>
    <input
      type="date"
      name="arrival"
      value="<?= $booking->getArrivalDate('Y-d-m') ?>"
    />
    <?php if (array_key_exists('arrival', $errors)) : ?>
      <div class="form-error">
        <?= $errors['arrival'] ?>
      </div>
    <?php endif ?>
  </div>
  
  <div class="form-group">
    <label for="">Date de départ</label>
    <input
    type="date"
    name="departure"
    value="<?= $booking->getDepartureDate('Y-d-m') ?>"
    />
    <?php if (array_key_exists('departure', $errors)) : ?>
      <div class="form-error">
        <?= $errors['departure'] ?>
      </div>
    <?php endif ?>
  </div>

  <div class="form-group">
    <label for="">Nombre d'adultes</label>
    <input
      type="number"
      min="1"
      step="1"
      name="adultsCount"
      value="<?= $booking->getAdultsCount() ?>"
    />
    <?php if (array_key_exists('adultsCount', $errors)) : ?>
      <div class="form-error">
        <?= $errors['adultsCount'] ?>
      </div>
    <?php endif ?>
  </div>

  <div class="form-group">
    <label for="">Nombre d'enfants</label>
    <input
      type="number"
      min="0"
      step="1"
      name="childrenCount"
      value="<?= $booking->getChildrenCount() ?>"
    />

    <?php if (array_key_exists('childrenCount', $errors)) : ?>
      <div class="form-error">
        <?= $errors['childrenCount'] ?>
      </div>
    <?php endif ?>
    
  </div>

  <input type="submit" value="Envoyer" class="btn" />
</form>