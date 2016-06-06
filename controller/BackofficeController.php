<?php

require_once 'app/Vue.php';
require_once 'model/User.php';
require_once 'model/Accueil.php';
require_once 'model/Sport.php';
require_once 'model/Group.php';
require_once 'model/Forum.php';


/**
 *
 */
class BackofficeController
{
  private $acc;
  private $user;
  private $sport;
  private $group;
  private $forum;

  function __construct()
  {
    $this->acc = new Accueil();
    $this->user = new User();
    $this->sport = new Sport();
    $this->group = new Group();
    $this->forum = new Forum();
  }

  public function user()
  {
    if (isset($_POST['del'])) {
      foreach ($_POST['sel'] as $id) {
        $this->user->deleteUser($id);
      }
    }
    if (isset($_POST['ban'])) {
      foreach ($_POST['sel'] as $id) {
        $this->user->banUser($id);
      }
    }
    if (isset($_POST['add'])) {
      $this->user->inscrireUtilisateur($_POST);
    }

    $cpage = isset($_GET['page']) ? $_GET['page'] : 0;
    $max = ceil(count($this->group->getAllGroups(0, 0)->fetchAll())/20);
    $prec = ($cpage > 0) ? $cpage - 1 : null;
    $suiv = ($cpage < $max - 1) ? $cpage + 1 : null;

    $users = $this->user->getAllUsers(20, $cpage)->fetchAll();
    $vue = new Vue("User", "Backoffice",'backoffice');
    $vue->render([
      'users' => $users,
      'cpage' => $cpage,
      'prec' => $prec,
      'suiv' => $suiv
    ]);
  }

  public function group()
  {
    if (isset($_POST['add'])) {
      $this->group->creerGroupeAdmin($_POST);
    }
    if (isset($_POST['update'])) {
      $this->group->updateGroup($_POST);
    }
    if (isset($_POST['del'])) {
      foreach ($_POST['sel'] as $id) {
        $this->group->deleteGroup($id);
      }
    }

    $cpage = isset($_GET['page']) ? $_GET['page'] : 0;
    $max = ceil(count($this->group->getAllGroups(0, 0)->fetchAll())/10);
    $prec = ($cpage > 0) ? $cpage - 1 : null;
    $suiv = ($cpage < $max - 1) ? $cpage + 1 : null;

    $sport = $this->sport->getSportsSortedByType();
    $club = $this->group->listClub();
    $groups = $this->group->getAllGroups(10, $cpage)->fetchAll();

    $vue = new Vue("Group", "Backoffice", 'backoffice');
    $vue->render([
      'groups' => $groups,
      'niveau' => ['débutant', 'intermédiaire', 'confirmé', 'avancé', 'expert'],
      'ListeSports' => $sport,
      'ListeClub' => $club,
      'cpage' => $cpage,
      'prec' => $prec,
      'suiv' => $suiv
    ]);
  }

  public function sport()
  {
    $sports = $this->sport->getAllSport();
    $vue = new Vue("Sport", "Backoffice", 'backoffice');
    $vue->render([
      'sports' => $sports
    ]);
  }
  public function forum()
  {
    $vue = new Vue("Forum", "Backoffice", 'backoffice');
    $results = $this->forum->getAllMessages(200);

    if (!empty($_GET['s']) || !empty($_GET['disc']) || !empty($_GET['topic'])) {
      $results = $this->forum->getMessagesSearch(200);
    }

    if (isset($_POST['del'])) {
      foreach ($_POST['sel'] as $sel) {
        $this->forum->deleteMessage($sel);
      }
      $vue->setInstant("Message supprimé", "Le message a bien été supprimé.");
    }

    $vue->render([
      'results' => $results,
      'topic' => $this->forum->getAllTopic(),
      'disc' => $this->forum->getAllDisc(),
    ]);
  }
  public function help()
  {
    // Add
    if (isset($_POST['add'])) {
      $this->acc->addHelpMessage();
    }
    // Del
    if (isset($_POST['del'])) {
      foreach ($_POST['sel'] as $value) {
        $this->acc->delHelpMessage($value);
      }
    }
    // Mod
    if (isset($_POST['mod'])) {
      $this->acc->modHelpMessage($_POST['id']);
    }
    $helpmsg = $this->acc->getHelpMessages();
    $vue = new Vue("Aide", "Backoffice", 'backoffice');
    $vue->render([
      'helpmsg' => $helpmsg
    ]);
  }



}
