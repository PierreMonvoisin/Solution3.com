<?php
function saveSolve($id, $scramble, $time, $date) {
  $stmtStatus = null; $stmt = null;
  // Initiate connection to database
  require_once 'connection.php';
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
    // If there is an exception, display it
    echo $e->getMessage();
  }
  // Return the statement return value and the statement
  return [$stmtStatus,$stmt];
} ?>
