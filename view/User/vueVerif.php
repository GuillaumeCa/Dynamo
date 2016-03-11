<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>verif</title>
  </head>
  <body>
    <?php if ($data['token']): ?>
      <h1>✔︎</h1>
      <p>
        Félicitation, votre compte a bien été activé !
      </p>
    <?php else: ?>
      <h1>✗</h1>
      <p>
        Le compte a déjà été validé.
      </p>
    <?php endif; ?>
    <a href="/">Retour accueil</a>
  </body>
</html>
