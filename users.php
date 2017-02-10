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

// edition
if (isset($_GET['edit']) && !empty($_GET['edit'])) {
  $id_edit = $_GET['edit'];
  $u = new User();
  $get_user = $u->get($id_edit);

  ?>

  <div class="container">
  <form action="traitements.php" method="POST" class="form-horizontal" role="form"/>
   <div class="form-group">
      <label for="prenom"  class="col-sm-2 control-label">Prenom</label>
      <br />
      <div class="col-sm-5">
      <input type="text" id="prenom" class="form-control"  name="prenom" value="<?php echo $get_user['prenom']; ?>" required />
      </div>
    </div>
    <div class="form-group">
        <br /><label for="nom"  class="col-sm-2 control-label">Nom</label>
        <br />
        <div class="col-sm-5">
        <input type="text" id="nom" class="form-control"  name="nom" value="<?php echo $get_user['nom']; ?>" required />
      </div>
      </div>
      <div class="form-group">
        <br /><label for="cp"  class="col-sm-2 control-label">Code postal</label>
        <div class="col-sm-5">
        <br /><input type="text" id="cp" class="form-control"  name="cp" value="<?php echo $get_user['cp']; ?>" required />
      </div>
      </div>
      <!-- LATITUDE AUTO ? -->
      <!-- LONGITUDE AUTO ? -->
       <div class="form-group">
        <br /><label for="cp" class="col-sm-2 control-label">Bureau</label>
        <div class="col-sm-5">
          <br /><input type="text" id="bureau"  class="form-control" name="bureau" value="<?php echo $get_user['bureau']; ?>" required />
        </div>
      </div>
      
      <input type="hidden" name="id_update" value="<?php echo $id_edit; ?>" />
      <br />
       <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
         <input type="submit" class="btn btn-primary" value="Envoyer" />
        </div>
      </div>
  </form>
</div>
  <?php


// ajout
} else {
?>

  <form action="traitements.php" method="POST" class="form-horizontal" role="form"/>
    <div class="form-group">
      <label for="prenom"  class="col-sm-2 control-label">Prenom</label>
      <br />
        <div class="col-sm-5">
          <input type="text" class="form-control" id="prenom" name="prenom" value="" required />
        </div>
      </div>
      <br />
      <div class="form-group">
        <label for="nom"  class="col-sm-2 control-label">nom</label>
        <div class="col-sm-5">
          <br /><input type="text" class="form-control" id="nom" name="nom" value="" required />
        </div>
      </div>
      <div class="form-group">
        <br /><label for="cp"  class="col-sm-2 control-label">Code postal</label>
        <br/>
        <div class="col-sm-5">
        <input type="text" class="form-control" id="cp" name="cp" value="" required />
        </div>
      </div>
      <!-- LATITUDE AUTO ? -->
      <!-- LONGITUDE AUTO ? -->
      <div class="form-group">
        <br /><label for="bureau"  class="col-sm-2 control-label">Bureau</label>
        <br />
        <div class="col-sm-5">
          <input type="text" id="bureau" class="form-control" name="bureau" value="" required />
        </div>
      </div>

      <br /><input type="submit"  class="btn btn-primary" value="Envoyer" />
  </form>

<?php
}

 ?>
 </body>
 </html>