<?php include 'view/template/profile-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('profile') ?>" class="active">informations</a></li>
          <li><a href="<?php page('profile-planning') ?>">planning</a></li>
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
        <input type="hidden" name="modifinfo">
        <table class="info-table">
          <tr>
            <th>Nom</th>
            <td>
              <span><?php echo $infos->nom ?></span>
              <input class="modif-form" type="text" name="nom" value="<?php echo $infos->nom ?>">
            </td>
          </tr>
          <tr>
            <th>Prénom</th>
            <td>
              <span><?php echo $infos->prénom ?></span>
              <input class="modif-form" type="text" name="prenom" value="<?php echo $infos->prénom ?>">
            </td>
          </tr>
          <tr>
            <th>Pseudo</th>
            <td>
              <span><?php echo $infos->pseudo ?></span>
              <input class="modif-form" type="text" name="pseudo" value="<?php echo $infos->pseudo ?>">
            </td>
          </tr>
          <tr>
            <th>Sexe</th>
            <td>
              <span><?php echo $infos->sexe ?></span>
              <select class="dropdown modif-form" name="sexe">
                <option value="F">Femme</option>
                <option value="H">Homme</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Date de naissance</th>
            <td>
              <span><?php echo Vue::date('d/m/Y',$infos->naissance) ?></span>
              <?php $date = explode('/', Vue::date('d/m/Y',$infos->naissance)) ?>
              <select class="modif-form dropdown" name="jour">
                <option value="option" disabled selected>jour</option>
                <?php for ($i = 0; $i < 31; $i++): ?>
                  <?php $sel = intval($date[0]) == $i+1 ? 'selected' : '' ?>
                  <option value="<?php echo $i+1 ?>" <?php echo $sel ?>><?php echo $i+1; ?></option>
                <?php endfor; ?>
              </select>
              <select class="modif-form dropdown" name="mois">
                <option value="option" disabled selected>mois</option>
                <?php $mois=["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"] ?>
                <?php for ($i = 0; $i < 12; $i++): ?>
                  <?php $sel = intval($date[1]) == $i+1 ? 'selected' : '' ?>
                  <option value="<?php echo $i+1 ?>" <?php echo $sel ?>><?php echo $mois[$i]; ?></option>
                <?php endfor; ?>
              </select>
              <select class="modif-form dropdown" name="année">
                <option value="option" disabled selected>année</option>
                <?php $cdate = intval(date('Y')); ?>
                <?php for ($i = 14; $i < 99; $i++): ?>
                  <?php $sel = intval($date[2]) == $cdate-$i ? 'selected' : '' ?>
                  <option value="<?php echo $cdate-$i ?>" <?php echo $sel ?>><?php echo $cdate-$i; ?></option>
                <?php endfor; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>Adresse</th>
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
      <h1 class="ttl ttl-green ttl-inline ttl-sm">Mes sports</h1>
      <a href="#" class="button btn-sm btn-right btn-wh-inv" onclick="editing('sport-edit')">modifier</a>
      <a href="#" class="button btn-sm btn-right btn-wh-inv" onclick="togglemodal('add_sport')">ajouter</a>
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
            <span class="liste-desc">faible</span>
            <div class="liste-scope">
              <input type="hidden" name="niveau[<?php echo $value->id ?>]" value="<?php echo $value->niveau ?>">
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
            </div>
            <span class="liste-desc">élevé</span>
          </div>
        </li>
      <?php endforeach; ?>

    </ul>
    </form>
  </section>
  <div class="modal" id="add_sport">
    <div class="back"  onclick="togglemodal('add_sport')"></div>
    <div class="window">
      <h1 class="ttl ttl-sm ttl-green">Ajout Sport</h1>
      <form class="groupe_crea" action="" method="post">
        <h2 class="form-label pink-text">Sport</h2>
        <select class="clear-form dropdown" name="sport">
          <?php foreach ($sportlist as $type => $sport): ?>
            <optgroup label="<?php echo $type ?>">
              <?php foreach ($sport as $value): ?>
                <option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
              <?php endforeach; ?>
            </optgroup>
          <?php endforeach; ?>
        </select>

        <h2 class="form-label pink-text">Niveau</h2>
        <select class="clear-form dropdown" name="niveau_util">
          <?php foreach ($niveau as $key => $value): ?>
            <option value="<?php echo $key ?>"><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>
        <input type="submit" class="button purple" name="add-sport" value="Ajouter">
      </form>
    </div>
  </div>
