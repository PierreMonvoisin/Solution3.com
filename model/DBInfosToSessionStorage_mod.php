<?php
function DBInfosToSessionStorage($url){
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    $stmt = $database->prepare(
      // Inner join to get all informations on a user on load
      'SELECT `5VAyPO6OaNusers`.`id`, `5VAyPO6OaNusers`.`username`, `5VAyPO6OaNusers`.`mail`,`5VAyPO6OaNusers`.`password`, `5VAyPO6OaNusers`.`avatar_url`, `5VAyPO6OaNusers`.`id_personnalisations`,
      -- Get all the personnalisations informations
      `personnalisations`.`main_font_color`, `personnalisations`.`secondary_font_color`, `personnalisations`.`main_background_color`, `personnalisations`.`secondary_background_color`,
      `personnalisations`.`header_background_color`, `personnalisations`.`stats_background_color`, `personnalisations`.`display_timer`, `mainFont`.`font` AS `main_font`, `timerFont`.`font` AS `timer_font`
      -- Users joined to Personnalisations on the personnalisations ID
      FROM `5VAyPO6OaNusers` INNER JOIN `personnalisations` ON `5VAyPO6OaNusers`.`id_personnalisations` = `personnalisations`.`id`
      INNER JOIN `fonts` AS `mainFont` ON `personnalisations`.`id_fonts_main` = `mainFont`.`id`
      INNER JOIN `fonts` AS `timerFont` ON `personnalisations`.`id_fonts_timer` = `timerFont`.`id`
      -- Where the avatar url equal the url in the cookie
      WHERE `avatar_url` = :url'
    );
    // Prepare url for comparison
    $stmt->bindParam(':url', $url, PDO::PARAM_STR);
    // Execute query
    $stmtStatus = $stmt->execute();
    if ($stmtStatus){
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
      return false;
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
} ?>
