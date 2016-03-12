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
    $q = "INSERT INTO utilisateur (nom, prénom, email, password, token) VALUES (?, ?, ?, ?, ?)";
    $password = sha1($insc['password']);
    $insc['token'] = $token;
    $mail = new Mail($insc['email'], "Validation compte Dynamo", "activate.php");
    $mail->render($insc);
    $mail->send();
    $this->executerRequete($q, [$insc['nom'], $insc['prenom'], $insc['email'], $password, $token]);
  }

  public function emailExist()
  {
    $q = "SELECT email FROM utilisateur WHERE email = ?";
    $req = $this->executerRequete($q, [$_POST['email']]);
    return $req;
  }

  public function handleLogin()
  {
    if (!empty($_POST)) {
      $email = $_POST['email'];
      $password = sha1($_POST['password']);
      $q = "SELECT * FROM utilisateur WHERE email = ? AND password = ?";
      $req = $this->executerRequete($q, [$email, $password]);
      $result = $req->fetch();
      if ($result !== false && $result->token == '') {
        $_SESSION['auth'] = $result;
        header('Location: /fr/');
      }
    }
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
}