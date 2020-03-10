<?php
$error = false; $confirmation = false; $confirmationMessage = 'ERROR'; $errorMessage = 'ERROR';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitChanges']) && isset($_SESSION['id_personnalisations'])){
  $mainFontColor = '#000000'; $secondaryFontColor = '#FFFFFF';
  $mainBackgroundColor = '#E8DCD8'; $secondaryBackgroundColor = '#C1C1C1';
  $headerBackgroundColor = '#463730'; $statsBackgroundColor = '#BF6B44';
  $mainFont = 'Roboto, sans-serif'; $timerFont = 'Gugi, cursive';
  $displayTimer = 1;
  $id_personnalisations = '';

  ! empty(trim($_POST['mainFontColor'])) ? $mainFontColor = trim($_POST['mainFontColor']) : $mainFontColor = null;
  ! empty(trim($_POST['secondaryFontColor'])) ? $secondaryFontColor = trim($_POST['secondaryFontColor']) : $secondaryFontColor = null;
  ! empty(trim($_POST['mainBackgroundColor'])) ? $mainBackgroundColor = trim($_POST['mainBackgroundColor']) : $mainBackgroundColor = null;
  ! empty(trim($_POST['secondaryBackgroundColor'])) ? $secondaryBackgroundColor = trim($_POST['secondaryBackgroundColor']) : $secondaryBackgroundColor = null;
  ! empty(trim($_POST['headerBackgroundColor'])) ? $headerBackgroundColor = trim($_POST['headerBackgroundColor']) : $headerBackgroundColor = null;
  ! empty(trim($_POST['statsBackgroundColor'])) ? $statsBackgroundColor = trim($_POST['statsBackgroundColor']) : $statsBackgroundColor = null;
  ! empty(trim($_POST['mainFont'])) ? $mainFont = trim($_POST['mainFont']) : $mainFont = null;
  ! empty(trim($_POST['timerFont'])) ? $timerFont = trim($_POST['timerFont']) : $timerFont = null;
  ! empty(trim($_POST['displayTimer'])) ? $displayTimer = trim($_POST['displayTimer']) : $displayTimer = null;
  ! empty(trim($_SESSION['id_personnalisations'])) ? $id_personnalisations = trim($_SESSION['id_personnalisations']) : $id_personnalisations = null;
  if ($mainFontColor == '#000000' && $secondaryFontColor == '#FFFFFF' && $mainBackgroundColor == '#E8DCD8' && $secondaryBackgroundColor == '#C1C1C1' && $headerBackgroundColor == '#463730' && $statsBackgroundColor == '#BF6B44' && $mainFont == 'Roboto, sans-serif' && $timerFont == 'Gugi, cursive' && $displayTimer = 1){
    return;
  }
  if ($id_personnalisations != null){
    $colors = ['mainFontColor'=>$mainFontColor, 'secondaryFontColor'=>$secondaryFontColor, 'mainBackgroundColor'=>$mainBackgroundColor, 'secondaryBackgroundColor'=>$secondaryBackgroundColor, 'headerBackgroundColor'=>$headerBackgroundColor, 'statsBackgroundColor'=>$statsBackgroundColor];
    if (! in_array(null, $colors) && $mainFont != null && $timerFont != null && $displayTimer != null){
      require 'validateAllPersonnalisationsInputs_ctrl.php';
      $cleanedPersonnalisationsInputs = validateAllPersonnalisationsInputs($colors, $mainFont, $timerFont, $displayTimer, $id_personnalisations);
      if ($cleanedPersonnalisationsInputs != false){
        // Reset variables
        $colors = null; $mainFont = null; $timerFont = null; $displayTimer = null; $id_personnalisations = null;
        // Put the values from the array in the correct variable
        foreach ($cleanedPersonnalisationsInputs as $name => $value){
          ${$name} = $value;
        }
        // Reset colors
        $mainFontColor = null; $secondaryFontColor = null;
        $mainBackgroundColor = null; $secondaryBackgroundColor = null;
        $headerBackgroundColor = null; $statsBackgroundColor = null;
        // Do the same for the colors array
        foreach ($colors as $name => $value){
          ${$name} = $value;
        }
        // Available variables from here :
        // $mainFontColor - $secondaryFontColor - $mainBackgroundColor - $secondaryBackgroundColor - $headerBackgroundColor - $statsBackgroundColor - $mainFont - $timerFont - $displayTimer - $id_personnalisations
        require '../model/updatePersonnalisations_mod.php';
        [$stmtStatus, $stmt, $lastId] = updatePersonnalisations($mainFontColor, $secondaryFontColor, $mainBackgroundColor, $secondaryBackgroundColor, $headerBackgroundColor, $statsBackgroundColor, $mainFont, $timerFont, $displayTimer, $id_personnalisations);
        // If the id in the personnalisations table is new, update it in the user table
        $userStmtStatus = null;
        if ($lastId != $id_personnalisations){
          $avatar_url = null;
          ! empty(trim($_SESSION['avatar_url'])) ? $avatar_url = trim($_SESSION['avatar_url']) : $avatar_url = null;
          if ($avatar_url != null){
            require '../model/updateUserPersonnalisationID_mod.php';
            $userStmtStatus = updateUserPersonnalisationID($lastId, $avatar_url);
          } else {
            $errorMessage = 'Vous n\'êtes pas connecté(e) !';
            $error = true;
          }
        } else {
          $userStmtStatus = true;
        }
        if ($stmtStatus && $userStmtStatus){
          $confirmationMessage = 'Vos modifications ont bien été enregistré !<br>Veuillez vous reconnecter pour les mettre en application';
          $confirmation = true;
          signOff();
          header('refresh:4;url=login.php');
        } else {
          $errorMessage = 'Une erreur a été rencontré avec la base de donnée<br>Veuillez réessayer plus tard';
          $error = true;
          return;
        }
      } else {
        $errorMessage = 'Un des champs est incorrect, veuillez réessayer';
        $error = true;
        return;
      }
    } else {
      $errorMessage = 'Un des champs est incorrect, veuillez réessayer';
      $error = true;
      return;
    }
  } else {
    $errorMessage = 'Vous n\'êtes pas connecté(e) !';
    $error = true;
  }
} ?>
