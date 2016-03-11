<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>Profil - Dynamo</title>
  </head>
  <body>
    <?php include 'assets/template/header-priv.php' ?>
    <?php require 'assets/images/svg.php'; ?>
    <section class="pink-bg">
      <div class="text-left column">
        <a href="" class="profile-btn logoP " title="Dynamo User">
          N
        </a>
        <h1><?php lang('Name') ?></h1>
      </div>
    </section>
    <div class="div-nav">
      <nav class="nav-groupe">
        <ul>
          <li><a href="#" class="active">informations</a></li>
          <li><a href="profil-planning.php">planning</a></li>
          <li><a href="#">Historique</a></li>
          <!-- bouton réglage temporaire -->
          <li><a href="#">
            <svg>
              <use xlink:href="#gear"></use>
            </svg>
          </a></li>
        </ul>
      </nav>
    </div>
    <div class="auto-width">
      <div>
        <div class="titre">
          <h1>Information</h1>
        </div>
        <div class="modification">
          <a href="#" class="button">modifier</a>
        </div>
    </div>
      <div class="liste">
        <TABLE BORDER="1">
          <TR>
            <TH> Nom : </TH>
            <td align=left> xxxx </td>
          </TR>
          <TR>
            <TH> Prénom : </TH>
            <td align=left> xxxx </td>
          </TR>
          <TR>
            <TH> Pseudo : </TH>
            <td align=left> xxxx </td>
          </TR>
          <TR>
            <TH> Sexe : </TH>
            <td align=left> xxxxxx </td>
          </TR>
          <TR>
            <TH> Date de naissance : </TH>
            <td align=left> xxxxxx </td>
          </TR>
          <TR>
            <TH> Adresse : </TH>
            <td align=left> xxxxxx  </td>
          </TR>
          <TR>
            <TH> Complément d'adresse : </TH>
            <td align=left> xxxxxx  </td>
          </TR>
          <TR>
            <TH> Email : </TH>
            <td align=left> xxxxxxxxxxxxx </td>
          </TR>
        </TABLE>
      </div>
      <div class="deconnexion">
        <a href="#" class="button">SE DÉCONNECTER</a>
      </div>

    </div>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
