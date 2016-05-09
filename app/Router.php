<?php
require_once 'app/Vue.php';
require_once 'controller/AccueilController.php';
require_once 'controller/GroupController.php';
require_once 'controller/UserController.php';
require_once 'controller/SportController.php';
require_once 'controller/ForumController.php';

/**
 * Permet de router les requetes vers un controlleur
 */
class Router {

  private $ctr;

  private static $routes;
  private $page;
  private $params;
  const DEBUG = true;


  public function __construct() {
    $this->buildRoutes();
    $this->ctr = [
      'Accueil' => new AccueilController(),
      'Group' => new GroupController(),
      'User' => new UserController(),
      'Sport' => new SportController(),
      'Forum' => new ForumController(),
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

        case 'aide':
          $this->ctr['Accueil']->aide();
          break;

        // Forum
        case 'forum':
          $this->ctr['Forum']->forum();
          break;

        case 'forumDiscussion':
          $this->ctr['Forum']->forumDiscussion();
          break;

        case 'forumNewDiscussion':
          if (Router::isLoggedIn()) {
            $this->ctr['Forum']->forumNewDiscussion();
          } else {
            $this->redirect();
          }
          break;

        case 'topic':
          $this->ctr['Forum']->Topic();
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
            $this->ctr['Group']->informations($this->params['id']);
          } else {
            $this->redirect();
          }
          break;

        case 'discussion-groupe':
          if (Router::isLoggedIn()) {
            $this->ctr['Group']->discussion($this->params['id']);
          } else {
            $this->redirect();
          }
          break;

        case 'membres-groupe':
          if (Router::isLoggedIn()) {
            $this->ctr['Group']->membres($this->params['id']);
          } else {
            $this->redirect();
          }
          break;
        case 'planning-groupe':
          if (Router::isLoggedIn()) {
            $this->ctr['Group']->planning($this->params['id']);
          } else {
            $this->redirect();
          }
          break;
        case 'reglage-groupe':
          if (Router::isLoggedIn()) {
            $this->ctr['Group']->reglage($this->params['id']);
          } else {
            Router::redirect();
          }
          break;

        // Sport
        case 'SportClub':
            $this->ctr['Sport']->SportClub();
          break;

        case 'SportGroupe':
          $this->ctr['Sport']->SportGroupe($this->params['id']);
          break;

        case 'typeSport':
          $this->ctr['Sport']->TypeSport($this->params['id']);
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
          $this->ctr['User']->verifinscription($this->params['token']);
          break;

        // Login
        case 'login':
            $this->ctr['User']->login();
          break;

        case 'forgot':
          $this->ctr['User']->forgot();
          break;

        case 'forgot-verif':
          $this->ctr['User']->resetPwd($this->params['token']);
          break;

        case 'logout':
          $this->ctr['User']->logout();
          break;

        case 'dev':
          $vue = new Vue("Success", "User");
          $vue->render(['msg' => "L'inscription a bien été enregistré.<br> Un email vous a été envoyé."]);
          break;

        case 'CGU':
          $vue = new Vue('SportGroupe','Sport');
          $vue->render();
          break;

        default:
          throw new Exception("Page non valide");
          break;
      }
    }
    catch (Exception $e) {
      Router::erreur($e);
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
  public static function erreur($e) {
    $vue = new Vue('404', 'Accueil');
    if (self::DEBUG) {
      $vue->emptyPage($e);
    } else {
      $vue->emptyPage();
    }
  }

  // Compare le parametre p de l'url avec les urls du fichier routes.json
  // et assigne a $page le nom de l'url.
  public function getPage()
  {
    if (empty($_GET['p'])) {
      $this->page = "accueil";
    } else {
      foreach (static::$routes as $key => $value) {
        $param_keys = [];
        preg_match("/{(.*)}/", $value, $param_keys);
        $param_keys = isset($param_keys[1]) ? array_slice($param_keys, 1) : null;
        $value = preg_replace("/{[^}]*}/", "([a-zA-Z0-9]+)", $value);
        if (preg_match("#^".$value."$#", $_GET['p'], $param)) {
          $this->page = $key;
          if (isset($param[1])) {
            $param = array_slice($param, 1);
            foreach ($param_keys as $key => $value) {
              $this->params[$value] = $param[$key];
            }
          }
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

  public static function getRoute($route, $param=[])
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
