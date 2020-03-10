<?php
$deleteError = false; $deleteConfirmation = false; $deleteConfirmationMessage = 'ERROR'; $deleteErrorMessage = 'ERROR';
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
        $deleteConfirmationMessage = 'Votre compte a bien été supprimé. Vous allez être déconnecté(e).<br>Merci pour votre confiance, à bientôt !';
        $deleteConfirmation = true;
        signOff();
        header('refresh:2;url=signin.php');
      }
    } else {
      $deleteErrorMessage = 'Une erreur est survenue. Veuillez vous reconnecter';
      $deleteError = true;
    }
  } else {
    $deleteErrorMessage = 'Vous n\'êtes pas connecté(e), veuiller vous connecter pour continuer';
    $deleteError = true;
  }
} ?>
