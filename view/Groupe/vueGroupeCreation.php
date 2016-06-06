    <section class="sec sec-bg-violet">
      <div class="column">
        <h1 class="ttl ttl-md"><?php lang('create-gr'); ?></h1>
      </div>
    </section>
    <section class="sec">
      <div class="column">
        <form class="groupe_crea" action="" method="post">
          <?php if (isset($errors)): ?>
            <div id='warn1' class="form-errors form-errors-inv">
              <div class="form-errors-row">
                <div class="form-errors-cell form-errors-icn">
                  <svg>
                    <use xlink:href="#warning"></use>
                  </svg>
                </div>
                <div class="form-errors-cell">
                  <ul>
                    <?php foreach ($errors as $value): ?>
                      <?php foreach ($value as $error): ?>
                        <li><?php echo $error ?></li>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="form-errors-cell form-errors-esc">
                  <div onclick="close('#warn1')">
                    <svg>
                      <use xlink:href="#close"></use>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <h2 class="form-label pink-text"><?php lang('name-gr'); ?></h2>
          <input class="clear-form" type="text" name="name_grp" placeholder="">

          <h2 class="form-label pink-text"><?php lang('add-fr'); ?></h2>
          <div class='liste-membres'>
            <input class="clear-form membres" type="text" name="membre[]" placeholder='<?php lang('ps-mail'); ?>'>
            <input class="clear-form membres" type="text" name="membre[]" placeholder='<?php lang('add'); ?>' style="opacity: 0.4;" disabled>
          </div>

          <p class="form-info">
            <?php lang("info-invit"); ?>
          </p>

          <h2 class="form-label pink-text"><?php lang('Votre-sport'); ?></h2>
          <select class="clear-form dropdown dropdown-lg" name="sport">
            <option value="option" disabled selected><?php lang('ex-sport'); ?></option>
            <?php foreach ($ListeSports as $type => $sports): ?>
              <optgroup label="<?php echo $type ?>">
                <?php foreach ($sports as $sport): ?>
                  <option value="<?php echo $sport[0] ?>"><?php echo $sport[1] ?></option>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
          </select>

          <h2 class="form-label pink-text">Club</h2>
          <select class="clear-form dropdown dropdown-lg" name="club">
            <option value="0" selected><?php lang('no-club'); ?></option>
            <?php foreach ($ListeClub as $type => $club): ?>
              <option value="<?php echo $club->id ?>"><?php echo $club->nom ?></option>
            <?php endforeach; ?>
          </select>

          <h2 class="form-label pink-text"><?php lang('Lieu'); ?></h2>
          <input class="clear-form" type="text" name="lieu" placeholder="Paris, 75015, Essonne ...">

          <h2 class="form-label pink-text"><?php lang('nb-max'); ?></h2>
          <select class="clear-form dropdown dropdown-lg" name="nbr_membre">
            <option value="option" disabled selected><?php lang('Nombre'); ?></option>
            <option value="0"><?php lang('illimité'); ?></option>
            <?php for ($i = 0; $i < 12; $i++): ?>
              <option value="<?php echo $i+1 ?>"><?php echo $i+1; ?></option>
            <?php endfor; ?>
          </select>


          <h2 class="form-label pink-text"><?php lang('view-gr'); ?></h2>
          <div class="label label-center">
            <div class="radio">
              <label><input type="radio" class="radio-button" name="visibilite" value="1" checked="checked">
              <span class="radio-inner"></span>
              <?php lang('Publique'); ?></label>
            </div>
            <div class="radio">
              <label><input type="radio" class="radio-button" name="visibilite" value="0">
              <span class="radio-inner"></span>
              <?php lang('Privé'); ?></label>
            </div>
          </div>
          <p class="form-info">
            <?php lang("info-view-gr"); ?>
          </p>

          <h2 class="form-label pink-text"><?php lang('descrip-gr'); ?></h2>
          <textarea class="clear-form" name="description_grp" rows="6" cols="40" placeholder='<?php lang('info-gr'); ?>'></textarea>

          <input type="submit" value="Ajouter" class="button purple">
        </form>
      </div>
    </section>
