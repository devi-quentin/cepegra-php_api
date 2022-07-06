<?php
require_once 'includes/config.php';
require_once 'includes/headers.php';
require "verif_auth.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') :
    // Requete SQL pour UN produit
    if (isset($_GET['id'])) :
        $req_product = "SELECT product.name, product.price, category.name AS category_name FROM product INNER JOIN category ON product.id_category = category.id WHERE product.id = " . $_GET['id'];

    // Requete SQL pour TOUS les produits
    else :
        $req_product = "SELECT product.name, product.price, category.name AS category_name FROM product INNER JOIN category ON product.id_category = category.id";
    endif;

    // Execution requete SQL
    $res = $connect->query($req_product);
    echo $connect->error;

    // Si des résultats sont retournés
    if ($res->num_rows > 0) :
        $response_api['response'] = "List of products";
        $response_api['products'] = $res->fetch_all(MYSQLI_ASSOC);
        $response_api['code'] = 200;
        $response_api['total'] = $res->num_rows;

    // Si aucun résultats
    else :
        $response_api['response'] = "Product not found";
        $response_api['code'] = 404;
    endif;

    $response_api['date'] = date('Y-m-d,H:i:s');
endif;

// Génération du JSON
echo json_encode($response_api);

exit;
