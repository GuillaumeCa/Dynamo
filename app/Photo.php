<?php

require_once 'app/Database.php';

/**
 *
 */
class Photo extends Database
{
  private $type;
  private $file;
  private $directory = "assets/images/";
  public $path;

  public function __construct($type)
  {
    $this->type = $type;
  }

  private function getpath($nom)
  {
    return $this->directory.$this->type."/".$nom;
  }

  public function store($file, $replace = false,  $nom = "")
  {
    $this->file = $_FILES[$file];
    if ($replace) {
      unlink($nom);
      $this->path = $this->getpath($this->generateToken()).".".explode('image/', $this->file['type'])[1];
      return move_uploaded_file($this->file['tmp_name'], $this->path);
    } else {
      $this->path = $this->getpath($this->generateToken()).".".explode('image/', $this->file['type'])[1];
      return move_uploaded_file($this->file['tmp_name'], $this->path);
    }
  }

  public function thumbGen($width)
  {
    $size = getimagesize($this->file['tmp_name']);
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
