<?php
function updateUserInfos($mail, $set, $values, $whichBind){
  $stmtStatus = null; $stmt = null;
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $stmt = $database->prepare("UPDATE `5VAyPO6OaNusers` SET $set WHERE `mail` = :mail");
    // Bind all parameters to their value with type specification
    if ($whichBind == 'both'){
      $stmt->bindParam(':username', $values['username'], PDO::PARAM_STR);
      $stmt->bindParam(':password', $values['password'], PDO::PARAM_STR);
    } else if ($whichBind == 'password'){
      $stmt->bindParam(':password', $values['password'], PDO::PARAM_STR);
    } else if ($whichBind == 'username'){
      $stmt->bindParam(':username', $values['username'], PDO::PARAM_STR);
    }
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    // Execute query and get the return value in variable
    $stmtStatus = $stmt->execute();
  } catch (PDOException $e) {
    // If there is an exception, display it
    echo $e->getMessage();
  }
  // Return the statement return value and the statement
  return [$stmtStatus,$stmt];
} ?>
