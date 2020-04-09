<?php require '../share/forbiddenPages.php';
$loadError = false; $loadErrorMessage = 'ERROR';
$displaySingle = false; $displayAverage = false;
// If the user is connected
if (isset($_SESSION['id']) && ! empty($_SESSION['id'])){
  // Get the ID of the user to search for its stats
  $userId = trim($_SESSION['id']);
  require '../model/loadSavedSolve_mod.php';
  $solveList = loveSavedSolve($userId);
  // If at least one solve or average was found
  if (gettype($solveList) != 'boolean'){
    $NbSolveToDisplay = 0; $solveToDisplay = [];
    $averageToDisplay = []; $averageSolveToDisplay = [];
    // Get the values of the existing stats
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
    // If there is at least one stat to display
    if ($NbSolveToDisplay != 0 && $NbSolveToDisplay == count($solveToDisplay)) {
      // If the single is to be displayed
      if ($solveList['single_scramble'] != 'null'){
        $scrambleSingle = ${$solveToDisplay[0].'Scramble'} ?? '';
        if ($scrambleSingle != ''){
          // Add spaces before every uppercase letter to better display
          $scrambleFormatted = trim(preg_replace('/[A-Z]/', ' $0', $scrambleSingle));
        }
        $dateTime = ${$solveToDisplay[0].'Date'} ?? '';
        if ($dateTime != ''){
          // Transform dateTime into French date and HH:MM:SS time
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
          // Add spaces after separators in the time to better display
          $solveTimeFormatted = trim(preg_replace('/\:/', '$0 ', $time));
          $solveTimeFormatted = trim(preg_replace('/\./', '$0 ', $solveTimeFormatted));
          $displaySingle = true;
          // Delete the single from the array of stats to be displayed
          $NbSolveToDisplay--;
          array_splice($solveToDisplay, 0, 1);
        } else {
          $loadErrorMessage = 'Un problème est servenu, veuillez réessayer plus tard';
          $loadError = true;
        }
      }
      // If there are still averages to be displayed
      if ($NbSolveToDisplay > 0 && count($solveToDisplay) > 0){
        foreach ($solveToDisplay as $average) {
          // Get all info of the average
          $scramble = ${$average.'Scramble'} ?? '';
          $dateTime = ${$average.'Date'} ?? '';
          $time = ${$average.'Time'} ?? '';
          // If all info are found, format them
          if ($scramble != '' && $dateTime != '' && $time != ''){
            $scramble = (array) json_decode($scramble);
            // For each value in the array
            $keysArray = array_keys($scramble);
            foreach ($keysArray as $key => $scrambleValue) {
              // Add spaces before every uppercase letter to better display
              $scrambleFormatted = trim(preg_replace('/[A-Z]/', ' $0', $scrambleValue));
              $scramble[$scrambleFormatted] = $scramble[$scrambleValue];
              unset($scramble[$scrambleValue]);
            }
            foreach ($scramble as $key => $timeValue) {
              // Add spaces after separators in the time to better display
              $timeFormatted = trim(preg_replace('/\:/', '$0 ', $timeValue));
              $timeFormatted = trim(preg_replace('/\./', '$0 ', $timeFormatted));
              $scramble[$key] = $timeFormatted;
            }
            // Transform dateTime into French date and HH:MM:SS.mmm format time
            $dateTime = explode(' ', $dateTime);
            [$yyyy, $mm, $dd] = explode('-', $dateTime[0]);
            $dateFormatted = $dd. ' / ' .$mm. ' / ' .$yyyy;
            $timeFormatted = $dateTime[1];
            $solveTimeFormatted = trim(preg_replace('/\:/', '$0 ', $time));
            $solveTimeFormatted = trim(preg_replace('/\./', '$0 ', $solveTimeFormatted));
            // Put all info into associative array
            $averageInfo = ['avgTime'=>$solveTimeFormatted, 'date'=>$dateFormatted, 'time'=>$timeFormatted, 'scramble&Time'=>$scramble, 'averageName'=>$average];
            array_push($averageToDisplay, $averageInfo);
            $scramble = '';
          }
        }
        // If there is at least one average to display
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
