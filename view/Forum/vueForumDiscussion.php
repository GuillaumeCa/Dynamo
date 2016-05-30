    <section class="sec sec-bg-violet">
      <div class="column">
        <h1 class="ttl ttl-md ttl-green"><?php echo $discName ?></h1>
        <h2 class="ttl ttl-md ttl-green"><?php echo $topicName ?></h2>
      </div>
    </section>
    <section class="auto-width">
      <ul class="liste-discussion">
        <?php foreach ($discussions as $message): ?>
          <li>
              <div class="boutton-discussion ">
                <div class="parti-discussion">
                  <div class="miniature" style="background-image:url(http://www.mrsc.vic.gov.au/files/content/public/arts_sport_leisure/sport_fitness/sport-fitness.jpg?w=535&h=360)">
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

      </ul>
    </section>
