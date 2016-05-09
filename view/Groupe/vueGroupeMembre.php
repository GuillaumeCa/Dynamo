    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(/assets/images/sport1.png);">
      <div class="sec-overlay sec-over-violet"></div>
      <div class="auto-width group">
        <h1 class="ttl-md"><?php echo $presentation_groupe->nomGroupe ?></h1>
        <p class="txt-jdesc"><?php echo $presentation_groupe->description ?> </p>
        <div class="txt-info">
          <span><b>Sport</b> <?php echo $presentation_groupe->sport ?></span>
          <span><b>Club</b> <?php echo $presentation_groupe->club ?></span>
        </div>
      </div>
    </section>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>">informations</a></li>
          <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>" class="active">membres</a></li>
          <li><a href="<?php page('planning-groupe', ['id' => $presentation_groupe->id]) ?>">planning</a></li>
          <li><a href="<?php page('discussion-groupe', ['id' => $presentation_groupe->id]) ?>">discussions</a></li>
          <li class="right">
            <a href="<?php page('reglage-groupe', ['id' => $presentation_groupe->id]) ?>" class="settings">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="membre">
      <a href="#">
        <span>GC</span>
        <h1>Guillaume Carre</h1>
      </a>
      <h3>LEADER</h3>
    </div>
    <div class="membre">
      <a href="#">
        <span>AA</span>
        <h1>Anthony Agnel</h1>
      </a>
    </div>
