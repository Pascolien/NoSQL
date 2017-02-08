<?php
require ('user.class.php');

echo "
<a href='index.php'>Accueil</a>
<a href='users.php'>Ajouter un utilisateur</a>
<a href='import.php'>Importer via un CSV</a>
<br><br>";

// edition
if (isset($_GET['edit']) && !empty($_GET['edit'])) {
  $id_edit = $_GET['edit'];
  $u = new User();
  $get_user = $u->get($id_edit);

  ?>


  <form action="traitements.php" method="POST" />
   <div class="form-group">
      <label for="prenom"  class="col-sm-2 control-label">Prenom</label>
      <br />
      <div class="col-sm-10">
      <input type="text" id="prenom" name="prenom" value="<?php echo $get_user['prenom']; ?>" required />
      </div>
      <br /><label for="nom">Nom</label>
      <br /><input type="text" id="nom" name="nom" value="<?php echo $get_user['nom']; ?>" required />

      <br /><label for="cp">Code postal</label>
      <br /><input type="text" id="cp" name="cp" value="<?php echo $get_user['cp']; ?>" required />

      <!-- LATITUDE AUTO ? -->
      <!-- LONGITUDE AUTO ? -->

      <br /><label for="cp">Bureau</label>
      <br /><input type="text" id="bureau" name="bureau" value="<?php echo $get_user['bureau']; ?>" required />

      <input type="hidden" name="id_update" value="<?php echo $id_edit; ?>" />
      <br /><input type="submit" value="Envoyer" />
  </form>

  <?php


// ajout
} else {
?>

  <form action="traitements.php" method="POST" />
      <label for="prenom">Prenom</label>
      <br /><input type="text" id="prenom" name="prenom" value="" required />

      <br /><label for="nom">nom</label>
      <br /><input type="text" id="nom" name="nom" value="" required />

      <br /><label for="cp">Code postal</label>
      <br /><input type="text" id="cp" name="cp" value="" required />

      <!-- LATITUDE AUTO ? -->
      <!-- LONGITUDE AUTO ? -->

      <br /><label for="bureau">Bureau</label>
      <br /><input type="text" id="bureau" name="bureau" value="" required />


      <br /><input type="submit" value="Envoyer" />
  </form>

<?php
}

 ?>
