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
    <?php require 'assets/images/svg.php' ?>
    <section class="info" style="background-image: url(assets/images/sport1.png);">
      <div class="overlay"></div>
      <div class="content">
        <h1 class="green-text">Dynamo</h1>
        <p>Dynamo vous permet de trouver et gérer des groupes de sport selon votre position géographique, votre niveau de sport et vos sports favoris.</p>
        <a href="inscription.php" class="button"><?php lang('inscris-moi'); ?></a>
      </div>
    </section>
    <section class="dark-bg">
      <div class="column">
        <h1>Types de sports</h1>
        <div class="grid">
          <?php
          for ($i=0; $i < 20; $i++) {
            ?>
            <div class="sport">
              <a href="#">
                <div class="circle">
                  <svg>
                    <use xlink:href="#run"></use>
                  </svg>
                </div>
              </a>
              <!-- <img src="assets/images/logo.png" alt="test" /> -->
              <span>Balle</span>
            </div>
            <?php
          }
          ?>

      </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
