    <section class="sec sec-bg-violet">
      <div class="column">
        <h1 class="ttl ttl-md ttl-green">Créer votre discussion</h1>
        <h2 class="ttl-sm ttl-green">Topic #1</h1>
      </div>
    </section>
    <section class="sec">
      <div class="column">
        <form class="groupe_crea" action="" method="post">
          <?php if (isset($errors)): ?>
            <div id='warn1' class="form-errors form-errors-inv">
              <div class="form-errors-row">
                <div class="form-errors-cell form-errors-icn">
                  <svg>
                    <use xlink:href="#warning"></use>
                  </svg>
                </div>
                <div class="form-errors-cell">
                  <ul>
                    <?php foreach ($errors as $value): ?>
                      <?php foreach ($value as $error): ?>
                        <li><?php echo $error ?></li>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="form-errors-cell form-errors-esc">
                  <div onclick="close('#warn1')">
                    <svg>
                      <use xlink:href="#close"></use>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <h2 class="form-label pink-text">Nom de votre discussion</h2>
          <input class="clear-form" type="text" name="name_grp" placeholder="">

          <h2 class="form-label pink-text">Votre commentaire</h2>
          <textarea class="clear-form" name="description_grp" rows="6" cols="40" placeholder="Ecrivez et posez votre question pour commencer cette discussion..."></textarea>

          <div class="post-comment">
            <a href="<?php page('forumDiscussion')?>" class="button light">Poster le commentaire</a>
          </div>


    </section>
