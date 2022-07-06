<?php
// Importation scripts PHP
require_once 'includes/config.php';
require_once 'includes/headers.php';
require "verif_auth.php";

// --- PUT ---
if ($_SERVER['REQUEST_METHOD'] == 'PUT') :
    // Seulement si un parametre d'URL "id_personnes" est présent
    if (isset($_GET['id_personnes'])) :
        // Lecture du fichier PHP et décodage
        $json = file_get_contents('php://input');
        $object = json_decode($json);

        // Requete SQL
        $req = sprintf(
            "UPDATE personnes SET nom='%s', prenom='%s' WHERE id_personnes='%d'",
            $object->nom,
            $object->prenom,
            $_GET['id_personnes']
        );
        $connect->query($req);
        echo $connect->error;

        $response_api['response'] = "La personne a été modifiée";
    endif;
endif;

// --- POST ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    // Lecture du fichier PHP et décodage
    $json = file_get_contents('php://input');
    $object = json_decode($json);

    // Requete SQL
    $req = sprintf(
        "INSERT INTO personnes SET nom='%s', prenom='%s'",
        $object->nom,
        $object->prenom
    );
    $connect->query($req);
    echo $connect->error;

    $response_api['response'] = "Ajout d'une personne";
    $response_api['new_id'] = $connect->insert_id;
endif;

// --- GET ---
if ($_SERVER['REQUEST_METHOD'] == 'GET') :
    // Requete SQL
    if (isset($_GET['id_personnes'])) :
        $req = "SELECT * FROM `personnes` WHERE `id_personnes` = " . $_GET['id_personnes'];
    else :
        $req = "SELECT * FROM `personnes` ORDER BY nom, prenom";
    endif;

    // Execution requete SQL
    $res = $connect->query($req);
    echo $connect->error;

    // Récupération des personnes
    $response_api['data'] = $res->fetch_all(MYSQLI_ASSOC);
    $response_api['total'] = $res->num_rows;
    $response_api['response'] = "Success";
endif;

// --- DELETE ---
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') :
    // Requete SQL
    $req = sprintf(
        "DELETE FROM `personnes` WHERE `id_personnes` = %d",
        $_GET['id_personnes']
    );
    // Execution requete SQL
    $connect->query($req);

    $response_api['response'] = "Delete Success";
endif;

$response_api['code'] = 200;
$response_api['date'] = date('Y-m-d,H:i:s');

// Génération du JSON
echo json_encode($response_api);

exit;
