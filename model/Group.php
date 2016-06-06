<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Group extends Database
{

  public function autoInvitation($id)
  {
    $q = "SELECT * FROM utilisateur
          JOIN utilisateur_groupe ON utilisateur_groupe.id_utilisateur = utilisateur.id
          WHERE utilisateur_groupe.leader = 1 AND utilisateur_groupe.id_groupe = ?";
    $email = $this->executerRequete($q, [$id])->fetch()->email;

    $sql = "INSERT INTO utilisateur_groupe (id_groupe, id_utilisateur, autoinvite, autoinvite_date) VALUES (?,?,1,NOW())";
    $this->executerRequete($sql, [$id, $_SESSION['auth']->id]);
    $mail = new Mail($email, "Inscription groupe", "autoinvit.php");
    $mail->render();
    $mail->send();
  }

  public function modAutoInv($id, $acc, $groupe)
  {
    $email = $this->executerRequete("SELECT * FROM utilisateur WHERE id = ?", [$_POST['value']])->fetch()->email;
    if ($acc) {
      $q = "UPDATE utilisateur_groupe SET autoinvite = 0 WHERE id_groupe = ? AND id_utilisateur = ?";
      $this->executerRequete($q, [$id, $_POST['value']]);
      $mail = new Mail($email, "Demande accepté", "info.php");
      $mail->render([
        'titre' => "Demande d'invitation au groupe {$groupe->nomGroupe} accepté",
        'message' => "Votre demande d'invitation au groupe {$groupe->nomGroupe} a été acceptée."
      ]);
      $mail->send();
    } else {
      $q = "DELETE FROM utilisateur_groupe WHERE id_groupe = ? AND id_utilisateur = ?";
      $this->executerRequete($q, [$id, $_POST['value']]);
      $mail = new Mail($email, "Demande refusé", "info.php");
      $mail->render([
        'titre' => "Demande d'invitation au groupe {$groupe->nomGroupe} refusé",
        'message' => "Votre demande d'invitation au groupe {$groupe->nomGroupe} a été refusée."
      ]);
      $mail->send();
    }
  }

  public function isInGroup($id)
  {
    $sql="SELECT id_utilisateur FROM utilisateur_groupe WHERE id_utilisateur = ? AND id_groupe = ?";
    $utilisateur =$this->executerRequete($sql, [$_SESSION['auth']->id, $id]);
    return $utilisateur->rowCount();
  }

  public function listGroupFromUser()
  {
    $sql = "SELECT groupe.id, groupe.titre as nomGroupe, sport.nom as sport, club.nom as club, utilisateur_groupe.invite, utilisateur_groupe.leader, sport.id_type, groupe.nbmaxutil, photo.nom as url
    FROM utilisateur_groupe
    LEFT JOIN photo ON photo.id_groupe = utilisateur_groupe.id_groupe
    JOIN groupe ON utilisateur_groupe.id_groupe=groupe.id
    JOIN sport ON groupe.id_sport=sport.id
    LEFT JOIN club ON groupe.id_club=club.id
    WHERE utilisateur_groupe.id_utilisateur = ? AND autoinvite = 0" ;
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
    $sql = "SELECT groupe.id, groupe.titre as nomGroupe, sport.nom as sport, club.nom as club, utilisateur_groupe.invite, sport.id_type, groupe.nbmaxutil, photo.nom as url
    FROM utilisateur_groupe
    LEFT JOIN photo ON photo.id_groupe = utilisateur_groupe.id_groupe
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
                  groupe.dept,
                  photo.nom as url,
                  COUNT(utilisateur_groupe.id_utilisateur) as nb_user
            FROM groupe
            LEFT JOIN club ON club.id = groupe.id_club
            LEFT JOIN photo ON photo.id_groupe = groupe.id
            LEFT JOIN utilisateur_groupe ON utilisateur_groupe.id_groupe = groupe.id
            JOIN sport ON sport.id = groupe.id_sport
            JOIN sport_type ON sport_type.id = sport.id_type
            WHERE titre LIKE ? AND visibilité = 1
            GROUP BY groupe.id
            ORDER BY groupe.titre ASC";
    $groupe = $this->executerRequete($sql, ["%".$name."%"])->fetchAll();
    return $groupe;
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
    $sql = "SELECT utilisateur.prénom as prenom, utilisateur.nom as nom, utilisateur_groupe.leader as leader, utilisateur.id
    FROM utilisateur
    JOIN utilisateur_groupe on utilisateur_groupe.id_utilisateur=utilisateur.id
    WHERE utilisateur_groupe.id_groupe = ? AND utilisateur_groupe.autoinvite = 0 AND utilisateur_groupe.invite = 0 ORDER BY leader DESC";
    $membreGroupe = $this->executerRequete($sql, [$id]);
    return $membreGroupe;
  }

  public function getMembreAutoInv($id)
  {
    $q = "SELECT * FROM utilisateur_groupe
          JOIN utilisateur ON utilisateur_groupe.id_utilisateur = utilisateur.id
          WHERE utilisateur_groupe.id_groupe = ? AND utilisateur_groupe.autoinvite = 1";
    return $this->executerRequete($q, [$id])->fetchAll();
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

  public function getEventsFromGroupe($id)
  {
    $sql = "SELECT groupe.titre, planning.date, planning.activité, planning.description AS description, dstart, dend FROM planning JOIN groupe ON groupe.id = planning.id_groupe WHERE groupe.id = ?";
    $res = $this->executerRequete($sql, [$id])->fetchAll();
    $events = [];
    foreach ($res as $r) {
      $events[$r->titre][] = [$r->date, $r->activité, $r->description, $r->dstart, $r->dend];
    }
    return $events;
  }

  public function getNextEventsForUser()
  {
    $today = "SELECT groupe.id,
                      groupe.titre,
                      planning.activité,
                      planning.dstart,
                      planning.dend
              FROM groupe
              JOIN planning
              ON groupe.id = planning.id_groupe
              JOIN utilisateur_groupe
              ON groupe.id = utilisateur_groupe.id_groupe
              WHERE utilisateur_groupe.id_utilisateur = ? AND planning.date = CURDATE()";
    $tmw = "SELECT groupe.id,
                  groupe.titre,
                  planning.activité,
                  planning.dstart,
                  planning.dend
            FROM groupe
            JOIN planning
            ON groupe.id = planning.id_groupe
            JOIN utilisateur_groupe
            ON groupe.id = utilisateur_groupe.id_groupe
            WHERE utilisateur_groupe.id_utilisateur = ? AND planning.date = CURRENT_DATE() + INTERVAL 1 DAY";
    $res = $this->executerRequete($today, [$_SESSION['auth']->id])->fetchAll();
    $todayEvents = [];
    foreach ($res as $row) {
      $todayEvents[$row->id]['name'] = $row->titre;
      $todayEvents[$row->id]['cal'][] = [$row->activité, $row->dstart, $row->dend];
    }
    $res = $this->executerRequete($tmw, [$_SESSION['auth']->id])->fetchAll();
    $tmwEvents = [];
    foreach ($res as $row) {
      $tmwEvents[$row->id]['name'] = $row->titre;
      $tmwEvents[$row->titre]['cal'][] = [$row->activité, $row->dstart, $row->dend, $row->id];
    }
    return [$todayEvents, $tmwEvents];
  }

  public function selectionGroup($id_user)
  {
    $q = "SELECT groupe.*, photo.nom as url FROM groupe
          LEFT JOIN photo ON photo.id_groupe = groupe.id
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

  public function modifNiveau($id)
  {
    $this->executerRequete("UPDATE groupe SET niveau = ? WHERE id = ?", [$_POST['niveau-groupe'],$id]);
  }

  public function getNiveau($id)
  {
    return $this->executerRequete("SELECT niveau FROM groupe WHERE id = ?", [$id])->fetch();
  }

  public function nearGroup()
  {
    $q = "SELECT groupe.*, photo.nom as url
          FROM utilisateur_groupe
          JOIN groupe ON `utilisateur_groupe`.`id_groupe` = groupe.id
          JOIN `utilisateur` ON `utilisateur_groupe`.`id_utilisateur` = utilisateur.id
          LEFT JOIN photo ON photo.id_groupe = groupe.id
          WHERE dept = ? AND `utilisateur`.id != ?
          LIMIT 4";
    $res = $this->executerRequete($q, [substr($_SESSION['auth']->code_postal, 0, 2), $_SESSION['auth']->id]);
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
    $photo = new Photo('groupe');
    if ($photo->store('photo')) {
        $this->executerRequete("INSERT INTO photo SET nom = ?, id_groupe = ?", [$photo->path, $id]);
    }
  }

  public function getPhotosFromGroup($id)
  {
    return $this->executerRequete("SELECT id, nom FROM photo WHERE id_groupe = ?", [$id]);
  }

  public function deletePhoto($id){
    $url = $this->executerRequete("SELECT nom FROM photo WHERE id = ?", [$id])->fetch()->nom;
    $this->executerRequete("DELETE FROM photo WHERE id = ?", [$id]);
    unlink($url);
  }

  public function quitGroup($id_user, $id_grp, $groupe)
  {
    if (isset($_POST['utilisateurs'])) {
      $email = $this->executerRequete("SELECT * FROM utilisateur WHERE id = ?", [$_POST['utilisateurs']])->fetch()->email;
      $this->executerRequete('UPDATE utilisateur_groupe SET leader = 1 WHERE id_utilisateur = ? AND id_groupe = ?', [$_POST['utilisateurs'], $id_grp]);
      $mail = new Mail($email, 'Vous avez été désigné Leader !', 'info.php');
      $mail->render([
        'titre'=>"Changement du groupe {$groupe->nomGroupe}",
        'message'=>"Vous avez été désigné Leader dans le groupe {$groupe->nomGroupe}",
      ]);
      $mail->send();
    }
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

  public function addEvent($id)
  {
    $dstart = "{$_POST['dannée']}-{$_POST['dmois']}-{$_POST['djour']} {$_POST['dheure']}:{$_POST['dmin']}:00";
    $dend = "{$_POST['fannée']}-{$_POST['fmois']}-{$_POST['fjour']} {$_POST['fheure']}:{$_POST['fmin']}:00";

    $q = "INSERT INTO planning (id_groupe, activité, description, date, dstart, dend)
          VALUES (?,?,?,?,?,?)";
    $this->executerRequete($q, [
      $id,
      $_POST['titre'],
      $_POST['desc'],
      Vue::date('Y-m-d', $dstart),
      $dstart,
      $dend,
    ]);
  }

  public function modVisi($id)
  {
    $this->executerRequete('UPDATE groupe SET visibilité = NOT(visibilité) WHERE id = ?', [$id]);
  }
  public function getVisi($id)
  {
    return $this->executerRequete('SELECT visibilité FROM groupe WHERE id = ?', [$id])->fetch()->visibilité;
  }

  public function addDisc($id)
  {
    $q = "INSERT INTO discussion (id_utilisateur, titre, creation) VALUES (?,?,NOW())";
    $this->executerRequete($q, [$_SESSION['auth']->id,$_POST['titre']]);
    $id_disc = $this->getBdd()->lastInsertId();
    $this->executerRequete("INSERT INTO message (id_utilisateur, id_discussion, texte, date) VALUES (?,?,?,NOW())", [
      $_SESSION['auth']->id,
      $id_disc,
      $_POST['comment']
    ]);
    $this->executerRequete("INSERT INTO groupe_discussion (id_groupe, id_discussion) VALUES (?,?)", [$id, $id_disc]);
  }

  public function getDisc($id)
  {
    $q = "SELECT *, COUNT(texte) as nb FROM groupe_discussion
          JOIN discussion ON discussion.id = groupe_discussion.id_discussion
          JOIN message ON message.id_discussion = discussion.id
          JOIN utilisateur ON discussion.id_utilisateur = utilisateur.id
          WHERE groupe_discussion.id_groupe = ?
          GROUP BY id_groupe";
    return $this->executerRequete($q, [$id])->fetchAll();
  }

  public function getDiscById($id)
  {
    return $this->executerRequete("SELECT * FROM discussion WHERE id = ?", [$id])->fetch();
  }

  public function getMessages($param)
  {
    $sql = "SELECT message.*, utilisateur.*, photo.nom as url FROM message
            JOIN discussion ON discussion.id = message.id_discussion
            JOIN utilisateur ON utilisateur.id = message.id_utilisateur
            LEFT JOIN photo ON photo.id_utilisateur = utilisateur.id
            WHERE discussion.id = ?";
    return $this->executerRequete($sql, [$param['id_disc']])->fetchAll();
  }

  public function creerMessage($disc)
  {
    $this->executerRequete("INSERT INTO message (id_utilisateur, id_discussion, texte, date) VALUES (?,?,?,NOW())", [
      $_SESSION['auth']->id,
      $disc,
      $_POST['commentaire']
    ]);
  }

  public function banUserFromGroup($id)
  {
    $this->executerRequete("DELETE FROM utilisateur_groupe WHERE id_groupe = ? AND id_utilisateur = ?", [$id, $_POST['value']]);
  }

}
