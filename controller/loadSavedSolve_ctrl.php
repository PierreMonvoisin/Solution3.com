<?php
$loadError = false; $loadErrorMessage = 'ERROR'; $displaySolve = 0;
if (isset($_SESSION['id']) && ! empty($_SESSION['id'])){
  $userId = trim($_SESSION['id']);
  require '../model/loadSavedSolve_mod.php';
  $solveList = loveSavedSolve($userId);
  if (gettype($solveList) != 'boolean'){
    $NbSolveToDisplay = 0; $solveToDisplay = [];
    if ($solveList['single_scramble'] != 'null'){
      $NbSolveToDisplay++;
      array_push($solveToDisplay,'single');
      $singleTime = $solveList['best_single'];
      $singleScramble = $solveList['single_scramble'];
      $singleDate = $solveList['single_date'];
    }
    if ($solveList['ao5_scramble'] != 'null'){
      $NbSolveToDisplay++;
      array_push($solveToDisplay,'ao5');
      $ao5Time = $solveList['best_ao5'];
      $ao5Scramble = $solveList['ao5_scramble'];
      $ao5Date = $solveList['ao5_date'];
    }
    if ($solveList['ao12_scramble'] != 'null'){
      $NbSolveToDisplay++;
      array_push($solveToDisplay,'ao12');
      $ao12Time = $solveList['best_ao12'];
      $ao12Scramble = $solveList['ao12_scramble'];
      $ao12Date = $solveList['ao12_date'];
    }
    if ($solveList['ao50_scramble'] != 'null'){
      $NbSolveToDisplay++;
      array_push($solveToDisplay,'ao50');
      $ao50Time = $solveList['best_ao50'];
      $ao50Scramble = $solveList['ao50_scramble'];
      $ao50Date = $solveList['ao50_date'];
    }
    if ($NbSolveToDisplay != 0 && count($solveToDisplay) != 0 && $NbSolveToDisplay == count($solveToDisplay)) {
      if ($NbSolveToDisplay == 1){
        $scramble = ${$solveToDisplay[0].'Scramble'} ?? '';
        if ($scramble != ''){
          $scrambleFormatted = trim(preg_replace('/[A-Z]/', ' $0', $scramble));
        }
        $dateTime = ${$solveToDisplay[0].'Date'} ?? '';
        if ($dateTime != ''){
          $dateTime = explode(' ', $dateTime);
          [$yyyy, $mm, $dd] = explode('-', $dateTime[0]);
          $dateFormatted = $dd. ' / ' .$mm. ' / ' .$yyyy;
          $timeFormatted = $dateTime[1];
        } else {
          $dateFormatted = '-- / -- / ----';
          $timeFormatted = '00:00:00';
        }
        $time = ${$solveToDisplay[0].'Time'} ?? '';
        if ($time != ''){
          $solveTimeFormatted = trim(preg_replace('/\:/', '$0 ', $time));
          $solveTimeFormatted = trim(preg_replace('/\./', '$0 ', $solveTimeFormatted));
        } else {

        }
        $displaySolve = 1;
      }
    } else {
      $loadErrorMessage = 'Un problème est servenu, veuillez réessayer plus tard';
      $loadError = true;
      return;
    }
  } else {
    $loadErrorMessage = 'Un problème est servenu, veuillez réessayer plus tard';
    $loadError = true;
    return;
  }
} ?>
