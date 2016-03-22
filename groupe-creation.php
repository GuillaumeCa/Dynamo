<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Créer votre groupe</title>
    <link rel="stylesheet" href="assets/css/style.css" charset="utf-8">
  </head>
  <body>
    <?php include 'assets/template/header-priv.php' ?>
    <section class="pink-bg">
      <div class="column">
        <h1>Créer votre groupe</h1>
      </div>
    </section>
    <section>
      <div class="column">
        <form class="groupe_crea" action="index.php" method="post">
          <h2 class="form-label pink-text">Nom de groupe</h2>
          <input class="clear-form" type="text" name="name_grp" placeholder="">
          <h2 class="form-label pink-text">Ajouter vos amis</h2>
          <input class="clear-form" type="text" name="membre" placeholder="Rentrer les pseudos ou les e-mails">
          <h2 class="form-label pink-text">Votre sport</h2>
          <input class="clear-form" type="text" name="sport" placeholder="Football, Athlétisme, Rugby ...">
          <h2 class="form-label pink-text">Club</h2>
          <input class="clear-form" type="text" name="club" placeholder="Stade Francais, Athlé 91 ...">
          <h2 class="form-label pink-text">Lieu</h2>
          <input class="clear-form" type="text" name="lieu" placeholder="Paris, 75015, Essonne ...">
          <h2 class="form-label pink-text">Combien de membres ?</h2>
          <select class="clear-form dropdown dropdown-lg" name="jour">
            <option value="option" disabled selected>Membres</option>
            <?php for ($i = 0; $i < 12; $i++): ?>
              <option value="<?php echo $i ?>"><?php echo $i+1; ?></option>
            <?php endfor; ?>
          </select>
          <h2 class="form-label pink-text">Descritpion du groupe</h2>
          <textarea class="clear-form" name="description_grp" rows="6" cols="40" placeholder="Décrivez votre groupe en quelques lignes ..."></textarea>
      </div>
    </section>
    <?php include 'assets/template/footer.php' ?>
  </body>
</html>
