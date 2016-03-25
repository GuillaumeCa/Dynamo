    <section class="sec sec-bg-violet">
      <div class="column">
        <h1 class="ttl ttl-md">Créer votre groupe</h1>
      </div>
    </section>
    <section class="sec">
      <div class="column">
        <form class="groupe_crea" action="index.php" method="post">
          <h2 class="form-label pink-text">Nom de groupe</h2>
          <input class="clear-form" type="text" name="name_grp" placeholder="">

          <h2 class="form-label pink-text">Ajouter vos amis</h2>
          <input class="clear-form" type="text" name="membre" placeholder="pseudos ou e-mails">
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
          <select class="clear-form dropdown dropdown-lg" name="jour">
            <option value="option" disabled selected>Nombre</option>
            <?php for ($i = 0; $i < 12; $i++): ?>
              <option value="<?php echo $i ?>"><?php echo $i+1; ?></option>
            <?php endfor; ?>
          </select>

          <h2 class="form-label pink-text">Description du groupe</h2>
          <textarea class="clear-form" name="description_grp" rows="6" cols="40" placeholder="Décrivez votre groupe en quelques lignes ..."></textarea>
      </div>
    </section>
