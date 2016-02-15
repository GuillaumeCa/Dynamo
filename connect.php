<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>Connexion - Dynamo</title>
  </head>
  <body>
    <header>
      <div class="logo">
        <a href="/">
        <img src="assets/images/logo.png" alt="logo" />
        </a>
      </div>
      <div class="search">
        <input type="text" name="name" placeholder="rechercher">
        <div class="result">
          <div class="cat">
            <div class="head">
              <span class="title">GROUPES</span>
              <a href="#">VOIR</a>
            </div>
            <ul>
              <li>
                <div class="image" style="background-image: url(http://medias.portailbienetre.fr/coach-sportif.png)"></div>
                <div class="text">
                  <h2>Nom groupe</h2>
                  <h3><b>Sport</b> basketball</h3>
                  <h3><b>Lieu</b> Paris</h3>
                </div>
                <span>2<span class="small">/7</span></span>
              </li>
              <li>
                <div class="image" style="background-image: url(http://medias.portailbienetre.fr/coach-sportif.png)"></div>
                <div class="text">
                  <h2>Nom groupe</h2>
                  <h3><b>Sport</b> basketball</h3>
                  <h3><b>Lieu</b> Paris</h3>
                </div>
                <span>1<span class="small">/7</span></span>
              </li>
            </ul>
          </div>
          <div class="cat">
            <div class="head">
              <span class="title">GROUPES</span>
              <a href="#">VOIR</a>
            </div>
            <ul>
              <li>
                <div class="image" style="background-image: url(http://medias.portailbienetre.fr/coach-sportif.png)"></div>
                <div class="text">
                  <h2>Nom groupe</h2>
                  <h3><b>Sport</b> basketball</h3>
                  <h3><b>Lieu</b> Paris</h3>
                </div>
                <span>2<span class="small">/7</span></span>
              </li>
              <li>
                <div class="image" style="background-image: url(http://medias.portailbienetre.fr/coach-sportif.png)"></div>
                <div class="text">
                  <h2>Nom groupe</h2>
                  <h3><b>Sport</b> basketball</h3>
                  <h3><b>Lieu</b> Paris</h3>
                </div>
                <span>1<span class="small">/7</span></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <nav>
        <ul>
          <li><a href="connect.php">Connexion</a></li>
          <li><a href="#">Forum</a></li>
          <li><a href="#">Aide</a></li>
        </ul>
      </nav>
    </header>
    <section class="grad">
      <div class="column">
        <h1>Connexion</h1>
        <form action="index.php" method="post">
          <input type="email" class="clear-form" name="email" placeholder="adresse email">
          <input type="password" class="clear-form" name="passwd" placeholder="mot de passe">
          <input id="remember" type="checkbox" name="remember" checked><label for="remember">rester connecté</label>
          <input class="button" type="submit" name="send" value="valider">
          <a href="#boloss" class="forget">Mot de passe oublié ?</a>
        </form>
      </div>
    </section>
    <section class="dark">
      <div class="column">
        <h1>Pas encore inscrit ?</h1>
        <a href="#" class="button margin dark">inscription</a>
      </div>
    </section>
  </body>
</html>
