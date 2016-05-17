    <?php require 'app/Calendar.php'; ?>
    <?php include 'view/template/groupe-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>">informations</a></li>
          <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>">membres</a></li>
          <li><a href="<?php page('planning-groupe', ['id' => $presentation_groupe->id]) ?>" class="active">planning</a></li>
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
    <div class="column">
      <?php
      // $events = [
      //   "CALENDRIER 1" => [
      //                       ["2016-03-15", "titre1", "descrition1","09:00:00","12:00:00"],
      //                       ["2016-03-20", "titre2", "descrition1","09:00:00","12:00:00"]
      //                     ],
      // ];

      ?>
      <?php Calendar(12, $events); ?>
    </div>
