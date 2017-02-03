<?php
require ('user.class.php');

$u = new User();
$users = $u->getAll();
$count_users = $u->countAll();

echo '<a href="users.php">Ajouter un utilisateur</a>';
if ($count_users > 0){
    echo '<p>' . $count_users . ' utilisateur(s) : </p>';
    echo '<table>';
    echo '<tr><th>firstname</th><th>lastname</th><th></th><th></tr>';
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

}


 ?>
