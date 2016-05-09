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
    $liste_groupe = array('liste' => $this->group->listGroupFromUser()->fetchAll());
    $vue = new Vue("ListeGroupes","Groupe");
    $vue->setTitle('Groupes');
    $vue->render($liste_groupe);
  }

  public function informations($id)
  {
    $presentation_groupe = $this->group->getGroupeById($id)->fetch();
    $vue = new Vue("Groupe","Groupe");
    $vue->render([
      'presentation_groupe' => $presentation_groupe,
    ]);
  }

  public function membres($id)
  {
    $presentation_groupe = $this->group->getGroupeById($id)->fetch();
    $vue = new Vue("GroupeMembre","Groupe");
    $vue->render([
      'presentation_groupe' => $presentation_groupe,
    ]);
  }

  public function planning($id)
  {
    $presentation_groupe = $this->group->getGroupeById($id)->fetch();
    $events = $this->group->getEventsFromGroupe();
    $vue = new Vue("GroupePlanning","Groupe");
    $vue->setScript('cal.js');
    $vue->setCss('planning.css');
    $vue->render(['events' => $events,
      'presentation_groupe' => $presentation_groupe,]);
  }

  public function discussion($id)
  {
    $presentation_groupe = $this->group->getGroupeById($id)->fetch();
    $vue = new Vue("GroupeDiscussion","Groupe");
    $vue->render([
      'presentation_groupe' => $presentation_groupe,
    ]);
  }

  public function reglage($id)
  {
    $presentation_groupe = $this->group->getGroupeById($id)->fetch();
    $vue = new Vue("GroupeReglage","Groupe");
    $vue->setTitle('Réglages');
    $vue->render([
      'presentation_groupe' => $presentation_groupe,
    ]);
  }
  
  public function creation()
  {
    $ListeSports = $this->sport->getSportsSortedByType();
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
        $this->group->creerGroupe($_POST);
        Router::redirect("groupe");
      } else {
        $vue->render(['errors'=>$validate->errors, 'ListeSports' => $ListeSports]);
      }
    }else{
    $vue->setScript('list.js');
    $vue->setTitle('Créer un groupe');
    $vue->render(['ListeSports' => $ListeSports]);
    }
  }
}
