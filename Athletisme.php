<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Athletisme</title>
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <?php include 'assets/template/header-priv.php' ?>
    <?php require 'assets/images/svg.php'; ?>
    <section class="info-groupe" style="background-image: url(/assets/images/sport1.png);">
      <div class="overlay"></div>
      <div class="en-tete-type">
        <h1>Athletisme</h1>
      </div>
    </section>
    <div class="div-nav">
      <section class="auto-width">
        <div class="list-large2">
          <ul>
            <a href="Tennisclubs.php">
              <li>
                <div class="left-icon">
                  <div class="circle">
                      <svg>
                        <use xlink:href="#ball"></use>
                      </svg>
                  </div>
                </div>
                <div class="middle-text">
                  <h1>Marathon</h1>
                </div>
              </li>
            </a>
            <a href="groupe.php">
              <li>
                <div class="left-icon">
                  <div class="circle">
                    <svg>
                      <use xlink:href="#ball"></use>
                    </svg>
                  </div>
                </div>
                <div class="middle-text">
                  <h1>Sprint</h1>
                </div>
              </li>
            </a>
            <a href="groupe.php">
              <li>
                <div class="left-icon">
                  <div class="circle">
                    <svg>
                      <use xlink:href="#ball"></use>
                    </svg>
                  </div>
                </div>
                <div class="middle-text">
                  <h1>Sauts</h1>
                </div>
              </li>
            </a>
            <a href="groupe.php">
              <li>
                <div class="left-icon">
                  <div class="circle">
                    <svg>
                      <use xlink:href="#ball"></use>
                    </svg>
                  </div>
                </div>
                <div class="middle-text">
                  <h1>etc</h1>
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
