    <section class="sec sec-bg-violet">
      <div class="column">
        <h1 class="ttl ttl-md ttl-green"><?php echo $discName ?></h1>
        <h2 class="ttl ttl-md ttl-green" style="font-size: 30px"><?php echo $topicName ?></h2>
      </div>
    </section>
    <section class="auto-width">
      <ul class="liste-discussion">
        <?php foreach ($discussions as $message): ?>
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
                    <p><b>Posté le <?php echo Vue::date("d/m/Y à H:i:s", $message->date) ?></b></p>
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
        <form action="" method="post">
          <div class="boutton-discussion2">
            <div class="parti-discussion">
              <div class="miniature" style="background-image:url(/<?php echo $photo->nom ?>)"></div>
              <h1><b><?php echo $_SESSION['auth']->nom." ".$_SESSION['auth']->prénom ?></b></h1>
              <p><?php echo $_SESSION['auth']->id_ville ?></p>
            </div><div class="parti-discussion2">
              <textarea class="clear-form2" name="commentaire" rows="6" cols="40" placeholder="Pour répondre et commentez cette discussion..."></textarea>
            </div>
          </div>
        </br>
        <div style="text-align: center">
          <input type="submit" value="Commentez" class="button light">
        </div>
      </form>
      <?php endif; ?>
    </section>
