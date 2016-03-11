<?php
require_once 'app/View.php';
require_once 'controller/AccueilController.php';
require_once 'controller/GroupController.php';
require_once 'controller/UserController.php';

/**
 * Permet de router les requetes vers un controlleur
 */
class Router {

  private $ctr;

  private $page;
  private $params;


  public function __construct() {
    session_start();
    $this->ctr = [
      'Accueil' => new AccueilController(),
      'Group' => new GroupController(),
      'User' => new UserController(),
    ];
  }

  // Traite une requête entrante
  // url : site.com/index.php?lang=fr&p=groupe/{id-groupe}/...
  public function routerRequete() {
    try {
      if ($this->page) {
        switch ($this->page) {

          case 'groupe':
            if ($this->isLoggedIn()) {
              $this->ctr['Group']->informations();
            } else {
              $this->redirect();
            }
            break;

          case 'inscription':
            if ($this->param('activ')) {
              $this->ctr['User']->verifinscription($this->param('activ'));
            } else {
              $this->ctr['User']->inscription();
            }
            break;

          case 'login':
            $this->ctr['User']->login();
            break;

          case 'forgot':
            if ($this->param('verif')) {
              $this->ctr['User']->resetPwd($this->param('verif'));
            } else {
              $this->ctr['User']->forgot();
            }
            break;

          case 'logout':
            $this->ctr['User']->logout();
            break;

          default:
            throw new Exception("Page non valide");
            break;
          }
        } else {
        // aucune action définie : affichage de l'accueil
        $this->ctr['Accueil']->accueil();
      }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  public function getParams()
  {
    if (isset($_GET['p'])) {
      $url = explode("/", $_GET['p']);
      $this->page = $url[0];
      $parametres = array_slice($url, 1);
      for ($i=0; $i < count($parametres)-1; $i+=2) {
        if (!empty($parametres[$i+1])) {
          $this->params[$parametres[$i]] = $parametres[$i+1];
        }
      }
    }
  }

  public function param($value)
  {
    return isset($this->params[$value]) ? $this->params[$value] : null;
  }


  private function isLoggedIn()
  {
    return isset($_SESSION['auth']);
  }

  private function redirect($url = "")
  {
    header("Location: /fr/$url");
  }

  static function debug($var)
  {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    echo $msgErreur;
  }
}
