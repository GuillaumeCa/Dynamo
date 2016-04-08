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
    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(/assets/images/sport1.png);">
      <div class="sec-overlay sec-over-violet"></div>
      <div class="column">
        <h1 class="ttl ttl-lg">Athletisme</h1>
      </div>
    </section>
    <section class="sec">
      <div class="auto-width">
          <ul class="liste-lg">
            <a href="sport-club.php">
              <li>
                <div class="liste-licon">
                  <div class="liste-svg">
                      <svg>
                        <use xlink:href="#ball"></use>
                      </svg>
                  </div>
                </div>
                <div class="liste-mid-txt">
                  <h1 class="liste-ttl">Marathon</h1>
                </div>
              </li>
            </a>
            <a href="sport-club.php">
              <li>
                <div class="liste-licon">

                  <div class="liste-svg">
                      <svg>
                        <use xlink:href="#ball"></use>
                      </svg>
                  </div>
                </div>
                <div class="liste-mid-txt">
                  <h1 class="liste-ttl">Sprint</h1>
                </div>
              </li>
            </a>
          </ul>
        </div>
      </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
