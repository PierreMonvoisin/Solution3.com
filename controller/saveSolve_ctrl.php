<?php require '../share/forbiddenPages.php';
$saveError = false; $saveConfirmation = false; $saveConfirmationMessage = 'ERROR'; $saveErrorMessage = 'ERROR';
// On form post and saveSolve button pressed
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveSolve'])) {
  // If the user is connected
  isset($_SESSION['id']) && ! empty(trim($_SESSION['id'])) ? $id = trim($_SESSION['id']) : $id = null;
  if ($id != null){
    // Check if all values are set and aren't empty
    ! empty(trim($_POST['scramble'])) ? $scramble = trim($_POST['scramble']) : $scramble = null;
    ! empty(trim($_POST['time'])) ? $time = trim($_POST['time']) : $time = null;
    ! empty(trim($_POST['date'])) ? $date = trim($_POST['date']) : $date = null;
    if ($scramble != null && $time != null && $date != null){
      // Sanitize all values
      $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
      $scramble = filter_var($scramble, FILTER_SANITIZE_STRING);
      $time = filter_var($time, FILTER_SANITIZE_STRING);
      $date = filter_var($date, FILTER_SANITIZE_STRING);
      // Validate all values
      $id = filter_var($id, FILTER_VALIDATE_INT);
      // If validate return boolean, set value as null
      gettype($id) != 'boolean' ?: $id = null;
      // Create the options array with the reg ex for the time
      $timeOptions = ['options'=>['regexp'=>'/^([\d]{2}: ?)?([0-5]{1}[\d]{1}: ?)?([0-5]{1}[\d]{1}\. ?){1}([\d]{2,3}){1}$/']];
      $time = filter_var($time, FILTER_VALIDATE_REGEXP, $timeOptions);
      // If validate return boolean, set value as null
      gettype($time) != 'boolean' ?: $time = null;
      // Create the options array with the reg ex for the date
      $dateOptions = ['options'=>['regexp'=>'/^(((0[1-9])|((1|2)[\d])|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(2[\d]{3})) ?(((0[0-9])|(1[\d])|(2[0-3]))(:([0-5][\d])){2})$/']];
      $date = filter_var($date, FILTER_VALIDATE_REGEXP, $dateOptions);
      // If validate return boolean, set value as null
      gettype($date) != 'boolean' ?: $date = null;
      if ($id != null && $time != null && $date != null){
        // Delete all spaces in the scramble and time
        $scramble = preg_replace('/\s+/', '', $scramble);
        $time = preg_replace('/\s+/', '', $time);
        // Put date in English format
        $dateArray = explode(' ', $date);
        [$dd, $mm, $yyyy] = explode('/', $dateArray[0]);
        $correctDateFormat = ($yyyy. '-' .$mm. '-' .$dd);
        $date = $correctDateFormat. ' ' .$dateArray[1];
        require '../model/saveSolve_mod.php';
        // Save the solve in the database
        $stmtStatus = saveSolve($id, $scramble, $time, $date);
        if ($stmtStatus != false){
          // Display confirmation message if all went well
          $saveConfirmationMessage = 'Votre résolution a bien été enregistré !';
          $saveConfirmation = true;
          return;
        }
      } else {
        $saveErrorMessage = 'Une erreur a été rencontré, veuillez réessayer plus tard';
        $saveError = true;
        return;
      }
    } else {
      $saveErrorMessage = 'Une erreur a été rencontré, veuillez réessayer plus tard';
      $saveError = true;
      return;
    }
  } else {
    $saveErrorMessage = 'Veuillez vous connecter pour enregistrer une résolution';
    $saveError = true;
  }
} ?>
