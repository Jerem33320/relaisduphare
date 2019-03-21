<?php require_once 'includes/page-start.php' ?>

<?php include 'includes/header.php' ?>

<section id="section-contact" class="section-background">
  <div class="container">
    <header>
      <h2>Contactez nous</h2>
    </header>
    <form
      id="contact-form"
      name="contact"
      method="POST"
      data-netlify="true"
    >
      <label for="">Votre Nom</label>
      <input
        type="text"
        name="name"
        placeholder="ex: Jean Dupond"
        required
      />
      <label for="">Votre E-Mail</label>
      <input
        type="email"
        name="email"
        placeholder="ex: jeandupond@mail.fr"
        required
      />
      <label for="">Votre Téléphone</label>
      <input
        type="phone"
        name="phone"
        placeholder="ex: +33 6 00 11 22 33"
        required
      />
      <label for="">Votre message</label>
      <textarea name="content" required></textarea>
      <input type="submit" value="Envoyer" class="btn" />
    </form>
  </div>
</section>

<?php include_once 'includes/footer.php' ?>
<?php require_once 'includes/scripts.php' ?>
<?php require_once 'includes/page-end.php' ?>
    
