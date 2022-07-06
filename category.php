<?php
require_once 'includes/config.php';
require_once 'includes/headers.php';
require "verif_auth.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') :
    // Requetes SQL pour UNE categorie
    if (isset($_GET['id'])) :
        // Selection de la catégorie (ID)
        $sql_category = "SELECT id, name FROM `category` WHERE `id` = " . $_GET['id'];

        // Selection des produits avec l'ID de la catégorie
        $sql_product = "SELECT id, name FROM `product` WHERE `id_category` = " . $_GET['id'];
        $result_product = $connect->query($sql_product);

    // Requete SQL TOUTES les categories
    else :
        $sql_category = "SELECT * FROM `category`";
    endif;

    // Execution requete SQL
    $result_category = $connect->query($sql_category);
    echo $connect->error;

    // SI ON CIBLE 1 SEULE CATEGORIE
    if (isset($_GET['id'])) :
        // Si des résultats sont retournés
        if ($result_category->num_rows > 0) :
            $responseJSON['response'] = "A category with its products";
            $response_category = $result_category->fetch_all(MYSQLI_ASSOC);
            $responseJSON['category_id'] = $response_category[0]['id'];
            $responseJSON['category_name'] = $response_category[0]['name'];
            $responseJSON['products'] = $result_product->fetch_all(MYSQLI_ASSOC);
            $responseJSON['hits'] = $result_product->num_rows;
            $responseJSON['code'] = 200;
        else :
            $responseJSON['response'] = "Category not found";
            $responseJSON['code'] = 404;
        endif;

    // SI TOUTES LES CATEGORIES
    else :
        // Si des résultats sont retournés
        if ($result_category->num_rows > 0) :
            $responseJSON['response'] = "List of categories";
            $responseJSON['categories'] = $result_category->fetch_all(MYSQLI_ASSOC);
            $responseJSON['code'] = 200;
            $responseJSON['hits'] = $result_category->num_rows;
        else :
            $responseJSON['response'] = "Category not found";
            $responseJSON['code'] = 404;
        endif;
    endif;

    $responseJSON['date'] = date('Y-m-d,H:i:s');
endif;

// Génération du JSON
echo json_encode($responseJSON);

exit;
