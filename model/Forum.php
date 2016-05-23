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
            WHERE discussion.id_topic = 1";
    return $this->executerRequete($sql);
  }
}
