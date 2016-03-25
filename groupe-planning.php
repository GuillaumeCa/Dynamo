<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Groupe-dynamo</title>
    <link rel="stylesheet" href="assets/css/style.css" charset="utf-8">
    <link rel="stylesheet" href="assets/css/planning.css" charset="utf-8">
  </head>
  <body>
    <?php include 'assets/template/header-priv.php' ?>
    <?php require 'assets/images/svg.php'; ?>
    <?php require 'Calendar.php'; ?>
    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(/assets/images/sport1.png);">
      <div class="sec-overlay sec-over-violet"></div>
      <div class="auto-width group">
        <h1 class="ttl-md">Nom du groupe</h1>
        <p class="txt-jdesc">Dynamo vous permet de trouver et de gérer des groupes de sport selon votre position géograhique, votre niveau de sport et vos sports favoris. </p>
        <div class="txt-info">
          <span><b>Sport</b> football</span>
          <span><b>Club</b> Forest Hill</span>
        </div>
      </div>
    </section>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="#">informations</a></li>
          <li><a href="/groupe-membre.php">membres</a></li>
          <li><a href="groupe-planning.php" class="active">planning</a></li>
          <li><a href="groupe-discussion.php">discussions</a></li>
          <li>
            <a href="groupe-reglage.php" class="settings">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="column">
      <?php
      $events = [
        "CALENDRIER 1" => [
                            ["2016-03-15", "titre1", "descrition1","09:00:00","12:00:00"],
                            ["2016-03-20", "titre2", "descrition1","09:00:00","12:00:00"]
                          ],
      ];

      ?>
      <?php Calendar(12, $events); ?>
      <script src="assets/js/cal.js" charset="utf-8"></script>
    </div>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
