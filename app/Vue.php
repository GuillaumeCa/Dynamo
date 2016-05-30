<?php

require_once 'app/Translate.php';

/**
 * Permet d'afficher les pages et d'associer les parametres issus du modele.
 */
class Vue
{
  private $fichier;
  private $page;
  private $template;

  private $css = ['style.css'];
  private $script;

  public function __construct($page, $controller, $template = 'base')
  {
    $this->template = $template;
    $this->page = $page;
    if ($template == 'backoffice') {
      $this->css = ['style.css', 'admin.css'];
    }
    $this->fichier = "view/". $controller ."/vue" . $page . ".php";
  }

  public function render($parameters=[])
  {
    extract($parameters);
    if ($this->template == 'base') {
      include "view/template/base.php";
    } elseif ($this->template == 'backoffice') {
      include "view/template/backoffice.php";
    }
  }

  public function emptyPage($msg = [])
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
