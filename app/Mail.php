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

  // Génère le mail à partir d'un modèle
  public function render($param=[])
  {
    ob_start();
    extract($param);
    include "assets/mailtemplate/{$this->path}";
    $this->content = ob_get_contents();
    ob_end_clean();
  }

  // Envoie le mail
  public function send()
  {
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: Dynamo <contact@webmaster.com>' . "\r\n";
    mb_internal_encoding( "UTF-8");
    $this->sujet = mb_encode_mimeheader($this->sujet);
    return mail($this->destinataire, $this->sujet, $this->content, $headers);
  }

}
