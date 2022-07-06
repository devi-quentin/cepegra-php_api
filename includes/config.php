<?php
// Données de connexion à la base de données
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'ingrwf10_php');

// Mode de production
define('MODE', 'dev'); // dev or prod

// Connexion à la base de données
$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connect->connect_error) :
    die('Connexion échouée: ' . $connect->connect_error);
else :
    $connect->set_charset('utf8');
endif;

// Importation des scripts php
require_once 'functions.php';
