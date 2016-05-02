    <section class="sec sec-bg-violet">
      <div class="column">
        <h1 class="ttl ttl-md">Créer votre groupe</h1>
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
          <h2 class="form-label pink-text">Nom de groupe</h2>
          <input class="clear-form" type="text" name="name_grp" placeholder="">

          <h2 class="form-label pink-text">Ajouter vos amis</h2>
          <div class='liste-membres'>
            <input class="clear-form membres" type="text" name="membre[]" placeholder="pseudos ou e-mails">
            <input class="clear-form membres" type="text" name="membre[]" placeholder="ajouter..." style="opacity: 0.4;" disabled>
          </div>

          <p class="form-info">
            Une invitation par email sera envoyé aux membres afin qu'ils puissent rejoindre le groupe
          </p>

          <h2 class="form-label pink-text">Votre sport</h2>
          <input class="clear-form" type="text" name="sport" placeholder="Football, Athlétisme, Rugby ...">

          <h2 class="form-label pink-text">Club</h2>
          <input class="clear-form" type="text" name="club" placeholder="Stade Francais, Athlé 91 ...">

          <h2 class="form-label pink-text">Lieu</h2>
          <input class="clear-form" type="text" name="lieu" placeholder="Paris, 75015, Essonne ...">

          <h2 class="form-label pink-text">Nombre de membres maximum</h2>
          <select class="clear-form dropdown dropdown-lg" name="nbr_membre">
            <option value="option" disabled selected>Nombre</option>
            <?php for ($i = 0; $i < 12; $i++): ?>
              <option value="<?php echo $i ?>"><?php echo $i+1; ?></option>
            <?php endfor; ?>
          </select>

          <h2 class="form-label pink-text">Visibilité du groupe</h2>
          <div class="label label-center">
            <div class="radio">
              <label><input type="radio" class="radio-button" name="visibilite" value="1" checked="checked">
              <span class="radio-inner"></span>
              Publique</label>
            </div>
            <div class="radio">
              <label><input type="radio" class="radio-button" name="visibilite" value="0">
              <span class="radio-inner"></span>
              Privé</label>
            </div>
          </div>
          <p class="form-info">
            Toutes les personnes inscrites sur le site peuvent demander à rejoindre un groupe publique alors qu'un groupe privé n'est accessible que par invitations
          </p>

          <h2 class="form-label pink-text">Description du groupe</h2>
          <textarea class="clear-form" name="description_grp" rows="6" cols="40" placeholder="Décrivez votre groupe en quelques lignes ..."></textarea>

          <input type="submit" value="Ajouter" class="button purple">
        </form>
      </div>
    </section>
