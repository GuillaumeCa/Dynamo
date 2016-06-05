<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Accueil extends Database
{

  public function getSportsByName($name)
  {
    $sports = $this->executerRequete("SELECT * FROM sport WHERE nom LIKE ?", ["%".$name."%"])->fetchAll();
    return $sports;
  }

  public function getUsersByName($name)
  {
    $sports = $this->executerRequete("SELECT * FROM utilisateur WHERE ( nom LIKE :search ) OR ( prénom LIKE :search ) OR ( pseudo LIKE :search ) AND admin = 0", ['search' => "%".$name."%"])->fetchAll();
    return $sports;
  }

  public function getSportList()
  {
    $res =  $this->executerRequete("SELECT id, nom FROM sport_type ORDER BY nom");
    return $res->fetchAll();
  }

  public function getDptList()
  {
    $res = $this->executerRequete("SELECT ville_departement as dept FROM villes GROUP BY ville_departement");
    return $res->fetchAll();
  }
}
