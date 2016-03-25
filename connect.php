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
    <?php include 'assets/template/header-priv.php' ?>
    <section class="sec sec-bg-violet">
      <div class="column">
        <h1 class="ttl ttl-md"><?php lang('Connexion') ?></h1>
        <form action="index.php" method="post" class="login">
          <input type="email" class="clear-form" name="email" placeholder="<?php lang('adresse-email') ?>">
          <input type="password" class="clear-form" name="passwd" placeholder="<?php lang('motdepasse') ?>">
          <input id="remember" type="checkbox" name="remember" checked><label for="remember"><?php lang('rester-connecté') ?></label>
          <input class="button" type="submit" name="send" value="<?php lang('valider') ?>">
          <a href="#" class="forget"><?php lang('mdp-oublie') ?></a>
        </form>
      </div>
    </section>
    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(assets/images/sport2.jpg);">
      <div class="sec-overlay sec-over-dark"></div>
      <div class="column">
        <h1 class="ttl ttl-lg"><?php lang('inscrit-title') ?></h1>
        <a href="inscription.php" class="button margin dark"><?php lang('inscription') ?></a>
      </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
