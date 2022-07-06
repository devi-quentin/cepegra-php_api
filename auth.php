<?php
// Si déconnexion
if (isset($_GET['delog'])) :
    session_start();
    unset($_SESSION['user']);    
    unset($_SESSION['token']);
    header('location:auth.php');
    exit;
endif;

include_once 'includes/config.php';

if (isset($_POST['ident'])) :
    $sql = sprintf(
        "SELECT * FROM users WHERE login = '%s' AND password = '%s'",
        $_POST['login'],
        $_POST['password']
    );
    $res = $connect->query($sql);
    echo $connect->error;

    if ($res->num_rows > 0) :
        $user = $res -> fetch_assoc();
        session_start();
        $_SESSION['user'] = $user['id_users'];
        $_SESSION['token'] = md5($user['login'].time());
        header('location:secure.php');
        exit;
    else :
        echo "Login incorrecte";
    endif;
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qui suis-je ?</title>
    <style>
        html {
            padding: 1rem;
        }

        form {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="login" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="hidden" name="ident">
        <button>S'identifier</button>
    </form>
</body>

</html>