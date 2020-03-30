<?php
function userValidity($userInfos){
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $stmt = $database->prepare(
      // Select the informations necessary for the connection
      'SELECT `mail`, `password`, `avatar_url` FROM `5VAyPO6OaNusers`
      -- Where the mail is the same as the mail in the from
      WHERE `mail` = :mail'
    );
    // Bind parameter to its value with type specification
    $stmt->bindParam(':mail', $userInfos['mail'], PDO::PARAM_STR);
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
} ?>
