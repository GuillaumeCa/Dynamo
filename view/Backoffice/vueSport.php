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
        <li class="">Groupes</li>
      </a>
      <a href="<?php page('backoffice-sport') ?>">
        <li class="active">Sports</li>
      </a>
      <a href="<?php page('backoffice-forum') ?>">
        <li class="">Forum</li>
      </a>
      <a href="<?php page('backoffice-help') ?>">
        <li class="">Aide</li>
      </a>
    </ul>
  </div>

  <div class="content">
    <div class="card">
      <button type="submit" class="button light">Ajouter</button>
      <?php foreach ($sports as $type => $list): ?>

        <h1><?php echo $type ?></h1>
        <ul>
        <?php foreach ($list as $sport): ?>
          <li><?php echo $sport->sport ?></li>
        <?php endforeach; ?>
        </ul>

      <?php endforeach; ?>

    </div>
  </div>

</div>
