<?php
require_once 'app/Vue.php';
require_once 'controller/AccueilController.php';
require_once 'controller/GroupController.php';
require_once 'controller/UserController.php';

/**
 * Permet de router les requetes vers un controlleur
 */
class Router {

  private $ctr;

  private static $routes;
  private $page;
  private $params;


  public function __construct() {
    $this->buildRoutes();
    $this->ctr = [
      'Accueil' => new AccueilController(),
      'Group' => new GroupController(),
      'User' => new UserController(),
    ];
  }

  // Charge un controleur selon la page demandé
  // (nom de l'url définit dans controller/routes.json)
  public function routerRequete() {
    try {
      switch ($this->page) {
        // Accueil
        case 'accueil':
          if (Router::isLoggedIn()){
            $this->ctr['Accueil']->accueil_logged();
          } else {
            $this->ctr['Accueil']->accueil();
          }
          break;

        case 'recherche':
          $this->ctr['Accueil']->recherche();
          break;

        case 'langue':
          $this->ctr['Accueil']->langue();
          break;

        // Groupe
        case 'liste-groupe':
          if (Router::isLoggedIn()){
            $this->ctr['Group']->liste();
          }else {
            $this->redirect();
          }
          break;

        case 'creation-groupe':
          if (Router::isLoggedIn()){
            $this->ctr['Group']->creation();
          }else {
            $this->redirect();
          }
          break;

        case 'groupe':
          if (Router::isLoggedIn()) {
            $this->ctr['Group']->informations();
          } else {
            $this->redirect();
          }
          break;

        case 'discussion-groupe':
          if (Router::isLoggedIn()) {
            $this->ctr['Group']->discussion();
          } else {
            $this->redirect();
          }
          break;

        case 'membres-groupe':
          if (Router::isLoggedIn()) {
            $this->ctr['Group']->membres();
          } else {
            $this->redirect();
          }
          break;
        case 'planning-groupe':
          if (Router::isLoggedIn()) {
            $this->ctr['Group']->planning();
          } else {
            $this->redirect();
          }
          break;
        case 'reglage-groupe':
          if (Router::isLoggedIn()) {
            $this->ctr['Group']->reglage();
          } else {
            Router::redirect();
          }
          break;

        // Profile
        case 'profile':
          if (Router::isLoggedIn()) {
            $this->ctr['User']->profile();
          } else {
            Router::redirect();
          }
          break;

        case 'profile-planning':
          if (Router::isLoggedIn()) {
            $this->ctr['User']->profilePlanning();
          } else {
            Router::redirect();
          }
          break;

        case 'profile-reglage':
          if (Router::isLoggedIn()) {
            $this->ctr['User']->profileReglage();
          } else {
            Router::redirect();
          }
          break;

        // Inscription
        case 'inscription':
          $this->ctr['User']->inscription();
          break;

        case 'inscription-verif':
          $this->ctr['User']->verifinscription($this->params);
          break;

        // Login
        case 'login':
            $this->ctr['User']->login();
          break;

        case 'forgot':
          $this->ctr['User']->forgot();
          break;

        case 'forgot-verif':
          $this->ctr['User']->resetPwd($this->params);
          break;

        case 'logout':
          $this->ctr['User']->logout();
          break;

        case 'dev':
          $vue = new Vue("Success", "User");
          $vue->render(['msg' => "L'inscription a bien été enregistré.<br> Un email vous a été envoyé."]);
          break;

        case 'CGU':
          $vue = new Vue('CGU','User');
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

  public static function redirect($url = "")
  {
    header("Location: /{$_GET['lang']}/".Router::getRoute($url));
  }

  public static function debug($var)
  {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue('404', 'Accueil');
    $vue->emptyPage();
  }

  // Compare le parametre p de l'url avec les urls du fichier routes.json
  // et assigne a $page le nom de l'url.
  public function getPage()
  {
    if (empty($_GET['p'])) {
      $this->page = "accueil";
    } else {
      foreach (static::$routes as $key => $value) {
        $value = preg_replace("/{[^}]*}/", "([a-zA-Z0-9]+)", $value);
        if (preg_match("#^".$value."$#", $_GET['p'], $param)) {
          $this->page = $key;

          $this->params = isset($param[1]) ? $param[1] : null;
        }

      }
    }
  }

  private function buildRoutes()
  {
    $file = file_get_contents("controller/routes.json", "r") or die("Fichier routes introuvable !");
    static::$routes = json_decode($file, true);
    //Router::debug(static::$routes);
  }

  public static function getRoute($route, $param)
  {
    if (isset(static::$routes[$route])) {
      if (!empty($param)) {
        $url = static::$routes[$route];
        foreach ($param as $key => $value) {
          $url = str_replace('{'.$key.'}', $value, $url);
        }
        return $url;
      }
      return static::$routes[$route];
    } else {
      return;
    }
  }
}

function page($route="", $param=[])
{
  echo "/".$_GET['lang']."/".Router::getRoute($route, $param);
}
