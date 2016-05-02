<?php

require_once 'app/Database.php';
require_once 'app/Mail.php';

/**
 *
 */
class User extends Database
{

  public function inscrireUtilisateur($insc)
  {
    $token = $this->generateToken();
    $idVille = $this->executerRequete("SELECT id FROM villes WHERE ville_nom_reel = ?", [$insc['ville']])->fetch()->id;
    $date = $insc['année']."-".$insc['mois']."-".$insc['jour'];
    $q = "INSERT INTO utilisateur (nom, prénom, email, password, naissance, sexe, id_ville, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $password = sha1($insc['password']);
    $insc['token'] = $token;
    $mail = new Mail($insc['email'], "Validation compte Dynamo", "activate.php");
    $mail->render($insc);
    $mail->send();
    $this->executerRequete($q, [
      $insc['nom'],
      $insc['prenom'],
      $insc['email'],
      $password,
      $date,
      $insc['sexe'],
      $idVille,
      $token
    ]);
  }



  public function handleLogin()
  {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $q = "SELECT * FROM utilisateur WHERE email = ? AND password = ?";
    return $this->executerRequete($q, [$email, $password]);
  }

  public function tokenToUser($token)
  {
    return $this->executerRequete("SELECT * FROM utilisateur WHERE token = ?", [$token]);
  }

  public function resetToken($token)
  {
    $this->executerRequete("UPDATE utilisateur SET token = NULL WHERE token = ?", [$token]);
  }

  public function getUserFromToken($token)
  {
    $q = "SELECT * FROM utilisateur WHERE token = ?";
    $req = $this->executerRequete($q, [$token]);
    $result = $req->fetch();
    if ($result != false) {
      $_SESSION['auth'] = $result;
      $q = "UPDATE utilisateur SET token = NULL WHERE token = ?";
      $this->executerRequete($q, [$token]);
      return true;
    } else {
      return false;
    }
  }

  public function emailExist()
  {
    $q = "SELECT email FROM utilisateur WHERE email = ?";
    $req = $this->executerRequete($q, [$_POST['email']]);
    return $req;
  }

  public function resetAccount()
  {
    $token = $this->generateToken();
    $q = "UPDATE utilisateur SET reset = ? WHERE email = ?";
    $req = $this->executerRequete($q, [$token, $_POST['email']]);
  }

  public function forgotPassword()
  {
    $token = $this->generateToken();
    $q = "UPDATE utilisateur SET reset = ? WHERE email = ?";
    $this->executerRequete($q, [$token, $_POST['email']]);
    $mail = new Mail($_POST['email'], "Mot de passe oublié", "forgot.php");
    $mail->render(['token' => $token]);
    return $mail->send();
  }

  public function setNewPassword($token)
  {
    $q = "UPDATE utilisateur SET password = ?, reset = NULL WHERE reset = ?";
    $req = $this->executerRequete($q, [sha1($_POST['password']), $token]);
    return $req;
  }

  public function resetPwd($token)
  {
    $q = "SELECT * FROM utilisateur WHERE reset = ?";
    $req = $this->executerRequete($q, [$token]);
    if (!$req->fetch()) {
      header('Location: /fr/');
    }
  }

  public function getInfoUser()
  {
    $q = "SELECT * FROM utilisateur WHERE id = ?";
    $req = $this->executerRequete($q, [intval($_SESSION['auth']->id)]);
    return $req;
  }

  public function getEventsFromUser()
  {
    $sql = "SELECT groupe.titre, planning.date, planning.activité, planning.description AS description, dstart, dend
            FROM planning
            JOIN groupe ON groupe.id = planning.id_groupe
            JOIN utilisateur_groupe
            ON utilisateur_groupe.id_groupe = groupe.id
            WHERE utilisateur_groupe.id_utilisateur = ?";
    $res = $this->executerRequete($sql, [$_SESSION['auth']->id])->fetchAll();
    $events = [];
    foreach ($res as $r) {
      $events[$r->titre][] = [$r->date, $r->activité, $r->description, $r->dstart, $r->dend];
    }
    return $events;
  }

}
