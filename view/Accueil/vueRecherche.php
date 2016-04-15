
<section class="sec sec-bg-violet">
  <div class="column">
    <h1 class="ttl ttl-md">Recherche</h1>
    <form class="" action="" method="get" id="form">
      <input type="text" name="search" class="clear-form search-form-lg" placeholder="Recherchez un groupe, un sport ou un département" value="<?php echo isset($_GET['search']) ? $_GET['search'] : null ?>">
    </form>
  </div>
</section>

<?php if (isset($num)): ?>

  <?php if ($num != 0): ?>

    <div class="search-optbar">
      <div class="search-bar">
        <span><span class="number"><?php echo isset($num) ? $num : null ?></span> résultats pour <b>"<?php echo $_GET['search'] ?>"</b></span>
        <span></span>
        <b><span class="sporttype-filter"></span></b>
        <b><span class="dept-filter"></span></b>
        <b><span class="club-filter"></span></b>
        <a href="#filtre" class="button purple btn-sm" onclick="document.querySelector('.search-tool').classList.toggle('active')">Filtres</a>
      </div>
      <div class="search-tool groupe_crea">
        <h2 class="form-label pink-text ttl-cps ttl-s">Filtrer par Catégorie de Sport</h2>
        <select id="selectBox" class="clear-form dropdown dropdown-lg search-select" name="sport" filter-type='sporttype'>
          <option value="" selected>Tous les types de sport</option>
          <?php foreach ($listsports as $values): ?>

            <option value="<?php echo $values->id ?>"><?php echo $values->nom ?></option>

          <?php endforeach; ?>
        </select>

        <h2 class="form-label pink-text ttl-cps ttl-s">Filtrer par Département</h2>
        <select id="selectBox" class="clear-form dropdown dropdown-lg search-select" name="sport" filter-type='dept'>
          <option value="">Tous les départements</option>
          <?php foreach ($deptlist as $value): ?>
            <option value="<?php echo $value->dept ?>"><?php echo $value->dept ?></option>
          <?php endforeach; ?>
        </select>
        <h2 class="form-label pink-text ttl-cps ttl-s">Filtrer par Club</h2>
        <select id="selectBox" class="clear-form dropdown dropdown-lg search-select" name="sport" filter-type='club'>
          <option value="">Tous les clubs</option>
        </select>
      </div>
    </div>

  <?php else: ?>

    <p class="txt-center-warn">
      Aucun résultats
    </p>

  <?php endif; ?>

<?php else: ?>

  <p class="txt-center-warn">
    Veuillez entrer un nom de sport, groupe ou département.
  </p>

<?php endif; ?>

<section class="sec">
  <div class="auto-width">


    <?php if (!empty($groupe)): ?>

      <h1 class="ttl ttl-green ttl-cps">Groupes</h1>
      <ul class="liste-lg search-result">

      <?php foreach ($groupe as $value): ?>

        <a href="<?php page('groupe') ?>" filter-sporttype="<?php echo $value['data']->sport_type ?>" filter-dept="<?php echo $value['data']->dept ?>">
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
      <ul class="liste-lg search-result">

      <?php foreach ($sports as $value): ?>

        <a href="<?php page('SportGroupe', ['id' => $value->id]) ?>" filter-sporttype="<?php echo $value->id_type ?>">
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
