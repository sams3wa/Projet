<?php

require 'services/db.php';
require 'services/routing.php';
require 'view/layout.html';

$pdoRequest = getConnect();
$pdoRequest = $pdo->query("SELECT * FROM maximilienmbaye_projetFramework'");
$pdoRequest -> execute();


