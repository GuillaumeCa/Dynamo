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
          <li class="right social">
            <a href="https://www.facebook.com/sharer/sharer.php?u={http://dynamo.com/fr/groupe/38/info}"><img src="/assets/images/facebook.png" alt="facebook" width="20"/></a>
            <a href="https://twitter.com/intent/tweet/?url={http://dynamo.com/fr/groupe/38/info}&text={J'ai rejoins un groupe de sport sur Dynamo !}"><img src="/assets/images/twitter.png" alt="twitter" width="20"/></a>
            <a href="https://plus.google.com/share?url={http://dynamo.com/fr/groupe/38/info}"><img src="/assets/images/google-plus.png" alt="Google Plus" width="20"/></a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="discussion">
      <div class="creer-discussion">
        <a href="#" class="button light" onclick="togglemodal('disc')">Créer une discussion</a>
      </div>
      <?php if ($discussions): ?>
        <ul>
          <?php foreach ($discussions as $disc): ?>
            <a href="<?php page('groupe-message', ['id'=>$presentation_groupe->id, 'id_disc'=>$disc->id_discussion]) ?>">
              <li>
                <div class="boutton-discussion">
                  <div class="parti-boutton">
                    <h1><?php echo $disc->titre ?></h1>
                    <p>Créée le <?php echo Vue::date('d/m/Y', $disc->creation) ?> par <?php echo $disc->prénom." ".$disc->nom ?></p>
                  </div>
                  <div class="parti-boutton-2">
                    <h2><?php echo $disc->nb ?> messages</h2>
                  </div>
                </div>
              </li>
            </a>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="txt-center-warn">
          Aucune discussion
        </p>
      <?php endif; ?>
    </div>
    <div class="modal" id="disc">
      <div class="back"  onclick="togglemodal('disc')"></div>
      <div class="window">
        <h1 class="ttl ttl-sm ttl-green">Créer une nouvelle discussion</h1>
        <form class="groupe_crea" action="" method="post">
          <h2 class="form-label pink-text">Nom discussion</h2>
          <input class="clear-form" type="text" name="titre" placeholder="Nom">
          <h2 class="form-label pink-text">Commentaire</h2>
          <textarea class="clear-form" name="comment" rows="8" cols="40" placeholder="Tappez votre commentaire ici..."></textarea>
          <button type="submit" name="new-disc" class="button purple">Créer</button>
        </form>
      </div>
    </div>
