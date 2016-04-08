<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Group extends Database
{

  public function listGroupFromUser()
  {

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
