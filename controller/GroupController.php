<?php

require_once 'model/Group.php';
require_once 'model/Sport.php';
require_once 'app/Vue.php';

/**
 *
 */
class GroupController
{
  private $group;
  private $user;
  private $sport;

  function __construct()
  {
    $this->group = new Group();
    $this->user = new User();
    $this->sport = new Sport();
  }

  public function liste()
  {
    // Accepter invitation
    if (isset($_POST['Accept'])) {
      $this->group->accepterUtilisateur();
    }

    // Refuser invitation
    if (isset($_POST['Refuse'])) {
      $this->group->refuserUtilisateur();
    }

    $liste_groupe = $this->group->listGroupFromUser();

    $vue = new Vue("ListeGroupes","Groupe");
    $vue->setTitle('Groupes');
    $vue->render(['liste' => $liste_groupe]);
  }

  public function informations($id)
  {

    $this->group->addPhoto($id);

    // Header
    $head = $this->header($id);

    $vue = new Vue("Groupe","Groupe");
    $vue->setScript('formulaire-headergroupe.js');
    $vue->setScript('diapo.js');
    $vue->setScript('form.js');
    $vue->render([
      'presentation_groupe' => $head['presentation_groupe'],
      'isLeader' => $head['isLeader'],
      'ListeSports' => $head['ListeSports'],
      'ListeClub' => $head['ListeClub'],
      'photos' => $head['photos']
    ]);
  }

  public function membres($id)
  {
    // Header
    $head = $this->header($id);

    $membreGroupe = $this->group->getMembreFromGroupe($id)->fetchAll();

    $vue = new Vue("GroupeMembre","Groupe");
    $vue->setScript('formulaire-headergroupe.js');
    $vue->setScript('diapo.js');
    $vue->setScript('form.js');
    $vue->render([
      'membreGroupe' => $membreGroupe,
      'presentation_groupe' => $head['presentation_groupe'],
      'isLeader' => $head['isLeader'],
      'ListeSports' => $head['ListeSports'],
      'ListeClub' => $head['ListeClub'],
      'photos' => $head['photos']
    ]);
  }

  public function planning($id)
  {
    // Header
    $head = $this->header($id);

    $events = $this->group->getEventsFromGroupe();

    $vue = new Vue("GroupePlanning","Groupe");
    $vue->setScript('formulaire-headergroupe.js');
    $vue->setScript('cal.js');
    $vue->setScript('diapo.js');
    $vue->setCss('planning.css');
    $vue->render([
      'events' => $events,
      'presentation_groupe' => $head['presentation_groupe'],
      'isLeader' => $head['isLeader'],
      'ListeSports' => $head['ListeSports'],
      'ListeClub' => $head['ListeClub'],
      'photos' => $head['photos']
    ]);
  }

  public function discussion($id)
  {
    // Header
    $head = $this->header($id);

    $vue = new Vue("GroupeDiscussion","Groupe");
    $vue->setScript('formulaire-headergroupe.js');
    $vue->setScript('diapo.js');
    $vue->render([
      'presentation_groupe' => $head['presentation_groupe'],
      'isLeader' => $head['isLeader'],
      'ListeSports' => $head['ListeSports'],
      'ListeClub' => $head['ListeClub'],
      'photos' => $head['photos']
    ]);
  }

  public function reglage($id)
  {
    // Header
    $head = $this->header($id);

    // Quitter groupe
    if (isset($_POST['quit-grp'])) {
      $this->group->quitGroup($_SESSION['auth']->id ,$id);
      Router::redirect('accueil');
    }

    // Supprimer groupe
    if (isset($_POST['del-grp'])) {
      $this->group->deleteGroup($id);
      Router::redirect('accueil');
    }

    $vue = new Vue("GroupeReglage","Groupe");
    $vue->setScript('formulaire-headergroupe.js');
    $vue->setScript('diapo.js');
    $vue->setScript('form.js');
    $vue->setTitle('Réglages');
    $vue->render([
      'presentation_groupe' => $head['presentation_groupe'],
      'isLeader' => $head['isLeader'],
      'ListeSports' => $head['ListeSports'],
      'ListeClub' => $head['ListeClub'],
      'photos' => $head['photos'],
    ]);
  }

  public function creation()
  {
    $ListeSports = $this->sport->getSportsSortedByType();
    $ListeClub = $this->group->listClub();
    $vue = new Vue("GroupeCreation", "Groupe");
    if (!empty($_POST)) {
      //Router::debug($_POST);
      $validate = new Validate($_POST);
      // TODO: Il faut ajouter celui qui crée le groupe au groupe et le mettre en leader,
      // envoyer des invitations par mail aux personnes invitées.
      $validate->notEmpty('name_grp', "Veuiller rentrer un nom de groupe");
      $validate->notEmpty('membre', "Ne restez pas seul, ajoutez des amis !");
      $validate->notEmpty('sport', "Vous n'avez pas ajouté de sport à votre groupe");
      $validate->isVille('lieu', "Votre localisation n'est pas valide");
      $validate->notEmpty('nbr_membre', "Selectionner le nombre maximum de membres dans votre groupe");
      $validate->notEmpty('description_grp',"Ajoutez une description à votre groupe");
      if ($validate->isValid()) {
        $id = $this->group->creerGroupe($_POST);
        Router::redirect("groupe", ['id' => $id]);
      } else {
        $vue->render([
          'errors'=>$validate->errors,
          'ListeSports' => $ListeSports,
          'ListeClub' => $ListeClub
        ]);
      }
    }else{
    $vue->setScript('list.js');
    $vue->setTitle('Créer un groupe');
    $vue->render([
      'ListeSports' => $ListeSports,
      'ListeClub' => $ListeClub
    ]);
    }
  }

  public function modificationEnTete($id)
  {
    if (!empty($_POST)) {
      $validate = new Validate($_POST);
      $validate->notEmpty('name_grp', "Veuiller rentrer un nom de groupe");
      // $validate->notEmpty('sport', "Vous n'avez pas ajouté de sport à votre groupe");
      // $validate->isVille('lieu', "Votre localisation n'est pas valide");
      // $validate->notEmpty('description_grp',"Ajoutez une description à votre groupe");
      if ($validate->isValid()) {
        $this->group->updateEnTete($_POST, $id);
        Router::redirect("groupe", ['id' => $id]);
      }
    }
  }

  // Header fonction
  private function header($id)
  {
    return [
      'photos' => $this->group->getPhotosFromGroup($id)->fetchAll(),
      'ListeSports' => $this->sport->getSportsSortedByType(),
      'ListeClub' => $this->group->listClub(),
      'isLeader' => $this->group->isleader($id),
      'presentation_groupe' => $this->group->getGroupeById($id)->fetch()
    ];
  }


}
