<?php require 'app/Calendar.php' ?>
<?php include 'view/template/profile-header.php'; ?>

<div class="nav-bbar">
  <nav class="tab-menu">
    <ul>
      <li><a href="<?php page('profile') ?>">informations</a></li>
      <li><a href="<?php page('profile-planning') ?>" class="active">planning</a></li>
      <li><a href="<?php  ?>">historique</a></li>
      <li class="right">
        <a href="<?php page('profile-reglage') ?>" class="settings">
          <svg>
            <use xlink:href="#gear"></use>
          </svg>
        </a>
      </li>
    </ul>
  </nav>
</div>
<div class="column">
  <?php Calendar(12, $events) ?>
</div>
