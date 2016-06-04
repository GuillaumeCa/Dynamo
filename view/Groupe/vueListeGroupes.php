    <section class="sec sec-bg-violet">
      <div class="column">
        <h1 class="ttl ttl-md">Mes Groupes</h1>
        <a href="<?php page('creation-groupe') ?>" class="button margin-top">Créer un groupe</a>
      </div>
    </section>
    <section class="sec">
      <div class="auto-width">
          <ul class="liste-lg">
            <?php $i = 0 ?>
            <?php if ($liste): ?>
              <?php foreach ($liste as $groupe): ?>
                <?php if ($groupe['data']->invite == 0): ?>
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
                      <span class="liste-leader"><?php echo ($groupe['data']->leader == 1) ? "LEADER" : Null ?></span>
                    </li>
                  </a>
                <?php else: ?>
                  <?php $i += 1 ?>
                <?php endif; ?>
              <?php endforeach; ?>

            <?php endif; ?>
          </ul>
        </section>
        <?php if ($i != 0): ?>
          <section class="sec">
            <div class="auto-width">
              <div class="liste-separator" id="invitation"><b>INVITATIONS</b></div>
              <ul class="liste-lg">
                <?php foreach ($liste as $groupe): ?>
                  <?php if ($groupe['data']->invite == 1): ?>
                    <li>
                      <a href="<?php page('groupe', ['id' => $groupe['data']->id]) ?>"><span class="liste-overlay"></span></a>
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
                      <div class="liste-btn">
                        <div>
                          <form class="" action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $groupe['data']->id ?>">
                            <button type="submit" name="Accept" class="button purple">Accepter</button>
                          </form>
                        </div>
                      </br>
                      <div>
                        <form class="" action="" method="post">
                          <input type="hidden" name="id" value="<?php echo $groupe['data']->id ?>">
                          <button type="submit" name="Refuse" class="button purple">Refuser</button>
                        </form>
                      </div>
                    </div>
                    <span class="liste-note"><span><?php echo $groupe['nb'] ?></span>/<?php echo $groupe['data']->nbmaxutil ?></span>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </section>
        <?php endif; ?>
