<?php

/**
 *
 */
class Mail
{
  private $destinataire;
  private $sujet;
  private $path;
  private $content;

  public function __construct($destinataire, $sujet, $modele)
  {
    $this->destinataire = $destinataire;
    $this->sujet = $sujet;
    $this->path = $modele;
  }

  public function render($param)
  {
    ob_start();
    extract($param);
    include "assets/mailtemplate/{$this->path}";
    $this->content = ob_get_contents();
    ob_end_clean();
    // var_dump($this->mo);
  }

  public function send()
  {
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: Dynamo <contact@webmaster.com>' . "\r\n";
    return mail($this->destinataire, $this->sujet, $this->content, $headers);
  }

}
