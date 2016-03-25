<?php

require_once 'model/Group.php';
require_once 'app/View.php';

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
    $vue = new Vue("ListeGroupes","Groupe");
    $vue->render();
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
    $vue->render();
  }
  public function creation()
  {
    $vue = new Vue("GroupeCreation","Groupe");
    $vue->render();
  }

}
