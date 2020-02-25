<?php
function checkUserPassword($mail){
  // Initiate connection to database
  require_once 'connection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $stmt = $database->prepare(
      // Fetch the password assiociated to the mail
      'SELECT `password` FROM `users` WHERE `mail` = :mail'
    );
    // Bind parameter to its value with type specification
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
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
