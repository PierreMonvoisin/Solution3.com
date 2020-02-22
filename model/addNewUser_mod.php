<?php
function addNewUser($userInfos) {
  // Initiate connection to database
  require_once 'connection.php';
  $database = connectionToDatabase();
  // Hash password to store it safely
  $userInfos['password'] = password_hash($userInfos['password'], PASSWORD_DEFAULT);
  try {
    // Declare request with paramaters
    $stmt = $database->prepare(
      'INSERT INTO `users` (`username`,`mail`,`password`,`avatar_url`,`id_personnalisations`)
      VALUES (:username, :mail, :password, :avatar_url, :id_personnalisations)'
    );
    // Bind all parameters to their value with type specification
    $stmt->bindParam(':username', $userInfos['username'], PDO::PARAM_STR);
    $stmt->bindParam(':mail', $userInfos['mail'], PDO::PARAM_STR);
    $stmt->bindParam(':password', $userInfos['password'], PDO::PARAM_STR);
    $stmt->bindParam(':avatar_url', $userInfos['avatarUrl'], PDO::PARAM_STR);
    $stmt->bindParam(':id_personnalisations', $userInfos['idPersonnalisations'], PDO::PARAM_INT);
    // Execute query and get the return value in variable
    $stmtStatus = $stmt->execute();
  } catch (PDOException $e) {
    // If there is an exception, display it
    echo $e->getMessage();
  }
  // Return the statement return value and the statement
  return [$stmtStatus,$stmt];
}
?>
