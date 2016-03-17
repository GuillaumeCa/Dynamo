<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Types-sports</title>
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <?php include 'assets/template/header-priv.php' ?>
    <?php require 'assets/images/svg.php'; ?>
    <section class="info-groupe" style="background-image: url(/assets/images/sport1.png);">
      <div class="overlay"></div>
      <div class="en-tete-type">
        <h1>Catégories de sports</h1>
      </div>
    </section>
    <div class="div-nav">
      <section class="auto-width">
        <div class="list-large2">
          <ul>
            <a href="Athletisme.php">
              <li>
                <div class="left-icon">
                  <div class="circle">
                      <svg>
                        <use xlink:href="#ball"></use>
                      </svg>
                  </div>
                </div>
                <div class="middle-text">
                  <h1>Athletisme</h1>
                  <span class="group-text"><b>Sports: </b>Marathon, sprint, sauts...</span>
                </div>
              </li>
            </a>
            <a href="Sports-collectifs.php">
              <li>
                <div class="left-icon">
                  <div class="circle">
                    <svg>
                      <use xlink:href="#ball"></use>
                    </svg>
                  </div>
                </div>
                <div class="middle-text">
                  <h1>Sports collectifs</h1>
                  <span class="group-text"><b>Sports: </b>Basket-ball, football, rugby...</span>
                </div>
              </li>
            </a>
            <a href="Sports-de-raquettes.php">
              <li>
                <div class="left-icon">
                  <div class="circle">
                    <svg>
                      <use xlink:href="#ball"></use>
                    </svg>
                  </div>
                </div>
                <div class="middle-text">
                  <h1>Sports de raquettes</h1>
                  <span class="group-text"><b>Sports: </b>Tennis, badminton, squash...</span>
                </div>
              </li>
            </a>
            <a href="Sports-de-cibles.php">
              <li>
                <div class="left-icon">
                  <div class="circle">
                    <svg>
                      <use xlink:href="#ball"></use>
                    </svg>
                  </div>
                </div>
                <div class="middle-text">
                  <h1>Sports de cible</h1>
                  <span class="group-text"><b>Sports: </b>Billards, bowling, tir à l'arc...</span>
                </div>
              </li>
            </a>
          </ul>
        </div>
      </section>
    </div>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
