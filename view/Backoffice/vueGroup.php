<div class="main">

  <div class="sidebar">
    <div class="sidebar-title">
      <a href="<?php page('accueil') ?>">
        <h1>Admin Dynamo</h1>
      </a>
    </div>
    <ul class="sidebar-menu">
      <a href="<?php page('backoffice-user') ?>">
        <li class="">Utilisateurs</li>
      </a>
      <a href="<?php page('backoffice-group') ?>">
        <li class="active">Groupes</li>
      </a>
      <a href="#">
        <li class="">Sports</li>
      </a>
      <a href="#">
        <li class="">Forum</li>
      </a>
      <a href="#">
        <li class="">Aide</li>
      </a>
    </ul>
  </div>

  <div class="content">
    <div class="card">
      <a href="#" class="button light">Ajouter</a>
      <form action="" method="post">

      <div class="table-admin">
        <table>
          <tr>
            <th><input type="checkbox" name="sel" value="all" title="Selectionner Tout" onchange="selectAll(this)"></th>
            <th>Titre</th>
            <th>Sport</th>
            <th>Club</th>
            <th>Visibilité</th>
            <th>Description</th>
            <th>Nombre Max</th>
            <th>Création</th>
            <th>Dép.</th>
            <th>Niveau</th>
          </tr>
          <?php foreach ($groups as $group): ?>
            <tr>

              <td><input type="checkbox" name="sel" value="<?php echo $group->id ?>"></td>
              <td><?php echo $group->titre ?></td>
              <td><?php echo $group->sport ?></td>
              <td><?php echo $group->club ?></td>
              <td><?php echo $group->visibilité == 1 ? 'public' : 'privé' ?></td>
              <td><?php echo $group->description ?></td>
              <td><?php echo $group->nbmaxutil ?></td>
              <td><?php echo Vue::date('d/m/Y H:i:s', $group->creation) ?></td>
              <td><?php echo $group->dept ?></td>
              <td><?php echo $niveau[$group->niveau] ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
      <div class="nav-pages">
        <?php if (isset($prec)): ?>
          <a href="<?php page('backoffice-group') ?>?page=<?php echo $prec ?>" class="nav"><</a>
        <?php endif; ?>
        <?php if ($cpage != 0): ?>
          <span><?php echo $cpage ?></span>
        <?php endif; ?>
        <?php if (isset($suiv)): ?>
          <a href="<?php page('backoffice-group') ?>?page=<?php echo $suiv ?>" class="nav">></a>
        <?php endif; ?>
      </div>
      <button href="#" class="button light">Supprimer</button>
      <a href="#" class="button light" onclick="modify()">Modifier</a>
    </form>
    </div>
  </div>

</div>

<?php foreach ($groups as $group): ?>
  <div class="modal" id="modify-<?php echo $group->id ?>">
    <div class="modal-window">
      <span class="close" onclick="togglemodal('modify-<?php echo $group->id ?>')">╳</span>
      <h2><?php echo $group->titre ?></h2>
      <form class="groupe_crea" action="" method="post">
        <h2 class="form-label pink-text">Nom de groupe</h2>
        <input class="clear-form" type="text" name="name_grp" value="<?php echo $group->titre ?>">

        <h2 class="form-label pink-text">Votre sport</h2>
        <select class="clear-form dropdown dropdown-lg" name="sport">
          <?php foreach ($ListeSports as $type => $sports): ?>
            <optgroup label="<?php echo $type ?>">
              <?php foreach ($sports as $sport): ?>
                <?php $select = ($group->sport == $sport[1]) ? 'selected' : '' ?>
                <option value="<?php echo $sport[0] ?>" <?php echo $select ?>><?php echo $sport[1] ?></option>
              <?php endforeach; ?>
            </optgroup>
          <?php endforeach; ?>
        </select>

        <h2 class="form-label pink-text">Club</h2>
        <select class="clear-form dropdown dropdown-lg" name="club">
          <option value="0" selected>Pas de Club</option>
          <?php foreach ($ListeClub as $type => $club): ?>
            <?php $select = ($group->club == $club->nom) ? 'selected' : '' ?>
            <option value="<?php echo $club->id ?>" <?php echo $select ?>><?php echo $club->nom ?></option>
          <?php endforeach; ?>
        </select>

        <h2 class="form-label pink-text">Département</h2>
        <input class="clear-form" type="text" name="dep" value="<?php echo $group->dept ?>">

        <h2 class="form-label pink-text">Niveau</h2>
        <select class="clear-form dropdown dropdown-lg" name="club">
          <?php foreach ($niveau as $key => $value): ?>
            <?php $select = ($group->niveau == $key) ? 'selected' : '' ?>
            <option value="<?php echo $group->key ?>" <?php echo $select ?>><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>

        <h2 class="form-label pink-text">Nombre de membres maximum</h2>
        <select class="clear-form dropdown dropdown-lg" name="nbr_membre">
          <option value="option" disabled selected>Nombre</option>
          <option value="0">illimité</option>
          <?php for ($i = 0; $i < 12; $i++): ?>
            <?php $selected = ($i == $group->nbmaxutil-1) ? 'selected' : '' ?>
            <option value="<?php echo $i+1 ?>" <?php echo $selected ?>><?php echo $i+1; ?></option>
          <?php endfor; ?>
        </select>


        <h2 class="form-label pink-text">Visibilité du groupe</h2>
        <div class="label label-center">
          <div class="radio">
            <label><input type="radio" class="radio-button" name="visibilite" value="1" <?php if ($group->visibilité == 1) echo 'checked' ?>>
            Publique</label>
          </div>
          <div class="radio">
            <label><input type="radio" class="radio-button" name="visibilite" value="0" <?php if ($group->visibilité == 0) echo 'checked' ?>>
            Privé</label>
          </div>
        </div>
        <p class="form-info">
          Toutes les personnes inscrites sur le site peuvent demander à rejoindre un groupe publique alors qu'un groupe privé n'est accessible que par invitations
        </p>

        <h2 class="form-label pink-text">Description du groupe</h2>
        <textarea class="clear-form" name="description_grp" rows="6" cols="40" placeholder="Décrivez votre groupe en quelques lignes ..."><?php echo $group->description ?></textarea>

        <input type="submit" value="Modifier" class="button purple">
      </form>
    </div>
  </div>
<?php endforeach; ?>
