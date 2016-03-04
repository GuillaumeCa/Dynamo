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
              <input class="clear-form pink" type="text" name="nom" placeholder="nom">
              <input class="clear-form pink" type="text" name="prenom" placeholder="prénom">
              <input class="clear-form pink" type="email" name="email" placeholder="e-mail">
              <input class="clear-form pink" type="password" name="mdp" placeholder="mot de passe">
              <input class="clear-form pink" type="password" name="verifmdp" placeholder="confirmer mot de passe">
              <h2 class="green-text">Adresse</h2>
              <input class="clear-form pink" type="text" name="ville" placeholder="ville">
              <input class="clear-form pink" type="text" name="codepostal" placeholder="code postal">
              <h2 class="green-text">Date de naissance</h2>
              <div class="label-center">
                <select class="clear-form pink" name="jour">
                  <option value="option" disabled selected>jour</option>
                  <?php for ($i = 0; $i < 31; $i++): ?>
                    <option value="<?php echo $i ?>"><?php echo $i+1; ?></option>
                  <?php endfor; ?>
                </select>
                <select class="clear-form pink" name="mois">
                  <option value="option" disabled selected>mois</option>
                  <?php for ($i = 0; $i < 12; $i++): ?>
                    <option value="<?php echo $i ?>"><?php echo $i+1; ?></option>
                  <?php endfor; ?>
                </select>
                <select class="clear-form pink" name="année">
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
              <input type="submit" class="button dark" value="s'inscrire">
            </form>
        </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
