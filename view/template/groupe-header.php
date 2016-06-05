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

    <?php if ($isLeader): ?>
      <a href="#" class="button btn-sm btn-right" id="InfoModifier" onclick="editInfo(this,'.edit-content','.edit-form')">Modifier</a>
    <?php endif; ?>

    <?php if ($isInGroup==0): ?>
      <form action="" method="post">
        <button type="submit" class="button btn-sm btn-right" name="autoinv">S'inscrire</button>
      </form>
    <?php endif; ?>

      <div class="edit-content editing">
        <form class="modifierinfo" action="" method="post">
          <h1 class="ttl-md"><?php echo $presentation_groupe->nomGroupe ?></h1>
          <p class="txt-jdesc"><?php echo $presentation_groupe->description ?></p>
          <div class="txt-info">
            <span><b>Sport</b><?php echo $presentation_groupe->sport ?></span>
            <span>
              <?php if (isset($presentation_groupe->club)): ?>
                <b>Club</b><?php echo $presentation_groupe->club ?>
              <?php endif; ?>
            </span>
          </div>
        </form>
      </div>
      <div class="edit-form">
        <form class="modifierinfo" action="" method="post">
          <input class="edit-grptitle" type="text" name="name_grp" value="<?php echo $presentation_groupe->nomGroupe ?>">
          <textarea class="edit-grpdesc" name="description_grp" cols="60" rows="3"><?php echo $presentation_groupe->description ?></textarea>
          <h2>Sport</h2>
          <select class="edit-select" name="sport">
            <?php foreach ($ListeSports as $type => $sports): ?>
              <optgroup label="<?php echo $type ?>">
                <?php foreach ($sports as $sport): ?>
                  <?php $sel = ($presentation_groupe->sport == $sport[1] ? 'selected' : '') ?>
                  <option value="<?php echo $sport[0] ?>" <?php echo $sel ?>><?php echo $sport[1] ?></option>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
          </select>
          <h2>Club</h2>
          <select class="edit-select" name="club">
            <option value="0" selected>Pas de Club</option>
            <?php foreach ($ListeClub as $type => $club): ?>
              <?php $sel = ($presentation_groupe->club == $club->nom ? 'selected' : '') ?>
              <option value="<?php echo $club->id ?>" <?php echo $sel ?>><?php echo $club->nom ?></option>
            <?php endforeach; ?>
          </select>
        </form>
      </div>

  </div>
</section>
