<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Group extends Database
{

  public function listGroupFromUser()
  {
    $sql = "SELECT groupe.id, groupe.titre as nomGroupe, sport.nom as sport, club.nom as club, utilisateur_groupe.invite, utilisateur_groupe.leader, sport.id_type, groupe.nbmaxutil
    FROM utilisateur_groupe
    JOIN groupe ON utilisateur_groupe.id_groupe=groupe.id
    JOIN sport ON groupe.id_sport=sport.id
    JOIN club ON groupe.id_club=club.id
    WHERE id_utilisateur = ?";
    $listGroup = $this->executerRequete($sql, [intval($_SESSION['auth']->id)]);
    return $listGroup;
  }

  public function getGroupeById($id){
    $sql = "SELECT groupe.id, groupe.titre as nomGroupe, groupe.description as description, sport.nom as sport, club.nom as club
    FROM groupe
    JOIN sport ON groupe.id_sport=sport.id
    JOIN club ON groupe.id_club=club.id
    WHERE groupe.id = ? ";
    $presentationGroupe = $this->executerRequete($sql, [$id]);
    return $presentationGroupe;
  }

  public function getGroupInfoByName($name)
  {
    $sql = "SELECT groupe.id,
                  groupe.titre,
                  sport.nom as sport,
                  club.nom as club,
                  groupe.nbmaxutil,
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

  public function nbUserFromGroupByUser()
  {
    $nbusers = $this->executerRequete(
              "SELECT groupe.titre AS groupe, COUNT(utilisateur.nom) AS nb_user FROM utilisateur_groupe
              JOIN groupe ON utilisateur_groupe.id_groupe = groupe.id
              JOIN utilisateur ON utilisateur.id = utilisateur_groupe.id_utilisateur
              WHERE utilisateur.id = ? AND visibilité = 1 GROUP BY groupe.titre", [intval($_SESSION['auth']->id)]);
    return $nbusers->fetchAll();
  }

  public function getMembreFromGroupe($id){
    $sql = "SELECT utilisateur.prénom as prenom, utilisateur.nom as nom, utilisateur_groupe.leader as leader
    FROM utilisateur
    JOIN utilisateur_groupe on utilisateur_groupe.id_utilisateur=utilisateur.id
    WHERE utilisateur_groupe.id_groupe = ? ";
    $membreGroupe = $this->executerRequete($sql, [$id]);
    return $membreGroupe;
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
    $departement = $this->executerRequete("SELECT ville_departement FROM villes WHERE ville_nom_reel = ?", [$crea['lieu']])->fetch()->ville_departement;

    $q = "INSERT INTO groupe (titre, dept, id_sport, description, visibilité, nbmaxutil, creation) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $id = $this->executerRequete($q, [$crea['name_grp'], $departement, $crea['sport'], $crea['description_grp'], $crea['visibilite'], $crea['nbr_membre'], date('Y-m-d H:i:s')])->lastInsertId();

    foreach ($crea['membre'] as $membre) {
      if ($membre != '') {
        $mail = new Mail($membre, "Vous avez été invité dans un groupe !", "invit.php");
        $mail->render();
        $mail->send();
      }
    }
    return $id;
  }

  public function getEventsFromGroupe()
  {
    $sql = "SELECT groupe.titre, planning.date, planning.activité, planning.description AS description, dstart, dend FROM planning JOIN groupe ON groupe.id = planning.id_groupe WHERE groupe.id = 3";
    $res = $this->executerRequete($sql)->fetchAll();
    $events = [];
    foreach ($res as $r) {
      $events[$r->titre][] = [$r->date, $r->activité, $r->description, $r->dstart, $r->dend];
    }
    return $events;
  }

  public function getNextEventsForUser()
  {
    $today = "SELECT groupe.titre, planning.activité, planning.dstart, planning.dend
              FROM groupe
              JOIN planning
              ON groupe.id = planning.id_groupe
              JOIN utilisateur_groupe
              ON groupe.id = utilisateur_groupe.id_groupe
              WHERE utilisateur_groupe.id_utilisateur = ? AND planning.date = CURDATE()";
    $tmw = "SELECT groupe.titre, planning.activité, planning.dstart, planning.dend
            FROM groupe
            JOIN planning
            ON groupe.id = planning.id_groupe
            JOIN utilisateur_groupe
            ON groupe.id = utilisateur_groupe.id_groupe
            WHERE utilisateur_groupe.id_utilisateur = ? AND planning.date = CURRENT_DATE() + INTERVAL 1 DAY";
    $res = $this->executerRequete($today, [$_SESSION['auth']->id])->fetchAll();
    $todayEvents = [];
    foreach ($res as $row) {
      $todayEvents[$row->titre][] = [$row->activité, $row->dstart, $row->dend];
    }
    $res = $this->executerRequete($tmw, [$_SESSION['auth']->id])->fetchAll();
    $tmwEvents = [];
    foreach ($res as $row) {
      $tmwEvents[$row->titre][] = [$row->activité, $row->dstart, $row->dend];
    }
    return [$todayEvents, $tmwEvents];
  }
}
