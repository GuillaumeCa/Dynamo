<?php include 'view/template/profile-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('profile') ?>" class="active"><?php lang('informations'); ?></a></li>
          <li><a href="<?php page('profile-planning') ?>">planning</a></li>
          <li><a href="<?php  ?>"><?php lang('historique'); ?></a></li>
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
        <h1 class="ttl ttl-green ttl-inline ttl-sm"><?php lang('Informations'); ?></h1>
        <a href="#" class="button btn-sm btn-right btn-wh-inv" id="InfoModifier"><?php lang('modifier'); ?></a>
      </div>
      <form class="modifierinfo" action="" method="post">
      <table class="info-table">
        <tr>
          <th><?php lang('Nom'); ?></th>
          <td><span><?php echo $infos->nom ?></span> <input class="modif-form" type="text" name="name" value="<?php echo $infos->nom ?>"></td>
        </tr>
        <tr>
          <th><?php lang('Prénom'); ?></th>
          <td><span><?php echo $infos->prénom ?></span> <input class="modif-form" type="text" name="name" value="<?php echo $infos->prénom ?>"></td>
        </tr>
        <tr>
          <th><?php lang('Pseudo'); ?></th>
          <td><span><?php echo $infos->pseudo ?></span> <input class="modif-form" type="text" name="name" value="<?php echo $infos->pseudo ?>"></td>
        </tr>
        <tr>
          <th><?php lang('Sexe'); ?></th>
          <td><span><?php echo $infos->sexe ?></span>
            <select class="modif-form" name ="sexe">
              <option value="F"><?php lang('Femme'); ?></option>
              <option value="H"><?php lang('Homme'); ?></option>
            </select>
          </td>
        </tr>
        <tr>
          <th><?php lang('Date de naissance'); ?></th>
          <td><span><?php echo Vue::date('d - m - Y',$infos->naissance) ?></span>
            <input class="modif-form" type="date" name="name" value="<?php echo $infos->naissance ?>">
          </td>
        </tr>
        <tr>
          <th><?php lang('Adresse'); ?></th>
          <td>
            <span><?php echo $infos->ville_nom_reel ?><br><?php echo $infos->code_postal ?></span>
            <input class="modif-form" type="text" name="name" value="<?php echo $infos->ville_nom_reel ?>">
            <input class="modif-form" type="number" name="name" value="<?php echo $infos->code_postal ?>">
          </td>
        </tr>
        <tr>
          <th><?php lang('Email'); ?></th>
          <td><span><?php echo $infos->email ?></span><input class="modif-form" type="email" name="name" value="<?php echo $infos->email ?>"></td>
        </tr>
      </table>
    </form>
    </div>
    <div class="ttl-group-underline-gr">
      <h1 class="ttl ttl-green ttl-inline ttl-sm"><?php lang('Mes sports'); ?></h1>
      <a href="#" class="button btn-sm btn-right btn-wh-inv"><?php lang('modifier'); ?></a>
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
          <a href="#" class="button btn-sm purple btn-right"><?php lang('supprimer'); ?></a>
        </div>
        <div class="liste-niveau">
          <span class="liste-desc"><?php lang('faible'); ?></span>
          <div class="liste-scope">
            <span class="rectangle filled"></span>
            <span class="rectangle filled"></span>
            <span class="rectangle filled"></span>
            <span class="rectangle"></span>
            <span class="rectangle"></span>
          </div>
          <span class="liste-desc"><?php lang('élevé'); ?></span>
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
            <a href="#" class="button btn-sm purple btn-right"><?php lang('supprimer'); ?></a>
          </div>
          <div class="liste-niveau">
            <span class="liste-desc"><?php lang('faible'); ?></span>
            <div class="liste-scope">
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle"></span>
              <span class="rectangle"></span>
            </div>
            <span class="liste-desc"><?php lang('élevé'); ?></span>
          </div>
      </li>
      <li>
        <div class="circle">
          <svg>
            <use xlink:href="#pingpong"></use>
          </svg>
        </div>
          <h1 class="ttl ttl-sm ttl-inline ttl-purple">Tennis</h1>
          <div class="liste-button">
            <a href="#" class="button btn-sm purple btn-right"><?php lang('supprimer'); ?></a>
          </div>
          <div class="liste-niveau">
            <span class="liste-desc"><?php lang('faible'); ?></span>
            <div class="liste-scope">
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle"></span>
              <span class="rectangle"></span>
            </div>
            <span class="liste-desc"><?php lang('élevé'); ?></span>
          </div>
      </li>
      <li>
        <div class="circle">
          <svg>
            <use xlink:href="#pingpong"></use>
          </svg>
        </div>
          <h1 class="ttl ttl-sm ttl-inline ttl-purple">Gymnastique</h1>
          <div class="liste-button">
            <a href="#" class="button btn-sm purple btn-right"><?php lang('supprimer'); ?></a>
          </div>
          <div class="liste-niveau">
            <span class="liste-desc"><?php lang('faible'); ?></span>
            <div class="liste-scope">
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle filled"></span>
              <span class="rectangle"></span>
              <span class="rectangle"></span>
            </div>
            <span class="liste-desc"><?php lang('élevé'); ?></span>
          </div>
      </li>
    </ul>
  </section>
