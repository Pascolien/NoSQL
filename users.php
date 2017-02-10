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
$show_only_invalide = 0;
if (isset($_GET['invalide']) && $_GET['invalide'] == 1) {
  $show_only_invalide = 1;
}

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
  <br><br><br>
  <h3 style="text-align:center;">Mise à jour d'un enregistrement</h3>
  <br><br>

  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-2">
      <form action="traitements.php" method="POST" class="form-horizontal" role="form" style="text-align:center;"/>
       <div class="form-group">
          <label for="prenom"  class="col-sm-2 control-label">Prenom</label>
          <div class="col-sm-5">
          <input type="text" id="prenom" class="form-control"  name="prenom" value="<?php echo $get_user['prenom']; ?>" required />
          </div>
        </div>
        <div class="form-group">
            <label for="nom"  class="col-sm-2 control-label">Nom</label>
            <div class="col-sm-5">
            <input type="text" id="nom" class="form-control"  name="nom" value="<?php echo $get_user['nom']; ?>" required />
          </div>
          </div>
          <div class="form-group">
            <label for="cp"  class="col-sm-2 control-label">Code postal</label>
            <div class="col-sm-5">
            <input type="text" id="cp" class="form-control"  name="cp" value="<?php echo $get_user['cp']; ?>" required />
              </div>
          </div>

          <div class="form-group">
            <div class="col-sm-5">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="enable_geolocalisation" id="enable_geolocalisation">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Utiliser ma position actuelle</span>
              </label>
            </div>
          </div>

          <span class="to_hide">
            <div class="form-group">
              <label for="cp"  class="col-sm-2 control-label">Latitude</label>
              <div class="col-sm-5">
              <input type="text" id="latitude" class="form-control"  name="latitude" value="<?php echo $get_user['latitude']; ?>" />
                </div>
            </div>
            <div class="form-group">
              <label for="cp"  class="col-sm-2 control-label">Longitude</label>
              <div class="col-sm-5">
              <input type="text" id="longitude" class="form-control"  name="longitude" value="<?php echo $get_user['longitude']; ?>" />
                </div>
            </div>
          </span>
           <div class="form-group">
            <label for="cp" class="col-sm-2 control-label">Bureau</label>
            <div class="col-sm-5">
              <input type="text" id="bureau"  class="form-control" name="bureau" value="<?php echo $get_user['bureau']; ?>" required />
            </div>
          </div>

          <input type="hidden" name="id_update" value="<?php echo $id_edit; ?>" />
          <br />
           <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <input type=hidden name="invalide" value=<?php echo $show_only_invalide;?>>
             <input type="submit" class="btn btn-primary" value="Envoyer" />
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
  <?php


// ajout
} else {
?>
<br><br><br>
<h3 style="text-align:center;">Ajout d'un enregistrement</h3>
<br><br>

<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-2">
      <form action="traitements.php" method="POST" class="form-horizontal" role="form" style="text-align:center;"/>
        <div class="form-group">
          <label for="prenom"  class="col-sm-2 control-label">Prenom</label>

            <div class="col-sm-5">
              <input type="text" class="form-control" id="prenom" name="prenom" value="" required />
            </div>
          </div>

          <div class="form-group">
            <label for="nom"  class="col-sm-2 control-label">nom</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="nom" name="nom" value="" required />
            </div>
          </div>
          <div class="form-group">
            <label for="cp"  class="col-sm-2 control-label">Code postal</label>

            <div class="col-sm-5">
            <input type="text" class="form-control" id="cp" name="cp" value="" required />
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-5">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="enable_geolocalisation" id="enable_geolocalisation">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Utiliser ma position actuelle</span>
              </label>
            </div>
          </div>

          <span class="to_hide">
            <div class="form-group">
              <label for="cp" class="col-sm-2 control-label">Latitude</label>
              <div class="col-sm-5">
                <input type="text" id="latitude" class="form-control"  name="latitude" value="" />
              </div>
            </div>
            <div class="form-group">
              <label for="cp" class="col-sm-2 control-label">Longitude</label>
              <div class="col-sm-5">
                <input type="text" id="longitude" class="form-control"  name="longitude" value="" />
              </div>
            </div>
          </span>

          <div class="form-group">
            <label for="bureau"  class="col-sm-2 control-label">Bureau</label>
            <div class="col-sm-5">
              <input type="text" id="bureau" class="form-control" name="bureau" value="" required />
            </div>
          </div>
          <br />
          <div class="offset-sm-2 col-sm-10">
            <input type=hidden name="invalide" value=<?php echo $show_only_invalide;?>>
           <input type="submit" class="btn btn-primary" value="Envoyer" />
          </div>
      </form>
    </div>
  </div>
</div>
<?php
}

 ?>
 <script>
 $( document ).ready(function() {
   $("#enable_geolocalisation").change(function() {
     if($(this).is(":checked")) {
         function maPosition(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            $("#latitude").val(lat);
            $("#longitude").val(long);
          }
          if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(maPosition);
          }
     }
  });
});
 </script>
 </body>
 </html>
