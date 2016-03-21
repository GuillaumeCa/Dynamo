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
    <section class="pink-bg">
      <div class="column">
        <h1>Topic #1</h1>
        <p>Une réponse ? Une suggestion ?</p>
        </br>
        <p>Boîte à idées et partage de connaissances :)</p>
      </div>
    </section>
    <div class="discussion">
      <div class="creer-discussion">
        <a href="forum-newdiscussion.php" class="button light">Créer une discussion</a>
      </div>
        <ul>
          <li>
            <a href="forum-discussion.php">
              <div class="boutton-discussion">
                <div class="parti-boutton">
                  <h1>Discussion #3</h1>
                  <p>Créée le 16/03/2016 par Alizée Faytre</p>
                </div>
                <div class="parti-boutton-2">
                  <h2>77 messages</h2>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="forum-discussion.php">
              <div class="boutton-discussion">
                <div class="parti-boutton">
                  <h1>Discussion #2</h1>
                  <p>Créée le 14/03/2016 par Celeste Bégassat</p>
                </div>
                <div class="parti-boutton-2">
                  <h2>77 messages</h2>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="forum-discussion.php">
              <div class="boutton-discussion">
                <div class="parti-boutton">
                  <h1>Discussion #1</h1>
                  <p>Créée le 13/03/2016 par Celeste Bégassat</p>
                </div>
                <div class="parti-boutton-2">
                  <h2>77 messages</h2>
                </div>
              </div>
            </a>
          </li>
        </ul>
    </div>
    <?php include 'assets/template/footer.php'; ?>
  </body>
</html>
