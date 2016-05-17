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
        <p>Recevoir des notifications par mail lorsque quelqu'un répond à ma discussion sur le Forum</p>
        <a href="#" class="button light">Désactiver</a>
      </div>
      <div class="reglage">
        <p>M'alerter par mail lorsqu'un groupe avec mes préférences se crée</p>
        <a href="#" class="button light">Désactiver</a>
      </div>
      <div class="reglage">
        <p>M'alerter par mail lorsqu'une place se libère dans un groupe enregistré</p>
        <a href="#" class="button light">Désactiver</a>
      </div>
      <div class="reglage">
        <p>Supprimer mon compte</p>
        <a href="#" class="button light">Supprimer</a>
      </div>
    </section>
