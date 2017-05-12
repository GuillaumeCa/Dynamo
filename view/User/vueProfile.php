<?php include 'view/template/profile-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('profile') ?>" class="active"><?php lang('informations'); ?></a></li>
          <li><a href="<?php page('profile-planning') ?>">planning</a></li>
          <li><a href="<?php page('#') ?>"><?php lang('historique'); ?></a></li>
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
        <input type="hidden" name="modifinfo">
        <table class="info-table">
          <tr>
            <th><?php lang('Nom'); ?></th>
            <td>
              <span><?php echo $infos->nom ?></span>
              <input class="modif-form" type="text" name="nom" value="<?php echo $infos->nom ?>">
            </td>
          </tr>
          <tr>
            <th><?php lang('Prénom'); ?></th>
            <td>
              <span><?php echo $infos->prénom ?></span>
              <input class="modif-form" type="text" name="prenom" value="<?php echo $infos->prénom ?>">
            </td>
          </tr>
          <tr>
            <th></th>
            <td>
              <span><?php echo $infos->pseudo ?></span>
              <input class="modif-form" type="text" name="pseudo" value="<?php echo $infos->pseudo ?>">
            </td>
          </tr>
          <tr>
            <th><?php lang('Sexe'); ?></th>
            <td>
              <span><?php echo $infos->sexe ?></span>
              <select class="dropdown modif-form" name="sexe">
                <option value="F"><?php lang('Femme'); ?></option>
                <option value="H"><?php lang('Homme'); ?></option>
              </select>
            </td>
          </tr>
          <tr>
            <th><?php lang('date-birth'); ?></th>
            <td>
              <span><?php echo Vue::date('d/m/Y',$infos->naissance) ?></span>
              <?php $date = explode('/', Vue::date('d/m/Y',$infos->naissance)) ?>
              <select class="modif-form dropdown" name="jour">
                <option value="option" disabled selected><?php lang('jour'); ?></option>
                <?php for ($i = 0; $i < 31; $i++): ?>
                  <?php $sel = intval($date[0]) == $i+1 ? 'selected' : '' ?>
                  <option value="<?php echo $i+1 ?>" <?php echo $sel ?>><?php echo $i+1; ?></option>
                <?php endfor; ?>
              </select>
              <select class="modif-form dropdown" name="mois">
                <option value="option" disabled selected><?php lang('mois'); ?></option>
                <?php $mois=["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"] ?>
                <?php for ($i = 0; $i < 12; $i++): ?>
                  <?php $sel = intval($date[1]) == $i+1 ? 'selected' : '' ?>
                  <option value="<?php echo $i+1 ?>" <?php echo $sel ?>><?php echo $mois[$i]; ?></option>
                <?php endfor; ?>
              </select>
              <select class="modif-form dropdown" name="année">
                <option value="option" disabled selected><?php lang('année'); ?></option>
                <?php $cdate = intval(date('Y')); ?>
                <?php for ($i = 14; $i < 99; $i++): ?>
                  <?php $sel = intval($date[2]) == $cdate-$i ? 'selected' : '' ?>
                  <option value="<?php echo $cdate-$i ?>" <?php echo $sel ?>><?php echo $cdate-$i; ?></option>
                <?php endfor; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th><?php lang('Adresse'); ?></th>
            <td>
              <span><?php echo $infos->ville_nom_reel ?><br><?php echo $infos->code_postal ?></span>
              <input class="modif-form" type="text" name="ville" value="<?php echo $infos->ville_nom_reel ?>">
              <input class="modif-form" type="text" name="code_postal" value="<?php echo $infos->code_postal ?>">
            </td>
          </tr>
          <tr>
            <th>Email</th>
            <td><span><?php echo $infos->email ?></span><input class="modif-form" type="email" name="email" value="<?php echo $infos->email ?>"></td>
          </tr>
        </table>
      </form>
    </div>
  <div class="ttl-group-underline-gr">
      <h1 class="ttl ttl-green ttl-inline ttl-sm"><?php lang('Mes-sports'); ?></h1>
      <a href="#" class="button btn-sm btn-right btn-wh-inv" onclick="editing('sport-edit')"><?php lang('modifier'); ?></a>
      <a href="#" class="button btn-sm btn-right btn-wh-inv" onclick="togglemodal('add_sport')"><?php lang('add'); ?></a>
  </div>
    <form class="sport-edit" action="" method="post">
    <ul class="liste-smp">

      <?php foreach ($sports as $value): ?>
        <li>
          <div class="circle">
            <svg>
              <use xlink:href="#typeSport<?php echo $value->type_sport ?>"></use>
            </svg>
          </div>
          <h1 class="ttl ttl-sm ttl-inline ttl-purple"><?php echo $value->sport ?></h1>
          <div class="liste-button">
            <input class="button btn-sm purple btn-right" type="submit" name="del-sport[<?php echo $value->id ?>]" value="supprimer">
          </div>
          <div class="liste-niveau">
            <span class="liste-desc"><?php lang('faible'); ?></span>
            <div class="liste-scope">
              <input type="hidden" name="niveau[<?php echo $value->id ?>]" value="<?php echo $value->niveau ?>">
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
            </div>
            <span class="liste-desc"><?php lang('élevé'); ?></span>
          </div>
<<<<<<< HEAD
      </li>

      <li>
        <div class="circle">
          <svg>
            <use xlink:href="#pingpong"></use>
          </svg>
        </div>
          <h1 class="ttl ttl-sm ttl-inline ttl-purple">Ping Pong</h1>
          <div class="liste-button">
            <a>
            <input class="button btn-sm purple btn-right" type='submit' name="supprimer" value='supprimer'>
          </a>
          </div>
          <div class="liste-niveau">
            <span class="liste-desc">faible</span>
            <div class="liste-scope">
              <input type="hidden" name="niveau" value="0">
              <span class="rectangle" name="1" onclick="modifniveau(this)"></span>
              <span class="rectangle" name="2" onclick="modifniveau(this)"></span>
              <span class="rectangle" name="3" onclick="modifniveau(this)"></span>
              <span class="rectangle" name="4" onclick="modifniveau(this)"></span>
              <span class="rectangle" name="5" onclick="modifniveau(this)"></span>
            </div>
            <span class="liste-desc">élevé</span>
          </div>
      </li>
=======
        </li>
      <?php endforeach; ?>

>>>>>>> bca46e4e020a98516979cafd53782c211a0e248f
    </ul>
    </form>
  </section>
<<<<<<< HEAD
  
  <div class="modal" id="add_sport" >
    <div class="back"  onclick="togglemodal('add_sport')"></div>
    <div class="window">
      <h1 class="ttl ttl-sm ttl-green">quel sport souhaitez-vous ajouter?</h1>
      <form action="" method="post">
        <select class="clear-form dropdown dropdown-lg" name="sport">
          <option value="option" disabled selected>Football, Athlétisme, Rugby ...</option>
          <?php foreach ($ListeSports as $type => $sports): ?>
            <optgroup label="<?php echo $type ?>">
              <?php foreach ($sports as $sport): ?>
                <option value="<?php echo $sport[0] ?>"><?php echo $sport[1] ?></option>
=======
  <div class="modal" id="add_sport">
    <div class="back"  onclick="togglemodal('add_sport')"></div>
    <div class="window">
      <h1 class="ttl ttl-sm ttl-green"><?php lang('add-sport'); ?></h1>
      <form class="groupe_crea" action="" method="post">
        <h2 class="form-label pink-text">Sport</h2>
        <select class="clear-form dropdown" name="sport">
          <?php foreach ($sportlist as $type => $sport): ?>
            <optgroup label="<?php echo $type ?>">
              <?php foreach ($sport as $value): ?>
                <option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
>>>>>>> bca46e4e020a98516979cafd53782c211a0e248f
              <?php endforeach; ?>
            </optgroup>
          <?php endforeach; ?>
        </select>
<<<<<<< HEAD
        <!-- <label>Type de permis: </label>
        <select name="sports">
          <option value="">-</option>
          <option value="">Football</option>
          <option value="">Bascketball</option>
          <option value="">Marathon</option>

        </select> -->
        <button type="submit" name="add-sport" class="button light ">Ajouter</button>
=======

        <h2 class="form-label pink-text"><?php lang('Niveau'); ?></h2>
        <select class="clear-form dropdown" name="niveau_util">
          <?php foreach ($niveau as $key => $value): ?>
            <option value="<?php echo $key ?>"><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>
        <input type="submit" class="button purple" name="add-sport" value='<?php lang('add'); ?>'>
>>>>>>> bca46e4e020a98516979cafd53782c211a0e248f
      </form>
    </div>
  </div>
