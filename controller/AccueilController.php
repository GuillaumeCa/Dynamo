<?php

require_once 'app/Vue.php';
require_once 'model/User.php';
require_once 'model/Accueil.php';
require_once 'model/Sport.php';
require_once 'model/Group.php';


/**
 *
 */
class AccueilController
{
  private $acc;
  private $user;
  private $sport;
  private $group;

  function __construct()
  {
    $this->acc = new Accueil();
    $this->user = new User();
    $this->sport = new Sport();
    $this->group = new Group();
  }

  public function accueil_logged()
  {
    $head_infos = $this->group->getNextEventsForUser();
    $sel_group = $this->group->selectionGroup($_SESSION['auth']->id)->fetchAll();
    $near_group = $this->group->nearGroup()->fetchAll();
    $types_sports = $this->sport->getSportList();

    $vue = new Vue("AccueilInscrit", "Accueil");
    $vue->setTitle('Accueil');
    $vue->render([
      'today_group' => $head_infos[0],
      'tmw_group' => $head_infos[1],
      'fy_group' => $sel_group,
      'ny_group' => $near_group,
      'types_sports' => $types_sports
    ]);
  }
  public function accueil()
  {
    $types_sports = $this->sport->getSportList();
    $vue = new Vue("Accueil", "Accueil");
    $vue->render(["types_sports"=> $types_sports]);
  }

  public function aide()
  {
    $help = $this->acc->getHelpMessages();
    $vue = new Vue("Help", "Accueil");
    $vue->render([
      'help' => $help
    ]);
  }

  public function recherche()
  {
    $sportlist = $this->acc->getSportList();
    $deptlist = $this->acc->getDptList();
    $vue = new Vue("Recherche", "Accueil");
    $vue->setScript('search.js');

    if (isset($_GET) && !empty($_GET['search'])){

      // Get search results
      $name = $_GET['search'];
      $groups = $this->group->getGroupInfoByName($name);
      $sports = $this->acc->getSportsByName($name);
      $users = $this->acc->getUsersByName($name);

      $global = array_merge($groups, $sports, $users);

      foreach ($global as $key => $value) {
        $key = (isset($value->nom) && isset($value->prénom)) ? $value->nom."-".$value->prénom
        : (isset($value->nom) ? $value->nom
        : $value->titre);
        $type = (isset($value->nom) && isset($value->prénom)) ? 'user'
        : (isset($value->nom) ? 'sport'
        : 'groupe');
        $value->{'type'} = $type;
        $sort[$key] = $value;
      }
      if (isset($sort)) {
        ksort($sort);
      } else {
        $sort = [];
      }

      $num = count($sort);
      $vue->render([
        "groupe" => $groups,
        "sports" => $sports,
        "users" => $users,
        "global" => $sort,
        "listsports" => $sportlist,
        "num" => $num,
        "deptlist" => $deptlist
      ]);
    } else {
      $vue->render(["listsports"=>$sportlist, "deptlist"=>$deptlist]);
    }
  }

  public function ajaxSearch()
  {
    $search = $_GET['s'];
    $groups = $this->group->getGroupInfoByName($search);
    $sports = $this->acc->getSportsByName($search);
    $users = $this->acc->getUsersByName($search);
    echo json_encode([
      "groupe" => array_slice($groups, 0, 5),
      "urlgroupe" => $_GET['lang']."/".Router::getRoute('groupe'),
      "sports" => array_slice($sports, 0, 5),
      "urlsport" => $_GET['lang']."/".Router::getRoute('SportGroupe'),
      "users" => array_slice($users, 0, 5),
    ]);
  }

  public function langue()
  {
    $vue = new Vue("Langue", "Accueil");
    $vue->render();
  }

}
