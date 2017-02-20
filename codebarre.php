<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
require ('barcode.php');
require ('user.class.php');

// on vide /images
$dossier="images";
$ouverture=opendir($dossier);
$fichier=readdir($ouverture);
$fichier=readdir($ouverture);
while ($fichier=readdir($ouverture)) {
  if ($fichier != '.gitignore') {
    unlink("$dossier/$fichier");
  }
}
closedir($ouverture);

// get all
$u = new User();
$all = $u->getAll();

foreach ($all as $a) {
  $filename = $a['_id']; // filename = ID
  $data = randStrGen(12); // 12 caracteres
  CodeBarre::create($data, $filename);
}

echo "<div class='alert alert-success'><strong>Codes barre générés</div>";
header("Refresh: 1;url=index.php");


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

?>
