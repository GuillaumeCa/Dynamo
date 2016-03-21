<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" charset="utf-8">
    <title>Dynamo</title>
  </head>
  <body>
    <?php include 'assets/template/header.php' ?>
    <?php require_once 'assets/images/svg.php' ?>
    <section class="info bg-image-center" style="background-image: url(assets/images/sport1.png);">
      <div class="overlay"></div>
      <div class="content">
        <h1 class="green-text">Forum</h1>
        <p>Une question ? Une idée ? Votre espace de discussion publique totalement dédié au sport !</p>
      </div>
    </section>
    <section class="dark-bg">
      <div class="column">
        <h1>Choisis ton Topic</h1>
        <div class="grid">
          <?php
          for ($i=0; $i < 5; $i++) {
            ?>
            <div class="sport">
              <a href="topic.php">
                <div class="circle">
                  <svg>
                    <use xlink:href="#eiffeltower"></use>
                  </svg>
                </div>
              </a>
              <!-- <img src="assets/images/logo.png" alt="test" /> -->
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="topic.php">
                <div class="circle">
                  <svg>
                    <use xlink:href="#ball"></use>
                  </svg>
                </div>
              </a>
              <!-- <img src="assets/images/logo.png" alt="test" /> -->
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="topic.php">
                <div class="circle">
                  <svg>
                    <use xlink:href="#NY"></use>
                  </svg>
                </div>
              </a>
              <!-- <img src="assets/images/logo.png" alt="test" /> -->
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="topic.php">
                <div class="circle">
                  <svg>
                    <use xlink:href="#run"></use>
                  </svg>
                </div>
              </a>
              <!-- <img src="assets/images/logo.png" alt="test" /> -->
              <span>Topic</span>
            </div>
            <?php
          }
          ?>

      </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
