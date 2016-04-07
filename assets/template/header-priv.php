<header>
  <div class="logo">
    <a href="<?php page() ?>">
    <img src="/assets/images/logo.png" alt="logo" />
    </a>
  </div>
  <div class="search">
    <div class="search-field">
      <form class="" action="<?php page('recherche') ?>" method="get">
        <input type="text" name="search" placeholder="rechercher">
        <button type="submit"><svg><use xlink:href="#search"></use></svg></button>
      </form>
    </div>
    <div class="result">
      <div class="cat">
        <div class="head">
          <span class="title">GROUPES</span>
          <a href="groupe.php">VOIR</a>
        </div>
        <ul>
          <li>
            <div class="image" style="background-image: url(/assets/images/sport1.png)"></div>
            <div class="text">
              <h2>Nom groupe</h2>
              <h3><b>Sport</b> basketball</h3>
              <h3><b>Lieu</b> Paris</h3>
            </div>
            <span>2<span class="small">/7</span></span>
          </li>
          <li>
            <div class="image" style="background-image: url(/assets/images/sport1.png)"></div>
            <div class="text">
              <h2>Nom groupe</h2>
              <h3><b>Sport</b> basketball</h3>
              <h3><b>Lieu</b> Paris</h3>
            </div>
            <span>1<span class="small">/7</span></span>
          </li>
        </ul>
      </div>
      <div class="cat">
        <div class="head">
          <span class="title">GROUPES</span>
          <a href="groupe.php">VOIR</a>
        </div>
        <ul>
          <li>
            <div class="image" style="background-image: url(/assets/images/sport1.png)"></div>
            <div class="text">
              <h2>Nom groupe</h2>
              <h3><b>Sport</b> basketball</h3>
              <h3><b>Lieu</b> Paris</h3>
            </div>
            <span>2<span class="small">/7</span></span>
          </li>
          <li>
            <div class="image" style="background-image: url(/assets/images/sport1.png)"></div>
            <div class="text">
              <h2>Nom groupe</h2>
              <h3><b>Sport</b> basketball</h3>
              <h3><b>Lieu</b> Paris</h3>
            </div>
            <span>1<span class="small">/7</span></span>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <a href="<?php page('profile') ?>" class="profile-btn" title="Dynamo User">
    <?php echo substr(ucfirst($_SESSION['auth']->prénom), 0, 1) ?>
  </a>
  <nav>
    <ul class="nav-menu">
      <li><a href="<?php page('liste-groupe') ?>"><?php lang('Groupes') ?> <span class="notif">2</span></a></li>
      <li><a href="<?php page('forum') ?>"><?php lang('Forum') ?> <span class="notif">3</span></a></li>
      <li><a href="<?php page('aide') ?>"><?php lang('Aide') ?></a></li>
    </ul>
    <div class="btn-nav" onclick="toggle('.nav-menu')">
      ☰
    </div>
  </nav>
</header>
