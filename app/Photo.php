<?php

require 'app/Database.php';

/**
 *
 */
class Photo extends Database
{
  private $type;
  private $file;
  private $directory = "assets/images/";

  public function __construct($type)
  {
    $this->type = $type;
  }

  private function getpath($nom)
  {
    return $this->directory.$this->type."/".$nom;
  }

  public function store($file, $nom = "")
  {
    $this->file = $file;
    if (file_exists($this->getpath($nom))) {
      return unlink($this->getpath($nom));
    } else {
      $path = $this->getpath($this->generateToken()).".".$file['type'];
      return move_uploaded_file($file['image']['tmp_name'], $path);
    }
  }

  public function thumbGen($width)
  {
    $size = getimagesize($this->file['image']['tmp_name']);
    $ratio = $size[0]/$size[1];
    if( $ratio > 1) {
        $height = $width/$ratio;
    }
    else {
        $width = $width*$ratio;
        $height = $width;
    }
    if ($width < $size[0]) {
      $src = imagecreatefromstring(file_get_contents($this->file['image']['tmp_name']));
      $dst = imagecreatetruecolor($width,$height);
      imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
      switch ($this->file['type']) {
        case 'jpg':
          imagejpeg($dst,$this->getpath($this->generateToken().".".$this->file['type']));
          break;
        case 'png':
          imagepng($dst,$this->getpath($this->generateToken().".".$this->file['type']));
          break;

        default:
          imagepng($dst,$this->getpath($this->generateToken().".".$this->file['type']));
          break;
      }
    }
  }

}
