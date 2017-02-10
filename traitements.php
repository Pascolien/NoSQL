<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
require ('user.class.php');

$show_only_invalide = 0;
if (isset($_POST['invalide']) && $_POST['invalide'] == 1) {
  $show_only_invalide = 1;
} else if (isset($_GET['invalide']) && $_GET['invalide'] == 1) {
  $show_only_invalide = 1;
}

// delete
if (isset($_GET['delete']) && !empty($_GET['delete'])) {

  $id = new MongoId($_GET['delete']);

  $u = new User();

  $u->delete($id);
    echo "<div class='alert alert-success'><strong>Enregistrement supprimé</div>";
  if ($show_only_invalide == 1) {
    header("Refresh: 1;url=index.php?invalide=1");
  } else {
    header("Refresh: 1;url=index.php");
  }

  exit;

// delete all
} else if (isset($_GET['deleteAll']) && $_GET['deleteAll'] == 1) {
  $u = new User();
  $all = $u->getAll();
  foreach ($all as $user) {
    $u->delete($user['_id']);
  }
  echo "<div class='alert alert-success'><strong>Toutes les données ont été supprimées</div>";
  // timer 1 seconde
  header("Refresh: 1;url=index.php");
} else {
    // sauvegarde après add ou update
  if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['cp']) && isset($_POST['bureau'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $cp = $_POST['cp'];
    $bureau = $_POST['bureau'];
  }

  $u = new User();
  if (isset($_POST['id_update'])) {
    // save update
    $id_update = $_POST['id_update'];


    // TODO localisations
    $latitude = 'todo';
    $longitude = 'todo';

    $u->update($id_update, $prenom, $nom, $cp, $latitude, $longitude, $bureau);

  } else {
    // save ajout

    // TODO localisations
    $latitude = 'todo';
    $longitude = 'todo';


    $u->add($prenom, $nom, $cp, $latitude, $longitude, $bureau);
  }

  echo "<div class='alert alert-success'><strong>Les données ont été sauvegardées</div>";
  if ($show_only_invalide == 1) {
    header("Refresh: 1;url=index.php?invalide=1");
  } else {
    header("Refresh: 1;url=index.php");
  }
  exit;


}


 ?>
