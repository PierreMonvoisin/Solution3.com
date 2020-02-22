<?php // Initiate the error and confirmation booleans and messages
$error = false; $confirmation = false; $confirmationMessage = 'ERROR'; $errorMessage = 'ERROR';
// Check if the post request contains the name of the new user form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newSubmit'])) {
  // Initiate all variables to collect infos
  $newMail = ''; $newUsername = ''; $newPassword = ''; $newConfirmation = ''; $avatarUrl = '';
  // Verifiy if all values are not empty. If they are, replace them with a null
  empty(trim($_POST['avatarUrl'])) ?: $avatarUrl = trim($_POST['avatarUrl'], '"');
  ! empty(trim($_POST['username'])) ? $newUsername = $_POST['username'] : $newUsername = null;
  ! empty(trim($_POST['newMail'])) ? $newMail = $_POST['newMail'] : $newMail = null;
  ! empty(trim($_POST['newPassword'])) ? $newPassword = $_POST['newPassword'] : $newPassword = null;
  ! empty(trim($_POST['confirmation'])) ? $newConfirmation = $_POST['confirmation'] : $newConfirmation = null;
  // Put all values in an associative array
  $newUserInfos = ['avatarUrl'=>$avatarUrl, 'username'=>$newUsername, 'mail'=>$newMail, 'password'=>$newPassword, 'confirmation'=>$newConfirmation];
  // If the array contains a null value, display the error message
  if (in_array(null, $newUserInfos)){
    $errorMessage = '- Un des champ est incomplet -';
    $error = true;
  } else {
    // Verify that the password and the confirmation are identical
    if ($newPassword === $newConfirmation){
      // Include the form validation file
      require 'validateAllNewInputs_ctrl.php';
      // Sanitize and validate all values
      $cleanedNewInfos = validateAllNewInputs($newUserInfos);
      if (gettype($cleanedNewInfos) != 'string'){
        // Add default value to complete all the parametres of the request
        $cleanedNewInfos['idPersonnalisations'] = 1;
        $userInfos = $cleanedNewInfos;
        require '../model/addNewUser_mod.php';
        [$stmtStatus, $stmt] = addNewUser($userInfos);
        // $stmtStatus = bool
        if ($stmtStatus && $stmt->rowCount() > 0){
          $cookieName = 'avatarUrl'; $cookieValue = $userInfos['avatarUrl'];
          // Unix timestamp + (86400 seconds in a day * 7 to make a week)
          $cookieExpDate = time() + (86400 * 7);
          // Available on the whole website
          $cookiePath = '/';
          // Display confirmation message on cookie creation
          if(setcookie($cookieName, $cookieValue, $cookieExpDate, $cookiePath)){
            $confirmationMessage = '- Vous êtes bien enregistré(e), merci de vous connecter -';
            $confirmation = true;
          }
          // Wait 1 seconds and change the location of the page to the login page
          header('refresh:1;url=login.php');
        } else {
          $errorMessage = '- Une erreur a été rencontrée avec la base de donnée ou votre compte existe déjà.<br>Veuillez réessayer ultérieurement ou vous connecter -';
          $error = true;
        };
      } else {
        // If there is an error in the validation, display the appropriate error message
        $errorMessage = $cleanedNewInfos;
        $error = true;
      }
      // If the password is different than the confirmation, display the error message
    } else {
      $errorMessage = '- Le mot de passe est différent de la confirmation -';
      $error = true;
    }
  }
} ?>
