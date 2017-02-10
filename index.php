<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<?php
require ('user.class.php');


echo '<div class="btn-group">
        <a href="index.php" class="btn btn-primary">Accueil</a> 
        <a href="users.php"class="btn btn-primary">Ajouter un utilisateur</a> 
        <a href="import.php"class="btn btn-primary">Importer via un CSV</a> 
        <br><br>
    </div>';
$u = new User();
$users = $u->getAll();
$count_users = $u->countAll();

if ($count_users > 0) {

    echo '<div class="container">';
    echo '<p>' . $count_users . ' utilisateur(s) : </p>';
    echo '<table border=1 class="table">';
    echo '<thead>';
    echo '<tr>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Code postal</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Bureau de distribution</th>
      <th colspan=2 ><a href="traitements.php?deleteAll=1">Supprimer tout</a></th>
    </tr>';
    echo '</thead>';
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>' . $user['prenom'] . '</td>';
        echo '<td>' . $user['nom'] . '</td>';
        echo '<td>' . $user['cp'] . '</td>';
        echo '<td>' . $user['latitude'] . '</td>';
        echo '<td>' . $user['longitude'] . '</td>';
        echo '<td>' . $user['bureau'] . '</td>';
        echo '<td><a href="users.php?edit=' . $user['_id'] . '">Modifier</td>';
        echo '<td><a href="traitements.php?delete=' . $user['_id'] . '">Supprimer</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo'</div>';

} else {
   echo "Aucun enregistrement";
}


 ?>
</body>
</html>