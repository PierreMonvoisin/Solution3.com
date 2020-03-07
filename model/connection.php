<?php
function connectionToDatabase() {
  // Require the constants for the connection
  require_once 'parameters.php';
  try {
    $database = new PDO('mysql:dbname=' .DB. ';host=' .HOST. ';charset=utf8', USER, PASSWORD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    return $database;
  } catch (Exception $ex) {
    die('La connexion à la base de données a échoué, veuillez contacter l\'administrateur du site !'.'<br>'.'Connection to database failed, please contact website\'s administrator !');
  }
}
