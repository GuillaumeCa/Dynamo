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
      <a href="#" class="button btn-sm btn-right btn-wh-inv" id="InfoModifier">modifier</a>
    <?php endif; ?>
    <?php if ($isInGroup==0): ?>
      <a href="#" class="button btn-sm btn-right btn-wh-inv" id="">S'inscrire</a>
    <?php endif; ?>
    <form class="modifierinfo" action="" method="post">
      <h1 class="ttl-md">
        <span class="header_groupe"><?php echo $presentation_groupe->nomGroupe ?></span>
        <input class="modif-form edit" type="text" name="name_grp" value="<?php echo $presentation_groupe->nomGroupe ?>">
      </h1>
      <p class="txt-jdesc">
        <span class="header_groupe"><?php echo $presentation_groupe->description ?></span>
        <input class="modif-form edit" type="text" name="description_grp" value="<?php echo $presentation_groupe->description ?>">
      </p>
      <div class="txt-info">
        <span>
          <b>Sport</b>
          <span class="header_groupe"><?php echo $presentation_groupe->sport ?> </span>
          <select class="modif-form edit" name="sport">
            <?php foreach ($ListeSports as $type => $sports): ?>
              <optgroup label="<?php echo $type ?>">
                <?php foreach ($sports as $sport): ?>
                  <?php $sel = ($presentation_groupe->sport == $sport[1] ? 'selected' : '') ?>
                  <option value="<?php echo $sport[0] ?>" <?php echo $sel ?>><?php echo $sport[1] ?></option>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
          </select>
          <!-- <input class="modif-form" type="text" name="sport" value="<?php echo $presentation_groupe->sport ?>"> -->
        </span>
        <span>
          <?php if (isset($presentation_groupe->club)): ?>
            <b class="header_groupe">Club</b>
            <span class="header_groupe"> <?php echo $presentation_groupe->club ?></span>
          <?php endif; ?>
          <b class="edit">Club</b>
          <select class="modif-form edit" name="club">
            <option value="0" selected>Pas de Club</option>
            <?php foreach ($ListeClub as $type => $club): ?>
              <?php $sel = ($presentation_groupe->club == $club->nom ? 'selected' : '') ?>
              <option value="<?php echo $club->id ?>" <?php echo $sel ?>><?php echo $club->nom ?></option>
            <?php endforeach; ?>
          </select>
          <!-- <input class="modif-form" type="text" name="lieu" value="<?php echo $presentation_groupe->club ?>"> -->
        </span>
      </div>
    </form>
  </div>
</section>
