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
          <li><a href="<?php page('groupe') ?>">informations</a></li>
          <li><a href="<?php page('membres-groupe') ?>">membres</a></li>
          <li><a href="<?php page('planning-groupe') ?>">planning</a></li>
          <li><a href="<?php page('discussion-groupe') ?>" class="active">discussions</a></li>
          <li class="right">
            <a href="<?php page('reglage-groupe') ?>" class="settings">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="discussion">
      <div class="creer-discussion">
        <a href="#" class="button light">Créer une discussion</a>
      </div>
        <ul>
          <li>
            <a href="#">
              <div class="boutton-discussion">
                <div class="parti-boutton">
                  <h1>Discussion #1</h1>
                  <p>Créée le 08/03/2016 par Alizée Faytre</p>
                </div>
                <div class="parti-boutton-2">
                  <h2>77 messages</h2>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="boutton-discussion">
                <div class="parti-boutton">
                  <h1>Discussion #1</h1>
                  <p>Créée le 08/03/2016 par Alizée Faytre</p>
                </div>
                <div class="parti-boutton-2">
                  <h2>77 messages</h2>
                </div>
              </div>
            </a>
          </li>
        </ul>
    </div>
