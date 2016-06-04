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
      <table class="info-table">
        <tr>
          <th>Nom</th>
          <td><span><?php echo $infos->nom ?></span> <input class="modif-form" type="text" name="nom" value="<?php echo $infos->nom ?>"></td>
        </tr>
        <tr>
          <th>Prénom</th>
          <td><span><?php echo $infos->prénom ?></span> <input class="modif-form" type="text" name="prenom" value="<?php echo $infos->prénom ?>"></td>
        </tr>
        <tr>
          <th>Pseudo</th>
          <td><span><?php echo $infos->pseudo ?></span> <input class="modif-form" type="text" name="pseudo" value="<?php echo $infos->pseudo ?>"></td>
        </tr>
        <tr>
          <th>Sexe</th>
          <td><span><?php echo $infos->sexe ?></span>
            <select class="dropdown modif-form " name ="sexe">
              <option value="F">Femme </option>
              <option value="H">Homme</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>Date de naissance</th>
          <td><span><?php echo Vue::date('d/m/Y',$infos->naissance) ?></span>
            <input class="modif-form" type="date" name="naissance" value="<?php echo Vue::date('d/m/Y',$infos->naissance) ?>">
            <select class="modif-form dropdown" name="jour">
              <option value="option" disabled selected>jour</option>
              <?php for ($i = 0; $i < 31; $i++): ?>
                <option value="<?php echo $i+1 ?>"><?php echo $i+1; ?></option>
              <?php endfor; ?>
            </select>
            <select class="modif-form dropdown" name="mois">
              <option value="option" disabled selected>mois</option>
              <?php $mois=["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"] ?>
              <?php for ($i = 0; $i < 12; $i++): ?>
                <option value="<?php echo $i+1 ?>"><?php echo $mois[$i]; ?></option>
              <?php endfor; ?>
            </select>
            <select class="modif-form dropdown" name="année">
              <option value="option" disabled selected>année</option>
              <?php $date = intval(date('Y')); ?>
              <?php for ($i = 14; $i < 99; $i++): ?>
                <option value="<?php echo $date-$i ?>"><?php echo $date-$i; ?></option>
              <?php endfor; ?>
            </select>
          </td>
        </tr>
        <tr>
          <th>Adresse</th>
          <td>
            <span><?php echo $infos->ville_nom_reel ?><br><?php echo $infos->code_postal ?></span>
            <input class="modif-form" type="text" name="ville" value="<?php echo $infos->ville_nom_reel ?>">
            <input class="modif-form" type="number" name="code_postal" value="<?php echo $infos->code_postal ?>">
          </td>
        </tr>
        <tr>
          <th>Email</th>
          <td><span><?php echo $infos->email ?></span><input class="modif-form" type="email" name="mail" value="<?php echo $infos->email ?>"></td>
        </tr>
      </table>
    </form>
    </div>
  <div class="ttl-group-underline-gr">
      <h1 class="ttl ttl-green ttl-inline ttl-sm">Mes sports</h1>

      <a >
        <input href="#" class="button btn-sm btn-right btn-wh-inv" type='button' value='modifier' onClick='modif()'>
      </a>

        <a href="#" class="button btn-sm btn-right btn-wh-inv" onclick="togglemodal('add_sport')">ajouter</a>

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
          <a>
          <input href="#" class="button btn-sm purple btn-right" type='button' value='supprimer' onClick='supprimerSport()'>
        </a>
        </div>
        <div class="liste-niveau">
          <span class="liste-desc">faible</span>
          <div class="liste-scope">
            <span class="rectangle" onclick="modifniveau(this)"></span>
            <span class="rectangle" onclick="modifniveau(this)"></span>
            <span class="rectangle" onclick="modifniveau(this)"></span>
            <span class="rectangle" onclick="modifniveau(this)"></span>
            <span class="rectangle" onclick="modifniveau(this)"></span>
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
            <a>
            <input href="#" class="button btn-sm purple btn-right" type='button' value='supprimer' onClick='supprimerSport()'>
          </a>
          </div>
          <div class="liste-niveau">
            <span class="liste-desc">faible</span>
            <div class="liste-scope">
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
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
            <a>
            <input href="#" class="button btn-sm purple btn-right" type='button' value='supprimer' onClick='supprimerSport()'>
          </a>
          </div>
          <div class="liste-niveau">
            <span class="liste-desc">faible</span>
            <div class="liste-scope">
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
              <span class="rectangle" onclick="modifniveau(this)"></span>
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
            <a>
            <input class="button btn-sm purple btn-right" type='submit' name="supprimer" value='supprimer'>
          </a>
          </div>
          <!-- <?php foreach ($variable as $key => $value) {

          } ?> -->
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
    </ul>
  </section>
  <div class="modal" id="add_sport" >
    <div class="back"  onclick="togglemodal('add_sport')"></div>
    <div class="window">
      <h1 class="ttl ttl-sm ttl-green">quel sport souhaitez-vous ajouter?</h1>
      <form action="" method="post">
        <label>Type de permis: </label>
        <select name="sports">
          <option value="">---</option>
          <option value="">Football</option>
          <option value="">Bascketball</option>
          <option value="">Marathon</option>

        </select>
        <button type="submit" name="add-sport" class="button light ">Ajouter</button>
      </form>
    </div>
  </div>
  <script language='javascript'>

function supprimerSport()
{
if (confirm("êtes-vous sûr de vouloir supprimer ce sport?"))
{
formulaire.submit();
}
}
</script>
