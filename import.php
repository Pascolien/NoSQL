<?php require ('user.class.php'); ?>

<a href='index.php'>Accueil</a>
<a href='users.php'>Ajouter un utilisateur</a>
<a href='import.php'>Importer via un CSV</a>
<br><br>


<form action="_import.php" method="post" enctype="multipart/form-data">
<label>Votre fichier CSV (10Mo max) : </label> <br> <input type="file" id="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
<input type="submit" value="Importer">
</form>
