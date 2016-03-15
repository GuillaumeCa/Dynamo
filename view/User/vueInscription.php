    <section class="dark-bg">
        <div class="column">
          <form class="inscription" action="" method="post">
              <h1 class="title green-text">Inscription</h1>
              <h3>Tout les champs sont obligatoires</h3>
              <h2 class="green-text">Nom</h2>
              <input class="clear-form" type="text" name="nom" placeholder="nom">
              <input class="clear-form" type="text" name="prenom" placeholder="prénom">
              <h2 class="green-text">Email</h2>
              <input class="clear-form" type="email" name="email" placeholder="e-mail">
              <h2 class="green-text">Mot de passe</h2>
              <input class="clear-form mdp" type="password" name="password" placeholder="mot de passe">
              <input class="clear-form mdp" type="password" name="confirmation" placeholder="confirmer mot de passe" oninput="verif()">
              <h2 class="green-text">Adresse</h2>
              <input class="clear-form" type="text" name="ville" placeholder="ville">
              <input class="clear-form" type="text" name="codepostal" placeholder="code postal">
              <h2 class="green-text">Date de naissance</h2>
              <div class="label-center">
                <select class="clear-form" name="jour">
                  <option value="option" disabled selected>jour</option>
                  <?php for ($i = 0; $i < 31; $i++): ?>
                    <option value="<?php echo $i ?>"><?php echo $i+1; ?></option>
                  <?php endfor; ?>
                </select>
                <select class="clear-form" name="mois">
                  <option value="option" disabled selected>mois</option>
                  <?php $mois=["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"] ?>
                  <?php for ($i = 0; $i < 12; $i++): ?>
                    <option value="<?php echo $i ?>"><?php echo $mois[$i]; ?></option>
                  <?php endfor; ?>
                </select>
                <select class="clear-form" name="année">
                  <option value="option" disabled selected>année</option>
                  <?php $date = intval(date('Y')); ?>
                  <?php for ($i = 14; $i < 99; $i++): ?>
                    <option value="<?php echo $i ?>"><?php echo $date-$i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <h2 class="green-text">Sexe</h2>
              <div class="label-center">
                <div class="radio">
                  <label><input type="radio" class="radio-button" name="sexe" value="1" checked="checked">
                  <span class="radio-inner"></span>
                  Homme</label>
                </div>
                <div class="radio">
                  <label><input type="radio" class="radio-button" name="sexe" value="0">
                  <span class="radio-inner"></span>
                  Femme</label>
                </div>
              </div>
              <input id="submit" type="submit" class="button dark" value="s'inscrire">
            </form>
        </div>
    </section>
    <!-- <script src="/assets/js/verif.js" charset="utf-8"></script> -->
