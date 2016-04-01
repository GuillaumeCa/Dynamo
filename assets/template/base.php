<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <?php $this->loadCss($this->css) ?>
    <title><?php echo $this->page ?> - Dynamo</title>
  </head>
  <body>
    <?php require_once 'assets/images/icons.svg' ?>
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
    <script type="text/javascript">
      function toggle(element) {
        document.body.querySelector(element).classList.toggle('visible');
      }
    </script>
  </body>
</html>
