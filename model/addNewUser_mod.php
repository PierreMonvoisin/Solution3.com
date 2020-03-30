<?php
function addNewUser($userInfos) {
  $stmtStatus = null; $stmt = null;
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  // Hash password to store it safely
  $userInfos['password'] = password_hash($userInfos['password'], PASSWORD_BCRYPT);
  try {
    // Declare request with paramaters
    $stmt = $database->prepare(
      'INSERT INTO `5VAyPO6OaNusers` (`username`,`mail`,`password`,`avatar_url`,`id_personnalisations`)
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
    $errorCode = $e->getCode();
    if ($errorCode == '23000'){
      $stmtStatus = 'ERROR';
      $stmt = '- Cette adresse mail est déjà utilisé, veuillez en choisir une autre -';
    } else {
      $stmtStatus = 'ERROR';
      $stmt = '- Erreur inconnue, code de l\'erreur : [' .$errorCode. '] -';
    }
  }
  // Return the statement return value and the statement
  return [$stmtStatus, $stmt];
} ?>
