<?php
include 'function.php';
getLanguage('fr');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>Dynamo</title>
  </head>
  <body>
    <?php include 'assets/template/header-priv.php' ?>
    <?php require 'assets/images/svg.php' ?>
    <section class="sec sec-bg-violet">
      <div class="column">
        <h1 class="ttl ttl-md">Mes Groupes</h1>
        <a href="groupe-creation.php" class="button margin-top">Créer un groupe</a>
      </div>
    </section>
    <section class="sec">
      <div class="auto-width">
          <ul class="liste-lg">
            <a href="groupe.php">
              <li>
                <div class="liste-licon">
                  <div class="liste-bg-img" style="background-image: url(/assets/images/yoga.png);">
                  </div>
                  <div class="liste-svg">
                      <svg>
                        <use xlink:href="#ball"></use>
                      </svg>
                  </div>
                </div>
                <div class="liste-mid-txt">
                  <h1 class="liste-ttl">Groupe #1</h1>
                  <span class="liste-ttl-sub"><b>Sport</b> yoga</span>
                  <span class="liste-ttl-sub"><b>Club</b> Forest Hill</span>
                </div>
                <span class="liste-note"><span>7</span>/7</span>
                <span class="liste-leader">LEADER</span>
              </li>
            </a>
            <a href="groupe.php">
              <li>
                <div class="liste-licon">
                  <div class="liste-bg-img" style="background-image: url(/assets/images/yoga.png);">
                  </div>
                  <div class="liste-svg">
                      <svg>
                        <use xlink:href="#ball"></use>
                      </svg>
                  </div>
                </div>
                <div class="liste-mid-txt">
                  <h1 class="liste-ttl">Groupe #1</h1>
                  <span class="liste-ttl-sub"><b>Sport</b> yoga</span>
                  <span class="liste-ttl-sub"><b>Club</b> Forest Hill</span>
                </div>
                <span class="liste-note"><span>7</span>/7</span>
                <span class="liste-leader">LEADER</span>
              </li>
            </a>
            <a href="groupe.php">
              <li>
                <div class="liste-licon">
                  <div class="liste-bg-img" style="background-image: url(/assets/images/yoga.png);">
                  </div>
                  <div class="liste-svg">
                      <svg>
                        <use xlink:href="#ball"></use>
                      </svg>
                  </div>
                </div>
                <div class="liste-mid-txt">
                  <h1 class="liste-ttl">Groupe #1</h1>
                  <span class="liste-ttl-sub"><b>Sport</b> yoga</span>
                  <span class="liste-ttl-sub"><b>Club</b> Forest Hill</span>
                </div>
                <span class="liste-note"><span>7</span>/7</span>
                <span class="liste-leader">LEADER</span>
              </li>
            </a>
          </ul>
        </section>
        <section class="sec">
          <div class="auto-width">
            <div class="liste-separator"><b>INVITATIONS</b></div>
            <ul class="liste-lg">
              <li>
                <a href="groupe.php"><span class="liste-overlay"></span></a>
                <div class="liste-licon">
                  <div class="liste-bg-img" style="background-image: url(/assets/images/yoga.png);">
                  </div>
                  <div class="liste-svg">
                    <svg>
                      <use xlink:href="#ball"></use>
                    </svg>
                  </div>
                </div>
                <div class="liste-mid-txt">
                  <h1 class="liste-ttl">Groupe #7</h1>
                  <span class="liste-ttl-sub"><b>Sport</b> yoga</span>
                  <span class="liste-ttl-sub"><b>Club</b> Forest Hill</span>
                </div>
                <div class="liste-btn">
                  <div>
                    <a href="#" class="button purple">Accepter</a>
                  </div>
                </br>
                <div>
                  <a href="#" class="button purple">Refuser</a>
                </div>
              </div>
              <span class="liste-note"><span>7</span>/7</span>
            </li>
            <li>
              <a href="groupe.php"><span class="liste-overlay"></span></a>
              <div class="liste-licon">
                <div class="liste-bg-img" style="background-image: url(/assets/images/yoga.png);">
                </div>
                <div class="liste-svg">
                  <svg>
                    <use xlink:href="#ball"></use>
                  </svg>
                </div>
              </div>
              <div class="liste-mid-txt">
                <h1 class="liste-ttl">Groupe #7</h1>
                <span class="liste-ttl-sub"><b>Sport</b> yoga</span>
                <span class="liste-ttl-sub"><b>Club</b> Forest Hill</span>
              </div>
              <div class="liste-btn">
                <div>
                  <a href="#" class="button purple">Accepter</a>
                </div>
              </br>
              <div>
                <a href="#" class="button purple">Refuser</a>
              </div>
            </div>
            <span class="liste-note"><span>7</span>/7</span>
            </li>          <!--Suite des invitations -->
        </ul>
        </div>
      </div>
    </section>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
