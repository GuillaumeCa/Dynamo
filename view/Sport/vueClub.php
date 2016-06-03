<section class="sec sec-bg-overlay">

  <div id="diaporama" class="sec-overlay diapo-images">
    <?php foreach ($photos as $key => $photo): ?>
      <?php $visi = ($key == 0) ? 'visible' : null ?>
      <div class="image sec-overlay sec-bg-img <?php echo $visi ?>" style="background-image: url(/<?php echo $photo->nom ?>);"></div>
    <?php endforeach; ?>
    <div class="image sec-overlay sec-bg-img" style="background-image: url(/assets/images/sport2.jpg);"></div>
    <div class="image sec-overlay sec-bg-img" style="background-image: url(/assets/images/sport3.jpg);"></div>
  </div>
  <div class="sec-overlay sec-over-violet"></div>
  <div class="auto-width group">
      <h1 class="ttl-md">
        <span class="header_groupe">Nom du Club</span>
      </h1>
      <h3>Ville : </h3>
  </div>
</section>

<section>
  <h1>Note global du club : </h1>
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
              <div class="liste-niveau">
                <span class="liste-desc">faible</span>
                <div class="liste-scope">
                  <input type="hidden" name="niveau" value="0">
                  <span class="rectangle filled" onclick="modifniveau(this)"></span>
                  <span class="rectangle" onclick="modifniveau(this)"></span>
                  <span class="rectangle" onclick="modifniveau(this)"></span>
                  <span class="rectangle" onclick="modifniveau(this)"></span>
                  <span class="rectangle" onclick="modifniveau(this)"></span>
                </div>
                <span class="liste-desc">élevé</span>
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
