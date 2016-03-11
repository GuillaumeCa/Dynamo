<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/view/assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>Groupe</title>
  </head>
  <body>
    <h1>Groupe</h1>
    <h2><?php lang('nom') ?></h2>
    <table>
      <tr>
        <td class="head">Nom</td>
        <td class="content"><?php echo $data['info']->nom ?></td>
      </tr>
      <tr>
        <td class="head">Prénom</td>
        <td class="content"><?php echo $data['info']->prénom ?></td>
      </tr>
      <tr>
        <td class="head">Pseudo</td>
        <td class="content"><?php echo $data['info']->pseudo ?></td>
      </tr>
      <tr>
        <td class="head">Sexe</td>
        <td class="content"><?php echo $data['info']->sexe ?></td>
      </tr>
      <tr>
        <td class="head">Date de naissance</td>
        <td class="content"><?php echo Vue::date('d/m/Y', $data['info']->naissance); ?></td>
      </tr>
      <tr>
        <td class="head">Adresse</td>
        <td class="content"><?php echo $data['info']->ville ?><br><?php echo $data['info']->code_postal ?></td>
      </tr>
      <tr>
        <td class="head">Mot de passe</td>
        <td class="content mdp"><?php echo $data['info']->password ?></td>
      </tr>
      <tr>
        <td class="head">Email</td>
        <td class="content"><?php echo $data['info']->email ?></td>
      </tr>
    </table>
  </body>
</html>
