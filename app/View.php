<?php

require_once 'app/Translate.php';

/**
 * Permet d'afficher les pages et d'associer les parametres issus du modele.
 */
class Vue
{
  private $fichier;

  public function __construct($page, $controller)
  {
    $this->fichier = "view/". $controller ."/vue" . $page . ".php";
  }

  public function render($parameters=[], $template = 'base')
  {
    $data = $parameters;
    if ($template == 'base') {
      //require 'assets/template/header.php';
      require $this->fichier;
      //require 'assets/template/footer.php';
    }
  }

  public static function date($format, $str)
  {
    return date($format, strtotime($str));
  }
}
