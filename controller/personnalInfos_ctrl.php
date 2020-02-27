<?php
// For the update confirmation modal asking for the password //
$formValidity = false; $error = false; $errorMessage = 'ERROR'; $mail = null;
// Detect the name of the submit button of the update form query
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateConfirmation'])){
  $mail = $_SESSION['mail'] ?? null;
  empty(trim($_POST['password'])) ? $password = null : $password = $_POST['password'];
  // If the mail was found in the session storage
  if ($mail != null){
    // If the password input insn't empty
    if ($password != null){
      // Sanitize and validate password with same regex as the sign up form
      $cleanedPassword = filter_var($password, FILTER_SANITIZE_STRING);
      $passwordOptions = ['options'=>['regexp'=>'/^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])?[\w!@#$%^&*]{8,}$/']];
      $password = filter_var($cleanedPassword, FILTER_VALIDATE_REGEXP,$passwordOptions);
      // If validation didn't return " false "
      if (gettype($password) != 'boolean'){
        require '../model/checkUserPassword_mod.php';
        // Get password from database
        $userInfos = checkUserPassword($mail);
        // If the data was received
        if (gettype($userInfos) != 'boolean'){
          // And if the password is correct
          if (password_verify($password, $userInfos['password'])) {
            // Let the user access the update form
            $formValidity = true;
          } else {
            $errorMessage = 'Le mot de passe est incorrect !';
            $error = true;
          }
        } else {
          $errorMessage = 'Une erreur a été rencontré avec la base de donnée<br>Veuillez réessayer plus tard';
          $error = true;
        }
      } else {
        $errorMessage = 'Le mot de passe est incorrect !';
        $error = true;
      }
    } else {
      $errorMessage = 'Veuillez renseigner votre mot de passe';
      $error = true;
    }
  } else {
    $errorMessage = 'Une erreur a été rencontré, veuillez vous déconnecter puis vous reconnecter';
    $error = true;
  }
}
// For the update form //
// Detect the name of the submit button of the update form query
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmUpdateSubmit'])){
  $username = $password = $error = $errorMessage = null;
  $validatedUsername = ''; $validatedPassword = '';
  $passwordHash = null; $set = []; $whichBind = null;
  $mail = $_SESSION['mail'] ?? null;
  empty(trim($_POST['updatePassword'])) ? $password = null : $password = $_POST['updatePassword'];
  empty(trim($_POST['confirmUpdatePassword'])) ? $confirmation = null : $confirmation = $_POST['confirmUpdatePassword'];
  empty(trim($_POST['updateUsername'])) ? $username = null : $username = $_POST['updateUsername'];
  // If every input is empty, do nothing
  if ($password == null && $confirmation == null && $username == null){
    $errorMessage = 'Aucun changement enregistré';
    $error = true;
  } else if (($password != null && $confirmation == null) || ($password == null && $confirmation != null)){
    // If the password or the confirmation is filled but not the other
    $errorMessage = 'Le mot de passe et la confirmation sont différents';
    $error = true;
  } else if (($password != null && $confirmation != null) || $username != null){
    // If the password/confirmation are filled or the username is filled
    require 'validateUpdateInputs_ctrl.php';
    if ($username != null){
      // Check the username for profanities
      require '../share/profanitiesList.php';
      if (! in_array($username, $frenchBadWords) && ! in_array($username, $englishBadWords)){
        // If there are none, sanitize and validate the username
        $validatedUsername = validateUpdateInputs('username', $username);
        // If it is validated, add the username settings to the SQL request
        $validatedUsername == false ?: $set['username'] = '`username` = :username';
      } else {
        $errorMessage = 'Merci de ne pas mettre d\'insulte dans votre nom d\'utilisateur !';
        $error = true;
        return;
      }
    } else {
      $username = '';
    }
    // If the password and the confirmation aren't null
    if ($password != null && $confirmation != null){
      // If password and confirmation are the same
      if($password === $confirmation){
        // Sanitize and validate the password input
        $validatedPassword = validateUpdateInputs('password', $password);
        if ($validatedPassword != false ){
          // If it is validated, add the password settings to the SQL request
          $set['password'] = '`password` = :password';
          // Crypt the passwod for the security of storage
          $passwordHash = password_hash($validatedPassword, PASSWORD_BCRYPT);
        }
      } else {
        $errorMessage = 'Le mot de passe et la confirmation sont différents';
        $error = true;
      }
    } else {
      $password = $confirmation = '';
    }
    // If the username and the password was changed, transform the array in a string
    if (count($set) === 2){
      $whichBind = 'both';
      $set = implode(', ', $set);
    } else if (count($set) === 1){
      // If 1 input was changed, find out which for the SQL request
      if (array_key_exists('password',$set)){
        $whichBind = 'password';
      } else {
        $whichBind = 'username';
      }
      $set = implode($set);
    } else {
      $set = '';
      $whichBind = 'none';
      // Display Error
      $errorMessage = 'Un problème a été rencontré avec le formulaire, veuillez réessayer';
      $error = true;
      return;
    }
    // Put the infos in an associative array, no matter the value
    $values = ['password'=>$passwordHash, 'username'=>$validatedUsername];
    require '../model/updateUserInfos_mod.php';
    // Send the values to the database and get the return value and SQL statement
    [$stmtStatus,$stmt] = updateUserInfos($mail, $set, $values, $whichBind);
  }
}
?>
