<?php require '../share/forbiddenPages.php';
function deleteUserStats($id){
  $statsStmtStatus = null; $statsStmt = null;
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $statsStmt = $database->prepare("DELETE FROM `stats` WHERE `id_users` = :id");
    // Bind all parameters to their value with type specification
    $statsStmt->bindParam(':id', $id, PDO::PARAM_INT);
    // Execute query and get the return value in variable
    $statsStmtStatus = $statsStmt->execute();
  } catch (PDOException $e) {
    // If there is an exception, display it
    echo $e->getMessage();
  }
  // Return the statement return value
  return $statsStmtStatus;
} ?>
