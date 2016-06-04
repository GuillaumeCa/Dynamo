    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(assets/images/sport1.png);">
      <div class="sec-overlay sec-over-violet"></div>
      <div class="column">
        <h1 class="ttl ttl-lg green-text">Forum</h1>
        <p class="txt-desc"><?php lang('Une question ? Une idée ? Votre espace de discussion publique totalement dédié au sport !'); ?></p>
      </div>
    </section>
    <section class="sec sec-bg-dviolet">
      <div class="column">
        <h1 class="ttl ttl-md"><?php lang('Choisis ton Topic'); ?></h1>
        <div class="grid">
          <?php foreach ($topics as $topic): ?>
              <div class="sport">
                <a href="<?php page('topic', ['id' => $topic->id]) ?>">
                  <div class="circle">
                    <svg>
                      <?php if (isset($topic->sport_id)): ?>
                        <use xlink:href="#typeSport<?php echo $topic->sport_id ?>"></use>
                      <?php elseif (isset($topic->ville_id)): ?>
                        <use xlink:href="#eiffeltower"></use>
                      <?php else: ?>
                        <use xlink:href="#eiffeltower"></use>
                      <?php endif; ?>
                    </svg>
                  </div>
                </a>
                <span>
                  <?php echo $topic->nom ?>
                </span>
              </div>
          <?php endforeach; ?>

            <!-- <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#ball"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#NY"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#run"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#pingpong"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#boxe"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#ski"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#bike"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#swim"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#kayak"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#arrow"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#fencing"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#billard"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span>
            </div>
            <div class="sport">
              <a href="<?php page('topic') ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href="#rugby"></use>
                  </svg>
                </div>
              </a>
              <span>Topic</span> -->
            </div>

      </div>
    </section>
