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
          D
        </a>
        <h1><?php lang('Name') ?></h1>
      </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
    <nav>
    <ul>
      <li>information</li>
      <li>planning</li>
      <li>historique</li>
    </ul>
  </nav>
  </body>
</html>
