
    <section class="pink-bg">
      <div class="column">
        <h1 class="title"><?php lang('Connexion') ?></h1>
        <form action="" method="post">
          <input type="email" class="clear-form" name="email" placeholder="<?php lang('adresse-email') ?>">
          <input type="password" class="clear-form" name="password" placeholder="<?php lang('motdepasse') ?>">
          <input id="remember" type="checkbox" name="remember" checked><label for="remember"><?php lang('rester-connecté') ?></label>
          <input class="button" type="submit" name="send" value="<?php lang('valider') ?>">
          <a href="/fr/login/forgot" class="forget"><?php lang('mdp-oublie') ?></a>
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
