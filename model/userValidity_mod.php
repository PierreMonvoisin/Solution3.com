<?php
function userValidity($userInfos){
  // Initiate connection to database
  require_once 'connection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $stmt = $database->prepare(
      // Inner join to get all informations on a user on login
      'SELECT `users`.`username`, `users`.`mail`, `users`.`password`, `users`.`avatar_url`,
      -- Get all the personnalisations informations
      `personnalisations`.`main_font_color`, `personnalisations`.`secondary_font_color`, `personnalisations`.`main_background_color`, `personnalisations`.`secondary_background_color`,
      `personnalisations`.`header_background_color`, `personnalisations`.`display_timer`, `personnalisations`.`main_font`, `personnalisations`.`timer_font`
      -- Users joined to Personnalisations on the personnalisations ID
      FROM `users` INNER JOIN `personnalisations` ON `users`.`id_personnalisations` = `personnalisations`.`id`
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
}
?>
