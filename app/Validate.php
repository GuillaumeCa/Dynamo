<?php

require_once 'app/Database.php';

/**
 *
 */
class Validate extends Database
{

  public $errors = [];
  private $data;

  public function __construct($data)
  {
    $this->data = $data;
  }

  public function getField($name)
  {
    if (!isset($this->data[$name])) {
      return null;
    }
    return $this->data[$name];
  }

  public function isEmpty($name)
  {
    return empty($this->getField($name));
  }

  public function notEmpty($name, $error)
  {
    if (empty($this->getField($name))) {
      $this->errors[$name][] = $error;
    }
  }

  public function isEmail($name, $error)
  {
    if (!filter_var($this->getField($name), FILTER_VALIDATE_EMAIL)) {
      $this->errors[$name][] = $error;
    }
  }


  public function isUnique($name, $sqlUnique, $error)
  {
    if (!$this->queryEmpty($sqlUnique)) {
      $this->errors[$name][] = $error;
    }
  }

  public function isInDB($name, $sql, $error)
  {
    if ($this->queryEmpty($sql)) {
      $this->errors[$name][] = $error;
    }
  }

  public function compteActive($error)
  {
    $req = $this->executerRequete("SELECT email FROM utilisateur WHERE email = ? AND token IS NULL ", [$this->getField('email')]);
    if($this->queryEmpty($req->fetch())) {
      $this->errors['activation'][] = $error;
   }
  }

  public function doubleCheck($first, $second, $error)
  {
    if ($this->getField($first) != $this->getField($second)) {
      $this->errors[$first][] = $error;
    }
  }

  public function isDate($name, $day, $month, $year, $error)
  {
    if (!checkdate($this->getField($month), $this->getField($day), $this->getField($year))) {
      $this->errors[$name][] = $error;
    }
  }

  public function isVille($ville, $error){
    $req = $this->executerRequete("SELECT ville_nom_reel FROM villes WHERE ville_nom_reel = ?", [$this->getField($ville)]);
    if($this->queryEmpty($req->fetch())) {
      $this->errors[$ville][] = $error;
    }
  }

  public function isValid()
  {
    return empty($this->errors);
  }

}
