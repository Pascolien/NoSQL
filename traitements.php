<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
require ('user.class.php');
require ('barcode.php');

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
  if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['cp']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['bureau'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $cp = $_POST['cp'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $bureau = $_POST['bureau'];

    $u = new User();
    if (isset($_POST['id_update'])) {
      // UPDATE
      $id_update = $_POST['id_update'];
      $u->update($id_update, $prenom, $nom, $cp, $latitude, $longitude, $bureau);

    } else {
      // AJOUT
      $u->add($prenom, $nom, $cp, $latitude, $longitude, $bureau);
    }


    // creation des codes barre
    $u = new User();
    $all = $u->getAll();
    foreach ($all as $a) {
      $filename = $a['_id']; // filename = ID
      $data = randStrGen(12); // 12 caracteres
      CodeBarre::create($data, $filename);
    }

      echo "<div class='alert alert-success'><strong>Les données ont été sauvegardées</div>";
  } else {
      echo "<div class='alert alert-warning'><strong>Paramètres manquants</div>";
  }

  if ($show_only_invalide == 1) {
    header("Refresh: 1;url=index.php?invalide=1");
  } else {
    header("Refresh: 1;url=index.php");
  }
  exit;


}

function randStrGen($len){
    $result = "";
    $chars = "0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++) {
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}

 ?>
