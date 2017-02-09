<?php
require ('user.class.php');


echo "
<a href='index.php'>Accueil</a>
<a href='users.php'>Ajouter un utilisateur</a>
<a href='import.php'>Importer via un CSV</a>
<br><br>";

$u = new User();
$users = $u->getAll();
$count_users = $u->countAll();

if ($count_users > 0) {
    echo '<p>' . $count_users . ' utilisateur(s) : </p>';
    echo '<table border=1>';
    echo '<tr>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Code postal</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Bureau de distribution</th>
      <th colspan=2 ><a href="traitements.php?deleteAll=1">Supprimer tout</a></th>
    </tr>';
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

} else {
   echo "Aucun enregistrement";
}


 ?>
