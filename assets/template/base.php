<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php $this->loadCss($this->css) ?>
    <title><?php echo $this->page ?> - Dynamo</title>
  </head>
  <body>
    <?php require_once 'assets/images/svg.php' ?>
    <?php
    // affiche le header de l'utilisateur connecté
    if (Router::isLoggedIn()) {
      require 'assets/template/header-priv.php';
    } else {
      require 'assets/template/header.php';
    }
    ?>
    <?php require $this->fichier ?>
    <?php $this->loadScript($this->script) ?>
    <?php require 'assets/template/footer.php' ?>
    <script src="" charset="utf-8"></script>
  </body>
</html>
