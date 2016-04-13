<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Group extends Database
{

  public function listGroupFromUser()
  {
    $sql = "SELECT groupe.titre as nomGroupe, sport.nom as sport, club.nom as club, utilisateur_groupe.invite, utilisateur_groupe.leader
    FROM utilisateur_groupe
    JOIN groupe ON utilisateur_groupe.id_groupe=groupe.id
    JOIN sport ON groupe.id_sport=sport.id
    JOIN club ON groupe.id_club=club.id
    WHERE id_utilisateur = ?";
    $listGroup = $this->executerRequete($sql, [intval($_SESSION['auth']->id)]);
    return $listGroup;
  }

  public function getName($id)
  {
    $sql = "SELECT titre FROM groupe WHERE id = ?";
    $nomGroupe = $this->executerRequete($sql, [$id]);
    return $nomGroupe;
  }

  public function getPhoto($id)
  {
    $sql = "SELECT photo.nom AS photo FROM groupe JOIN photo ON groupe.id = photo.id_groupe WHERE groupe.id = ?";
    $photos = $this->executerRequete($sql, [$id]);
    return $photos;
  }
  public function creerGroupe($crea){
    $idLieu = $this->executerRequete("SELECT id FROM villes WHERE ville_nom_reel = ?", [$crea['lieu']])->fetch()->id;
    $q = "INSERT INTO groupe (name_grp, sport, lieu) VALUES (?, ?, ?)";
  }
}
//
//
// $G1 = new Group();
//
// foreach ($G1->getName(1) as $key => $value) {
//   echo $value['titre'];
// }
//
// foreach ($G1->getPhoto(1) as $key => $value) {
//   echo $value['photo'];
// }
