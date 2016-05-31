<div class="main">

  <div class="sidebar">
    <div class="sidebar-title">
      <a href="<?php page('accueil') ?>">
        <h1>Admin Dynamo</h1>
      </a>
    </div>
    <ul class="sidebar-menu">
      <a href="<?php page('backoffice-user') ?>">
        <li class="active">Utilisateurs</li>
      </a>
      <a href="<?php page('backoffice-group') ?>">
        <li class="">Groupes</li>
      </a>
      <a href="<?php page('backoffice-sport') ?>">
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
      <form class="" action="" method="post">

      <div class="table-admin">
        <table>
          <tr>
            <th><input type="checkbox" title="Selectionner Tout" onchange="selectAll(this)"></th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th>Code Postal</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
          </tr>
          <?php foreach ($users as $user): ?>
            <tr>
              <td><input type="checkbox" name="sel[]" value="<?php echo $user->id ?>"></td>
              <td><?php echo $user->nom ?></td>
              <td><?php echo $user->prénom ?></td>
              <td><?php echo $user->pseudo ?></td>
              <td><?php echo $user->email ?></td>
              <td><?php echo $user->code_postal ?></td>
              <td><?php echo $user->sexe ?></td>
              <td><?php echo Vue::date('d/m/Y', $user->naissance) ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
      <div class="nav-pages">
        <?php if (isset($prec)): ?>
          <a href="<?php page('backoffice-user') ?>?page=<?php echo $prec ?>" class="nav"><</a>
        <?php endif; ?>
        <?php if ($cpage != 0): ?>
          <span><?php echo $cpage ?></span>
        <?php endif; ?>
        <?php if (isset($suiv)): ?>
          <a href="<?php page('backoffice-user') ?>?page=<?php echo $suiv ?>" class="nav">></a>
        <?php endif; ?>
      </div>
      <button type="submit" name="del" class="button light">Supprimer</button>
      <button class="button light" onclick="modify()">Modifier</button>
    </form>
    </div>
  </div>

</div>
