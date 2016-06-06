<?php include 'view/template/groupe-header.php'; ?>
<div class="nav-bbar">
  <nav class="tab-menu">
    <ul>
      <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>">informations</a></li>
      <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('membres'); ?></a></li>
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
    <section class="auto-width">
      <div class="ttl-group-underline-gr">
        <h1 class="ttl ttl-green ttl-inline ttl-sm"><?php echo $discName ?></h1>
      </div>
      <ul class="liste-discussion">
        <?php foreach ($messages as $message): ?>
          <li>
              <div class="boutton-discussion">
                <div class="parti-discussion">
                  <div class="miniature" style="background-image:url(/<?php echo $message->url ?>)">
                  </div>
                  <h1><b><?php echo $message->nom." ".$message->prénom ?></b></h1>
                  <p>Paris, France</p>
                </div><div class="parti-discussion2">
                  <div class="comment">
                    <?php echo $message->texte ?>
                  </div>
                  <div class="post">
                    <p><b><?php lang('posted'); ?><?php echo Vue::date("d/m/Y à H:i:s", $message->date) ?></b></p>
                  </div>
                </div>
              </div>
          </li>
        <?php endforeach; ?>

        <?php if (Router::isLoggedIn()): ?>
        </br></br>
        <div class="line"></div>
        </br>
        </ul>
        <form action="#disc" method="post" id="disc">
          <div class="boutton-discussion2">
            <div class="parti-discussion">
              <div class="miniature" style="background-image:url(/<?php echo $photo->nom ?>)"></div>
              <h1><b><?php echo $_SESSION['auth']->nom." ".$_SESSION['auth']->prénom ?></b></h1>
              <p><?php echo $_SESSION['auth']->id_ville ?></p>
            </div><div class="parti-discussion2">
              <textarea class="clear-form2" name="commentaire" rows="6" cols="40" placeholder='<?php lang('answer-disc'); ?>'></textarea>
            </div>
          </div>
        </br>
        <div style="text-align: center">
          <input type="submit" name="com" value='<?php lang('comment'); ?>' class="button light">
        </div>
      </form>
      <?php endif; ?>
    </section>
