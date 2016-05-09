<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Accueil extends Database
{

  public function getGroupInfoByName($name)
  {
    $sql = "SELECT groupe.titre,
                  sport.nom as sport,
                  club.nom as club,
                  nbmaxutil,
                  sport_type.id as sport_type,
                  groupe.dept
            FROM groupe
            JOIN club ON club.id = groupe.id_club
            JOIN sport ON sport.id = groupe.id_sport
            JOIN sport_type ON sport_type.id = sport.id_type
            WHERE titre LIKE ? AND visibilité=1";
    $groupe = $this->executerRequete($sql, ["%".$name."%"])->fetchAll();

    // Récupère le nombre d'utilisateur par groupe recherché
    $nbusers = $this->executerRequete(
              "SELECT groupe.titre AS groupe, COUNT(utilisateur.nom) AS nb_user FROM utilisateur_groupe
              JOIN groupe ON utilisateur_groupe.id_groupe = groupe.id
              JOIN utilisateur ON utilisateur.id = utilisateur_groupe.id_utilisateur
              WHERE titre LIKE ? AND visibilité=1 GROUP BY groupe.titre", ["%".$name."%"])->fetchAll();

    $newgroupe = [];
    foreach ($groupe as $value) {
      $newgroupe[$value->titre]['data'] = $value;
      $newgroupe[$value->titre]['nb'] = 0;
    }
    foreach ($nbusers as $value) {
      $newgroupe[$value->groupe]['nb'] = $value->nb_user;
    }
    return $newgroupe;
  }

  public function getSportsByName($name)
  {
    $sports = $this->executerRequete("SELECT * FROM sport WHERE nom LIKE ?", ["%".$name."%"])->fetchAll();
    return $sports;
  }

  public function getUsersByName($name)
  {
    $sports = $this->executerRequete("SELECT * FROM utilisateur WHERE nom LIKE ? AND admin = 0", ["%".$name."%"])->fetchAll();
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
