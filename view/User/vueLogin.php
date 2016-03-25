<section class="sec sec-bg-violet">
  <div class="column">
    <h1 class="ttl ttl-md"><?php lang('Connexion') ?></h1>
    <form action="" method="post" class="login">
      <?php if (isset($errors)): ?>
        <pre>
          <?php print_r($errors) ?>
        </pre>
      <?php endif; ?>
      <input type="email" class="clear-form" name="email" placeholder="<?php lang('adresse-email') ?>">
      <input type="password" class="clear-form" name="password" placeholder="<?php lang('motdepasse') ?>">
      <input id="remember" type="checkbox" name="confirmation" checked><label for="remember"><?php lang('rester-connecté') ?></label>
      <input class="button" type="submit" value="<?php lang('valider') ?>">
      <a href="<?php page('forgot') ?>" class="forget"><?php lang('mdp-oublie') ?></a>
    </form>
  </div>
</section>
<section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(assets/images/sport2.jpg);">
  <div class="sec-overlay sec-over-dark"></div>
  <div class="column">
    <h1 class="ttl ttl-lg"><?php lang('inscrit-title') ?></h1>
    <a href="<?php page('inscription') ?>" class="button margin dark"><?php lang('inscription') ?></a>
  </div>
</section>
