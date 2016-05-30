<?php

require_once 'app/Vue.php';
require_once 'model/Sport.php';
require_once 'model/Group.php';

/**
 *
 */
class SportController
{
  private $sport;
  private $group;

  function __construct()
  {
    $this->sport = new Sport();
    $this->group = new Group();
  }

  public function sportClub($id)
  {
    $nom_sport = $this->sport->getSportByID($id);
    $clubs = $this->sport->getClubsFromSport($id)->fetchAll();
    $vue = new Vue("SportClub", "Sport");
    $vue->setTitle('SportClub');
    $vue->render([
      'id' => $id,
      'nom_sport' => $nom_sport,
      "clubs" => $clubs
     ]);
  }
  public function sportGroupe($id)
  {
    $groupes = $this->group->listGroupFromSport($id);
    $nbuser = $this->group->nbUserFromGroupBySport($id);
    $liste = [];
    foreach ($groupes as $key => $value) {
      $liste[$value->nomGroupe]['data'] = $value;
      $liste[$value->nomGroupe]['nb'] = 0;
    }
    foreach ($nbuser as $key => $value) {
      $liste[$value->groupe]['nb'] = $value->nb_user;
    }
    $nom_sport = $this->sport->getSportByID($id);
    $vue = new Vue("SportGroupe", "Sport");
    $vue->setTitle('SportGroupe');
    $vue->render([
      'id' => $id,
      'nom_sport' => $nom_sport,
      'groupes' => $liste
    ]);
  }
  public function typeSport($id)
  {
    $nom_type = $this->sport->getSportTypeByID($id);
    $liste_sport = $this->sport->getSportListeByID($id);
    $vue = new Vue("TypeSport", "Sport");
    $vue->setTitle('TypeSport');
    $vue->render(['nom_type' => $nom_type , 'liste_sport' => $liste_sport, 'id' => $id]);
  }
}
