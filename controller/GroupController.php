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
    if (!empty($_POST)) {
      Router::debug($_POST);
      $validate = new Validate($_POST);
/* Il faut ajouter celui qui créer le groupe au groupe et le mettre en leader, envoyer des invitations par mail aux personnes invitées, */
      $validate->notEmpty('name_grp', "Veuiller rentrer un nom de groupe");
      $validate->notEmpty('membre', "Ne restez pas seul, ajoutez des amis !");
      $validate->notEmpty('sport', "Vous n'avez pas ajouté de sport à votre groupe");
      $validate->isVille('lieu', "Votre localisation n'est pas valide");
      $validate->notEmpty('nbr_membre', "Selectionner le nombre maximum de membres dans votre groupe");
      $validate->notEmpty('description_grp',"Ajoutez une description à votre groupe");
      if ($validate->isValid()) {
        redirect("groupe/info");
      } else {
        $vue = new Vue("GroupeCreation", "Groupe");
        echo "Bug";
        $vue->render();
      }
    }else{
    $vue = new Vue("GroupeCreation","Groupe");
    $vue->setTitle('Créer un groupe');
    $vue->render();
    }
  }
}
