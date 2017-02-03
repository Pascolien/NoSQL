<?php
    // Appel de la connexion
    require_once('mongodb.php');

    // Cas d'une édition
    if ( isset($_GET['edit']) && !empty($_GET['edit']) ) {
        // Récupération de l'ObjectID au format ...
        $id       = new MongoId($_GET['edit']);
        // Lecture du document concerné
        $get_user = $c_users->findOne(array("_id" => $id));
    }

    if ( isset($_GET['edit']) && !empty($_GET['edit']) && !isset($get_user) ) {
        echo "Impossible de modifier cet utilisateur car il n'existe plus ou n'a jamais existé";
    } else {
?>
<form action="users.php" method="POST" />
    <label for="firstname">Firstname</label>
    <br /><input type="text" id="firstname" name="firstname" value="<?php if (isset($_GET['edit']) && !empty($_GET['edit'])) echo $get_user['firstname']; ?>" required />
    <br /><label for="lastname">Lastname</label>
    <br /><input type="text" id="lastname" name="lastname" value="<?php if (isset($_GET['edit']) && !empty($_GET['edit'])) echo $get_user['lastname']; ?>" required />
    <?php if (isset($_GET['edit']) && !empty($_GET['edit'])) { ?>
        <input type="hidden" name="user_id" value="<?php echo $id; ?>" />
    <?php }; ?>
    <br /><input type="submit" value="Envoyer" />
</form>
<?php
    }
?>
