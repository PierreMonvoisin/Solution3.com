<?php
$saveError = false; $saveConfirmation = false; $saveConfirmationMessage = 'ERROR'; $saveErrorMessage = 'ERROR';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['saveAo5']) || isset($_POST['saveAo12']) || isset($_POST['saveAo50']) )) {
  ! empty(trim($_SESSION['id'])) ? $id = trim($_SESSION['id']) : $id = null;
  if ($id != null){
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $average = null;
    if (isset($_POST['saveAo5'])){
      $average = 5;
    } else if (isset($_POST['saveAo12'])){
      $average = 12;
    } else if (isset($_POST['saveAo50'])){
      $average = 50;
    }
    if ($average != null && gettype($id) != 'boolean'){
      $timeOptions = ['options'=>['regexp'=>'/^([\d]{2}: ?)?([0-5]{1}[\d]{1}: ?)?([0-5]{1}[\d]{1}\. ?){1}([\d]{2,3}){1}$/']];
      $timeArray = []; $scrambleArray = [];
      for ($i = 1; $i <= $average; $i++){
        $temporaryTime = ''; $temporaryScramble = '';
        if (! empty(trim($_POST['ao' .$average. '_time' .$i]))){
          $temporaryTime = trim($_POST['ao' .$average. '_time' .$i]);
          $temporaryTime = str_replace('( ', '', $temporaryTime);
          $temporaryTime = str_replace(' )', '', $temporaryTime);
          $temporaryTime = filter_var($temporaryTime, FILTER_SANITIZE_STRING);
          $temporaryTime = filter_var($temporaryTime, FILTER_VALIDATE_REGEXP, $timeOptions);
          if (gettype($temporaryTime) != 'boolean'){
            $temporaryTime = str_replace(' ', '', $temporaryTime);
            array_push($timeArray, $temporaryTime);
            if (! empty(trim($_POST['ao' .$average. '_scramble' .$i]))){
              $temporaryScramble = trim($_POST['ao' .$average. '_scramble' .$i]);
              $temporaryScramble = str_replace(' ', '', $temporaryScramble);
              $temporaryScramble = filter_var($temporaryScramble, FILTER_SANITIZE_STRING);
              array_push($scrambleArray, $temporaryScramble);
            }
          }
        }
      }
      if (count($timeArray) == $average && count($scrambleArray) == $average){
        $averageArray = [];
        for ($i = 0; $i < $average; $i++){
          $averageArray[$scrambleArray[$i]] = $timeArray[$i];
        }
        ! empty(trim($_POST['fullAvgOf' .$average])) ? $fullAverage = trim($_POST['fullAvgOf' .$average]) : $fullAverage = null;
        ! empty(trim($_POST['date'])) ? $dateTime = trim($_POST['date']) : $dateTime = null;
        if ($fullAverage != null && $dateTime != null){
          $fullAverage = filter_var($fullAverage, FILTER_SANITIZE_STRING);
          $dateTime = filter_var($dateTime, FILTER_SANITIZE_STRING);

          $fullAverage = filter_var($fullAverage, FILTER_VALIDATE_REGEXP, $timeOptions);
          // Create the options array with the reg ex for the date
          $dateOptions = ['options'=>['regexp'=>'/^(((0[1-9])|((1|2)[\d])|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(2[\d]{3})) ?(((0[0-9])|(1[\d])|(2[0-3]))(:([0-5][\d])){2})$/']];
          $dateTime = filter_var($dateTime, FILTER_VALIDATE_REGEXP, $dateOptions);
          if ($fullAverage != false && $dateTime != false){
            $fullAverage = preg_replace('/\s+/', '', $fullAverage);
            $dateArray = explode(' ', $dateTime);
            [$dd, $mm, $yyyy] = explode('/', $dateArray[0]);
            $correctDateFormat = ($yyyy. '-' .$mm. '-' .$dd);
            $dateTime = $correctDateFormat. ' ' .$dateArray[1];
            $averageArray = json_encode($averageArray);

            require '../model/saveAverage_mod.php';
            [$stmtStatus, $stmt] = saveAverage($id, $average, $fullAverage, $averageArray, $dateTime);
            if ($stmtStatus != false){
              $saveConfirmationMessage = 'Votre moyenne a bien été enregistré !';
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
    $saveErrorMessage = 'Veuillez vous connecter pour enregistrer une moyenne';
    $saveError = true;
  }
} ?>
