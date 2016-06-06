<header>
  <div class="logo">
    <a href="<?php page() ?>" title="Accueil">
    <img src="/assets/images/logo.png" alt="logo" />
    </a>
  </div>
  <div class="search" title='<?php lang('accueil-title'); ?>'>
    <div class="search-field">
      <form class="" action="<?php page('recherche') ?>" method="get">
        <input type="text" name="search" placeholder='<?php lang('Recherche') ?>' autocomplete="off">
        <button type="submit"><svg><use xlink:href="#search"></use></svg></button>
      </form>
    </div>
    <div class="result">
      <div class="info">
        <?php lang('accueil-title'); ?>
      </div>
      <div class="cat">
        <div class="head">
          <span class="title"><?php lang('GROUPES'); ?></span>
          <a href="groupe.php"><?php lang('VOIR'); ?></a>
        </div>
        <ul>
          <li>
            <div class="image" style="background-image: url(/assets/images/sport1.png)"></div>
            <div class="text">
              <h2><?php lang('name-gr'); ?></h2>
              <h3><b>Sport</b> basketball</h3>
              <h3><b><?php lang('Lieu'); ?></b> Paris</h3>
            </div>
            <span>2<span class="small">/7</span></span>
          </li>
          <li>
            <div class="image" style="background-image: url(/assets/images/sport1.png)"></div>
            <div class="text">
              <h2><?php lang('Nom groupe'); ?></h2>
              <h3><b>Sport</b> basketball</h3>
              <h3><b><?php lang('Lieu'); ?></b> Paris</h3>
            </div>
            <span>1<span class="small">/7</span></span>
          </li>
        </ul>
      </div>
      <div class="cat">
        <div class="head">
          <span class="title"><?php lang('SPORTS'); ?></span>
          <a href="groupe.php"><?php lang('VOIR'); ?></a>
        </div>
        <ul>
          <li>
            <div class="image" style="background-image: url(/assets/images/sport1.png)"></div>
            <div class="text">
              <h2><?php lang('Nom groupe'); ?></h2>
              <h3><b>Sport</b> basketball</h3>
              <h3><b><?php lang('Lieu'); ?></b> Paris</h3>
            </div>
            <span>2<span class="small">/7</span></span>
          </li>
        </ul>
      </div>
      <div class="cat">
        <div class="head">
          <span class="title"><?php lang('UTILISATEURS'); ?></span>
          <a href="groupe.php"><?php lang('VOIR'); ?></a>
        </div>
        <ul>
          <li>
            <div class="image" style="background-image: url(/assets/images/sport1.png)"></div>
            <div class="text">
              <h2><?php lang('Nom groupe'); ?></h2>
              <h3><b>Sport</b> basketball</h3>
              <h3><b><?php lang('Lieu'); ?></b> Paris</h3>
            </div>
            <span>2<span class="small">/7</span></span>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <a href="<?php page('profile') ?>" class="profile-btn" title="<?php echo $_SESSION['auth']->prénom." ".$_SESSION['auth']->nom ?>">
    <?php echo substr(ucfirst($_SESSION['auth']->prénom), 0, 1) ?>
  </a>
  <?php
  require_once 'model/Group.php';
  $group = new Group();
  ?>
  <nav>
    <ul class="nav-menu">
      <?php if (Router::isAdmin()): ?>
        <li><a href="<?php page('backoffice-user') ?>">Admin</a></li>
      <?php endif; ?>
      <li><a href="<?php page('liste-groupe') ?>"><?php lang('Groupes') ?>
        <?php $nb = $group->nbInvitUser(); ?>
        <?php if ($nb != 0): ?>
          <span class="notif" title="Vous avez <?php echo $nb ?> invitations"><?php echo $nb; ?></span></a>
        <?php endif; ?>
      </li>
      <li><a href="<?php page('forum') ?>">Forum<span class="notif">3</span></a></li>
      <li><a href="<?php page('aide') ?>"><?php lang('Aide') ?></a></li>
    </ul>
    <div class="btn-nav" onclick="toggle('.nav-menu')">
      ☰
    </div>
  </nav>
</header>
