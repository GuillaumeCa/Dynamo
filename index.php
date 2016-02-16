<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>Dynamo</title>
  </head>
  <body>
    <?php include 'assets/template/header.php' ?>
    <section class="info" style="background-image: url(http://medias.portailbienetre.fr/coach-sportif.png);">
      <div class="overlay"></div>
      <div class="content">
        <h1>Dynamo</h1>
        <p>Dynamo vous permet de trouver et gérer des groupes de sport selon votre position géographique, votre niveau de sport et vos sports favoris.</p>
        <a href="#" class="button"><?php lang('inscris-moi'); ?></a>
      </div>
    </section>
    <section class="dark">
      <div class="column">
        <h1>Sports</h1>
        <div class="grid">
          <div class="sport">
            <img src="assets/images/logo.png" alt="test" />
            <span>test</span>
          </div>
          <div class="sport">
            <img src="assets/images/logo.png" alt="test" />
            <span>test</span>
          </div>
          <div class="sport">
            <img src="assets/images/logo.png" alt="test" />
            <span>test</span>
          </div>
          <div class="sport">
            <img src="assets/images/logo.png" alt="test" />
            <span>test</span>
          </div>
          <div class="sport">
            <img src="assets/images/logo.png" alt="test" />
            <span>test</span>
          </div>
          <div class="sport">
            <img src="assets/images/logo.png" alt="test" />
            <span>test</span>
          </div>
          <div class="sport">
            <img src="assets/images/logo.png" alt="test" />
            <span>test</span>
          </div>
          <div class="sport">
            <img src="assets/images/logo.png" alt="test" />
            <span>test</span>
          </div>
      </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
