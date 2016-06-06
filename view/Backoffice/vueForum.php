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
        <li class="active">Forum</li>
      </a>
      <a href="<?php page('backoffice-help') ?>">
        <li class="">Aide</li>
      </a>
    </ul>
  </div>

  <div class="content">
    <div class="card">

      <form class="" action="" method="get">
        <select class="reglage-sel dropdown dropdown-gr" name="topic">
          <option value="">Topic</option>
          <?php foreach ($topic as $value): ?>
            <?php $sel = (isset($_GET['topic']) && $_GET['topic'] == $value->id) ? 'selected' : '' ?>
            <option value="<?php echo $value->id ?>" <?php echo $sel ?>><?php echo $value->nom ?></option>
          <?php endforeach; ?>
        </select>
        <select class="reglage-sel dropdown dropdown-gr" name="disc">
          <option value="">Discussion</option>
          <?php foreach ($disc as $value): ?>
            <?php $sel = (isset($_GET['disc']) && $_GET['disc'] == $value->id) ? 'selected' : '' ?>
            <option value="<?php echo $value->id ?>" <?php echo $sel ?>><?php echo $value->titre ?></option>
          <?php endforeach; ?>
        </select>
        <input type="search" name="s" class="admin-input" placeholder="Rechercher un message" value="<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>">
        <button type="submit" class="button light btn-sm">Ok</button>
      </form>

      <form action="" method="post">

      <div class="table-admin">
        <table>
          <tr>
            <th><input type="checkbox" title="Selectionner Tout" onchange="selectAll(this)"></th>
            <th>Utilisateur</th>
            <th>Message</th>
            <th>Topic</th>
            <th>Discussion</th>
            <th>Date</th>
          </tr>
          <?php if (isset($results)): ?>

          <?php foreach ($results as $res): ?>
            <tr>
              <td><input type="checkbox" name="sel[]" value="<?php echo $res->id ?>"></td>
              <td><?php echo $res->nom." ".$res->prénom ?></td>
              <td><?php echo $res->text ?></td>
              <td><?php echo $res->topic ?></td>
              <td><?php echo $res->disc ?></td>
              <td><?php echo $res->date ?></td>
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
<?php foreach ($results as $res): ?>
  <div class="modal" id="moderate-<?php echo $res->id ?>">
    <div class="modal-window">
      <span class="close" onclick="togglemodal('moderate-<?php echo $res->id ?>')">╳</span>
      <form class="" action="" method="post">
        <input type="hidden" class="id-msg" name="id" value="<?php echo $res->id ?>">
        <h2 class="form-label pink-text">Message</h2>
        <textarea name="desc" rows="8" cols="40" class="clear-form" placeholder="Description..."></textarea>
        <button type="submit" name="event" class="button purple"></button>
      </form>
    </div>
  </div>
<?php endforeach; ?>
