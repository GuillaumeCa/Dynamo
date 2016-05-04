<?php require 'app/Calendar.php' ?>
<section class="sec sec-bg-violet">
  <div class="auto-width left-align">
    <a href="" class="profile-btn profile-btn-sm" title="Dynamo User">
      <?php echo substr(ucfirst($_SESSION['auth']->prénom), 0, 1) ?>
    </a>
    <h1 class="ttl ttl-md ttl-band"><?php echo $infos->prénom.' '.$infos->nom ?></h1>
    <a href="<?php page('logout') ?>" class="button btn-purple-inv btn-right btn-band btn-sm">SE DÉCONNECTER</a>
  </div>
</section>
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
