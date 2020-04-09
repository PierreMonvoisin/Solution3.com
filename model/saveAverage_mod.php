<?php require '../share/forbiddenPages.php';
function saveAverage($id, $average, $fullAverage, $averageArray, $dateTime) {
  $stmtStatus = null; $stmt = null;
  $best = '`best_ao'.$average.'`';
  $scramble = '`ao' .$average. '_scramble`';
  $currentDate = '`ao' .$average. '_date`';
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $stmt = $database->prepare(
      "INSERT INTO `stats` ($best, $scramble, $currentDate, `id_users`)
      VALUES (:best_ao_value, :ao_scramble_value, :ao_date_value, :id_users)"
    );
    // Bind all parameters to their value with type specification
    $stmt->bindParam(':best_ao_value', $fullAverage, PDO::PARAM_STR);
    $stmt->bindParam(':ao_scramble_value', $averageArray, PDO::PARAM_STR);
    $stmt->bindParam(':ao_date_value', $dateTime, PDO::PARAM_STR);
    $stmt->bindParam(':id_users', $id, PDO::PARAM_INT);
    // Execute query and get the return value in variable
    $stmtStatus = $stmt->execute();
  } catch (PDOException $e) {
    $stmtStatus = null; $stmt = null;
    // If there is an error, get the code
    $errorCode = $e->getCode();
    // Error code 23000 = id_users already existing in database
    if ($errorCode == '23000'){
      // Instead of creating new line, update existing line
      try {
        // Declare request with paramaters
        $stmt = $database->prepare("UPDATE `stats`
          SET $best = :best_ao_value, $scramble = :ao_scramble_value, $currentDate = :ao_date_value
          WHERE `id_users` = :id_users"
        );
        // Bind all parameters to their value with type specification
        $stmt->bindParam(':best_ao_value', $fullAverage, PDO::PARAM_STR);
        $stmt->bindParam(':ao_scramble_value', $averageArray, PDO::PARAM_STR);
        $stmt->bindParam(':ao_date_value', $dateTime, PDO::PARAM_STR);
        $stmt->bindParam(':id_users', $id, PDO::PARAM_INT);
        // Execute query and get the return value in variable
        $stmtStatus = $stmt->execute();
      } catch (PDOException $e) {
        echo 'update error : ' .$e->getMessage();
      }
    } else {
      echo 'unknown error : ' .$e->getMessage();
    }
  }
  // Return the statement return value 
  return $stmtStatus;
} ?>
