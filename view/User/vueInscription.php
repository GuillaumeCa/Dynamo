    <section class="sec sec-bg-dviolet">
        <div class="column">
          <form class="inscription" action="" method="post">
              <h1 class="ttl ttl-md ttl-green">Inscription</h1>
              <h3 class="form-desc"><?php lang('mandatory'); ?></h3>
              <?php if (isset($errors)): ?>
                <div class="form-errors form-errors-inv">
                  <ul>
                    <?php foreach ($errors as $value): ?>
                      <?php foreach ($value as $error): ?>
                        <li><?php echo $error ?></li>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif; ?>
              <h2 class="form-label green-text"><?php lang('Nom'); ?></h2>
              <input class="clear-form" type="text" name="nom" placeholder="nom">
              <input class="clear-form" type="text" name="prenom" placeholder="prénom">
              <h2 class="form-label green-text">Email</h2>
              <input class="clear-form" type="email" name="email" placeholder="e-mail">
              <h2 class="form-label green-text"><?php lang('mdp'); ?></h2>
              <input class="clear-form mdp" type="password" name="password" placeholder="mot de passe" onclick="resetMdp()">
              <input class="clear-form mdp" type="password" name="confirmation" placeholder="confirmer mot de passe" oninput="verif()">
              <p class="form-info">
                <?php lang('info-mdp'); ?>
              </p>
              <div class="errors">

              </div>
              <h2 class="form-label green-text"><?php lang('Adresse'); ?></h2>
              <input class="clear-form" type="text" name="ville" placeholder="ville">
              <input class="clear-form" type="text" name="codepostal" placeholder="code postal">
              <h2 class="form-label green-text"><?php lang('date-birth'); ?></h2>
              <div class="label-center">
                <select class="clear-form dropdown" name="jour">
                  <option value="option" disabled selected><?php lang('jour'); ?></option>
                  <?php for ($i = 0; $i < 31; $i++): ?>
                    <option value="<?php echo $i+1 ?>"><?php echo $i+1; ?></option>
                  <?php endfor; ?>
                </select>
                <select class="clear-form dropdown" name="mois">
                  <option value="option" disabled selected><?php lang('mois'); ?></option>
                  <?php $mois=["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"] ?>
                  <?php for ($i = 0; $i < 12; $i++): ?>
                    <option value="<?php echo $i+1 ?>"><?php echo $mois[$i]; ?></option>
                  <?php endfor; ?>
                </select>
                <select class="clear-form dropdown" name="année">
                  <option value="option" disabled selected><?php lang('année'); ?></option>
                  <?php $date = intval(date('Y')); ?>
                  <?php for ($i = 14; $i < 99; $i++): ?>
                    <option value="<?php echo $date-$i ?>"><?php echo $date-$i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <h2 class="form-label green-text"><?php lang('Sexe'); ?></h2>
              <div class="label">
                <div class="radio">
                  <label><input type="radio" class="radio-button" name="sexe" value="H" checked="checked">
                  <span class="radio-inner"></span>
                  <?php lang('Homme'); ?></label>
                </div>
                <div class="radio">
                  <label><input type="radio" class="radio-button" name="sexe" value="F">
                  <span class="radio-inner"></span>
                  <?php lang('Femme'); ?></label>
                </div>
              </div>
              <input id="submit" type="submit" class="button dark" value='<?php lang('submit'); ?>'>
            </form>
        </div>
    </section>
