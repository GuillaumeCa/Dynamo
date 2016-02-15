<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title><?php lang('Connexion') ?> - Dynamo</title>
  </head>
  <body>
    <?php include 'assets/template/header.php' ?>
    <section class="grad">
      <div class="column">
        <h1><?php lang('Connexion') ?></h1>
        <form action="index.php" method="post">
          <input type="email" class="clear-form" name="email" placeholder="adresse email">
          <input type="password" class="clear-form" name="passwd" placeholder="mot de passe">
          <input id="remember" type="checkbox" name="remember" checked><label for="remember"><?php lang('rester-connecté') ?></label>
          <input class="button" type="submit" name="send" value="valider">
          <a href="#" class="forget"><?php lang('mdp-oublie') ?></a>
        </form>
      </div>
    </section>
    <section class="dark">
      <div class="column">
        <h1><?php lang('inscrit-title') ?></h1>
        <a href="#" class="button margin dark"><?php lang('inscription') ?></a>
      </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
