<?php
session_start();
if(!isset($_SESSION['user'])) :
    header('location:auth.php');
    exit;
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page sécurisée</title>
</head>

<body>
    <h1>Page sécurisée</h1>
    <a href="auth.php?delog">Se déconnecter</a>
</body>

</html>