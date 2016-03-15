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
      switch ($this->page) {
        case 'accueil':
          if (Router::isLoggedIn()){
            $this->ctr['Accueil']->accueil_logged();
          } else {
            $this->ctr['Accueil']->accueil();
          }
          break;

        case 'groupe':
          if (Router::isLoggedIn()) {
            $this->ctr['Group']->liste();
          } else {
            $this->redirect();
          }
          break;

        case 'inscription':
          $this->ctr['User']->inscription();
          break;

        case 'inscription-verif':
          $this->ctr['User']->verifinscription($this->params[0]);
          break;

        case 'login':
            $this->ctr['User']->login();
          break;

        case 'forgot':
          $this->ctr['User']->forgot();
          break;

        case 'forgot-verif':
          $this->ctr['User']->resetPwd($this->params[0]);
          break;

        case 'logout':
          $this->ctr['User']->logout();
          break;

        case 'dev':
          $vue = new Vue('Success','User');
          $vue->render();
          break;

        default:
          throw new Exception("Page non valide");
          break;
      }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  public static function isLoggedIn()
  {
    return isset($_SESSION['auth']);
  }

  private function redirect($url = "")
  {
    header("Location: /fr/$url");
    exit();
  }

  public static function debug($var)
  {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    echo $msgErreur;
  }

  public function getPage()
  {
    $myfile = file_get_contents("app/routes.json", "r") or die("Unable to open file!");
    // Output one line until end-of-file
    $routes = json_decode($myfile, true);
    if (empty($_GET['p'])) {
      $this->page = "accueil";
    } else {
      foreach ($routes as $key => $value) {
        if (preg_match_all("#^".$value."$#", $_GET['p'], $param)) {
          $this->page = $key;
          $this->params = isset($param[1]) ? $param[1] : null;
        }
      }
    }
  }

}
