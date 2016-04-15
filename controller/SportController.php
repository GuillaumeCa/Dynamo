<?php

require_once 'app/Vue.php';
require_once 'model/Sport.php';

/**
 *
 */
class SportController
{
  private $sport;

  function __construct()
  {
    $this->sport = new Sport();
  }

  public function sportClub()
  {
    $vue = new Vue("SportClub", "Sport");
    $vue->setTitle('SportClub');
    $vue->render();
  }
  public function sportGroupe($id)
  {
    $nom_sport = $this->sport->getSportByID($id);
    $vue = new Vue("SportGroupe", "Sport");
    $vue->setTitle('SportGroupe');
    $vue->render(['nom_sport' => $nom_sport]);
  }
  public function typeSport($id)
  {
    $nom_type = $this->sport->getSportTypeByID($id);
    $liste_sport = $this->sport->getSportListeByID($id);
    $vue = new Vue("TypeSport", "Sport");
    $vue->setTitle('TypeSport');
    $vue->render(['nom_type' => $nom_type , 'liste_sport' => $liste_sport]);
  }
}
