<section class="sec sec-bg-overlay">

  <div id="diaporama" class="sec-overlay diapo-images">
    <div class="image sec-overlay sec-bg-img visible" style="background-image: url(/assets/images/sport2.jpg);"></div>
    <div class="image sec-overlay sec-bg-img" style="background-image: url(/assets/images/sport3.jpg);"></div>
  </div>
  <div class="sec-overlay sec-over-violet"></div>
  <div class="auto-width group">
      <h1 class="ttl-md">
        <span class="header_groupe">Nom du Club</span>
      </h1>
      <div class="txt-info">
        <span><b>Ville</b> Paris</span>
        <span><b>Note</b> 4/10</span>
      </div>
  </div>
</section>

<section class="auto-width">
  <?php if ($comments): ?>

  <ul class="liste-discussion">
    <?php foreach ($comments as $message): ?>
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
    </br></br>
    <div class="line"></div>
    </br>
    </ul>
  <?php endif; ?>
    <form action="" method="post">
      <div class="boutton-discussion2">
        <div class="parti-discussion">
          <div class="miniature" style="background-image:url(/<?php echo $photo->nom ?>)"></div>
          <h1><b><?php echo $_SESSION['auth']->nom." ".$_SESSION['auth']->prénom ?></b></h1>
          <p><?php echo $_SESSION['auth']->id_ville ?></p>
        </div><div class="parti-discussion2">
          <div class="club-note">
            <span class="star-note"></span>
            <span class="star-note"></span>
            <span class="star-note"></span>
            <span class="star-note"></span>
            <span class="star-note"></span>
          </div>
          <textarea class="clear-form2" name="commentaire" rows="6" cols="40" placeholder="Tapez votre commentaire et notez le club..."></textarea>
        </div>
      </div>
    </br>
    <div style="text-align: center">
      <input type="submit" value="Commentez" class="button light">
    </div>
  </form>
</section>
