<header>
  <div class="logo">
    <a href="/fr">
    <img src="/assets/images/logo.png" alt="logo" />
    </a>
  </div>
  <div class="search">
    <?php require_once 'assets/images/svg.php'; ?>
    <div class="search-field">
      <form class="" action="search.php" method="get">
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

  <a href="profile.php" class="profile-btn" title="Dynamo User">
    D
  </a>
  <nav>
    <ul class="nav-menu">
      <li><a href="/fr/groupe"><?php lang('Groupes') ?> <span class="notif">2</span></a></li>
      <li><a href="/fr/forum"><?php lang('Forum') ?> <span class="notif">3</span></a></li>
      <li><a href="/fr/help"><?php lang('Aide') ?></a></li>
    </ul>
    <div class="btn-nav" onclick="toggle('.nav-menu')">
      ☰
    </div>
  </nav>
</header>
