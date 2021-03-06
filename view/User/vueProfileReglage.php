<?php include 'view/template/profile-header.php'; ?>

    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('profile') ?>"><?php lang('informations'); ?></a></li>
          <li><a href="<?php page('profile-planning') ?>">planning</a></li>
          <li class="right">
            <a href="<?php page('profile-reglage') ?>" class="settings active">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <section class="sec">
      <div class="reglage">
        <!-- <div class="reglage-item">
          <p><?php lang('notif-answer-disc'); ?></p>
          <a href="#" class="button light"><?php lang('Désactiver'); ?></a>
        </div>
        <div class="reglage-item">
          <p><?php lang('alert-gr'); ?></p>
          <a href="#" class="button light"><?php lang('Désactiver'); ?></a>
        </div>
        <div class="reglage-item">
          <p><?php lang('alert-free-gr'); ?></p>
          <a href="#" class="button light"><?php lang('Désactiver'); ?></a>
        </div> -->
        <div class="reglage-item">
          <p><?php lang('delete-profilephoto'); ?></p>
          <form action="" class="form-inline" method="post">
            <button type="submit" name="delete-photo" class="button light button-danger"><?php lang('Supprimer'); ?></button>
          </form>
        </div>
        <div class="reglage-item">
          <p><?php lang('delete-account'); ?></p>
          <a href="#" onclick="togglemodal('del_acc')" class="button light button-danger"><?php lang('Supprimer'); ?></a>
        </div>
      </div>
    </section>
    <div class="modal" id="del_acc" >
      <div class="back"  onclick="togglemodal('del_acc')"></div>
      <div class="window">
        <h1><?php lang('ask-delete-account'); ?></h1>
        <form action="" method="post">
          <button type="submit" name="del-acc" class="button light button-danger"><?php lang('Supprimer'); ?></button>
        </form>
      </div>
    </div>
