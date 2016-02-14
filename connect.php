<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>Connection - Dynamo</title>
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

        </div>
      </div>
      <nav>
        <ul>
          <li><a href="connect.php">Connection</a></li>
          <li><a href="#">Forum</a></li>
          <li><a href="#">Aide</a></li>
        </ul>
      </nav>
    </header>
    <section class="grad">
      <div class="column">
        <h1>Connection</h1>
        <form action="index.html" method="post">
          <input type="email" class="clear-form" name="email" placeholder="adresse email">
          <input type="password" class="clear-form" name="passwd" placeholder="mot de passe">
          <input id="remember" type="checkbox" name="remember" checked><label for="remember">rester connecté</label>
          <input class="button" type="submit" name="send" value="valider">
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
