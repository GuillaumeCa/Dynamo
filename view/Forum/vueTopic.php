    <section class="sec sec-bg-violet">
      <div class="column">
        <h1 class="ttl ttl-md ttl-green"><?php echo $topicName ?></h1>
        <p class="txt-desc"><?php lang('presentation-topic'); ?><br>
          <?php lang('info-topic'); ?></p>
      </div>
    </section>
    <div class="discussion">
      <?php if (Router::isLoggedIn()): ?>
        <div class="creer-discussion">
          <a href="<?php page('forumNewDiscussion', ['id' => $topic])?>" class="button light"><?php lang('create-disc'); ?></a>
        </div>
      <?php endif; ?>
      <?php if ($discussions): ?>

        <ul>
          <?php foreach ($discussions as $discussion): ?>
            <li>
              <a href="<?php page('forumDiscussion', ["id" => $discussion->id])?>">
                <div class="boutton-discussion">
                  <div class="parti-boutton">
                    <h1><?php echo $discussion->titre ?></h1>
                    <p><?php lang('date'); ?><?php echo Vue::date("d/m/Y",$discussion->creation)." à ".Vue::date("H:i:s",$discussion->creation) ?> par <?php echo $discussion->prénom." ".$discussion->nom ?></p>
                  </div>
                  <div class="parti-boutton-2">
                    <h2><?php echo $discussion->nb_msg ?> <?php lang('messages'); ?></h2>
                  </div>
                </div>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="txt-center-warn">
          <?php lang('no-disc'); ?>
        </p>
      <?php endif; ?>
    </div>
