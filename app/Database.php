<?php

/**
 * Connection à la base de données
 */

abstract class Database {

  // Objet PDO d'accès à la BDD
  private $bdd;
  // url du serveur
  private $servername = "localhost";
  // Nom d'utilisateur Base de données
  private $username = "root";
  // MDP utilisateur
  private $password = "";
  // Nom de la base de donnée
  private $dbname = "Dynamo";

  private $lastinsertid;

  // Exécute une requête SQL éventuellement paramétrée
  protected function executerRequete($sql, $params = null) {
    $this->lastinsertid = $this->getBdd()->lastInsertId();
    if ($params == null) {
      $resultat = $this->getBdd()->query($sql);
    }
    else {
      $resultat = $this->getBdd()->prepare($sql);
      $resultat->execute($params);
    }
    return $resultat;
  }

  public function lastinsertid()
  {
    return $this->lastinsertid;
  }

  // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
  public function getBdd() {
    if ($this->bdd == null) {
      // Création de la connexion
      $this->bdd = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8",
      "$this->username", "$this->password", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    return $this->bdd;
  }


  // génere une chaine de caractères aléatoires.
  public function generateToken($length = 30)
  {
    $token = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $token = substr(str_shuffle(str_repeat($token,10)), 0, $length);
    return $token;
  }

  public function queryEmpty($result)
  {
    return is_bool($result);
  }

}
