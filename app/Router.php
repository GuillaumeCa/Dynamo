<?php
require_once 'app/Vue.php';

/**
 * Permet de router les requetes vers un controlleur
 */
class Routeur {

  public function __construct() {
    session_start();
  }

  // Traite une requête entrante
  // url : site.com/index.php?lang=fr&p=groupe/{id-groupe}/...
  public function routerRequete() {
    $route = $this->getRouteParam();
    try {
      if (!empty($route['page'])) {
        switch ($route['page']) {
          default:
            throw new Exception("Page non valide");
            break;
          }
        } else {
        // aucune action définie : affichage de l'accueil
        $this->Accueil->accueil();
      }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  private function getRouteParam() {
    if (isset($_GET['p'])) {
      $url = explode("/", $_GET['p']);
      $page = $url[0];
      return ['path' => $url,'page' => $url[0]];
    }
  }

  private function isLoggedIn()
  {
    if (isset($_SESSION['auth'])) {
      return true;
    } else {
      return false;
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    echo $msgErreur;
  }
}
