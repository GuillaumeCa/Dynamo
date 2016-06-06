    <?php require 'app/Calendar.php'; ?>
    <?php include 'view/template/groupe-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('informations'); ?></a></li>
          <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('membres'); ?></a></li>
          <li><a href="<?php page('planning-groupe', ['id' => $presentation_groupe->id]) ?>" class="active">planning</a></li>
          <li><a href="<?php page('discussion-groupe', ['id' => $presentation_groupe->id]) ?>"><?php lang('discussions'); ?></a></li>
          <li class="right">
            <a href="<?php page('reglage-groupe', ['id' => $presentation_groupe->id]) ?>" class="settings">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
          <li class="right social">
            <a href="https://www.facebook.com/sharer/sharer.php?u={http://dynamo.com/fr/groupe/38/info}"><img src="/assets/images/facebook.png" alt="facebook" width="20"/></a>
            <a href="https://twitter.com/intent/tweet/?url={http://dynamo.com/fr/groupe/38/info}&text={J'ai rejoins un groupe de sport sur Dynamo !}"><img src="/assets/images/twitter.png" alt="twitter" width="20"/></a>
            <a href="https://plus.google.com/share?url={http://dynamo.com/fr/groupe/38/info}"><img src="/assets/images/google-plus.png" alt="Google Plus" width="20"/></a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="auto-width">
      <?php if ($isLeader): ?>
        <a href="#" class="button light" onclick="togglemodal('event')"><?php lang('new-event'); ?></a>
      <?php endif; ?>
    </div>
    <div class="column">
      <?php Calendar(12, $events); ?>
    </div>
    <?php if ($isLeader): ?>
      <div class="modal" id="event">
        <div class="back"  onclick="togglemodal('event')"></div>
        <div class="window">
          <h1 class="ttl ttl-sm ttl-green"><?php lang('add-event'); ?></h1>
          <form class="groupe_crea" action="" method="post">
            <h2 class="form-label pink-text"><?php lang('Titre'); ?></h2>
            <input class="clear-form" type="text" name="titre" placeholder="Titre">
            <h2 class="form-label pink-text"><?php lang('start-date'); ?></h2>
            <div class="date">
              <div class="jour">
                <?php $date = explode('-',date('d-m-Y-H-i')) ?>
                <select class="clear-form dropdown" name="djour">
                  <?php for ($i = 0; $i < 31; $i++): ?>
                    <?php $sel = (str_pad($i+1, 2, "0", STR_PAD_LEFT) == $date[0]) ? 'selected' : null ?>
                    <option value="<?php echo $i+1 ?>" <?php echo $sel ?>><?php echo str_pad($i+1, 2, "0", STR_PAD_LEFT); ?></option>
                  <?php endfor; ?>
                </select>
                <select class="clear-form dropdown" name="dmois">
                  <?php for ($i = 0; $i < 12; $i++): ?>
                    <?php $sel = (str_pad($i+1, 2, "0", STR_PAD_LEFT) == $date[1]) ? 'selected' : null ?>
                    <option value="<?php echo $i+1 ?>" <?php echo $sel ?>><?php echo str_pad($i+1, 2, "0", STR_PAD_LEFT); ?></option>
                  <?php endfor; ?>
                </select>
                <select class="clear-form dropdown" name="dannée">
                  <?php for ($i = -5; $i < 1; $i++): ?>
                    <?php $sel = ($i == 0) ? 'selected' : null ?>
                    <option value="<?php echo $date[2]-$i ?>" <?php echo $sel ?>><?php echo $date[2]-$i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="heure">
                <select class="clear-form dropdown" name="dheure">
                  <?php for ($i = 0; $i < 24; $i++): ?>
                    <?php $sel = (str_pad($i, 2, "0", STR_PAD_LEFT) == $date[3]) ? 'selected' : null ?>
                    <option value="<?php echo $i ?>" <?php echo $sel ?>><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></option>
                  <?php endfor; ?>
                </select>
                :
                <select class="clear-form dropdown" name="dmin">
                  <?php for ($i = 0; $i < 60; $i++): ?>
                    <?php $sel = (str_pad($i, 2, "0", STR_PAD_LEFT) == $date[4]) ? 'selected' : null ?>
                    <option value="<?php echo $i ?>" <?php echo $sel ?>><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            <h2 class="form-label pink-text"><?php lang('end-date'); ?></h2>
            <div class="date">
              <div class="jour">
                <?php $date = explode('-',date('d-m-Y-H-i')) ?>
                <select class="clear-form dropdown" name="fjour">
                  <?php for ($i = 0; $i < 31; $i++): ?>
                    <?php $sel = (str_pad($i+1, 2, "0", STR_PAD_LEFT) == $date[0]) ? 'selected' : null ?>
                    <option value="<?php echo $i+1 ?>" <?php echo $sel ?>><?php echo str_pad($i+1, 2, "0", STR_PAD_LEFT); ?></option>
                  <?php endfor; ?>
                </select>
                <select class="clear-form dropdown" name="fmois">
                  <?php for ($i = 0; $i < 12; $i++): ?>
                    <?php $sel = (str_pad($i+1, 2, "0", STR_PAD_LEFT) == $date[1]) ? 'selected' : null ?>
                    <option value="<?php echo $i+1 ?>" <?php echo $sel ?>><?php echo str_pad($i+1, 2, "0", STR_PAD_LEFT); ?></option>
                  <?php endfor; ?>
                </select>
                <select class="clear-form dropdown" name="fannée">
                  <?php for ($i = -5; $i < 1; $i++): ?>
                    <?php $sel = ($i == 0) ? 'selected' : null ?>
                    <option value="<?php echo $date[2]-$i ?>" <?php echo $sel ?>><?php echo $date[2]-$i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="heure">
                <select class="clear-form dropdown" name="fheure">
                  <?php for ($i = 0; $i < 24; $i++): ?>
                    <?php $sel = ($i == intval($date[3])+1) ? 'selected' : null ?>
                    <option value="<?php echo $i ?>" <?php echo $sel ?>><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></option>
                  <?php endfor; ?>
                </select>
                :
                <select class="clear-form dropdown" name="fmin">
                  <?php for ($i = 0; $i < 61; $i++): ?>
                    <?php $sel = (str_pad($i, 2, "0", STR_PAD_LEFT) == $date[4]) ? 'selected' : null ?>
                    <option value="<?php echo $i ?>" <?php echo $sel ?>><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            <h2 class="form-label pink-text">Description</h2>
            <textarea name="desc" rows="8" cols="40" class="clear-form" placeholder="Description..."></textarea>
            <button type="submit" name="event" class="button purple"><?php lang('add-event'); ?></button>
          </form>
        </div>
      </div>
      <?php foreach ($events as $cal => $events): ?>
        <?php foreach ($events as $value): ?>
          <div class="modal" id="del-<?php echo $value[5] ?>">
            <div class="back"  onclick="togglemodal('del-<?php echo $value[5] ?>')"></div>
            <div class="window">
              <h1 class="ttl ttl-sm ttl-green">Voulez vous supprimer cet évènement ?</h1>
              <form class="groupe_crea" action="" method="post">
                <input type="hidden" name="value" value="<?php echo $value[5] ?>">
                <button type="submit" name="del" class="button light">Supprimer</button>
              </form>
            </div>
          </div>
          <div class="modal" id="mod-<?php echo $value[5] ?>">
            <div class="back"  onclick="togglemodal('mod-<?php echo $value[5] ?>')"></div>
            <div class="window">
              <h1 class="ttl ttl-sm ttl-green">Modifier l'évènement</h1>
              <form class="groupe_crea" action="" method="post">
                <input type="hidden" name="value" value="<?php echo $value[5] ?>">
                <h2 class="form-label pink-text"><?php lang('Titre'); ?></h2>
                <input class="clear-form" type="text" name="titre" placeholder="Titre" value="<?php echo $value[1] ?>">
                <h2 class="form-label pink-text">Description</h2>
                <textarea name="desc" rows="8" cols="40" class="clear-form" placeholder="Description..."><?php echo $value[2] ?></textarea>
                <button type="submit" name="mod" class="button light">Modifier</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endforeach; ?>

    <?php endif; ?>
