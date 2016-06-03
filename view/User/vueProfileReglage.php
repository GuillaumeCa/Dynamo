<?php include 'view/template/profile-header.php'; ?>

    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('profile') ?>">informations</a></li>
          <li><a href="<?php page('profile-planning') ?>">planning</a></li>
          <li><a href="<?php  ?>">historique</a></li>
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
        <div class="reglage-item">
          <p>Recevoir des notifications par mail lorsque quelqu'un répond à ma discussion sur le Forum</p>
          <a href="#" class="button light">Désactiver</a>
        </div>
        <div class="reglage-item">
          <p>M'alerter par mail lorsqu'un groupe avec mes préférences se crée</p>
          <a href="#" class="button light">Désactiver</a>
        </div>
        <div class="reglage-item">
          <p>M'alerter par mail lorsqu'une place se libère dans un groupe enregistré</p>
          <a href="#" class="button light">Désactiver</a>
        </div>
        <div class="reglage-item">
          <p>Supprimer la photo de profile</p>
          <form action="" class="form-inline" method="post">
            <button type="submit" name="delete-photo" class="button light button-danger">Supprimer</button>
          </form>
        </div>
        <div class="reglage-item">
          <p>Supprimer mon compte</p>
          <a href="#" onclick="togglemodal('del_acc')" class="button light button-danger">Supprimer</a>
        </div>
      </div>
    </section>
    <div class="modal" id="del_acc" >
      <div class="back"  onclick="togglemodal('del_acc')"></div>
      <div class="window">
        <h1>Voulez vous supprimer votre compte ?</h1>
        <form action="" method="post">
          <button type="submit" name="del-acc" class="button light button-danger">Supprimer</button>
        </form>
      </div>
    </div>
