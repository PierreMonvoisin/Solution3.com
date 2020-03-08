<?php
$error = false; $confirmation = false; $confirmationMessage = 'ERROR'; $errorMessage = 'ERROR';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteAccountConfirmation'])) {
  $mail = null; $id_personnalisations = null;
  ! empty(trim($_SESSION['mail'])) ? $mail = trim($_SESSION['mail']) : $mail = null;
  ! empty(trim($_SESSION['id_personnalisations'])) ? $id_personnalisations = trim($_SESSION['id_personnalisations']) : $id_personnalisations = null;
  if ($mail != null && $id_personnalisations != null){
    $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
    $id_personnalisations = filter_var($id_personnalisations, FILTER_SANITIZE_NUMBER_INT);

    // Validate all inputs
    $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);
    $id_personnalisations = filter_var($id_personnalisations, FILTER_VALIDATE_INT);
    // If validate return boolean, set value as null
    gettype($mail) != 'boolean' ?: $mail = null;
    gettype($id_personnalisations) != 'boolean' ?: $id_personnalisations = null;
    if ($mail != null && $id_personnalisations != null){
      if ($id_personnalisations != 1){
        require '../model/deleteUserPersonnalisations_mod.php';
        $personnalisationsStmtStatus = deleteUserPersonnalisations($id_personnalisations);
      } else {
        $personnalisationsStmtStatus = true;
      }
      require '../model/deleteUser_mod.php';
      [$stmtStatus, $stmt] = deleteUser($mail);
      // $stmtStatus = bool
      if ($stmtStatus && $personnalisationsStmtStatus){
        $confirmationMessage = 'Votre compte a bien été supprimé. Vous allez être déconnecté(e).<br>Merci pour votre confiance, à bientôt !';
        $confirmation = true;
        signOff();
        header('refresh:3;url=signin.php');
      }
    } else {
      $errorMessage = 'Une erreur est survenue. Veuillez vous reconnecter';
      $error = true;
    }
  } else {
    $errorMessage = 'Vous n\'êtes pas connecté(e), veuiller vous connecter pour continuer';
    $error = true;
  }
} ?>
