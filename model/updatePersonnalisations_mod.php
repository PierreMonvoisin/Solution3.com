<?php require '../share/forbiddenPages.php';
function updatePersonnalisations($mainFontColor, $secondaryFontColor, $mainBackgroundColor, $secondaryBackgroundColor, $headerBackgroundColor, $statsBackgroundColor, $mainFont, $timerFont, $displayTimer, $id_personnalisations){
  $stmtStatus = null; $stmt = null;
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // If the user already has a personnalisation line in the database, update its line
    if ($id_personnalisations != 1){
      // Declare request with paramaters
      $stmt = $database->prepare(" UPDATE `personnalisations`
        SET `main_font_color` = :main_font_color, `secondary_font_color` = :secondary_font_color,
        `main_background_color` = :main_background_color, `secondary_background_color` = :secondary_background_color,
        `header_background_color` = :header_background_color, `stats_background_color` = :stats_background_color,
        `display_timer` = :display_timer, `id_fonts_main` = :id_fonts_main, `id_fonts_timer` = :id_fonts_timer
        WHERE `id` = :id");
      $stmt->bindParam(':id', $id_personnalisations, PDO::PARAM_INT);
    } else {
      // Else create a new line for it
      $stmt = $database->prepare(" INSERT INTO `personnalisations` (`main_font_color`,`secondary_font_color`,`main_background_color`,`secondary_background_color`,`header_background_color`, `stats_background_color`, `display_timer`, `id_fonts_main`, `id_fonts_timer`)
      VALUES (:main_font_color, :secondary_font_color, :main_background_color, :secondary_background_color, :header_background_color, :stats_background_color, :display_timer, :id_fonts_main, :id_fonts_timer)");
    }
    // Bind all parameters to their value with type specification
    $stmt->bindParam(':main_font_color', $mainFontColor, PDO::PARAM_STR);
    $stmt->bindParam(':secondary_font_color', $secondaryFontColor, PDO::PARAM_STR);
    $stmt->bindParam(':main_background_color', $mainBackgroundColor, PDO::PARAM_STR);
    $stmt->bindParam(':secondary_background_color', $secondaryBackgroundColor, PDO::PARAM_STR);
    $stmt->bindParam(':header_background_color', $headerBackgroundColor, PDO::PARAM_STR);
    $stmt->bindParam(':stats_background_color', $statsBackgroundColor, PDO::PARAM_STR);
    $stmt->bindParam(':display_timer', $displayTimer, PDO::PARAM_INT);
    $stmt->bindParam(':id_fonts_main', $mainFont, PDO::PARAM_INT);
    $stmt->bindParam(':id_fonts_timer', $timerFont, PDO::PARAM_INT);
    // Execute query and get the return value in variable
    $stmtStatus = $stmt->execute();
    // Get last inserted ID in personnalisations table
    $lastId = $database->lastInsertId();
  } catch (PDOException $e) {
    // If there is an exception, display it
    echo $e->getMessage();
  }
  // Return the statement return value, the statement and the last id created in the table
  return [$stmtStatus, $stmt, $lastId];
} ?>
