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
    $res =  $this->executerRequete("SELECT id, nom, description FROM sport WHERE id_type = ?", [$id]);
    return $res->fetchAll();
  }

  public function getSportByID($id)
  {
    $res =  $this->executerRequete("SELECT id, nom FROM sport WHERE id = ?", [$id]);
    return $res->fetch()->nom;
  }

}
