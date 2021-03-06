    <?php include 'view/template/groupe-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('informations'); ?></a></li>
          <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>" class="active"><?php lang('membres'); ?></a></li>
          <li><a href="<?php page('planning-groupe', ['id' => $presentation_groupe->id]) ?>">planning</a></li>
          <li><a href="<?php page('discussion-groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('discussions'); ?></a></li>
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
    <section class="auto-width">
    <div class="membres">

      <?php if ($isLeader): ?>
        <a href="#" class="button light" onclick="togglemodal('invit')"><?php lang('invite-user'); ?></a>
      <?php endif; ?>
    <?php foreach ($membreGroupe as $membre): ?>
      <a href="#">
        <div class="membres-item">
          <span><?php echo substr($membre->prenom,0,1).substr($membre->nom,0,1) ?></span>
          <h1><?php echo $membre->prenom." ".$membre->nom ?></h1>
          <?php if ($membre->leader==1): ?>
            <h3>LEADER</h3>
          <?php else: ?>
            <form class="form-inline" action="" method="post">
              <input type="hidden" name="value" value="<?php echo $membre->id ?>">
              <button type="submit" name="ban-user" class="button light btn-right">Bannir</button>
            </form>
          <?php endif; ?>
        </div>
      </a>
    <?php endforeach; ?>
    </div>

    <?php if ($isLeader): ?>
      <div class="ttl-group-underline-gr">
        <h1 class="ttl ttl-green ttl-inline ttl-sm"><?php lang('ask-invit'); ?></h1>
      </div>
      <?php if ($autoinvite): ?>

      <div class="membres">
        <?php foreach ($autoinvite as $membre): ?>
          <a href="#">
            <div class="membres-item">
              <span><?php echo substr($membre->prénom,0,1).substr($membre->nom,0,1) ?></span>
              <h1><?php echo $membre->prénom." ".$membre->nom ?></h1>
              <form class="" action="" method="post">
                <input type="hidden" name="value" value="<?php echo $membre->id_utilisateur ?>">
                <button type="submit" name="ok" class="button light btn-right"><?php lang('Accepter'); ?></button>
                <button type="submit" name="ko" class="button light btn-right"><?php lang('Refuser'); ?></button>
              </form>
              <h3><?php lang('request-on'); ?><?php echo Vue::date('d/m/Y  à H:i:s',$membre->autoinvite_date) ?></h3>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p class="txt-center-warn">
        <?php lang('no-request'); ?>
      </p>
    <?php endif; ?>
  <?php endif; ?>
    </section>

    <?php if ($isLeader): ?>
      <div class="modal" id="invit">
        <div class="back"  onclick="togglemodal('invit')"></div>
        <div class="window">
          <h1 class="ttl ttl-sm ttl-green"><?php lang('user-invit'); ?></h1>
          <form class="groupe_crea" action="" method="post">
            <h2 class="form-label pink-text"><?php lang('mail-invit'); ?></h2>
            <input class="clear-form" type="email" name="email" placeholder="Email">
            <button type="submit" name="invit" class="button purple"><?php lang('Inviter'); ?></button>
          </form>
        </div>
      </div>
    <?php endif; ?>
