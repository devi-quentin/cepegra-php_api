<?php
// Si déconnexion
if (isset($_GET['delog'])) :
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['token']);
    unset($_SESSION['expiration']);
    $response['response'] = "deconnection";
    $response['date'] = date('Y-m-d,H:i:s');
    $response['code'] = 200;
    echo json_encode($response);
    exit;
endif;

// Quand on veut se connecter

include_once 'includes/config.php';

// Lecture et décodage du json dans la requete http
$json = file_get_contents('php://input');
$arrayPOST = json_decode($json, true);

// Requete SQL
$sql = sprintf(
    "SELECT * FROM users WHERE login = '%s' AND password = '%s'",
    $arrayPOST['login'],
    $arrayPOST['password']
);
$res = $connect->query($sql);
echo $connect->error;

// Si la requete SQL retourne un résultat
if ($res->num_rows > 0) :
    $user = $res->fetch_assoc();
    session_start();
    $_SESSION['user'] = $user['id_users'];
    $_SESSION['token'] = md5($user['login'] . time());
    $_SESSION['expiration'] = time() + 1 * 60;
    $response['response'] = "Connecté";
    $response['token'] = $_SESSION['token'];
else :
    $response['response'] = "Login et/ou mot de passe incorrecte";
    $response['code'] = 403;
endif;

$response['code'] = (isset($response['code']) ? $response['code'] : 200);
$response['date'] = date('Y-m-d,H:i:s');
echo json_encode($response);
