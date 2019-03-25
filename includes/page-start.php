<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <meta 
      name="description" 
      content="<?php echo empty($pageDescription) ? 'Une description par defaut' : $pageDescription ?>" 
    />
    
    <title>
      <?php echo $pageTitle ?>
    </title>

    <base href="<?= BASE_URL ?>">

    <?php include_once 'styles.php' ?>
  </head>
  <body>
    