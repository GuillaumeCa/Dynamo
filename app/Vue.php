<?php

require_once 'app/Translate.php';

/**
 * Permet d'afficher les pages et d'associer les parametres issus du modele.
 */
class Vue
{
  private $fichier;
  private $page;

  private $css = ['style.css'];
  private $script;

  public function __construct($page, $controller)
  {
    $this->page = $page;
    $this->fichier = "view/". $controller ."/vue" . $page . ".php";
  }

  public function render($parameters=[], $template = 'base')
  {
    extract($parameters);
    include "assets/template/base.php";
  }

  public function emptyPage()
  {
    include $this->fichier;
  }

  private function loadCss($files)
  {
    foreach ($files as $value) {
      echo "<link rel='stylesheet' href='/assets/css/$value' charset='utf-8'>";
    }
  }

  private function loadScript($files)
  {
    if (isset($files)) {
      foreach ($files as $value) {
        echo "<script src='/assets/js/$value' charset='utf-8'></script>";
      }
    }
  }

  public static function date($format, $str)
  {
    return date($format, strtotime($str));
  }

  public function setCss($value)
  {
    $this->css[] = $value;
  }

  public function setScript($value)
  {
    $this->script[] = $value;
  }

  public function setTitle($value)
  {
    $this->page = $value;
  }
}
