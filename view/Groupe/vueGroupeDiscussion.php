    <?php include 'view/template/groupe-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('informations'); ?></a></li>
          <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('membres'); ?></a></li>
          <li><a href="<?php page('planning-groupe', ['id' => $presentation_groupe->id]) ?>">planning</a></li>
          <li><a href="<?php page('discussion-groupe', ['id' => $presentation_groupe->id]) ?>" class="active"><?php lang('discussions'); ?></a></li>
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
        <a href="#" class="button light"><?php lang('Créer une discussion'); ?></a>
      </div>
        <ul>
          <li>
            <a href="#">
              <div class="boutton-discussion">
                <div class="parti-boutton">
                  <h1>Discussion #1</h1>
                  <p><?php lang('Créée le '); ?>08/03/16 <?php lang('par '); ?>Alizée Faytre</p>
                </div>
                <div class="parti-boutton-2">
                  <h2>77 <?php lang('messages'); ?></h2>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="boutton-discussion">
                <div class="parti-boutton">
                  <h1>Discussion #1</h1>
                  <p><?php lang('Créée le '); ?>08/03/16 <?php lang('par '); ?>Alizée Faytre</p>
                </div>
                <div class="parti-boutton-2">
                  <h2>77 <?php lang('messages'); ?></h2>
                </div>
              </div>
            </a>
          </li>
        </ul>
    </div>
