<div class="main">

  <div class="sidebar">
    <div class="sidebar-title">
      <a href="<?php page('accueil') ?>">
        <h1>Admin Dynamo</h1>
      </a>
    </div>
    <ul class="sidebar-menu">
      <a href="<?php page('backoffice-user') ?>">
        <li class="">Utilisateurs</li>
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
        <li class="active">Aide</li>
      </a>
    </ul>
  </div>

  <div class="content">
    <div class="card">
      <a href="#" class="button light" onclick="togglemodal('add-help')">Ajouter</a>

      <form action="" method="post">

      <div class="table-admin">
        <table>
          <tr>
            <th><input type="checkbox" title="Selectionner Tout" onchange="selectAll(this)"></th>
            <th>Question</th>
            <th>Réponse</th>
            <th>Modifier</th>
          </tr>
          <?php if (isset($helpmsg)): ?>

          <?php foreach ($helpmsg as $res): ?>
            <tr>
              <td><input type="checkbox" name="sel[]" value="<?php echo $res->id ?>"></td>
              <td><?php echo $res->question ?></td>
              <td><?php echo $res->reponse ?></td>
              <td><a href="#" class="button btn-sm light" onclick="togglemodal('mod-help-<?php echo $res->id ?>')">modifier</a></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        </table>
      </div>
      <button type="submit" name="del" class="button light" onclick="multisel()">Supprimer</button>

    </form>

    </div>
  </div>
</div>

<div class="modal" id="add-help">
  <div class="modal-window">
    <span class="close" onclick="togglemodal('add-help')">╳</span>
    <form class="groupe_crea" action="" method="post">
      <h2 class="form-label pink-text">Question</h2>
      <input type="text" name="q" class="clear-form">
      <h2 class="form-label pink-text">Réponse</h2>
      <textarea type="text" name="r" class="clear-form" rows="8"></textarea>
      <button type="submit" name="add" class="button purple">Ajouter</button>
    </form>
  </div>
</div>
<?php foreach ($helpmsg as $value): ?>
  <div class="modal" id="mod-help-<?php echo $value->id ?>">
    <div class="modal-window">
      <span class="close" onclick="togglemodal('mod-help-<?php echo $value->id ?>')">╳</span>
      <form class="groupe_crea" action="" method="post">
        <h2 class="form-label pink-text">Question</h2>
        <input type="text" name="q" class="clear-form" value="<?php echo $value->question ?>">
        <h2 class="form-label pink-text">Réponse</h2>
        <textarea type="text" name="r" class="clear-form" rows="8"><?php echo $value->reponse ?></textarea>
        <button type="submit" name="mod" class="button purple">Modifier</button>
      </form>
    </div>
  </div>
<?php endforeach; ?>
