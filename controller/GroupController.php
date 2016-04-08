<?php

require_once 'model/Group.php';
require_once 'app/Vue.php';

/**
 *
 */
class GroupController
{
  private $group;
  private $user;

  function __construct()
  {
    $this->group = new Group();
    $this->user = new User();
  }

  public function liste()
  {
    $liste_groupe = array('liste' => $this->group->listGroupFromUser()->fetchAll());
    $vue = new Vue("ListeGroupes","Groupe");
    $vue->setTitle('Groupes');
    $vue->render($liste_groupe);
  }

  public function informations()
  {
    $vue = new Vue("Groupe","Groupe");
    $vue->render();
  }

  public function membres()
  {
    $vue = new Vue("GroupeMembre","Groupe");
    $vue->render();
  }

  public function planning()
  {
    $vue = new Vue("GroupePlanning","Groupe");
    $vue->setScript('cal.js');
    $vue->setCss('planning.css');
    $vue->render();
  }

  public function discussion()
  {
    $vue = new Vue("GroupeDiscussion","Groupe");
    $vue->render();
  }
  public function reglage()
  {
    $vue = new Vue("GroupeReglage","Groupe");
    $vue->setTitle('Réglages');
    $vue->render();
  }
  public function creation()
  {
    $vue = new Vue("GroupeCreation","Groupe");
    $vue->setTitle('Créer un groupe');
    $vue->render();
  }

}
