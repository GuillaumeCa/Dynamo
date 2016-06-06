    <?php include 'view/template/groupe-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('informations'); ?></a></li>
          <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('membres'); ?></a></li>
          <li><a href="<?php page('planning-groupe', ['id' => $presentation_groupe->id]) ?>">planning</a></li>
          <li><a href="<?php page('discussion-groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('discussions'); ?></a></li>
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
      <!-- <div class="reglage-item">
        <p><?php lang('notif-activity'); ?></p>
        <a href="#" class="button light"><?php lang('Désactiver'); ?></a>
      </div>
      <div class="reglage-item">
        <p><?php lang('notif-disc'); ?></p>
        <a href="#" class="button light"><?php lang('Désactiver'); ?></a>
      </div> -->
      <?php if ($isLeader): ?>
        <div class="reglage-item">
          <p>Modifier le niveau du groupe</p>
          <form action="" class="form-inline reglage-right" method="post">
            <select name="niveau-groupe" class="reglage-sel dropdown dropdown-gr" onchange="this.parentElement.submit()">
              <?php foreach ($niveau as $key => $value): ?>
                <?php $sel = ($key+1 == $niveau_c->niveau) ? 'selected' : '' ?>
                <option value="<?php echo $key+1 ?>" <?php echo $sel ?>><?php echo $value ?></option>
              <?php endforeach; ?>
            </select>
          </form>
        </div>
      <?php endif; ?>
      <?php if ($isLeader): ?>
        <div class="reglage-item">
          <p><?php lang('modif-view-gr'); ?></p>
          <form action="" class="form-inline" method="post">
            <button type="submit" name="visibility" class="button light"><?php echo $visistat == 1 ? 'Public' : 'Privé' ?></button>
          </form>
        </div>
      <?php endif; ?>
      <div class="reglage-item">
        <p><?php lang('leave-gr'); ?></p>
        <a href="#" class="button light button-danger"><?php lang('Quitter'); ?></a>
      </div>
      <?php if ($isLeader): ?>
        <div class="reglage-item">
          <p><?php lang('delete-gr'); ?></p>
          <a href="#" class="button light button-danger" onclick="togglemodal('del_grp')"><?php lang('Supprimer'); ?></a>
        </div>
      <?php endif; ?>
    </div>
    <div class="modal" id="quit_grp">
      <div class="back"  onclick="togglemodal('quit_grp')"></div>
      <div class="window">
        <h1 class="ttl ttl-sm ttl-green"><?php lang('ask-leave-gr'); ?></h1>
        <form class="groupe_crea" action="" method="post">
          <?php if ($isLeader): ?>
            <h2 class="form-label pink-text"><?php lang('select-leader'); ?></h2>
            <div class="">
              <select class="clear-form dropdown" name="utilisateurs">
                <?php foreach ($membres as $value): ?>
                  <option disabled selected><?php lang('new-leader'); ?></option>
                  <?php if ($value->leader == 0): ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->prenom." ".$value->nom ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
          <?php endif; ?>
          <button type="submit" name="quit-grp" class="button light button-danger"><?php lang('Quitter'); ?></button>
        </form>
      </div>
    </div>
    <?php if ($isLeader): ?>
      <div class="modal" id="del_grp">
        <div class="back"  onclick="togglemodal('del_grp')"></div>
        <div class="window">
          <h1 class="ttl ttl-sm ttl-green"><?php lang('ask-delete-gr'); ?></h1>
          <form action="" method="post">
            <button type="submit" name="del-grp" class="button light button-danger"><?php lang('Supprimer'); ?></button>
          </form>
        </div>
      </div>
    <?php endif; ?>
