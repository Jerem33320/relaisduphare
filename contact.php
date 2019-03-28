<?php



require_once 'src/_constants.php';
require_once 'src/_utils.php';

$pageTitle = 'Contact | Le Relais du Phare';
$pageDescription = "Page de contact de l'hotel de phare. Par téléphone, par mail, comme vous voulez !";

require_once 'src/form-handling/fh_contact.php';

require_once 'src/includes/page-start.php';
include 'src/includes/header.php'

?>

<section id="section-contact" class="section-background">
  <div class="container">
    <header>
      <h2>Contactez nous</h2>
    </header>
    
    <?php include_once 'src/includes/form-contact.php' ?>
  </div>
</section>

<?php include_once 'src/includes/footer.php' ?>
<?php require_once 'src/includes/scripts.php' ?>
<?php require_once 'src/includes/page-end.php' ?>
    
