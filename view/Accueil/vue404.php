<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/css/style.css" charset="utf-8">
    <title>Error</title>
  </head>
  <body>
    <div class="container-404">
      <h1 class="title-404">Euuuh .... la page est introuvable !</h1>
      <a href="<?php page() ?>" class="button">rejoindre la page d'accueil</a>
      <pre>
        <?php var_dump($msg->message) ?>
      </pre>
    </div>
  </body>
</html>
