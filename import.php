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

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Outil de migration</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class=""><a href="index.php">Tous les enregistrements</a></li>
        <li class=""><a href="index.php?invalide=1">Liste des enregistrements invalides</a></li>
        <li><a href="users.php">Ajouter un utilisateur</a></li>
        <li class="active"><a href="import.php">Importer via un CSV</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>

<br><br><br><br>
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
