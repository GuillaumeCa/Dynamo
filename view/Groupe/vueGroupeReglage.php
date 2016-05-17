    <?php include 'view/template/groupe-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>">informations</a></li>
          <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>">membres</a></li>
          <li><a href="<?php page('planning-groupe', ['id' => $presentation_groupe->id]) ?>">planning</a></li>
          <li><a href="<?php page('discussion-groupe', ['id' => $presentation_groupe->id]) ?>">discussions</a></li>
          <li class="right">
            <a href="<?php page('reglage-groupe', ['id' => $presentation_groupe->id]) ?>" class="settings active">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="reglage">
      <p>Recevoir des notifications par mail lorsqu'une nouvelle activité est ajoutée</p>
      <a href="#" class="button light">Désactiver</a>
    </div>
    <div class="reglage">
      <p>Recevoir des notifications par mail lorsque quelqu'un répond à ma discussion</p>
      <a href="#" class="button light">Désactiver</a>
    </div>
    <div class="reglage">
      <p>Supprimer le groupe</p>
      <a href="#" class="button light button-danger">Supprimer</a>
    </div>
