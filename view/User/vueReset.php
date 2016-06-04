  <section class="sec sec-bg-violet">
    <div class="column success-section">
      <h1 class="ttl ttl-md"><?php lang('Réinitialiser le mot de passe'); ?></h1>
      <form action="" method="post">
        <div class="login">
          <?php if (isset($errors)): ?>
            <div class="form-errors">
              <ul>
                <?php foreach ($errors as $value): ?>
                  <?php foreach ($value as $error): ?>
                    <li><?php echo $error ?></li>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <input type="password" name="password" placeholder="Mot de passe" class="clear-form mdp" onclick="resetMdp()">
          <input type="password" name="confirmation" placeholder="confirmer mot de passe" class="clear-form mdp" oninput="verif()">
          <div class="errors"></div>
        </div>
        <input type="submit" value="modifier" class="button">
      </form>
    </div>
  </section>
