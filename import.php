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



<?php require ('user.class.php'); ?>
<div class="btn-group">
    <a href='index.php'class="btn btn-primary">Accueil</a>
    <a href='users.php'class="btn btn-primary">Ajouter un utilisateur</a>
    <a href='import.php'class="btn btn-primary">Importer via un CSV</a>
<br><br>
</div>

<form action="_import.php" method="post" enctype="multipart/form-data" class="form-horizontal"role="form">
<div class="form-group">
    <label class="col-sm-2 control-label">Votre fichier CSV (10Mo max): </label> <br/>
    <div class="col-sm-5">
     <input type="file"   id="file"  class="form-control-file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
     <input type="hidden"   name="MAX_FILE_SIZE" value="10000000">
     <br/>
     </div>
</div>
     <input type="submit" class="btn btn-primary"value="Importer">
</form>
 </body>
 </html>