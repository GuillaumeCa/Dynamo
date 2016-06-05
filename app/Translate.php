<?php

/**
 *
 */
class Translate
{
  public static $translations;

  function __construct()
  {
    if (isset($_GET['lang'])) {
      static::$translations = $this->getLanguage($_GET['lang']);
      setlocale(LC_ALL,$_GET['lang']."_".strtoupper($_GET['lang']));
    }
  }

  private function getLanguage($lang)
  {
    $myfile = file_get_contents("assets/translations/".$lang.".json", "r") or die("Unable to open file!");
    $translation = json_decode($myfile, true);
    return $translation;
  }

}
$tr = new Translate();

function lang($id)
{
  if (isset($_GET['lang'])) {
    echo Translate::$translations[$id];
  }
}
function langp($id)
{
  if (isset($_GET['lang'])) {
    return Translate::$translations[$id];
  }
}
