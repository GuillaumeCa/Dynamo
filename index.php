<?php

session_start();
require 'app/Router.php';

$routeur = new Router();
$routeur->getPage();
$routeur->routerRequete();
