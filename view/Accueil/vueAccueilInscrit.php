    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(assets/images/sport3.jpg);">
      <div class="sec-overlay sec-over-violet"></div>
      <div class="auto-width hud-padding">
        <div class="column-2 today">
          <h2><?php lang('auj-caps') ?></h1>
          <?php if ($today_group): ?>
            <?php foreach ($today_group as $groupe => $events): ?>
              <div class="">
                <a href="<?php page('planning-groupe', ['id' => $groupe]) ?>" class="box">
                  <h3><?php echo $events['name'] ?></h3>
                  <table>
                  <?php foreach ($events['cal'] as $event): ?>
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
              <span><?php lang('no-event'); ?></span>
            </div>
          <?php endif; ?>
        </div><div class="column-2">
          <h2><?php lang('demain-caps') ?></h2>
          <?php if ($tmw_group): ?>
            <?php foreach ($tmw_group as $groupe => $events): ?>
              <div class="">
                <a href="<?php page('planning-groupe', ['id'=>$groupe]) ?>" class="box">
                  <h3><?php echo $events['name'] ?></h3>
                  <table>
                  <?php foreach ($events['cal'] as $event): ?>
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
              <span><?php lang('no event'); ?></span>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <section class="sec auto-width">
      <h2 class="green-text"><?php lang('select') ?></h2>
      <?php if (!empty($fy_group)): ?>
      <div class="gallerie">
        <?php foreach ($fy_group as $value): ?>
          <a href="<?php page('groupe', ['id' => $value->id]) ?>">
            <div class="group">
              <div class="image" style="background-image: url(<?php echo !is_null($value->url) ? '/'.$value->url : 'assets/images/sport2.jpg' ?>);"></div>
              <h3><?php echo $value->titre ?></h3>
              <p><?php echo $value->description ?></p>
              <div class="people" title="7 places sur 10 disponibles dans ce groupe">
                <span>7</span>/10
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p class="txt-center-warn">
        <?php lang('no-correspondance'); ?>
      </p>
    <?php endif; ?>
    </section>
    <section class="auto-width">
      <h2 class="caps-txt green-text"><?php lang('near-you') ?></h2>
      <?php if (!empty($ny_group)): ?>
      <div class="gallerie">
        <?php foreach ($ny_group as $value): ?>
          <a href="<?php page('groupe', ['id' => $value->id]) ?>">
            <div class="group">
              <div class="image" style="background-image: url(<?php echo !is_null($value->url) ? '/'.$value->url : 'assets/images/sport2.jpg' ?>);"></div>
              <h3><?php echo $value->titre ?></h3>
              <p><?php echo $value->description ?></p>
              <div class="people" title="7 places sur 10 disponibles dans ce groupe">
                <span>7</span>/10
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p class="txt-center-warn">
        <?php lang('no-near'); ?>
      </p>
    <?php endif; ?>
    </section>
    <section class="sec sec-bg-dviolet">
      <div class="column">
        <h1 class="ttl ttl-md"><?php lang('Types de sports'); ?></h1>
        <div class="grid">
          <?php foreach($types_sports as $type): ?>
            <div class="sport">
              <a href="<?php page('typeSport', ['id' => $type->id]) ?>">
                <div class="circle">
                  <svg>
                    <use xlink:href='#typeSport<?php echo $type->id ?>'></use>
                  </svg>
                </div>
              </a>
              <span><?php echo $type->nom ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
