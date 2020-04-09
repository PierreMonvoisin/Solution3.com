<?php require '../share/forbiddenPages.php';
function updateUserPersonnalisationID($lastId, $avatar_url){
  $userStmtStatus = null; $userStmt = null;
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $userStmt = $database->prepare("UPDATE `5VAyPO6OaNusers` SET `id_personnalisations` = :id_personnalisations WHERE `avatar_url` = :avatar_url");
    // Bind all parameters to their value with type specification
    $userStmt->bindParam(':id_personnalisations', $lastId, PDO::PARAM_INT);
    $userStmt->bindParam(':avatar_url', $avatar_url, PDO::PARAM_STR);
    // Execute query and get the return value in variable
    $userStmtStatus = $userStmt->execute();
  } catch (PDOException $e) {
    // If there is an exception, display it
    echo $e->getMessage();
  }
  // Return the statement return value
  return $userStmtStatus;
} ?>
