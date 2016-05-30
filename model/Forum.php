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
    $sql = "SELECT discussion.*, utilisateur.nom as nom, utilisateur.prénom as prénom
            FROM discussion
            LEFT JOIN utilisateur ON utilisateur.id = discussion.id_utilisateur
            WHERE discussion.id_topic = ?";
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
    $sql = "SELECT * FROM message
            JOIN discussion ON discussion.id = message.id_discussion
            JOIN utilisateur ON utilisateur.id = message.id_utilisateur
            WHERE discussion.id = ?";
    return $this->executerRequete($sql, [$disc]);
  }
}
