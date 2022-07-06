<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'GET') :
    $now = time();
    if (!isset($_SESSION['user']) or $now > $_SESSION['expiration']) :
        unset($_SESSION['user']);
        unset($_SESSION['token']);
        unset($_SESSION['expiration']);
        $response_api['response'] = "Token expiré";
        $response_api['code'] = 401;
        echo json_encode($response_api);
        die();
    else :
        $json = file_get_contents('php://input');
        $arrayPOST = json_decode($json, true);
        if ($arrayPOST['token'] != $_SESSION['token']) :
            $response_api['response'] = "Token incorrecte";
            $response_api['code'] = 401;
            echo json_encode($response_api);
            die();
        endif;
    endif;    
    $_SESSION['expiration'] = time() + 1 * 60;
endif;