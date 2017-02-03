<?php
    if ( ! class_exists('Mongo')) {
        echo "<h1>Le driver Mongo n'est pas installé sur ce serveur :(</h1>";
    } else {

        try {
            // Ouverture de la connexion
            $mongo = new MongoClient('mongodb://localhost');

            // Sélection de la database "test"
            $db = $mongo->selectDB("test");

            // Sélection de la collection "Users"
            $c_users = new MongoCollection($db, "Users");

            // Obtenir tous les utilisateurs
            $get_users = $c_users->find();

            // Obtenir le nombre d'utilisateurs
            $count_users = $c_users->count();

            // Fermeture de la connexion
            $mongo->close();

        } catch (MongoConnectionException $exception) {
            echo "<h1>Impossible de se connecter au serveur MongoDB :(</h1>";
        }
    }
?>
