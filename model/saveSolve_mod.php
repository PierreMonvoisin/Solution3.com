<?php require '../share/forbiddenPages.php';
function saveSolve($id, $scramble, $time, $date) {
  $stmtStatus = null; $stmt = null;
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $stmt = $database->prepare(
      'INSERT INTO `stats` (`best_single`, `single_scramble`, `single_date`, `id_users`)
      VALUES (:best_single, :single_scramble, :single_date, :id_users)'
    );
    // Bind all parameters to their value with type specification
    $stmt->bindParam(':best_single', $time, PDO::PARAM_STR);
    $stmt->bindParam(':single_scramble', $scramble, PDO::PARAM_STR);
    $stmt->bindParam(':single_date', $date, PDO::PARAM_STR);
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
        $stmt = $database->prepare('UPDATE `stats`
          SET `best_single` = :best_single, `single_scramble` = :single_scramble, `single_date` = :single_date
          WHERE `id_users` = :id_users'
        );
        // Bind all parameters to their value with type specification
        $stmt->bindParam(':best_single', $time, PDO::PARAM_STR);
        $stmt->bindParam(':single_scramble', $scramble, PDO::PARAM_STR);
        $stmt->bindParam(':single_date', $date, PDO::PARAM_STR);
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
