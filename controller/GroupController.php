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
    $list = $this->group->listGroupFromUser();
    $vue = new Vue("liste_groupes");
    $vue->render(['liste_groupe'=> $list]);
  }

  public function informations()
  {
    $vue = new Vue("Groupe" , "Groupe");
    $vue->render();
  }

  public function membres()
  {
    # code...
  }

  public function planning()
  {
    # code...
  }

  public function discussion()
  {
    # code...
  }

}
