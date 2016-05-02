<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Group extends Database
{

  public function listGroupFromUser()
  {
    $sql = "SELECT groupe.titre as nomGroupe, sport.nom as sport, club.nom as club, utilisateur_groupe.invite, utilisateur_groupe.leader, sport.id_type
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
    $q = "INSERT INTO groupe (titre, description) VALUES (?, ?, ?)";
    $this->executerRequete($q, [$crea['name_grp'], $crea['prenom'], $insc['description_grp']]);
    foreach ($crea['membre'] as $membre) {
      $mail = new Mail($membre, "Vous avez été invité dans un groupe !", "invit.php");
      $mail->render($membre);
      $mail->send();
    }
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
