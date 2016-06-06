<?php

require_once 'app/Database.php';

/**
 * Groupe
 */
class Forum extends Database
{
  public function getTopics()
  {
    $sql = "SELECT topic.*, sport_type.id as sport_id, villes.id as ville_id
            FROM topic
            LEFT JOIN sport_type ON sport_type.id = topic.id_sport_type
            LEFT JOIN villes ON villes.id = topic.id_ville";
    return $this->executerRequete($sql);
  }

  public function getDiscussions($topic)
  {
    $sql = "SELECT discussion.*, utilisateur.nom as nom, utilisateur.prénom as prénom, COUNT(message.id) as nb_msg
            FROM discussion
            LEFT JOIN utilisateur ON utilisateur.id = discussion.id_utilisateur
            LEFT JOIN message ON message.id_discussion = discussion.id
            WHERE discussion.id_topic = ? GROUP BY discussion.id";

    return $this->executerRequete($sql, [$topic]);
  }

  public function getTopicName($topic)
  {
    $sql = "SELECT nom FROM topic WHERE id = ?";
    return $this->executerRequete($sql, [$topic])->fetch()->nom;
  }

  public function getDisc($disc)
  {
    $sql = "SELECT * FROM discussion WHERE id = ?";
    return $this->executerRequete($sql, [$disc])->fetch();
  }

  public function getMessages($disc)
  {
    $sql = "SELECT message.*, utilisateur.*, photo.nom as url FROM message
            JOIN discussion ON discussion.id = message.id_discussion
            JOIN utilisateur ON utilisateur.id = message.id_utilisateur
            LEFT JOIN photo ON photo.id_utilisateur = utilisateur.id
            WHERE discussion.id = ?";
    return $this->executerRequete($sql, [$disc]);
  }

  public function getAllMessages($lim)
  {
    $q = "SELECT
            message.id,
            message.texte as text,
            message.date,
            utilisateur.nom,
            utilisateur.prénom,
            discussion.titre as disc,
            topic.nom as topic
          FROM message
          JOIN discussion ON discussion.id = message.id_discussion
          JOIN utilisateur ON utilisateur.id = message.id_utilisateur
          LEFT JOIN topic ON topic.id = discussion.id_topic
          LIMIT $lim";
    return $this->executerRequete($q)->fetchAll();
  }

  public function getMessagesSearch($lim)
  {

    if (!empty($_GET['disc'])) {
      $ins[] = $_GET['disc'];
      $param[] = "discussion.id = ?";
    }
    if (!empty($_GET['topic'])) {
      $ins[] = $_GET['topic'];
      $param[] = "topic.id = ?";
    }
    if (!empty($_GET['s'])) {
      $ins[] = "%".$_GET['s']."%";
      $param[] = "message.texte LIKE ?";
    }
    $param = implode(' AND ', $param);
    $q = "SELECT
            message.id,
            message.texte as text,
            message.date,
            utilisateur.nom,
            utilisateur.prénom,
            discussion.titre as disc,
            topic.nom as topic
          FROM message
          JOIN discussion ON discussion.id = message.id_discussion
          JOIN utilisateur ON utilisateur.id = message.id_utilisateur
          LEFT JOIN topic ON topic.id = discussion.id_topic
          WHERE $param
          LIMIT $lim";
    return $this->executerRequete($q, $ins)->fetchAll();
  }

  public function deleteMessage($id)
  {
    $this->executerRequete("DELETE FROM message WHERE id = ?", [$id]);
  }

  public function creerDiscussion($topic)
  {
    if (!empty($_POST)) {
      $this->executerRequete("INSERT INTO discussion (id_utilisateur, id_topic, titre, creation) VALUES (?,?,?,NOW())", [
        $_SESSION['auth']->id,
        $topic,
        $_POST["titre_disc"]
      ]);
      $id = $this->getBdd()->lastInsertId();
      $this->executerRequete("INSERT INTO message (id_utilisateur, id_discussion, texte, date) VALUES (?,?,?,NOW())", [
        $_SESSION['auth']->id,
        $id,
        $_POST['commentaire']
      ]);
      Router::redirect("forumDiscussion", ['id' => $id]);
    }
  }

  public function creerCommentaire($disc)
  {
    if (!empty($_POST)) {
      $this->executerRequete("INSERT INTO message (id_utilisateur, id_discussion, texte, date) VALUES (?,?,?,NOW())", [
        $_SESSION['auth']->id,
        $disc,
        $_POST['commentaire']
      ]);
      Router::redirect("forumDiscussion", ['id' => $disc]);
    }
  }

  public function getAllTopic()
  {
    return $this->executerRequete("SELECT * FROM topic")->fetchAll();
  }
  public function getAllDisc()
  {
    return $this->executerRequete("SELECT * FROM discussion")->fetchAll();
  }

}
