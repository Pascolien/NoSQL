<?php require ('user.class.php'); ?>

<a href='index.php'>Accueil</a>
<a href='users.php'>Ajouter un utilisateur</a>
<a href='import.php'>Importer via un CSV</a>
<br><br>


<form action="_import.php">
<label>Votre fichier CSV: </label> <br> <input type="file" id="file" required>
<input type="submit" value="Importer">
</form>
