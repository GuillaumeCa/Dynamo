<?php

require_once 'app/Vue.php';
require_once 'model/User.php';
require_once 'model/Accueil.php';
require_once 'model/Sport.php';


/**
 *
 */
class AccueilController
{
  private $acc;
  private $user;
  private $sport;

  function __construct()
  {
    $this->acc = new Accueil();
    $this->user = new User();
    $this->sport = new Sport();
  }

  public function accueil_logged()
  {
    $vue = new Vue("AccueilInscrit", "Accueil");
    $vue->setTitle('Accueil');
    $vue->render();
  }
  public function accueil()
  {
    $types_sports = $this->sport->getSportList();
    $vue = new Vue("Accueil", "Accueil");
    $vue->render(["types_sports"=> $types_sports]);
  }

  public function aide()
  {
    $vue = new Vue("Help", "Accueil");
    $vue->render();
  }

  public function recherche()
  {
    $sportlist = $this->acc->getSportList();
    $deptlist = $this->acc->getDptList();
    $vue = new Vue("Recherche", "Accueil");
    $vue->setScript('search.js');
    if (isset($_GET) && !empty($_GET['search'])){
      $result = $this->acc->getSearchResult($_GET);
      $num = count($result['groupe'])+count($result['sports']);
      $vue->render(['groupe'=>$result['groupe'], 'sports'=>$result['sports'], "listsports"=>$sportlist, "num"=>$num, "deptlist"=>$deptlist]);
    } else {
      $vue->render(["listsports"=>$sportlist, "deptlist"=>$deptlist]);
    }
  }

  public function langue()
  {
    $vue = new Vue("Langue", "Accueil");
    $vue->render();
  }

}
