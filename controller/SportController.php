<?php

require_once 'app/Vue.php';

/**
 *
 */
class SportController
{
  function __construct()
  {
  }

  public function sportClub()
  {
    $vue = new Vue("SportClub", "Sport");
    $vue->setTitle('SportClub');
    $vue->render();
  }
  public function sportGroupe()
  {
    $vue = new Vue("SportGroupe", "Sport");
    $vue->setTitle('SportGroupe');
    $vue->render();
  }
  public function typeSport()
  {
    $vue = new Vue("TypeSport", "Sport");
    $vue->setTitle('TypeSport');
    $vue->render();
  }
}
