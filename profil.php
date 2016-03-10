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
    <section class="pink-bg">
      <div class="text-left column">
        <a href="" class="profile-btn logoP " title="Dynamo User">
          N
        </a>
        <h1><?php lang('Name') ?></h1>
      </div>
    </section>
    <nav class="nav-groupe">
      <ul>
        <a href="#"><li>informations</li></a>
        <li><a href="#">planning</a></li>
        <li><a href="#">Historique</a></li>
      </ul>
    </nav>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
