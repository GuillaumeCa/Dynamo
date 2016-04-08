<?php

require_once 'app/Vue.php';
require_once 'model/User.php';
require_once 'model/Accueil.php';

/**
 *
 */
class AccueilController
{
  private $user;

  function __construct()
  {
    $this->acc = new Accueil();
    $this->user = new User();
  }

  public function accueil_logged()
  {
    $vue = new Vue("AccueilInscrit", "Accueil");
    $vue->setTitle('Accueil');
    $vue->render();
  }
  public function accueil()
  {
    $vue = new Vue("Accueil", "Accueil");
    $vue->render();
  }

  public function recherche()
  {
    $sportlist = $this->acc->getSportList();
    $vue = new Vue("Recherche", "Accueil");
    if (isset($_GET) && !empty($_GET['search'])){
      $result = $this->acc->getSearchResult($_GET);
      $num = count($result['groupe'])+count($result['sports']);
      $vue->render(['groupe'=>$result['groupe'], 'sports'=>$result['sports'], "listsports"=>$sportlist, "num"=>$num]);
    }else {
      $vue->render(["listsports"=>$sportlist]);
    }
  }

  public function langue()
  {
    $vue = new Vue("Langue", "Accueil");
    $vue->render();
  }

}
