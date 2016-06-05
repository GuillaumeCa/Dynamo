    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(/assets/images/sport1.png);">
      <div class="sec-overlay sec-over-violet"></div>
      <div class="column">
        <h1 class="ttl ttl-lg"><?php echo $nom_sport ?></h1>
      </div>
    </section>
    <div class="nav-bbar">
      <nav class="tab-menu tab-menu-center">
        <ul>
          <li><a href="<?php page('SportGroupe', ['id' => $id]) ?>" class="active">Groupes</a></li>
          <li><a href="<?php page('SportClub', ['id' => $id]) ?>">Clubs</a></li>
        </ul>
      </nav>
    </div>
    <section class="sec">
      <div class="auto-width">
        <?php if ($groupes): ?>
          <ul class="liste-lg">
            <?php foreach ($groupes as $groupe): ?>
                <a href="<?php page('groupe', ['id' => $groupe['data']->id]) ?>">
                  <li>
                    <div class="liste-licon">
                      <div class="liste-bg-img" style="background-image: url(<?php echo !is_null($groupe['data']->url) ? '/'.$groupe['data']->url : '/assets/images/yoga.png' ?>);">
                      </div>
                      <div class="liste-svg">
                          <svg>
                            <use xlink:href="#typeSport<?php echo $groupe['data']->id_type ?>"></use>
                          </svg>
                      </div>
                    </div>
                    <div class="liste-mid-txt">
                      <h1 class="liste-ttl"><?php echo $groupe['data']->nomGroupe ?></h1>
                      <span class="liste-ttl-sub"><b>Sport</b> <?php echo $groupe['data']->sport ?></span>
                      <span class="liste-ttl-sub"><b>Club</b> <?php echo $groupe['data']->club ?></span>
                    </div>
                    <span class="liste-note"><span><?php echo $groupe['nb'] ?></span>/<?php echo $groupe['data']->nbmaxutil ?></span>
                  </li>
                </a>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p class="txt-center-warn">
            Aucun groupe de ce sport
          </p>
        <?php endif; ?>

        </section>
