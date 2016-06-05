<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <style>
    body {
      font-family: Avenir Next;
      text-align: center;
    }
    h1 {
      text-align: center;
      color: #53FFC0;
    }
    p {
      color: #9972FA;
    }

    .card {
      max-width: 500px;
      background: whitesmoke;
      border-radius: 7px;
      padding: 20px;
      margin: 0 auto;
      margin-top: 30px;
    }

    a {
      display: block;
      text-decoration: none;
    }

    a img {
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
      width: 50px;
      margin: 5px;
      opacity: 0.6;
    }

    .lien {
      margin: 10px;
      color: lightgrey;
      font-weight: bold;
      font-size: 0.8em;
    }

    .button {
      border: #53FFC0 solid 1px;
      color: #53FFC0;
      padding: .3em .9em;
      border-radius: 100px;
      font-weight: 500;
      margin: 10px;
      display: inline-block;
      text-decoration: none;
    }
    .button:hover {
      background: #53FFC0;
      color: white;
    }
    </style>
  </head>
  <body>
    <div class="card">
      <h1>Vous avez recu une demande d'inscription a votre groupe !</h1>
      <p>
        Si vous souhaiter accepter cet utilisateur veuillez cliquer sur le lien suivant.
      </p>
      <a href="http://dynamo.com/fr/groupe/liste#invitation" class="button">Accepter</a>
    </div>
    <a href="http://dynamo.com"><img src="http://dynamo.com/assets/images/logo.png" alt="logo" /></a>
    <a href="#" class="lien">paramètres d'email</a>
  </body>
</html>
