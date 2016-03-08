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
    <?php include 'assets/template/header-priv.php' ?>
    <?php require 'assets/images/svg.php' ?>
    <section class="pink-bg">
      <div class="column">
        <h1>Mes Groupes</h1>
        </br>
        <a href="#" class="button">Créer un groupe</a>
      </div>
    </section>
    <section class="auto-width">
    <div class="list-large">
      <ul>
        <a href="">
          <li>
            <div class="left-icon">
              <div class="img-group" style="background-image: url(http://greatist.com/sites/default/files/styles/big_share/public/free-yoga.png?itok=uwn98osm);">
              </div>
              <div class="circle">
                  <svg>
                    <use xlink:href="#ball"></use>
                  </svg>
              </div>
            </div>
            <div class="middle-text">
              <h1>Groupe #1</h1>
              </br>
              <span class="group-text"><b>Sport</b> yoga</span>
              <span class="group-text"><b>Club</b> Forest Hill</span>
            </div>
          </li>
        </a>
        <li></li>
        <li></li>
      </ul>
    </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
