<?php
function loveSavedSolve($id){
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $stmt = $database->prepare(
      // Fetch the password assiociated to the mail
      'SELECT `best_single`, `single_scramble`, `single_date`, `best_ao5`, `ao5_scramble`, `ao5_date`, `best_ao12`, `ao12_scramble`, `ao12_date`, `best_ao50`, `ao50_scramble`, `ao50_date` FROM `stats` WHERE `id_users` = :id_users'
    );
    // Bind parameter to its value with type specification
    $stmt->bindParam(':id_users', $id, PDO::PARAM_INT);
    // Execute query
    $stmtStatus = $stmt->execute();
    // If the execute() return true, fetch all informations in associative array
    if ($stmtStatus){
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
      return false;
    }
    // If there is an exception, display it
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
?>
