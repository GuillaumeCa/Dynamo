<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title><?php lang('Connexion') ?> - Dynamo</title>
  </head>
  <body>
    <?php include 'assets/template/header-priv.php' ?>
    <section class="pink-bg">
      <div class="column">
        <h1><?php lang('Connexion') ?></h1>
        <form action="" method="post">
          <input type="email" class="clear-form" name="email" placeholder="<?php lang('adresse-email') ?>">
          <input type="password" class="clear-form" name="password" placeholder="<?php lang('motdepasse') ?>">
          <input id="remember" type="checkbox" name="remember" checked><label for="remember"><?php lang('rester-connecté') ?></label>
          <input class="button" type="submit" name="send" value="<?php lang('valider') ?>">
          <a href="/fr/forgot" class="forget"><?php lang('mdp-oublie') ?></a>
        </form>
      </div>
    </section>
    <section class="info" style="background-image: url(assets/images/sport2.jpg);">
      <div class="overlay dark-grad"></div>
      <div class="content">
        <h1 class="light-text"><?php lang('inscrit-title') ?></h1>
        <a href="/fr/inscription" class="button margin dark"><?php lang('inscription') ?></a>
      </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>