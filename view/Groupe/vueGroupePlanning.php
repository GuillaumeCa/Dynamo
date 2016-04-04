    <?php require 'Calendar.php'; ?>
    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(/assets/images/sport1.png);">
      <div class="sec-overlay sec-over-violet"></div>
      <div class="auto-width group">
        <h1 class="ttl-md">Nom du groupe</h1>
        <p class="txt-jdesc">Dynamo vous permet de trouver et de gérer des groupes de sport selon votre position géograhique, votre niveau de sport et vos sports favoris. </p>
        <div class="txt-info">
          <span><b>Sport</b> football</span>
          <span><b>Club</b> Forest Hill</span>
        </div>
      </div>
    </section>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe') ?>">informations</a></li>
          <li><a href="<?php page('membres-groupe') ?>">membres</a></li>
          <li><a href="<?php page('planning-groupe') ?>" class="active">planning</a></li>
          <li><a href="<?php page('discussion-groupe') ?>">discussions</a></li>
          <li>
            <a href="<?php page('reglage-groupe') ?>" class="settings">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="column">
      <?php
      $events = [
        "CALENDRIER 1" => [
                            ["2016-03-15", "titre1", "descrition1","09:00:00","12:00:00"],
                            ["2016-03-20", "titre2", "descrition1","09:00:00","12:00:00"]
                          ],
      ];

      ?>
      <?php Calendar(12, $events); ?>
    </div>
