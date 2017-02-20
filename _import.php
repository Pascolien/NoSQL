<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
require ('user.class.php');
require ('barcode.php');
/*****************************
*  Structure de $final_row
* prenom
* nom
* CP
* latitude
* longitude
* bureau
*****************************/
if (isset($_FILES['file'])) {
  if (isset($_FILES['file']['tmp_name'])){
    $csv = $_FILES['file']['tmp_name'];
    $file = fopen($csv, "a+");
    $final_row = [];
    $i = 0;
    while($tab=fgetcsv($file, 1024, ';'))
    {
      // on ne lit pas la première ligne car c'est le header dy fichier
      if ($i > 0) {
        $champs = count($tab);
        $row = array();
        for($i=0; $i<$champs; $i ++)
        {
          $row[] = $tab[$i];
        }
        $final_row[] = $row;
      }
      $i ++;
    }

    // sauvegarde du tableau en base
    foreach ($final_row as $row) {
      $id = $row[0];
      $prenom = $row[1];
      $nom = $row[2];
      $cp = $row[3];
      $latitude = $row[4];
      $longitude = $row[5];
      $bureau = $row[6];

      $u = new User();
      // TODO INSERER L'ID ?
      $u->add($prenom, $nom, $cp, $latitude, $longitude, $bureau);
    }

    fclose($file);

    // creation des codes barre
    $u = new User();
    $all = $u->getAll();
    foreach ($all as $a) {
      $filename = $a['_id']; // filename = ID
      $data = randStrGen(12); // 12 caracteres
      CodeBarre::create($data, $filename);
    }

    echo "<div class='alert alert-success'><strong>Données importées avec succès</div>";
    // timer 1 seconde
    header("Refresh: 1;url=index.php");
  }
} else {
  echo "<div class='alert alert-warning'><strong>Pas de fichier uploadé !</div>";
  // timer 1 seconde
  header("Refresh: 1;url=index.php");
}

function randStrGen($len){
    $result = "";
    $chars = "0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++) {
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}
