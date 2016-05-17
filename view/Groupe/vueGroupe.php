    <?php include 'view/template/groupe-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>" class="active">informations</a></li>
          <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>">membres</a></li>
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
    <section class="auto-width">
      <div class="ttl-group-underline-gr">
        <h1 class="ttl ttl-green ttl-inline ttl-sm">Demain</h1>
      </div>
      <div class="info-planning-grp">
        <div class="info-planning">
          <p>
            9h
          </p>
        </div>
        <div class="info-planning">
          <p>
            10h
          </p>
        </div>
        <div class="info-planning">
          <p>
            11h
          </p>
        </div>
        <div class="info-planning">
          <div class="evenement">
            <p>
              Entrainement Football
            </p>
            <p>
              12:00 - 13:00
            </p>
          </div>
          <p>
            12h
          </p>
        </div>
        <div class="info-planning">
          <p>
            13h
          </p>
        </div>
        <div class="last-info-planning">
          <p>
            14h
          </p>
        </div>
      </div>
    </section>
