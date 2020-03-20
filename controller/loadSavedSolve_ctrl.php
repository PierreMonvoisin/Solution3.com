<?php
$loadError = false; $loadErrorMessage = 'ERROR'; $displaySolve = 0;
$displaySingle = false; $displayAverage = false;
if (isset($_SESSION['id']) && ! empty($_SESSION['id'])){
  $userId = trim($_SESSION['id']);
  require '../model/loadSavedSolve_mod.php';
  $solveList = loveSavedSolve($userId);
  if (gettype($solveList) != 'boolean'){
    $NbSolveToDisplay = 0; $solveToDisplay = [];
    $averageToDisplay = []; $averageSolveToDisplay = [];
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
      if ($solveList['single_scramble'] != 'null'){
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
          $NbSolveToDisplay--;
          array_splice($solveToDisplay, 0, 1);
          $displaySingle = true;
        } else {
          $loadErrorMessage = 'Un problème est servenu, veuillez réessayer plus tard';
          $loadError = true;
          return;
        }
        $displaySolve = 1;
      }
      if ($NbSolveToDisplay > 0 && count($solveToDisplay) > 0){
        foreach ($solveToDisplay as $average) {
          $scramble = ${$average.'Scramble'} ?? '';
          $dateTime = ${$average.'Date'} ?? '';
          $time = ${$average.'Time'} ?? '';
          if ($scramble != '' && $dateTime != '' && $time != ''){
            $scramble = (array) json_decode($scramble);
            $keysArray = array_keys($scramble);
            foreach ($keysArray as $key => $scrambleValue) {
              $scrambleFormatted = trim(preg_replace('/[A-Z]/', ' $0', $scrambleValue));
              $scramble[$scrambleFormatted] = $scramble[$scrambleValue];
              unset($scramble[$scrambleValue]);
            }
            foreach ($scramble as $key => $timeValue) {
              $timeFormatted = trim(preg_replace('/\:/', '$0 ', $timeValue));
              $timeFormatted = trim(preg_replace('/\./', '$0 ', $timeFormatted));
              $scramble[$key] = $timeFormatted;
            }
            $dateTime = explode(' ', $dateTime);
            [$yyyy, $mm, $dd] = explode('-', $dateTime[0]);
            $dateFormatted = $dd. ' / ' .$mm. ' / ' .$yyyy;
            $timeFormatted = $dateTime[1];
            $solveTimeFormatted = trim(preg_replace('/\:/', '$0 ', $time));
            $solveTimeFormatted = trim(preg_replace('/\./', '$0 ', $solveTimeFormatted));
            $averageInfo = ['avgTime'=>$solveTimeFormatted,'date'=>$dateFormatted,'time'=>$timeFormatted,'scramble&Time'=>$scramble, 'averageName'=>$average];
            array_push($averageToDisplay, $averageInfo);
            $scramble = '';
          }
        }
        if (count($averageToDisplay) == $NbSolveToDisplay && $NbSolveToDisplay != 0){
          $displayAverage = true;
        }
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
