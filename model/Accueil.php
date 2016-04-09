<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Accueil extends Database
{

  public function getSearchResult($search)
  {
    $search = $_GET['search'];

    // Sélectionne les groupes recherchés
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
    $groupe = $this->executerRequete($sql, ["%".$search."%"])->fetchAll();

    // Récupère le nombre d'utilisateur par groupe recherché
    $nbusers = $this->executerRequete(
              "SELECT groupe.titre AS groupe, COUNT(utilisateur.nom) AS nb_user FROM utilisateur_groupe
              JOIN groupe ON utilisateur_groupe.id_groupe = groupe.id
              JOIN utilisateur ON utilisateur.id = utilisateur_groupe.id_utilisateur
              WHERE titre LIKE ? AND visibilité=1 GROUP BY groupe.titre", ["%".$search."%"])->fetchAll();

    $newgroupe = [];
    foreach ($groupe as $value) {
      $newgroupe[$value->titre]['data'] = $value;
      $newgroupe[$value->titre]['nb'] = 0;
    }
    foreach ($nbusers as $value) {
      $newgroupe[$value->groupe]['nb'] = $value->nb_user;
    }

    // récupère les sports recherchés
    $sports  = $this->executerRequete("SELECT * FROM sport WHERE nom LIKE ?", ["%".$search."%"])->fetchAll();
    return ["groupe"=>$newgroupe, "sports"=>$sports];
  }

  public function getSportList()
  {
    // $res =  $this->executerRequete("SELECT sport.id, sport.nom, sport_type.nom AS type FROM sport JOIN sport_type ON sport.id_type = sport_type.id ORDER BY sport_type.nom");
    $res =  $this->executerRequete("SELECT id, nom FROM sport_type ORDER BY nom");
    // $result = [];
    // foreach ($res as $value) {
    //   $result[$value->type][] = [$value->id, $value->nom];
    // }
    return $res->fetchAll();
  }

  public function getDptList()
  {
    $res = $this->executerRequete("SELECT ville_departement as dept FROM villes GROUP BY ville_departement");
    return $res->fetchAll();
  }
}
