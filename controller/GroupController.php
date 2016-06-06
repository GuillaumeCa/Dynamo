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
    $vue = new Vue("Groupe","Groupe");

    // Ajouter photo
    if (isset($_POST['add-photo'])) {
      $this->group->addPhoto($id);
      $vue->setInstant('Photo ajouté', 'La photo a été ajouté avec succès !');
    }

    // Supprimer Photo
    if (isset($_POST['del'])) {
      $this->group->deletePhoto($_POST['value']);
      $vue->setInstant('Photo supprimé', 'La photo a été supprimé avec succès !');
    }


    // Header
    $head = $this->header($id);

    $niveau_c = $this->group->getNiveau($id);
    $groupe = $this->group->getGroupeInfo($id);
    $nbuser = $this->group->nbUserFromGroup($id);

    $vue->setScript('diapo.js');
    $vue->setScript('form.js');
    $vue->render([
      'presentation_groupe' => $head['presentation_groupe'],
      'isLeader' => $head['isLeader'],
      'ListeSports' => $head['ListeSports'],
      'ListeClub' => $head['ListeClub'],
      'photos' => $head['photos'],
      'isInGroup' => $head['isInGroup'],
      'niveau_c' => $niveau_c,
      'niveau' => ['débutant', 'intermédiaire', 'confirmé', 'avancé', 'expert'],
      'groupe' => $groupe,
      'nbuser' => $nbuser,
    ]);
  }

  public function membres($id)
  {
    $vue = new Vue("GroupeMembre","Groupe");

    // Header
    $head = $this->header($id);

    // Invit
    if (isset($_POST['invit'])) {
      $this->group->invitUserInGroup($id, $_POST['email']);
      $vue->setInstant('Invitation', "L'utilisateur a bien été invité.");
    }
    // Accepter invit
    if (isset($_POST['ok'])) {
      $this->group->modAutoInv($id, true, $head['presentation_groupe']);
      $vue->setInstant("Demande d'invitation", "La demande a bien été accepté");
    }
    // Accepter invit
    if (isset($_POST['ko'])) {
      $this->group->modAutoInv($id, false, $head['presentation_groupe']);
      $vue->setInstant("Demande d'invitation", "La demande a bien été refusé");
    }

    // Bannir utilisateur
    if (isset($_POST['ban-user'])) {
      $this->group->banUserFromGroup($id);
      $vue->setInstant("Bannissement", "L'utilisateur a été banni.");
    }

    $membreGroupe = $this->group->getMembreFromGroupe($id)->fetchAll();
    $autoinvite = $this->group->getMembreAutoInv($id);

    $vue->setScript('form.js');
    $vue->setScript('diapo.js');
    $vue->setScript('form.js');
    $vue->render([
      'membreGroupe' => $membreGroupe,
      'presentation_groupe' => $head['presentation_groupe'],
      'isLeader' => $head['isLeader'],
      'ListeSports' => $head['ListeSports'],
      'ListeClub' => $head['ListeClub'],
      'photos' => $head['photos'],
      'isInGroup' => $head['isInGroup'],
      'autoinvite' => $autoinvite
    ]);
  }

  public function planning($id)
  {
    $vue = new Vue("GroupePlanning","Groupe");
    $vue->setScript('cal.js');
    $vue->setScript('diapo.js');
    $vue->setScript('form.js');
    $vue->setCss('planning.css');

    // Header
    $head = $this->header($id);

    // Ajout evenement
    if (isset($_POST['event'])) {
      $this->group->addEvent($id);
      $vue->setInstant('Evènement ajouté !', 'Votre évènement a été ajouté avec succès !');
    }

    $events = $this->group->getEventsFromGroupe($id);

    $vue->render([
      'events' => $events,
      'presentation_groupe' => $head['presentation_groupe'],
      'isLeader' => $head['isLeader'],
      'ListeSports' => $head['ListeSports'],
      'ListeClub' => $head['ListeClub'],
      'photos' => $head['photos'],
      'isInGroup' => $head['isInGroup'],
    ]);
  }

  public function discussion($id)
  {
    // Header
    $head = $this->header($id);


    // Créer discussion
    if (isset($_POST['new-disc'])) {
      $this->group->addDisc($id);
    }

    $disc = $this->group->getDisc($id);

    $vue = new Vue("GroupeDiscussion","Groupe");
    $vue->setScript('form.js');
    $vue->setScript('diapo.js');
    $vue->render([
      'presentation_groupe' => $head['presentation_groupe'],
      'isLeader' => $head['isLeader'],
      'ListeSports' => $head['ListeSports'],
      'ListeClub' => $head['ListeClub'],
      'photos' => $head['photos'],
      'isInGroup' => $head['isInGroup'],
      'discussions' => $disc
    ]);
  }

  public function message($param)
  {
    // Header
    $head = $this->header($param['id']);

    // Créer Message
    if (isset($_POST['com'])) {
      $this->group->creerMessage($param['id_disc']);
      Router::redirect("groupe-message", $param);
    }

    $disc = $this->group->getDiscById($param['id_disc']);
    $messages = $this->group->getMessages($param);

    $vue = new Vue("GroupeMessage","Groupe");
    $vue->setScript('form.js');
    $vue->setScript('diapo.js');
    $vue->render([
      'presentation_groupe' => $head['presentation_groupe'],
      'isLeader' => $head['isLeader'],
      'ListeSports' => $head['ListeSports'],
      'ListeClub' => $head['ListeClub'],
      'photos' => $head['photos'],
      'isInGroup' => $head['isInGroup'],
      'discName' => $disc->titre,
      'messages' => $messages
    ]);
  }

  public function reglage($id)
  {
    $vue = new Vue("GroupeReglage","Groupe");

    // Modifier visibilité
    if (isset($_POST['visibility']))
    $this->group->modVisi($id);
    $visistat = $this->group->getVisi($id);

    // Quitter groupe
    if (isset($_POST['quit-grp'])) {
      $this->group->quitGroup($_SESSION['auth']->id ,$id, $header['presentation_groupe']);
      Router::redirect('accueil');
    }

    // Supprimer groupe
    if (isset($_POST['del-grp'])) {
      $this->group->deleteGroup($id);
      Router::redirect('accueil');
    }

    // Modif niveau groupe
    if (isset($_POST['niveau-groupe'])) {
      $this->group->modifNiveau($id);
      $vue->setInstant("Modification niveau","Le niveau a été modifié avec succès.");
    }

    // Header
    $head = $this->header($id);

    $membreGroupe = $this->group->getMembreFromGroupe($id)->fetchAll();
    $niveau_c = $this->group->getNiveau($id);


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
      'isInGroup' => $head['isInGroup'],
      'visistat' => $visistat,
      'membres' => $membreGroupe,
      'niveau' => ['débutant', 'intermédiaire', 'confirmé', 'avancé', 'expert'],
      'niveau_c' => $niveau_c
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
    if (isset($_POST['autoinv'])) {
      $this->group->autoInvitation($id);
    }
    return [
      'photos' => $this->group->getPhotosFromGroup($id)->fetchAll(),
      'ListeSports' => $this->sport->getSportsSortedByType(),
      'ListeClub' => $this->group->listClub(),
      'isLeader' => $this->group->isleader($id),
      'presentation_groupe' => $this->group->getGroupeById($id)->fetch(),
      'isInGroup' =>  $this->group->isInGroup($id),
    ];
  }


}
