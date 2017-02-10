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

<br><br><br>
<h3 style="text-align:center;">Import d'un fichier CSV</h3>
<br><br>

<div class="container">
  <div class="row">
      <div class="col-sm-10 col-sm-offset-3">
        <form action="_import.php" method="post" enctype="multipart/form-data" class="form-horizontal"role="form" style="text-align:center;">
          <div class="form-group">
              <label for="file" class="col-sm-2 control-label">Votre fichier CSV </label>
              <div class="col-sm-5">
               <input type="file"   id="file"  class="form-control-file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
               </div>
          </div>
          <br>
          <div class="offset-sm-3 col-sm-7">
          <input  type="submit" class="btn btn-primary"value="Importer">
        </div>
        </form>
    </div>
  </div>
</div>
 </body>
 </html>
