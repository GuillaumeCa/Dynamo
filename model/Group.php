<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Group extends Database
{

  public function autoInvitation()
  {
    $sql = "UPDATE utilisateur_groupe SET autoinvite = 1 WHERE id_groupe = ? AND id_utilisateur = ?";
    $this->executerRequete($sql);
    $mail = new Mail($insc['email'], "Inscription groupe", "autoinvit.php");
    $mail->render($insc);
    $mail->send();
  }

  public function isInGroup($id)
  {
    $sql="SELECT id_utilisateur FROM utilisateur_groupe WHERE id_utilisateur = ? AND id_groupe = ?";
    $utilisateur =$this->executerRequete($sql, [$_SESSION['auth']->id, $id]);
    return $utilisateur->rowCount();
  }

  public function listGroupFromUser()
  {
    $sql = "SELECT groupe.id, groupe.titre as nomGroupe, sport.nom as sport, club.nom as club, utilisateur_groupe.invite, utilisateur_groupe.leader, sport.id_type, groupe.nbmaxutil
    FROM utilisateur_groupe
    JOIN groupe ON utilisateur_groupe.id_groupe=groupe.id
    JOIN sport ON groupe.id_sport=sport.id
    LEFT JOIN club ON groupe.id_club=club.id
    WHERE id_utilisateur = ? AND autoinvite = 0" ;
    $listGroup = $this->executerRequete($sql, [intval($_SESSION['auth']->id)]);
    if ($listGroup->rowCount() > 0) {
      foreach ($listGroup->fetchAll() as $key => $value) {
        $liste[] = [
          'data' => $value,
          'nb' => $this->nbUserFromGroup($value->id)
        ];
      }
      return $liste;
    }
    return false;
  }

  public function listGroupFromSport($id_sport)
  {
    $sql = "SELECT groupe.id, groupe.titre as nomGroupe, sport.nom as sport, club.nom as club, utilisateur_groupe.invite, sport.id_type, groupe.nbmaxutil
    FROM utilisateur_groupe
    JOIN groupe ON utilisateur_groupe.id_groupe=groupe.id
    JOIN sport ON groupe.id_sport=sport.id
    LEFT JOIN club ON groupe.id_club=club.id
    WHERE sport.id = ?";
    return $this->executerRequete($sql, [$id_sport]);
  }

  public function accepterUtilisateur()
  {
    $sql = "UPDATE utilisateur_groupe SET invite = 0 WHERE id_groupe = ? AND id_utilisateur = ?";
    $this->executerRequete($sql,[$_POST['id'], $_SESSION['auth']->id]);
  }

  public function refuserUtilisateur()
  {
    $sql = "DELETE FROM utilisateur_groupe WHERE id_groupe = ? AND id_utilisateur = ?";
    $this->executerRequete($sql,[$_POST['id'], $_SESSION['auth']->id]);
  }

  public function getGroupeById($id){
    $sql = "SELECT groupe.id, groupe.titre as nomGroupe, groupe.description as description, sport.nom as sport, club.nom as club
    FROM groupe
    JOIN sport ON groupe.id_sport=sport.id
    LEFT JOIN club ON groupe.id_club=club.id
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
            LEFT JOIN club ON club.id = groupe.id_club
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

  public function nbUserFromGroup($id)
  {
    $nbusers = $this->executerRequete(
              "SELECT COUNT(*) as nb FROM utilisateur_groupe WHERE id_groupe = ?", [$id]);
    return $nbusers->fetch()->nb;
  }

  public function nbUserFromGroupBySport($id_groupe)
  {
    $nbgroups = $this->executerRequete(
              "SELECT groupe.titre AS groupe, COUNT(utilisateur.nom) AS nb_user FROM utilisateur_groupe
              JOIN groupe ON utilisateur_groupe.id_groupe = groupe.id
              JOIN sport ON sport.id = groupe.id_sport
              JOIN utilisateur ON utilisateur.id = utilisateur_groupe.id_utilisateur
              WHERE sport.id = ? GROUP BY groupe.titre", [$id_groupe]);
    return $nbgroups->fetchAll();
  }

  public function getMembreFromGroupe($id){
    $sql = "SELECT utilisateur.prénom as prenom, utilisateur.nom as nom, utilisateur_groupe.leader as leader
    FROM utilisateur
    JOIN utilisateur_groupe on utilisateur_groupe.id_utilisateur=utilisateur.id
    WHERE utilisateur_groupe.id_groupe = ? ORDER BY leader DESC";
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

  public function isleader($id)
  {
    $sql="SELECT leader FROM `utilisateur_groupe` WHERE `id_utilisateur` = ? AND id_groupe = ?";
    $leader =$this->executerRequete($sql, [$_SESSION['auth']->id, $id]);
    return $leader->rowCount() > 0 ? $leader->fetch()->leader == 1 : false;
  }

  public function listClub()
  {
    return $this->executerRequete("SELECT * FROM club")->fetchAll();
  }

  public function listSport()
  {
    return $this->executerRequete("SELECT id, nom FROM sport")->fetchAll();
  }

  public function creerGroupe($crea){
    $departement = $this->executerRequete("SELECT ville_departement FROM villes WHERE ville_nom_reel = ?", [$crea['lieu']])->fetch()->ville_departement;
    if ($crea['club'] == 0) {
      $crea['club'] = null;
    }
    $q = "INSERT INTO groupe (titre, dept, id_sport, id_club, description, visibilité, nbmaxutil, creation) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $this->executerRequete($q, [$crea['name_grp'], $departement, $crea['sport'], $crea['club'], $crea['description_grp'], $crea['visibilite'], $crea['nbr_membre'], date('Y-m-d H:i:s')]);
    $id = $this->getBdd()->lastInsertId();
    $this->executerRequete("INSERT INTO utilisateur_groupe (id_groupe, id_utilisateur, leader) VALUES (?, ?, 1) ",[
      $id, $_SESSION['auth']->id
    ]);
    foreach ($crea['membre'] as $membre) {
      if ($membre != '') {
        $this->invitUserInGroup($id, $membre);
      }
    }
    return $id;
  }

  public function nbInvitUser()
  {
    $nb = $this->executerRequete("SELECT COUNT(*) AS nb FROM utilisateur_groupe WHERE invite = 1 AND id_utilisateur = ?", [$_SESSION['auth']->id]);
    return $nb->fetch()->nb;
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

  public function selectionGroup($id_user)
  {
    $q = "SELECT * FROM groupe
          LEFT JOIN utilisateur_sport AS us ON us.id_sport = groupe.id_sport
          JOIN utilisateur AS user ON user.id = us.id_utilisateur
          WHERE us.niveau_util = groupe.niveau AND user.id = ?";
    $res = $this->executerRequete($q, [$id_user]);
    return $res;
  }

  public function updateEnTete($modification, $id)
  {
    $sqlUpdate = "UPDATE groupe SET titre=?, description=?, id_sport=?, id_club=? WHERE id=?";
    $this->executerRequete($sqlUpdate, [
      $modification['name_grp'],
      $modification['description_grp'],
      $modification['sport'],
      $modification['club'] == 0 ? null : $modification['club'],
      $id
    ]);
  }

  public function nearGroup()
  {
    $q = "SELECT * FROM groupe WHERE dept = ? LIMIT 4";
    $res = $this->executerRequete($q, [substr($_SESSION['auth']->code_postal, 0, 2)]);
    return $res;
  }

  public function getAllGroups($nb = 0, $page = 0)
  {
    $offset = $nb * $page;
    $limit = ($nb != 0) ? "LIMIT $offset, $nb" : "";
    $q = "SELECT groupe.*, sport.nom as sport, club.nom as club FROM groupe
          JOIN sport ON sport.id = groupe.id_sport
          LEFT JOIN club ON club.id = groupe.id_club ".$limit;
    return $this->executerRequete($q);
  }

  public function updateGroup($data) {
    $q = "UPDATE groupe SET titre = ?,
                            id_sport = ?,
                            id_club = ?,
                            visibilité = ?,
                            description = ?,
                            nbmaxutil = ?,
                            dept = ?,
                            niveau = ? WHERE id = ?";
    $this->executerRequete($q, [
      $data['name_grp'],
      $data['sport'],
      $data['club'],
      $data['visibilite'],
      $data['description_grp'],
      $data['nbr_membre'],
      $data['dep'],
      $data['niveau'],
      $data['id']
    ]);
  }

  public function deleteGroup($id)
  {
    $this->executerRequete("DELETE FROM groupe WHERE id = ?", [$id]);
  }

  public function addPhoto($id)
  {
    if (isset($_POST['groupe-photo'])) {
      $photo = new Photo('groupe');
      if ($photo->store('photo')) {
          $this->executerRequete("INSERT INTO photo SET nom = ?, id_groupe = ?", [$photo->path, $id]);
      }
    }
  }

  public function getPhotosFromGroup($id){
      return $this->executerRequete("SELECT nom FROM photo WHERE id_groupe = ?", [$id]);
  }

  public function deletePhoto($id){
    return $this->executerRequete("DELETE FROM photo WHERE id_groupe = ?", [$id]);
  }

  public function quitGroup($id_user, $id_grp)
  {
    $this->executerRequete('DELETE FROM utilisateur_groupe WHERE id_utilisateur = ? AND id_groupe = ?', [$id_user, $id_grp]);
  }

  public function invitUserInGroup($id_grp, $email)
  {
    // récup id de l'utilisateur invité
    $id_membre = $this->executerRequete("SELECT id FROM utilisateur WHERE email = ?", [$email])->fetch()->id;

    // Inviter utilisateur dans la bdd
    $this->executerRequete("INSERT INTO utilisateur_groupe (id_groupe, id_utilisateur, leader, invite, invite_date) VALUES (?, ?, 0, 1, ?)", [ $id_grp, $id_membre, date('Y-m-d H:i:s')]);

    // Envoyer un mail
    $mail = new Mail($email, "Vous avez été invité dans un groupe !", "invit.php");
    $mail->render();
    $mail->send();
  }

}
