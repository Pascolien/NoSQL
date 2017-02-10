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
.row{
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
    </style>
<body>

<?php
require ('user.class.php');

echo '<div class="btn-group">
        <a href="index.php" class="btn btn-primary">Accueil</a>
        <a href="users.php" class="btn btn-primary">Ajouter un utilisateur</a>
        <a href="import.php" class="btn btn-primary">Importer via un CSV</a>
        <a href="traitements.php?deleteAll=1" class="btn btn-primary">Supprimer tout</a>
        <br><br>
    </div>';
$u = new User();
$users = $u->getAll();
$count_users = $u->countAll();

if ($count_users > 0) {
?>

<div class="container">
      <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $count_users;?> enregistrements</h3>
            <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                <i class="glyphicon glyphicon-filter"></i>
              </span>
            </div>
          </div>
          <div class="panel-body">
            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($users as $user) {
                  echo '<tr>';
                  echo '<td>' . $user['_id'] . '</td>';
                  echo '<td>' . $user['prenom'] . '</td>';
                  echo '<td>' . $user['nom'] . '</td>';
                  echo '<td>' . $user['cp'] . '</td>';
                  echo '<td>' . $user['latitude'] . '</td>';
                  echo '<td>' . $user['longitude'] . '</td>';
                  echo '<td>' . $user['bureau'] . '</td>';
                  echo '<td><a href="users.php?edit=' . $user['_id'] . '"class="btn btn-secondary">Modifier</td>';
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
