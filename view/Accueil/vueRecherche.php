<form class="" action="" method="get" id="form">
<section class="sec sec-bg-violet">
  <div class="column">
    <h1 class="ttl ttl-md">Recherche</h1>
      <input type="text" name="search" class="clear-form search-form-lg" placeholder="Recherchez un groupe, un sport ou un département" value="<?php echo $_GET['search'] ?>">
  </div>
</section>
<?php if (isset($num)): ?>
  <div class="search-optbar">
    <div class="search-bar">
      <span><?php echo isset($num) ? $num : null ?> résultats pour <b>"<?php echo $_GET['search'] ?>"</b></span>
      <a href="#" class="button purple btn-sm">Filtres</a>
    </div>
    <div class="search-tool groupe_crea">
      <select id="selectBox" class="clear-form dropdown dropdown-lg" name="sport" onchange="document.getElementById('form').submit()">
        <option value="" disabled selected>Sport</option>
        <?php foreach ($listsports as $type => $values): ?>
          <optgroup label="<?php echo $type ?>">
            <?php foreach ($values as $value): ?>
              <option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
            <?php endforeach; ?>
          </optgroup>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
<?php else: ?>

  <p>
    Aucuns résultats
  </p>

<?php endif; ?>

<section class="sec">
  <div class="auto-width">


    <?php if (!empty($groupe)): ?>
      <h1 class="ttl ttl-green ttl-cps">Groupes</h1>
      <ul class="liste-lg">
      <?php foreach ($groupe as $value): ?>
        <a href="<?php page('groupe') ?>">
          <li>
            <div class="liste-licon">
              <div class="liste-bg-img" style="background-image: url(/assets/images/yoga.png);">
              </div>
            </div>
            <div class="liste-mid-txt">
              <h1 class="liste-ttl"><?php echo $value['data']->titre ?></h1>
              <span class="liste-ttl-sub"><b>Sport</b> <?php echo $value['data']->sport ?></span>
              <span class="liste-ttl-sub"><b>Club</b> <?php echo $value['data']->club ?></span>
            </div>
            <span class="liste-note"><span><?php echo $value['nb'] ?></span>/<?php echo $value['data']->nbmaxutil ?></span>
          </li>
        </a>
      <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if (!empty($sports)): ?>
      <h1 class="ttl ttl-green ttl-cps">Sports</h1>
      <ul class="liste-lg">
      <?php foreach ($sports as $type => $value): ?>
        <a href="<?php page('sport-groupe') ?>">
          <li>
            <div class="liste-licon">
              <div class="liste-svg">
                  <svg>
                    <use xlink:href="#ball"></use>
                  </svg>
              </div>
            </div>
            <div class="liste-mid-txt">
              <h1 class="liste-ttl"><?php echo $value->nom ?></h1>
            </div>
          </li>
        </a>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>

  </div>
</section>
</form>
