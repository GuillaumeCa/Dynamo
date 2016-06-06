  <section class="sec sec-bg-violet">
    <div class="column success-section">
      <h1 class="ttl ttl-md"><?php lang('reset-mdp'); ?></h1>
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
          <input type="password" name="password" placeholder='<?php lang('mdp'); ?>' class="clear-form mdp" onclick="resetMdp()">
          <input type="password" name="confirmation" placeholder='<?php lang('confirm-mdp'); ?>' class="clear-form mdp" oninput="verif()">
          <div class="errors"></div>
        </div>
        <input type="submit" value='<?php lang('modifier'); ?>' class="button">
      </form>
    </div>
  </section>
