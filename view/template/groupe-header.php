<section class="sec sec-bg-overlay">

  <div id="diaporama" class="sec-overlay diapo-images">
    <div class="image sec-overlay sec-bg-img visible" style="background-image: url(/assets/images/sport1.png);"></div>
    <div class="image sec-overlay sec-bg-img" style="background-image: url(/assets/images/sport2.jpg);"></div>
    <div class="image sec-overlay sec-bg-img" style="background-image: url(/assets/images/sport3.jpg);"></div>
  </div>
  <div class="sec-overlay sec-over-violet"></div>
  <div class="auto-width group">
    <form class="modifierinfo" action="" method="post">
      <h1 class="ttl-md">
        <span class="header_groupe"><?php echo $presentation_groupe->nomGroupe ?></span>
        <input class="modif-form" type="text" name="name_grp" value="<?php echo $presentation_groupe->nomGroupe ?>">
      </h1>
      <p class="txt-jdesc">
        <span class="header_groupe"><?php echo $presentation_groupe->description ?></span>
        <input class="modif-form" type="text" name="description_grp" value="<?php echo $presentation_groupe->description ?>">
      </p>
      <div class="txt-info">
        <span>
          <b>Sport</b>
          <span class="header_groupe"><?php echo $presentation_groupe->sport ?> </span>
          <select class="modif-form" name="sport">
            <option value="option" disabled selected><?php echo $presentation_groupe->sport ?></option>
            <?php foreach ($ListeSports as $type => $sports): ?>
              <optgroup label="<?php echo $type ?>">
                <?php foreach ($sports as $sport): ?>
                  <option value="<?php echo $sport[0] ?>"><?php echo $sport[1] ?></option>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
          </select>
          <!-- <input class="modif-form" type="text" name="sport" value="<?php echo $presentation_groupe->sport ?>"> -->
        </span>
        <span>
          <b>Club</b>
          <span class="header_groupe"> <?php echo $presentation_groupe->club ?></span>
          <input class="modif-form" type="text" name="lieu" value="<?php echo $presentation_groupe->club ?>">
        </span>
      </div>
    </form>
    <?php if ($isLeader): ?>
      <a href="#" class="button btn-sm btn-right btn-wh-inv" id="InfoModifier">modifier</a>
    <?php endif; ?>
  </div>
</section>
