<?php

require_once 'model/User.php';
require_once 'app/Vue.php';
require_once 'app/Validate.php';

/**
 *
 */
class UserController
{
  private $user;

  function __construct()
  {
    $this->user = new User();
  }

  public function inscription()
  {
    if (!empty($_POST)) {
      $validate = new Validate($_POST);

      if ($validate->isEmpty('cgu')) {
        $validate->notEmpty('nom', "Veuillez entrer un nom");
        $validate->notEmpty('prenom', "Veuillez entrer un prénom");

        $validate->isEmail('email', "L'email n'est pas valide");
        $email = $this->user->emailExist()->fetch();
        $validate->isUnique('email', $email, "L'email est déjà utilisé");

        $validate->doubleCheck('password', 'confirmation', "Les mot de passe ne correspondent pas");
        //Router::debug($validate->error);
        $validate->isVille('ville', "Votre adresse n'est pas valide");
        $validate->isDate('date','jour','mois','année', "Votre date de naissance n'est pas valide");
        if ($validate->isValid()) {
          $_SESSION["inscription"] = $_POST;
          $vue = new Vue("CGU", "User");
          $vue->render();
        } else {
          $vue = new Vue("Inscription", "User");
          $vue->render(['errors'=>$validate->errors]);
        }

      } else {
        $this->user->inscrireUtilisateur($_SESSION["inscription"]);

        session_unset($_SESSION["inscription"]);
        $vue = new Vue("Success", "User");
        $vue->render(['msg' => "L'inscription a bien été enregistré.<br> Un email vous a été envoyé."]);
      }

    } else {
      $vue = new Vue("Inscription", "User");
      $vue->setScript('verif.js');
      $vue->render();
    }

  }

  public function verifinscription($token)
  {
    $tok = $this->user->getUserFromToken($token);
    $vue = new Vue("Verif", "User");
    $vue->render(['token' => $tok]);
  }


  public function login()
  {
    if (!empty($_POST)) {
      $validate = new Validate($_POST);
      //$validate->isEmail('email', "l'email n'est pas valide");
      $login = $this->user->handleLogin()->fetch();
      if ($validate->isInDB('login', $login, "L'email et/ou le mot de passe sont incorrect")) {
        $validate->compteActive("le compte n'est pas active");
      }
      if ($validate->isValid()) {
        $_SESSION['auth'] = $login;
        Router::redirect('accueil');
      } else {
        $vue = new Vue("Login", "User");
        $vue->render(['errors'=>$validate->errors]);
      }
    } else {
      $vue = new Vue("Login", "User");
      $vue->render();
    }
  }

  public function logout()
  {
    if (isset($_SESSION['auth'])) {
      session_unset($_SESSION['auth']);
    }
    header('Location: /');
  }

  public function forgot()
  {
    if (!empty($_POST)) {
      $validate = new Validate($_POST);
      $email = $this->user->emailExist();
      $validate->isEmail('email', "l'email entré est incorrect");
      if ($validate->isValid() && $email) {
        $this->user->forgotPassword();
        $vue = new Vue("Success", "User");
        $vue->render(['msg' => "Un lien de réinitialisation de votre mot de passe vous a été envoyé par mail."]);
      } else {
        Router::debug($validate->errors);
        $vue = new Vue("Forgot", "User");
        $vue->render();
      }
    } else {
      $vue = new Vue("Forgot", "User");
      $vue->render();
    }
  }

  public function resetPwd($token)
  {
    if (!empty($_POST)) {
      $validate = new Validate($_POST);
      $validate->doubleCheck("password", "confirmation", "les mots de passe ne sont pas identiques");
      if ($validate->isValid() && $this->user->setNewPassword($token)) {
        $vue = new Vue("Success", "User");
        $vue->render(['msg' => "Le mot de passe a été modifié avec succès."]);
      } else {
        $vue = new Vue("Reset", "User");
        $vue->setScript('verif.js');
        $vue->render(['errors'=>$validate->errors]);
      }
    } else {
      $this->user->resetPwd($token);
      $vue = new Vue("Reset", "User");
      $vue->setScript('verif.js');
      $vue->render();
    }
  }

  public function profile()
  {
    $this->user->updateProfilePhoto();
    $photoProfile = $this->user->getProfilePhoto($_SESSION['auth']->id)->fetch();

    $infos = $this->user->getInfoUser()->fetch();
    $vue = new Vue("Profile", "User");
    $vue->setScript('formulaire.js');
    $vue->setScript('form.js');
    $vue->render([
      'infos' => $infos,
      'photoProfile' => $photoProfile
    ]);
    echo $_POST['mail'];
    $vue = new vue ("profile");
    $vue->render(['mail' => $mail]);
  }

  public function profilePlanning()
  {
    $this->user->updateProfilePhoto();
    $photoProfile = $this->user->getProfilePhoto($_SESSION['auth']->id)->fetch();

    $events = $this->user->getEventsFromUser();
    $infos = $this->user->getInfoUser()->fetch();
    $vue = new Vue("ProfilePlanning", "User");
    $vue->setScript('cal.js');
    $vue->setCss('planning.css');
    $vue->render([
      'events' => $events,
      'infos' => $infos,
      'photoProfile' => $photoProfile
    ]);
  }

  public function profileReglage()
  {
    $this->user->deleteProfilePhoto();
    $this->user->updateProfilePhoto();
    $this->user->deleteUserProfile();
    $photoProfile = $this->user->getProfilePhoto($_SESSION['auth']->id)->fetch();

    $infos = $this->user->getInfoUser()->fetch();
    $vue = new Vue("ProfileReglage", "User");
    $vue->setScript('form.js');
    $vue->render([
      'infos' => $infos,
      'photoProfile' => $photoProfile
    ]);
  }

  public function modifprofil($token)
  {
    $tok = $this->user->getUserFromToken($token);
    $vue = new Vue("Profile", "User");
    $vue->render(['token' => $tok]);
  }
  public function AjoutSport($token)
  {
    if(isset($_POST['ajout']) AND $_POST['ajout']=='ajouter')
    {
      $listsports = Ajoutsport()->fetchAll();
      $vue->render([
        'nom' => $listsports,
      ]);
      include 'view/vueProfile.php';
    }
  }
  public function envoie_nouveau_form() {

  }

  }
