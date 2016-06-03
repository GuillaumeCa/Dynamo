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
          <li class="right social">
            <a href="https://www.facebook.com/sharer/sharer.php?u={http://dynamo.com/fr/groupe/38/info}"><img src="/assets/images/facebook.png" alt="facebook" width="20"/></a>
            <a href="https://twitter.com/intent/tweet/?url={http://dynamo.com/fr/groupe/38/info}&text={J'ai rejoins un groupe de sport sur Dynamo !}"><img src="/assets/images/twitter.png" alt="twitter" width="20"/></a>
            <a href="https://plus.google.com/share?url={http://dynamo.com/fr/groupe/38/info}"><img src="/assets/images/google-plus.png" alt="Google Plus" width="20"/></a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="reglage">
      <div class="reglage-item">
        <p>Recevoir des notifications par mail lorsqu'une nouvelle activité est ajoutée</p>
        <a href="#" class="button light">Désactiver</a>
      </div>
      <div class="reglage-item">
        <p>Recevoir des notifications par mail lorsque quelqu'un répond à ma discussion</p>
        <a href="#" class="button light">Désactiver</a>
      </div>
      <div class="reglage-item">
        <p>Quitter le groupe</p>
        <a href="#" class="button light button-danger" onclick="togglemodal('quit_grp')">Quitter</a>
      </div>
      <?php if ($isLeader): ?>
        <div class="reglage-item">
          <p>Supprimer le groupe</p>
          <a href="#" class="button light button-danger" onclick="togglemodal('quit_grp')">Supprimer</a>
        </div>
      <?php endif; ?>
    </div>
    <div class="modal" id="quit_grp">
      <div class="back"  onclick="togglemodal('quit_grp')"></div>
      <div class="window">
        <h1 class="ttl ttl-sm ttl-green">Voulez vous quitter le groupe ?</h1>
        <form action="" method="post">
          <button type="submit" name="quit-grp" class="button light button-danger">Quitter</button>
        </form>
      </div>
    </div>
    <?php if ($isLeader): ?>
      <div class="modal" id="del_grp">
        <div class="back"  onclick="togglemodal('quit_grp')"></div>
        <div class="window">
          <h1 class="ttl ttl-sm ttl-green">Voulez vous supprimer le groupe ?</h1>
          <form action="" method="post">
            <button type="submit" name="del-grp" class="button light button-danger">Supprimer</button>
          </form>
        </div>
      </div>
    <?php endif; ?>
