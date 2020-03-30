<?php
function deleteUser($mail){
  $stmtStatus = null; $stmt = null;
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $stmt = $database->prepare("DELETE FROM `5VAyPO6OaNusers` WHERE `mail` = :mail");
    // Bind all parameters to their value with type specification
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    // Execute query and get the return value in variable
    $stmtStatus = $stmt->execute();
  } catch (PDOException $e) {
    // If there is an exception, display it
    echo $e->getMessage();
  }
  // Return the statement return value
  return [$stmtStatus, $stmt];
} ?>
