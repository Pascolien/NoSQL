<?php
require ('user.class.php');

if (isset($_GET['delete']) && !(empty($_GET['delete']))) {

  $id = new MongoId($_GET['delete']);

  $u = new User();

  $u->delete($id);
  header('Location: index.php');
  exit;

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
    $u->update($id_update, $prenom, $nom, $cp, $latitude, $longitude, $bureau);

  } else {
    // save ajout
    $u->add($prenom, $nom, $cp, $latitude, $longitude, $bureau);
  }

  header('Location: index.php');
  exit;


}


 ?>
