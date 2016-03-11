<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Groupe-dynamo</title>
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <?php include 'assets/template/header.php' ?>
    <?php require 'assets/images/svg.php'; ?>
    <section class="info-groupe" style="background-image: url(/assets/images/sport1.png);">
      <div class="overlay"></div>
      <div class="en-tete-groupe">
        <h1>Nom du groupe</h1>
        <p>Dynamo vous permet de trouver et de gérer des groupes de sport selon votre position géograhique, votre niveau de sport et vos sports favoris. </p>
        <div>
          <span><b>Sport</b> football</span>
          <span><b>Club</b> Forest Hill</span>
        </div>
      </div>
    </section>
    <div class="div-nav">
      <nav class="nav-groupe">
        <ul>
          <li><a href="#">informations</a></li>
          <li><a href="/groupe-membre.php">membres</a></li>
          <li><a href="#">planning</a></li>
          <li><a href="/groupe-discussion.php">discussions</a></li>
          <!-- bouton réglage temporaire -->
          <li><a href="#"><svg class="boutton-reglage"><use xlink:href="#gear"></use></svg></a></li>
        </ul>
      </nav>
    </div>
    <div class="reglage">
      <p>Recevoir des notifications par mail lorsqu'une nouvelle activité est ajoutée</p>
      <a href="#" class="button light">Désactiver</a>
    </div>
    <div class="reglage">
      <p>Recevoir des notifications par mail lorsque quelqu'un répond à ma discussion</p>
      <a href="#" class="button light">Désactiver</a>
    </div>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
