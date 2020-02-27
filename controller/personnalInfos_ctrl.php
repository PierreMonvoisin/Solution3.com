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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmUpdateSubmit'])){
  $username = $password = $error = $errorMessage = null;
  $validatedUsername = ''; $validatedPassword = '';
  $passwordHash = null; $set = []; $whichBind = null;
  $mail = $_SESSION['mail'] ?? null;
  empty(trim($_POST['updatePassword'])) ? $password = null : $password = $_POST['updatePassword'];
  empty(trim($_POST['confirmUpdatePassword'])) ? $confirmation = null : $confirmation = $_POST['confirmUpdatePassword'];
  empty(trim($_POST['updateUsername'])) ? $username = null : $username = $_POST['updateUsername'];
  if ($password == null && $confirmation == null && $username == null){
    // Form empty, do nothing
  } else if (($password != null && $confirmation == null) || ($password == null && $confirmation != null)){
    // Password or confirmation empty
  } else if (($password != null && $confirmation != null) || $username != null){
    require 'validateUpdateInputs_ctrl.php';
    if ($username != null){
      $validatedUsername = validateUpdateInputs('username', $username);
      $validatedUsername == false ?: $set['username'] = '`username` = :username';
    } else {
      $username = '';
    }
    if ($password != null && $confirmation != null){
      if($password === $confirmation){
        $validatedPassword = validateUpdateInputs('password', $password);
        if ($validatedPassword != false ){
          $set['password'] = '`password` = :password';
          $passwordHash = password_hash($validatedPassword, PASSWORD_BCRYPT);
        }
      } else {
        // Password and confirmation different
      }
    } else {
      $password = $confirmation = '';
    }
    // Go to database
    if (count($set) === 2){
      $whichBind = 'both';
      $set = implode(', ', $set);
    } else if (count($set) === 1){
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
    }
    $values = ['password'=>$passwordHash, 'username'=>$validatedUsername];
    require '../model/updateUserInfos_mod.php';
    [$stmtStatus,$stmt] = updateUserInfos($mail, $set, $values, $whichBind);
  }
}
?>
