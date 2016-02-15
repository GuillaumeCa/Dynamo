<?php

function getLanguage($lang)
{
  $myfile = fopen("assets/translations/".$lang.".json", "r") or die("Unable to open file!");
  // Output one line until end-of-file
  while(!feof($myfile)) {
    $trans = json_decode(fgets($myfile), true);
    $_SESSION[$trans['id']] = $trans['str'];
  }
  fclose($myfile);
}


function lang($id)
{
  echo $_SESSION[$id];
}
