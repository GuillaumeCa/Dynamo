<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
    <?php include 'assets/template/header.php' ?>
    <section class="dark-bg">
        <div class="column">
          <form class="inscription" action="index.php" method="post">
              <h1 class="green-text">Inscription</h1>
              <h3>Tout les champs sont obligatoires</h3>
              <h2 class="green-text">Nom</h2>
              <input class="clear-form" type="text" name="nom" placeholder="nom">
              <input class="clear-form" type="text" name="prenom" placeholder="prénom">
              <h2 class="green-text">Email</h2>
              <input class="clear-form" type="email" name="email" placeholder="e-mail">
              <h2 class="green-text">Mot de passe</h2>
              <input class="clear-form mdp" type="password" name="mdp" placeholder="mot de passe" oninput="verif()">
              <input class="clear-form mdp" type="password" name="verifmdp" placeholder="confirmer mot de passe" oninput="verif()">
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
                  <?php for ($i = 0; $i < 12; $i++): ?>
                    <option value="<?php echo $i ?>"><?php echo $i+1; ?></option>
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
                  <input type="radio" class="radio-button" name="name" value="" checked="checked" id="H">
                  <span class="radio-inner"></span>
                  <label for="H">Homme</label>
                </div>
                <div class="radio">
                  <input type="radio" class="radio-button" name="name" value="" id="F">
                  <span class="radio-inner"></span>
                  <label for="F">Femme</label>
                </div>
              </div>
              <input id="submit" type="submit" class="button dark" value="s'inscrire">
            </form>
        </div>
    </section>
    <script src="/assets/js/verif.js" charset="utf-8"></script>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
