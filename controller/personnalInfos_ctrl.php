<?php
$formValidity = false; $error = false; $errorMessage = 'ERROR';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateConfirmation'])){
  $mail = $_SESSION['mail'] ?? null;
  empty(trim($_POST['password'])) ? $password = null : $password = $_POST['password'];
  if ($mail != null){
    if ($password != null){
      $cleanedPassword = filter_var($password, FILTER_SANITIZE_STRING);
      $passwordOptions = ['options'=>['regexp'=>'/^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])?[\w!@#$%^&*]{8,}$/']];
      $password = filter_var($cleanedPassword, FILTER_VALIDATE_REGEXP,$passwordOptions);
      if (gettype($password) != 'boolean'){
        require '../model/checkUserPassword_mod.php';
        $userInfos = checkUserPassword($mail);
        if (gettype($userInfos) != 'boolean'){
          if (password_verify($password, $userInfos['password'])) {
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
?>
