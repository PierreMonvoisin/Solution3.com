<?php
function deleteUserPersonnalisations($id_personnalisations){
  $personnalisationsStmtStatus = null; $personnalisationsStmt = null;
  // Initiate connection to database
  require_once 'connection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $personnalisationsStmt = $database->prepare("DELETE FROM `personnalisations` WHERE `id` = :id_personnalisations");
    // Bind all parameters to their value with type specification
    $personnalisationsStmt->bindParam(':id_personnalisations', $id_personnalisations, PDO::PARAM_INT);
    // Execute query and get the return value in variable
    $personnalisationsStmtStatus = $personnalisationsStmt->execute();
  } catch (PDOException $e) {
    // If there is an exception, display it
    echo $e->getMessage();
  }
  // Return the statement return value
  return $personnalisationsStmtStatus;
}
?>
