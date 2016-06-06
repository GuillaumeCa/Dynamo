<header>
  <div class="logo">
    <a href="<?php page() ?>">
    <img src="/assets/images/logo.png" alt="logo" />
    </a>
  </div>
  <div class="search">
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
              <h2><?php lang('Nom groupe'); ?></h2>
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


  <nav>
    <ul class="nav-menu">
      <li><a href="<?php page('login') ?>"><?php lang('Connexion') ?> </a></li>
      <li><a href="<?php page('forum') ?>"><?php lang('Forum') ?></a></li>
      <li><a href="<?php page('aide') ?>"><?php lang('Aide') ?></a></li>
    </ul>
    <div class="btn-nav" onclick="toggle('.nav-menu')">
      ☰
    </div>
  </nav>
</header>
