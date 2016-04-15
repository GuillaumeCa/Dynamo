    <section class="sec sec-bg-pattern sec-bg-overlay" style="background-image: url(/assets/images/pattern_cycling.png);">
      <div class="sec-overlay sec-over-violet"></div>
      <div class="column">
        <h1 class="ttl ttl-lg"><?php echo $nom_type ?></h1>
      </div>
    </section>
    <section class="sec">
      <div class="auto-width">
          <ul class="liste-lg">
            <?php foreach($liste_sport as $sport): ?>
              <a href="<?php page('SportGroupe', ['id' => $sport->id]) ?>">
                <li>
                  <div class="liste-licon">
                    <div class="liste-svg">
                        <svg>
                          <use xlink:href="#ball"></use>
                        </svg>
                    </div>
                  </div>
                  <div class="liste-mid-txt">
                    <h1 class="liste-ttl"><?php echo $sport->nom ?></h1>
                    <p class="liste-ttl-desc">
                      <?php echo $sport->description ?>
                    </p>
                  </div>
                </li>
              </a>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>
