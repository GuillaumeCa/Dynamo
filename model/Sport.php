<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Sport extends Database
{
  public function getSportList()
  {
    $res =  $this->executerRequete("SELECT id, nom FROM sport_type ORDER BY nom");
    return $res->fetchAll();
  }
  public function getSportTypeByID($id)
  {
    $res =  $this->executerRequete("SELECT id, nom FROM sport_type WHERE id = ?", [$id]);
    return $res->fetch()->nom;
  }

  public function getSportListeByID($id)
  {
    $res =  $this->executerRequete("SELECT id, id_type, nom, description FROM sport WHERE id_type = ?", [$id]);
    return $res->fetchAll();
  }

  public function getSportByID($id)
  {
    $res =  $this->executerRequete("SELECT id, nom FROM sport WHERE id = ?", [$id]);
    return $res->fetch()->nom;
  }

  public function getSportsSortedByType()
  {
    $res =  $this->executerRequete("SELECT sport.id, sport.nom, sport_type.nom AS type FROM sport JOIN sport_type ON sport.id_type = sport_type.id ORDER BY sport_type.nom")->fetchAll();
    $result = [];
    foreach ($res as $value) {
      $result[$value->type][] = [$value->id, $value->nom];
    }
    return $result;
  }

  public function getAllSport()
  {
    $types = $this->getSportList();
    $sports = $this->executerRequete("SELECT id_type, nom as sport FROM sport")->fetchAll();
    foreach ($types as $type) {
      foreach ($sports as $sport) {
        if ($sport->id_type == $type->id) {
          $list[$type->nom][] = $sport;
        }
      }
    }
    return $list;
  }

  public function getClubsFromSport($id)
  {
    $res =  $this->executerRequete("SELECT club.* FROM club JOIN club_sport ON club_sport.id_club = club.id WHERE club_sport.id_sport = ?", [$id]);
    return $res;
  }

}
