<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>Profil - Dynamo</title>
  </head>
  <body>
    <?php include 'assets/template/header-priv.php' ?>
    <?php require 'assets/images/svg.php'; ?>
    <section class="pink-bg">
      <div class="text-left column">
        <a href="" class="profile-btn logoP " title="Dynamo User">
          N
        </a>
        <h1><?php lang('Name') ?></h1>
      </div>
    </section>
    <div class="div-nav">
      <nav class="nav-groupe">
        <ul>
          <li><a href="#">informations</a></li>
          <li><a href="#" class="active">planning</a></li>
          <li><a href="#">Historique</a></li>
          <!-- bouton réglage temporaire -->
          <li><a href="#">
            <svg>
              <use xlink:href="#gear"></use>
            </svg>
          </a></li>
        </ul>
      </nav>
    </div>

      <div class="deconnexion">
        <a href="#" class="button">SE DÉCONNECTER</a>
      </div>

    </div>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
