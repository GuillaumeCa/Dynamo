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
    <section class="sec sec-bg-violet">
      <div class="auto-width left-align">
        <a href="" class="profile-btn profile-btn-sm" title="Dynamo User">
          D
        </a>
        <h1 class="ttl ttl-md ttl-band">Dynamo User</h1>
      </div>
    </section>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="profile.php" class="active">informations</a></li>
          <li><a href="profile-planning.php">planning</a></li>
          <li><a href="profile-historique.php">Historique</a></li>
          <li>
            <a href="profile-reglage.php" class="settings">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
        <div class="reglage">
          <p>Recevoir des notifications par mail lorsque quelqu'un répond à ma discussion sur le Forum</p>
          <a href="#" class="button light">Désactiver</a>
        </div>
        <div class="reglage">
          <p>Supprimer mon compte</p>
          <a href="#" class="button light">Supprimer</a>
        </div>
        <!-- <div class="deconnexion">
          <br>
          <a href="#" class="button">SE DÉCONNECTER</a>
        </div> -->
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
