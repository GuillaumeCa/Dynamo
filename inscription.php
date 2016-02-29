<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/font-awesome.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
    <?php include 'assets/template/header.php' ?>
    <section class="dark-bg">
        <div class="column">
            <h1>Inscription</h1>
            <form class="inscription" action="index.html" method="post">
              <input class="clear-form" type="text" name="nom" placeholder="nom">
              <input class="clear-form" type="text" name="prenom" placeholder="prénom">
              <input class="clear-form" type="email" name="email" placeholder="e-mail">
              <input class="clear-form" type="password" name="mdp" placeholder="mot de passe">
              <input class="clear-form" type="password" name="verifmdp" placeholder="confirmer mot de passe">
              <input class="clear-form" type="text" name="ville" placeholder="ville">
              <input class="clear-form" type="text" name="codepostal" placeholder="code postal">
              <div class="label-center">
                <label>Date de naissance</label><br>
                <select class="clear-form " name="jour">
                  <option value="option" disabled selected>jour</option>
                </select>
                <select class="clear-form" name="mois">
                  <option value="option" disabled selected>mois</option>
                </select>
                <select class="clear-form" name="année">
                  <option value="option" disabled selected>année</option>
                </select>
              </div>
              <div class="label-center">
                <label>Sexe</label><br>
                <input type="radio" class="radio-button" name="name" value="" checked="checked" id="H">
                <label for="H">Homme</label>
                <input type="radio" class="radio-button" name="name" value="" id="F">
                <label for="F">Femme</label>
              </div>
              <input type="submit" class="button" value="s'inscrire">
            </form>
        </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
