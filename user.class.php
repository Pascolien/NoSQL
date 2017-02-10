<?php

class User {

  private $uri = 'mongodb://localhost';
  private $cnx;
  private $base;

  private $id;
  private $prenom;
  private $nom;
  private $cp;
  private $latitude;
  private $longitude;
  private $bureau;

  private $c_users;



  public function __construct() {
    $this->connect();

    $this->c_users = new MongoCollection($this->base, "Users");
  }

  // connexion
  public function connect() {
    if ($this->checkDriverInstalled()) {
      $this->cnx = new MongoClient('mongodb://localhost');
      $this->base = $this->cnx->selectDB("test");
    }
  }

  // fermeture de la connexion
  public function disconnect() {
    $this->cnx->close();
  }

  // check si le driver est installé
  public function checkDriverInstalled() {
    if ( ! class_exists('Mongo')) {
      echo "<h1>Le driver Mongo n'est pas installé sur ce serveur...</h1>";
      return false;
    }
    return true;
  }

  public function get($id) {
    $id_search = new MongoId($id);
    return $user = $this->c_users->findOne(array("_id" => $id_search));
  }

  public function getAll() {
    return $users = $this->c_users->find();
  }

// retourne que les enregistrements invalides
  public function getAllInvalides() {
    $users = $this->c_users->find();
    $ret = [];
    foreach ($users as $user) {
      if ($user['cp'] == '' || $user['latitude'] == '' || $user['longitude'] == '' || $user['bureau'] == '') {
        $ret[] = $user;
      }
    }
    return $ret;
  }

  public function countAll() {
    return $this->c_users->count();
  }

// compte que les invalides
  public function countAllInvalides() {
    $users = $this->c_users->find();
    $ret = [];
    foreach ($users as $user) {
      if ($user['cp'] == '' || $user['latitude'] == '' || $user['longitude'] == '' || $user['bureau'] == '') {
        $ret[] = $user;
      }
    }
    return count($ret);
  }


  public function insertOrUpdate() {

  }

  public function add($prenom, $nom, $cp, $latitude, $longitude, $bureau) {
    // $id = ;
    // id auto a incrémenter
    // a générer mais différent des autres
    return $this->c_users->insert(array(
              // 'id' => $id
            'prenom' =>  $prenom,
            'nom'  => $nom,
            'cp' => $cp,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'bureau' => $bureau
     ));
  }

  public function update($id, $prenom, $nom, $cp, $latitude, $longitude, $bureau) {
    $id_update = new MongoId($id);
    $newdata = array('$set' => array(
      'prenom' =>  $prenom,
      'nom'  => $nom,
      'cp' => $cp,
      'latitude' => $latitude,
      'longitude' => $longitude,
      'bureau' => $bureau
    ));
    $this->c_users->update(array("_id" => $id_update), $newdata);
  }

  public function delete($id) {
    $id_to_delete = new MongoId($id);
    return $this->c_users->remove(array('_id' => $id_to_delete));
  }

}

?>
