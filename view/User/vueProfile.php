<?php include 'view/template/profile-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('profile') ?>" class="active">informations</a></li>
          <li><a href="<?php page('profile-planning') ?>">planning</a></li>
          <li><a href="<?php  ?>">historique</a></li>
          <li class="right">
            <a href="<?php page('profile-reglage') ?>" class="settings">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <section class="auto-width">
      <div class="ttl-group-underline-gr">
        <h1 class="ttl ttl-green ttl-inline ttl-sm">Informations</h1>
        <a href="#" class="button btn-sm btn-right btn-wh-inv" id="InfoModifier">modifier</a>
      </div>
      <form class="modifierinfo" action="" method="post">
      <table class="info-table">
        <tr>
          <th>Nom</th>
          <td><span><?php echo $infos->nom ?></span> <input type="hidden" name="name" value="<?php echo $infos->nom ?>"></td>
        </tr>
        <tr>
          <th>Prénom</th>
          <td><span><?php echo $infos->prénom ?></span> <input type="hidden" name="name" value="<?php echo $infos->prénom ?>"></td>
        </tr>
        <tr>
          <th>Pseudo</th>
          <td><span><?php echo $infos->pseudo ?></span> <input type="hidden" name="name" value="<?php echo $infos->pseudo ?>"></td>
        </tr>
        <tr>
          <th>Sexe</th>
          <td><?php echo $infos->sexe ?></td>
        </tr>
        <tr>
          <th>Date de naissance</th>
          <td><?php echo Vue::date('d - m - Y',$infos->naissance) ?></td>
        </tr>
        <tr>
          <th>Addresse</th>
          <td>
            <span><?php echo $infos->ville_nom_reel ?><br><?php echo $infos->code_postal ?><span>
            <input type="hidden" name="name" value="<?php echo $infos->ville_nom_reel ?>">
            <input type="hidden" name="name" value="<?php echo $infos->code_postal ?>">
          </td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?php echo $infos->email ?></td>
        </tr>
      </table>
    </form>
    </div>
    <div class="ttl-group-underline-gr">
      <h1 class="ttl ttl-green ttl-inline ttl-sm">Mes sports</h1>
      <a href="#" class="button btn-sm btn-right btn-wh-inv">modifier</a>
    </div>

    <ul class="liste-smp">
      <li>
        <div class="circle">
          <svg>
            <use xlink:href="#ball"></use>
          </svg>
        </div>
        <h1 class="ttl ttl-sm ttl-inline ttl-purple">Basket</h1>
        <div class="liste-button">
          <a href="#" class="button btn-sm purple btn-right">supprimer</a>
        </div>
        <div class="liste-niveau">
          <span class="liste-desc">faible</span>
          <div class="liste-scope">
            <span class="rectangle filled"></span>
            <span class="rectangle filled"></span>
            <span class="rectangle filled"></span>
            <span class="rectangle"></span>
            <span class="rectangle"></span>
          </div>
          <span class="liste-desc">élevé</span>
        </div>
      </li>
      <li>
        <div class="circle">
          <svg>
            <use xlink:href="#pingpong"></use>
          </svg>
        </div>
          <h1 class="ttl ttl-sm ttl-inline ttl-purple">Ping Pong</h1>
          <div class="liste-button">
            <a href="#" class="button btn-sm purple btn-right">supprimer</a>
          </div>
          <div class="liste-niveau">
            <span class="liste-desc">faible</span>
            <div class="liste-scope">
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle"></span>
              <span class="rectangle"></span>
            </div>
            <span class="liste-desc">élevé</span>
          </div>
      </li>
      <li>
        <div class="circle">
          <svg>
            <use xlink:href="#pingpong"></use>
          </svg>
        </div>
          <h1 class="ttl ttl-sm ttl-inline ttl-purple">Ping Pong</h1>
          <div class="liste-button">
            <a href="#" class="button btn-sm purple btn-right">supprimer</a>
          </div>
          <div class="liste-niveau">
            <span class="liste-desc">faible</span>
            <div class="liste-scope">
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle"></span>
              <span class="rectangle"></span>
            </div>
            <span class="liste-desc">élevé</span>
          </div>
      </li>
      <li>
        <div class="circle">
          <svg>
            <use xlink:href="#pingpong"></use>
          </svg>
        </div>
          <h1 class="ttl ttl-sm ttl-inline ttl-purple">Ping Pong</h1>
          <div class="liste-button">
            <a href="#" class="button btn-sm purple btn-right">supprimer</a>
          </div>
          <div class="liste-niveau">
            <span class="liste-desc">faible</span>
            <div class="liste-scope">
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle"></span>
              <span class="rectangle"></span>
            </div>
            <span class="liste-desc">élevé</span>
          </div>
      </li>
    </ul>
  </section>
