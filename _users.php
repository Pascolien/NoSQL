<?php
    // Appel de la connexion
    require_once('mongodb.php');

    # [Conditions modification / ajout]
    if (isset($_POST) && !empty($_POST)) {

        if (isset($_POST['user_id'])) {
            $id      = new MongoId($_POST['user_id']);
            $newdata = array('$set' => array('firstname' => $_POST['firstname'],
                                             'lastname'  => $_POST['lastname']));
            $c_users->update(array("_id" => $id), $newdata);
        } else {
            $c_users->insert(array('firstname' => $_POST['firstname'],
                                   'lastname'  => $_POST['lastname']));
        }

        header('Location: users.php');
        exit;
    }

    # [Suppression]
    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
        $id = new MongoId($_GET['delete']);
        $c_users->remove(array('_id' => $id));
        header('Location: users.php');
        exit;
    }

    # [Tableau des données]
    if (isset($count_users)) {

        echo '<a href="form_users.php">Ajouter un utilisateur</a>';
        if ($count_users > 0){
            echo '<p>' . $count_users . ' utilisateur(s)</p>';
            echo '<table>';
            echo '<tr><th>firstname</th><th>lastname</th><th></th><th></tr>';
            foreach ($get_users as $user) {
                echo '<tr>';
                echo '<td>' . $user['firstname'] . '</td>';
                echo '<td>' . $user['lastname'] . '</td>';
                echo '<td><a href="form_users.php?edit=' . $user['_id'] . '">Modifier</td>';
                echo '<td><a href="users.php?delete=' . $user['_id'] . '">Supprimer</td>';
                echo '</tr>';
            }
            echo '</table>';

        } else {
            echo "Pas d'utilisateurs";
        }

    }
?>
