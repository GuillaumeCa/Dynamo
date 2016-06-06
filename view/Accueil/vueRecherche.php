
<section class="sec sec-bg-violet">
  <div class="column">
    <h1 class="ttl ttl-md"><?php lang('Recherche'); ?></h1>
    <form class="" action="" method="get" id="form">
      <input type="text" name="search" class="clear-form search-form-lg" placeholder='<?php lang('presentation-recherche'); ?>' value="<?php echo isset($_GET['search']) ? $_GET['search'] : null ?>">
    </form>
  </div>
</section>
<div class="switch-bg">
  <div class="centered">
    <div class="switch-cat active">
      <?php lang('Tout'); ?>
    </div>
    <div class="switch-cat">
      <?php lang('Groupes'); ?>
    </div>
    <div class="switch-cat">
      Sports
    </div>
    <div class="switch-cat">
      <?php lang('Utilisateur'); ?>
    </div>
  </div>
</div>

<?php if (isset($num)): ?>

  <?php if ($num != 0): ?>

    <div class="search-optbar">
      <div class="search-bar">
        <span><span class="number"><?php echo isset($num) ? $num : null ?></span><?php lang('result'); ?><b>"<?php echo $_GET['search'] ?>"</b></span>
        <span></span>
        <b><span class="sporttype-filter"></span></b>
        <b><span class="dept-filter"></span></b>
        <b><span class="club-filter"></span></b>
        <a href="#filtre" class="button purple btn-sm" onclick="document.querySelector('.search-tool').classList.toggle('active')"><?php lang('Filtres'); ?></a>
      </div>
      <div class="search-tool groupe_crea">
        <h2 class="form-label pink-text ttl-cps ttl-s"><?php lang('filter-c'); ?></h2>
        <select id="selectBox" class="clear-form dropdown dropdown-lg search-select" name="sport" filter-type='sporttype'>
          <option value="" selected><?php lang('all-s'); ?></option>
          <?php foreach ($listsports as $values): ?>

            <option value="<?php echo $values->id ?>"><?php echo $values->nom ?></option>

          <?php endforeach; ?>
        </select>

        <h2 class="form-label pink-text ttl-cps ttl-s"><?php lang('filter-d'); ?></h2>
        <select id="selectBox" class="clear-form dropdown dropdown-lg search-select" name="sport" filter-type='dept'>
          <option value=""><?php lang('all-d'); ?></option>
          <?php foreach ($deptlist as $value): ?>
            <option value="<?php echo $value->dept ?>"><?php echo $value->dept ?></option>
          <?php endforeach; ?>
        </select>
        <h2 class="form-label pink-text ttl-cps ttl-s"><?php lang('filter-club'); ?></h2>
        <select id="selectBox" class="clear-form dropdown dropdown-lg search-select" name="sport" filter-type='club'>
          <option value=""><?php lang('all-club'); ?></option>
        </select>
      </div>
    </div>
  <?php endif; ?>
<?php else: ?>

  <p class="txt-center-warn">
    <?php lang('prensentation-enter'); ?>
  </p>

<?php endif; ?>

<section class="sec">
  <div class="auto-width search-list active">

    <?php if (isset($num)): ?>
      <?php if ($num == 0): ?>
        <p class="txt-center-warn">
          <?php lang('no-result'); ?>
        </p>
      <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($global)): ?>
      <ul class="liste-lg search-result">
      <?php foreach ($global as $value): ?>
        <?php if ($value->type == 'groupe'): ?>

          <a href="<?php page('groupe', ['id' => $value->id]) ?>" filter-sporttype="<?php echo $value->sport_type ?>" filter-dept="<?php echo $value->dept ?>">
            <li>
              <div class="liste-licon">
                <div class="liste-bg-img" style="background-image: url(<?php echo !is_null($value->url) ? '/'.$value->url : '/assets/images/yoga.png' ?>);">
                </div>
                <div class="liste-svg">
                    <svg>
                      <use xlink:href="#typeSport<?php echo $value->sport_type ?>"></use>
                    </svg>
                </div>
              </div>
              <div class="liste-mid-txt">
                <h1 class="liste-ttl"><?php echo $value->titre ?></h1>
                <span class="liste-ttl-sub"><b>Sport</b> <?php echo $value->sport ?></span>
                <span class="liste-ttl-sub"><b>Club</b> <?php echo $value->club ?></span>
              </div>
              <span class="liste-note"><span><?php echo $value->nb_user ?></span>/<?php echo $value->nbmaxutil ?></span>
            </li>
          </a>

        <?php endif; ?>

        <?php if ($value->type == 'sport'): ?>

          <a href="<?php page('SportGroupe', ['id' => $value->id]) ?>" filter-sporttype="<?php echo $value->id_type ?>">
            <li>
              <div class="liste-licon">
                <div class="liste-svg">
                    <svg>
                      <use xlink:href="#typeSport<?php echo $value->id_type ?>"></use>
                    </svg>
                </div>
              </div>
              <div class="liste-mid-txt">
                <h1 class="liste-ttl"><?php echo $value->nom ?></h1>
                <p class="liste-ttl-desc">
                  <?php echo $value->description ?>
                </p>
              </div>
            </li>
          </a>

        <?php endif; ?>

        <?php if ($value->type == 'user'): ?>

          <a href="#">
              <li class="membres-item">
                  <span><?php echo substr(ucfirst($value->prénom), 0, 1) ?></span>
                  <h1><?php echo $value->prénom." ".$value->nom ?></h1>
              </li>
          </a>

        <?php endif; ?>

      <?php endforeach; ?>
      </ul>
    <?php endif; ?>

  </div>

  <div class="auto-width search-list">
    <?php if (!empty($groupe)): ?>
    <ul class="liste-lg search-result">
      <?php foreach ($groupe as $value): ?>

        <a href="<?php page('groupe', ['id' => $value->id]) ?>" filter-sporttype="<?php echo $value->sport_type ?>" filter-dept="<?php echo $value->dept ?>">
          <li>
            <div class="liste-licon">
              <div class="liste-bg-img" style="background-image: url(<?php echo !is_null($value->url) ? '/'.$value->url : '/assets/images/yoga.png' ?>);">
              </div>
              <div class="liste-svg">
                  <svg>
                    <use xlink:href="#typeSport<?php echo $value->sport_type ?>"></use>
                  </svg>
              </div>
            </div>
            <div class="liste-mid-txt">
              <h1 class="liste-ttl"><?php echo $value->titre ?></h1>
              <span class="liste-ttl-sub"><b>Sport</b> <?php echo $value->sport ?></span>
              <span class="liste-ttl-sub"><b>Club</b> <?php echo $value->club ?></span>
            </div>
            <span class="liste-note"><span><?php echo $value->nb_user ?></span>/<?php echo $value->nbmaxutil ?></span>
          </li>
        </a>

      <?php endforeach; ?>
    </ul>
    <?php else: ?>
      <?php if (isset($num)): ?>
        <p class="txt-center-warn">
          <?php lang('no-result'); ?>
        </p>
      <?php endif; ?>
  <?php endif; ?>
  </div>

  <div class="auto-width search-list">
    <?php if (!empty($sports)): ?>
    <ul class="liste-lg search-result">
      <?php foreach ($sports as $value): ?>

        <a href="<?php page('SportGroupe', ['id' => $value->id]) ?>" filter-sporttype="<?php echo $value->id_type ?>">
          <li>
            <div class="liste-licon">
              <div class="liste-svg">
                  <svg>
                    <use xlink:href="#typeSport<?php echo $value->id_type ?>"></use>
                  </svg>
              </div>
            </div>
            <div class="liste-mid-txt">
              <h1 class="liste-ttl"><?php echo $value->nom ?></h1>
              <p class="liste-ttl-desc">
                <?php echo $value->description ?>
              </p>
            </div>
          </li>
        </a>

      <?php endforeach; ?>
    </ul>
  <?php else: ?>

      <?php if (isset($num)): ?>
        <p class="txt-center-warn">
          <?php lang('Aucun résultat'); ?>
        </p>
      <?php endif; ?>

  <?php endif; ?>
  </div>



  <div class="auto-width search-list">
    <?php if (!empty($users)): ?>
    <ul class="search-result">
      <?php foreach ($users as $value): ?>
        <a href="#">
          <li>
            <div class="membres-item">
                <span><?php echo substr(ucfirst($value->prénom), 0, 1) ?></span>
                <h1><?php echo $value->prénom." ".$value->nom ?></h1>
            </div>
          </li>
        </a>


      <?php endforeach; ?>
    </ul>
  <?php else: ?>

      <?php if (isset($num)): ?>
        <p class="txt-center-warn">
          <?php lang('Aucun résultat'); ?>
        </p>
      <?php endif; ?>

  <?php endif; ?>
  </div>

</section>
