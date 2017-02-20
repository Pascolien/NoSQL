<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="function_table.js"></script>
</head>
<style>
.row {
		    margin-top:40px;
		    padding: 0 10px;
		}
		.clickable{
		    cursor: pointer;
		}

		.panel-heading div {
			margin-top: -18px;
			font-size: 15px;
		}
		.panel-heading div span{
			margin-left:5px;
		}
		.panel-body{
			display: none;
		}
    td:empty{
      background: rgba(217, 83, 79, 0.51);
    }
    </style>
<body>

<?php
require ('user.class.php');

$show_only_invalide = 0;
if (isset($_GET['invalide']) && $_GET['invalide'] == 1) {
  $show_only_invalide = 1;
}
?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Outil de migration</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li <?php if ($show_only_invalide == 0) { echo "class=active";} ?>><a href="index.php">Tous les enregistrements</a></li>
        <li <?php if ($show_only_invalide == 1) { echo "class=active";} ?>><a href="index.php?invalide=1">Liste des enregistrements invalides</a></li>
        <li><a href="users.php">Ajouter un utilisateur</a></li>
        <li class=""><a href="import.php">Importer via un CSV</a></li>
        <li><a href="codebarre.php">Générer les codes barre manquants</a></li>
        <li><a href="traitements.php?deleteAll=1">Tout supprimer</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>
<br><br><br>

<?php

$u = new User();
$users = $u->getAll();
$count_users = $u->countAll();

if ($count_users > 0) {
  // on compte le nombre d'enregistrements qu'il nous reste à renseigner
  $todo = 0;
  foreach ($users as $user) {
    if ($user['cp'] == '' || $user['latitude'] == '' || $user['longitude'] == '' || $user['bureau'] == '') {
      $todo++;
    }
  }
    // on affiche tous les enregistrements, même les invalides
  if ($show_only_invalide == false) {
    $message = "$count_users enregistrements ( <span style=text-decoration:underline;>dont <a style='text-decoration:none;color:white;' href='?invalide=1'>$todo invalides</a></span> )";

    // on n'affiche que les invalides
  } else if ($show_only_invalide == true) {
    $users = $u->getAllInvalides();
    $count_users = $u->countAllInvalides();
    $count_users_total = $u->countAll();
    $message = "$count_users enregistrements invalides ( sur $count_users_total ) <a style=text-decoration:underline; href='index.php'>Retour vers la liste complète</a>";
  }

?>

<div class="container">
      <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $message; ?></h3>
            <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Filtrer" data-container="body">
                <i class="glyphicon glyphicon-filter"></i>
              </span>
            </div>
          </div>
          <div class="panel-body">
            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Votre filtre" />
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Code postal</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Bureau de distribution</th>
                <th>Code barre</th>
                <th colspan=2></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($users as $user) {
                  $codebarre = "&nbsp;";
                  if (file_exists('images/' . $user['_id'] . '.png')) {
                    $filename = $user['_id'];
                    $codebarre = "<img src = 'images/$filename.png'/>";
                  }
                  echo '<tr>';
                  echo '<td>' . $user['_id'] . '</td>';
                  echo '<td>' . $user['prenom'] . '</td>';
                  echo '<td>' . $user['nom'] . '</td>';
                  echo '<td>' . $user['cp'] . '</td>';
                  echo '<td>' . $user['latitude'] . '</td>';
                  echo '<td>' . $user['longitude'] . '</td>';
                  echo '<td>' . $user['bureau'] . '</td>';
                  echo "<td>$codebarre</td>";
                  echo '<td><a href="users.php?edit=' . $user['_id'] . '&invalide=' . $show_only_invalide . ' "class="btn btn-secondary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>';
                  echo '<td><a href="traitements.php?delete=' . $user['_id'] . '&invalide=' . $show_only_invalide . ' "class="btn btn-secondary"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td>';
                  echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

<?php
// aucun enregistrements
} else {
?>

<div class="container">
      <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $count_users;?> enregistrements</h3>
            <div class="pull-right">
            </div>
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>

<?php
}


 ?>
</body>

</html>
