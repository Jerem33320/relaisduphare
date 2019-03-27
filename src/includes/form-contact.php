<?php require_once 'src/form-handling/fh_contact.php' ?>

<form
  id="contact-form"
  method="POST"
  action="contact.php"
>
  <label for="">Votre Nom</label>
  <input
    type="text"
    name="name"
    placeholder="ex: Jean Dupond"
  />
  <label for="">Votre E-Mail</label>
  <input
    type="email"
    name="email"
    placeholder="ex: jeandupond@mail.fr"
  />
  <label for="">Votre Téléphone</label>
  <input
    type="phone"
    name="phone"
    placeholder="ex: +33 6 00 11 22 33"
  />
  <label for="">Votre message</label>
  <textarea name="message"></textarea>
  <input type="submit" value="Envoyer" class="btn" />
</form>