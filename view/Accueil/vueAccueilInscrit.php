    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(assets/images/sport3.jpg);">
      <div class="sec-overlay sec-over-dark"></div>
      <div class="auto-width hud-padding">
        <div class="column-2 today">
          <h2><?php lang('auj-caps') ?></h1>
          <?php if ($today_group): ?>
            <?php foreach ($today_group as $groupe => $events): ?>
              <div class="">
                <a href="<?php page('groupe') ?>" class="box">
                  <h3><?php echo $groupe ?></h3>
                  <table>
                  <?php foreach ($events as $event): ?>
                      <tr>
                        <th><?php echo Vue::date("G\hi", $event[1]) ?> - <?php echo Vue::date("G\hi", $event[2]) ?></th>
                        <td><?php echo $event[0] ?></td>
                      </tr>
                  <?php endforeach; ?>
                  </table>
                </a>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="label-box">
              <span>Aucun évènement aujourd'hui</span>
            </div>
          <?php endif; ?>
        </div><div class="column-2">
          <h2><?php lang('demain-caps') ?></h2>
          <?php if ($tmw_group): ?>
            <?php foreach ($tmw_group as $groupe => $events): ?>
              <div class="">
                <a href="<?php page('groupe') ?>" class="box">
                  <h3><?php echo $groupe ?></h3>
                  <table>
                  <?php foreach ($events as $event): ?>
                      <tr>
                        <th><?php echo Vue::date("G\hi", $event[1]) ?> - <?php echo Vue::date("G\hi", $event[2]) ?></th>
                        <td><?php echo $event[0] ?></td>
                      </tr>
                  <?php endforeach; ?>
                  </table>
                </a>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="label-box">
              <span>Aucun évènement demain</span>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <section class="sec auto-width">
      <h2 class="green-text"><?php lang('select') ?></h2>
      <div class="gallerie">
        <?php foreach ($fy_group as $value): ?>
          <a href="<?php page('groupe', ['id' => $value->id]) ?>">
            <div class="group">
              <div class="image" style="background-image: url(assets/images/sport2.jpg);"></div>
              <h3><?php echo $value->titre ?></h3>
              <p><?php echo $value->description ?></p>
              <div class="people" title="7 places sur 10 disponibles dans ce groupe">
                <span>7</span>/10
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
    <section class="auto-width">
      <h2 class="caps-txt green-text"><?php lang('near-you') ?></h2>
      <div class="gallerie">
        <?php for ($i = 0; $i < 4; $i++): ?>
          <a href="<?php page('groupe', ['id' => 1]) ?>">
            <div class="group">
              <div class="image" style="background-image: url(assets/images/sport2.jpg);"></div>
              <h3>Groupe 1</h3>
              <p>Description</p>
              <div class="people" title="7 places sur 10 disponibles dans ce groupe">
                <span>7</span>/10
              </div>
            </div>
          </a>
        <?php endfor; ?>
      </div>
    </section>
