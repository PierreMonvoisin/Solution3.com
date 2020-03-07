<?php
function validateAllPersonnalisationsInputs($colors, $mainFont, $timerFont, $displayTimer, $id_personnalisations){
  // Create the options array with the reg ex for the hex colors
  $hexValueOptions = ['options'=>['regexp'=>'/^#?([a-zA-Z\d]){6}$/']];
  foreach ($colors as $hexValue) {
    $hexValue = filter_var($hexValue, FILTER_SANITIZE_STRING);
    $hexValue = filter_var($hexValue, FILTER_VALIDATE_REGEXP, $hexValueOptions);
    // If reg ex validation returns boolean, set value to null
    gettype($hexValue) != 'boolean' ?: $hexValue = null;
  }
  if (in_array(null, $colors)){
    return false;
  } else {
    $mainFont = filter_var($mainFont, FILTER_SANITIZE_NUMBER_INT);
    $timerFont = filter_var($timerFont, FILTER_SANITIZE_NUMBER_INT);
    $displayTimer = filter_var($displayTimer, FILTER_SANITIZE_NUMBER_INT);
    $id_personnalisations = filter_var($id_personnalisations, FILTER_SANITIZE_NUMBER_INT);
    if ($displayTimer != 0 && $displayTimer != 1){ $displayTimer = null; }
    if ($displayTimer == null){
      return false;
    } else {
      return ['colors'=>$colors, 'mainFont'=>$mainFont, 'timerFont'=>$timerFont, 'displayTimer'=>$displayTimer, 'id_personnalisations'=>$id_personnalisations];
    }
  }
} ?>
