<div class="main">

  <div class="sidebar">
    <div class="sidebar-title">
      <a href="<?php page('accueil') ?>">
        <h1>Admin Dynamo</h1>
      </a>
    </div>
    <ul class="sidebar-menu">
      <a href="<?php page('backoffice-user') ?>">
        <li class="active">Utilisateurs</li>
      </a>
      <a href="<?php page('backoffice-group') ?>">
        <li class="">Groupes</li>
      </a>
      <a href="<?php page('backoffice-sport') ?>">
        <li class="">Sports</li>
      </a>
      <a href="<?php page('backoffice-forum') ?>">
        <li class="">Forum</li>
      </a>
      <a href="<?php page('backoffice-help') ?>">
        <li class="">Aide</li>
      </a>
    </ul>
  </div>

  <div class="content">
    <div class="card">
      <a href="#" class="button light" onclick="togglemodal('add')">Ajouter</a>
      <div class="modal" id="add">
        <div class="modal-window">
          <span class="close" onclick="togglemodal('add')">╳</span>
          <form class="inscription" action="" method="post">
            <h3 class="form-desc"><?php lang('mandatory'); ?></h3>
            <h2 class="form-label green-text"><?php lang('Nom'); ?></h2>
            <input class="clear-form" type="text" name="nom" placeholder="nom">
            <input class="clear-form" type="text" name="prenom" placeholder="prénom">
            <h2 class="form-label green-text">Email</h2>
            <input class="clear-form" type="email" name="email" placeholder="e-mail">
            <h2 class="form-label green-text"><?php lang('mdp'); ?></h2>
            <input class="clear-form mdp" type="password" name="password" placeholder="mot de passe" onclick="resetMdp()">
            <input class="clear-form mdp" type="password" name="confirmation" placeholder="confirmer mot de passe" oninput="verif()">
            <p class="form-info">
              <?php lang('info-mdp'); ?>
            </p>
            <div class="errors">

            </div>
            <h2 class="form-label green-text"><?php lang('Adresse'); ?></h2>
            <input class="clear-form" type="text" name="ville" placeholder="ville">
            <input class="clear-form" type="text" name="codepostal" placeholder="code postal">
            <h2 class="form-label green-text"><?php lang('date-birth'); ?></h2>
            <div class="label-center">
              <select class="clear-form dropdown" name="jour">
                <option value="option" disabled selected><?php lang('jour'); ?></option>
                <?php for ($i = 0; $i < 31; $i++): ?>
                  <option value="<?php echo $i+1 ?>"><?php echo $i+1; ?></option>
                <?php endfor; ?>
              </select>
              <select class="clear-form dropdown" name="mois">
                <option value="option" disabled selected><?php lang('mois'); ?></option>
                <?php $mois=["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"] ?>
                <?php for ($i = 0; $i < 12; $i++): ?>
                  <option value="<?php echo $i+1 ?>"><?php echo $mois[$i]; ?></option>
                <?php endfor; ?>
              </select>
              <select class="clear-form dropdown" name="année">
                <option value="option" disabled selected><?php lang('année'); ?></option>
                <?php $date = intval(date('Y')); ?>
                <?php for ($i = 14; $i < 99; $i++): ?>
                  <option value="<?php echo $date-$i ?>"><?php echo $date-$i; ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <h2 class="form-label green-text"><?php lang('Sexe'); ?></h2>
            <div class="label">
              <div class="radio">
                <label><input type="radio" class="radio-button" name="sexe" value="H" checked="checked">
                  <span class="radio-inner"></span>
                  <?php lang('Homme'); ?></label>
                </div>
                <div class="radio">
                  <label><input type="radio" class="radio-button" name="sexe" value="F">
                    <span class="radio-inner"></span>
                    <?php lang('Femme'); ?></label>
                  </div>
                </div>
                <input type="submit" class="button light" name="add" value='Créer'>
              </form>
            </div>
          </div>
          <form class="" action="" method="post">

            <div class="table-admin">
              <table>
                <tr>
                  <th><input type="checkbox" title="Selectionner Tout" onchange="selectAll(this)"></th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Pseudo</th>
                  <th>Email</th>
                  <th>Code Postal</th>
                  <th>Sexe</th>
                  <th>Date de naissance</th>
                  <th>Activé</th>
                  <th>Ban</th>
                  <th>Duree du ban</th>
                </tr>
                <?php foreach ($users as $user): ?>
                  <tr>
                    <td><input type="checkbox" name="sel[]" value="<?php echo $user->id ?>"></td>
                    <td><?php echo $user->nom ?></td>
                    <td><?php echo $user->prénom ?></td>
                    <td><?php echo $user->pseudo ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->code_postal ?></td>
                    <td><?php echo $user->sexe ?></td>
                    <td><?php echo Vue::date('d/m/Y', $user->naissance) ?></td>
                    <td><?php echo isset($user->token) ? 'Non' : 'Oui' ?></td>
                    <td><?php echo $user->ban == 0 ? 'Non' : 'Oui' ?></td>
                    <td><?php echo isset($user->ban_date) ? Vue::date('d/m/Y H:i:s', $user->ban_date) : '-' ?></td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
            <div class="nav-pages">
              <?php if (isset($prec)): ?>
                <a href="<?php page('backoffice-user') ?>?page=<?php echo $prec ?>" class="nav"><</a>
              <?php endif; ?>
              <?php if ($cpage != 0): ?>
                <span><?php echo $cpage ?></span>
              <?php endif; ?>
              <?php if (isset($suiv)): ?>
                <a href="<?php page('backoffice-user') ?>?page=<?php echo $suiv ?>" class="nav">></a>
              <?php endif; ?>
            </div>
            <button type="submit" name="del" class="button light" onclick="multisel()">Supprimer</button><br><br>
            <button type="submit" name="ban" class="button light" onclick="multisel()">Bannir</button>
            <input type="text" name="duree" value="0" class="admin-input">s
            <label class="txt"><input type="checkbox" name="unban" value=""> unban</label>
          </form>
        </div>
      </div>

    </div>
