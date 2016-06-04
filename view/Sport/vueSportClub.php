    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(/assets/images/sport1.png);">
      <div class="sec-overlay sec-over-violet"></div>
      <div class="column">
        <h1 class="ttl ttl-lg"><?php echo $nom_sport ?></h1>
      </div>
    </section>
    <div class="nav-bbar">
      <nav class="tab-menu tab-menu-center">
        <ul>
          <li><a href="<?php page('SportGroupe', ['id' => $id]) ?>"><?php lang('Groupes'); ?></a></li>
          <li><a href="<?php page('SportClub', ['id' => $id]) ?>" class="active">Clubs</a></li>
        </ul>
      </nav>
    </div>
    <section class="sec">
      <div class="auto-width">
          <ul class="liste-lg">
            <?php foreach ($clubs as $club): ?>
              <a href="<?php page('club') ?>">
                <li>
                  <div class="liste-licon">
                    <div class="liste-svg">
                      <svg>
                        <use xlink:href="#ball"></use>
                      </svg>
                    </div>
                  </div>
                  <div class="liste-mid-txt">
                    <h1 class="liste-ttl"><?php echo $club->nom ?></h1>
                  </div>
                </li>
              </a>
            <?php endforeach; ?>

          </ul>
        </div>
      </section>
