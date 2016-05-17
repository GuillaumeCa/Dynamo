    <?php include 'view/template/groupe-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>">informations</a></li>
          <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>">membres</a></li>
          <li><a href="<?php page('planning-groupe', ['id' => $presentation_groupe->id]) ?>">planning</a></li>
          <li><a href="<?php page('discussion-groupe', ['id' => $presentation_groupe->id]) ?>" class="active">discussions</a></li>
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
