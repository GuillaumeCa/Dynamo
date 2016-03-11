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
          <li><a href="#" class="active">membres</a></li>
          <li><a href="#">planning</a></li>
          <li><a href="/groupe-discussion.php">discussions</a></li>
          <!-- bouton réglage temporaire -->
          <li><a href="/groupe-reglage.php">reglages</a></li>
        </ul>
      </nav>
    </div>
    <div class="membre">
      <a href="#">
        <span>GC</span>
        <h1>Guillaume Carre</h1>
      </a>
      <h3>LEADER</h3>
    </div>
    <div class="membre">
      <a href="#">
        <span>AA</span>
        <h1>Anthony Agnel</h1>
      </a>
    </div>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>