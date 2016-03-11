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
    $myfile = fopen("assets/translations/".$lang.".json", "r") or die("Unable to open file!");
    // Output one line until end-of-file
    while(!feof($myfile)) {
      $trans = json_decode(fgets($myfile), true);
      $translation[$trans['id']] = $trans['str'];
    }
    fclose($myfile);
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
