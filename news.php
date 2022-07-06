<?php
require_once 'includes/config.php';
require_once 'includes/headers.php';

// PUT
if ($_SERVER['REQUEST_METHOD'] == 'PUT') :
    if (isset($_GET['id_news'])) :
        // Lecture du fichier PHP et décodage
        $json = file_get_contents('php://input');
        $object = json_decode($json);

        $req = sprintf(
            "UPDATE news SET titre='%s', contenu='%s' WHERE id='%d'",
            $object->titre,
            addslashes($object->contenu),
            $_GET['id_news']
        );
        $connect->query($req);
        echo $connect->error;
        $response_api['response'] = "La news a été modifiée";
    endif;
endif;

// POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
  // Lecture du fichier PHP et décodage
  $json = file_get_contents('php://input');
  $object = json_decode($json);

  $req = sprintf(
    "INSERT INTO news SET titre='%s', contenu='%s'",
    addslashes($object->titre),
    addslashes($object->contenu)
  );
  $connect->query($req);
  echo $connect->error;
  $response_api['response'] = "une news a été ajouté";
  $response_api['new_id'] = $connect->insert_id;
endif;

// METHOD GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') :
  // Requete SQL
  // Si on récupère 1 news
  if (isset($_GET['id_news'])) :
    $req = "SELECT * FROM `news` WHERE `id` = " . $_GET['id_news'];
  else :
    $req = "SELECT * FROM `news`";
  endif;

  // Execution requete SQL
  $res = $connect->query($req);
  echo $connect->error;

  // Si des résultats sont retournés
  if ($res->num_rows > 0) :
    $response_api['response'] = "Success";
    $response_api['data'] = $res->fetch_all(MYSQLI_ASSOC);
    $response_api['code'] = 200;
  else :
    $response_api['response'] = "Aucune news trouvée";
    $response_api['code'] = 404;
  endif;

  $response_api['total'] = $res->num_rows;
endif;

// METHOD DELETE
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') :
  // Requete SQL
  $req = sprintf(
    "DELETE FROM `news` WHERE `id` = %d",
    $_GET['id_news']
  );

  // Execution requete SQL
  $connect->query($req);

  $response_api['response'] = "Delete Success";
endif;

$response_api['date'] = date('Y-m-d,H:i:s');

// Génération du JSON
echo json_encode($response_api);

exit;
