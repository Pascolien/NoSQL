
<?php require ('user.class.php'); ?>
<a href='index.php'>Accueil</a>
<a href='users.php'>Ajouter un utilisateur</a>
<a href='import.php'>Importer via un CSV</a>
<br><br>
<?php
 

extract(filter_input_array(INPUT_POST));
$fichier=$_FILES["userfile"]["name"];
    if($fichier){
        //ouverture du fichier temporaire
        $fp = fopen ($_FILES["userfile"]["tmp_name"],"r");
    }else{
        //fichier inconnu 
?>
    <p align="center" >- Importation echouee -</p>
    <p align="center" >-<B>Desole, mais vous n'avez pas specifie de chemin valide ...</B></p>
<?php exit();
    }
    $cpt=0;
?>
<p align="center">- Importation Reussie -</p>
<?php // importation
    while (!foef($fp)){
        $ligne = fgets($fp,4096);
        ///on crée un tableau des éléments séparés par des points virgule
        $liste = explode(";",$ligne);
        $table = filter_input(INPUT_POST,'userfile');

      //1er éléments
        $liste[0] = (isset($liste[0])) ? $liste[0] : Null;
        $liste[1] = (isset($liste[1])) ? $liste[1] : Null;
        $liste[2] = (isset($liste[2])) ? $liste[2] : Null;
        $liste[3] = (isset($liste[3])) ? $liste[3] : Null;      
        $champs1 = $liste[0];
        $champs2 = $liste[1];
        $champs3 = $liste[2];
        $champs4 = $liste[3];
        if($champ1!='')
        {
          $cpt++;
          $db =   
          // Appel de la connexion
          require_once('mongodb.php');

            # [Conditions modification / ajout]
            if (isset($_POST) && !empty($_POST)) {

                if (isset($_POST['user_id'])) {
                    $id      = new MongoId($_POST['user_id']);
                    $newdata = array('$set' => array('firstname' => $_POST['firstname'],
                                                    'lastname'  => $_POST['lastname']));
                    $c_users->insert(array('firstname' => $_POST['firstname'],
                                        'lastname'  => $_POST['lastname']));
                    }
                }    
            }}
        //fermeture du fichier
         fclose($fp);
        ?>

