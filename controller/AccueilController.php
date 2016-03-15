<?php

require_once 'model/Group.php';
require_once 'app/View.php';
require_once 'model/User.php';


/**
 *
 */
class AccueilController
{
  private $user;

  function __construct()
  {
    $this->user = new User();
  }

  public function accueil_logged()
  {
    $vue = new Vue("AccueilInscrit", "Accueil");
    $vue->render();
  }
  public function accueil()
  {
    $vue = new Vue("Accueil", "Accueil");
    $vue->render();
  }

}
