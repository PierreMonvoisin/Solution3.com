<?php require '../share/forbiddenPages.php';
function connectionToDatabase() {
  // Require the constants for the connection
  require_once 'kz17w4S5fOparameters.php';
  try {
    // Create new PDO object as the connection to the database
    $database = new PDO('mysql:dbname=' .DB. ';host=' .HOST. ';charset=utf8', USER, PASSWORD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    return $database;
  } catch (PDOException $e) {
    // If there is a problem, die everything and display the mail to contact the admin
    die('La connexion à la base de données a échoué, veuillez contacter l\'administrateur du site !<br>Connection to database failed, please contact website\'s administrator !<br>solution3.contact@gmail.com<br>Error Code : '.$e->getCode());
  }
}
