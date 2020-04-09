<?php require '../share/forbiddenPages.php';
$saveAverageError = false; $saveAverageConfirmation = false; $saveAverageConfirmationMessage = 'ERROR'; $saveAverageErrorMessage = 'ERROR';
// On form post and saveAo5, saveAo12 or saveAo50 button pressed
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['saveAo5']) || isset($_POST['saveAo12']) || isset($_POST['saveAo50']) )) {
  // Get the ID of the user
  isset($_SESSION['id']) && ! empty(trim($_SESSION['id'])) ? $id = trim($_SESSION['id']) : $id = null;
  if ($id != null){
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $average = 0;
    if (isset($_POST['saveAo5'])){
      $average = 5;
    } else if (isset($_POST['saveAo12'])){
      $average = 12;
    } else if (isset($_POST['saveAo50'])){
      $average = 50;
    }
    // If user is connected and the average is recognized
    if ($average != 0 && gettype($id) != 'boolean'){
      // Create the options array with the reg ex for the time
      $timeOptions = ['options'=>['regexp'=>'/^([\d]{2}: ?)?([0-5]{1}[\d]{1}: ?)?([0-5]{1}[\d]{1}\. ?){1}([\d]{2,3}){1}$/']];
      $timeArray = []; $scrambleArray = [];
      // For every solve in the average
      for ($i = 1; $i <= $average; $i++){
        $temporaryTime = ''; $temporaryScramble = '';
        if (! empty(trim($_POST['ao' .$average. '_time' .$i]))){
          // Clean, sanitize and validate the time
          $temporaryTime = trim($_POST['ao' .$average. '_time' .$i]);
          $temporaryTime = str_replace('( ', '', $temporaryTime);
          $temporaryTime = str_replace(' )', '', $temporaryTime);
          $temporaryTime = filter_var($temporaryTime, FILTER_SANITIZE_STRING);
          $temporaryTime = filter_var($temporaryTime, FILTER_VALIDATE_REGEXP, $timeOptions);
          if (gettype($temporaryTime) != 'boolean'){
            $temporaryTime = str_replace(' ', '', $temporaryTime);
            // If the time is validated, put it in the array of times
            array_push($timeArray, $temporaryTime);
            if (! empty(trim($_POST['ao' .$average. '_scramble' .$i]))){
              $temporaryScramble = trim($_POST['ao' .$average. '_scramble' .$i]);
              // Delete every spaces and sanitize the scramble
              $temporaryScramble = str_replace(' ', '', $temporaryScramble);
              $temporaryScramble = filter_var($temporaryScramble, FILTER_SANITIZE_STRING);
              // Put it in the array of scrambles
              array_push($scrambleArray, $temporaryScramble);
            }
          }
        }
      }
      // If there is the same amout of time and scramble as the average is long
      if (count($timeArray) == $average && count($scrambleArray) == $average){
        $averageArray = [];
        // Put the scramble and the time in an associative array
        for ($i = 0; $i < $average; $i++){
          $averageArray[$scrambleArray[$i]] = $timeArray[$i];
        }
        // Get the time of the full average and the dateTime it was set
        ! empty(trim($_POST['fullAvgOf' .$average])) ? $fullAverage = trim($_POST['fullAvgOf' .$average]) : $fullAverage = null;
        ! empty(trim($_POST['date'])) ? $dateTime = trim($_POST['date']) : $dateTime = null;
        if ($fullAverage != null && $dateTime != null){
          $fullAverage = filter_var($fullAverage, FILTER_SANITIZE_STRING);
          $dateTime = filter_var($dateTime, FILTER_SANITIZE_STRING);

          $fullAverage = filter_var($fullAverage, FILTER_VALIDATE_REGEXP, $timeOptions);
          // Create the options array with the reg ex for the dateTime
          $dateOptions = ['options'=>['regexp'=>'/^(((0[1-9])|((1|2)[\d])|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(2[\d]{3})) ?(((0[0-9])|(1[\d])|(2[0-3]))(:([0-5][\d])){2})$/']];
          $dateTime = filter_var($dateTime, FILTER_VALIDATE_REGEXP, $dateOptions);
          if ($fullAverage != false && $dateTime != false){
            // Put date in English format
            $fullAverage = preg_replace('/\s+/', '', $fullAverage);
            $dateArray = explode(' ', $dateTime);
            [$dd, $mm, $yyyy] = explode('/', $dateArray[0]);
            $correctDateFormat = ($yyyy. '-' .$mm. '-' .$dd);
            $dateTime = $correctDateFormat. ' ' .$dateArray[1];
            // Encode in json the associative array of scramble and times
            $averageArray = json_encode($averageArray);

            require '../model/saveAverage_mod.php';
            // Save the average in the database
            $stmtStatus = saveAverage($id, $average, $fullAverage, $averageArray, $dateTime);
            if ($stmtStatus != false){
              // Display confirmation message if all went well
              $saveAverageConfirmationMessage = 'Votre moyenne a bien été enregistré !';
              $saveAverageConfirmation = true;
              return;
            }
          } else {
            $saveAverageErrorMessage = 'Une erreur a été rencontré, veuillez réessayer plus tard';
            $saveAverageError = true;
            return;
          }
        } else {
          $saveAverageErrorMessage = 'Une erreur a été rencontré, veuillez réessayer plus tard';
          $saveAverageError = true;
          return;
        }
      } else {
        $saveAverageErrorMessage = 'Une erreur a été rencontré, veuillez réessayer plus tard';
        $saveAverageError = true;
        return;
      }
    } else {
      $saveAverageErrorMessage = 'Une erreur a été rencontré, veuillez réessayer plus tard';
      $saveAverageError = true;
      return;
    }
  } else {
    $saveAverageErrorMessage = 'Veuillez vous connecter pour enregistrer une moyenne';
    $saveAverageError = true;
  }
} ?>
