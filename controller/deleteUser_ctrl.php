<?php
$deleteError = false; $deleteConfirmation = false; $deleteConfirmationMessage = 'ERROR'; $deleteErrorMessage = 'ERROR';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteAccountConfirmation'])) {
  $mail = null; $id_personnalisations = null;
  isset($_SESSION['mail']) && ! empty(trim($_SESSION['mail'])) ? $mail = trim($_SESSION['mail']) : $mail = null;
  isset($_SESSION['id']) && ! empty(trim($_SESSION['id'])) ? $id = trim($_SESSION['id']) : $id = null;
  isset($_SESSION['id_personnalisations']) && ! empty(trim($_SESSION['id_personnalisations'])) ? $id_personnalisations = trim($_SESSION['id_personnalisations']) : $id_personnalisations = null;
  if ($mail != null && $id_personnalisations != null && $id != null){
    $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
    $id_personnalisations = filter_var($id_personnalisations, FILTER_SANITIZE_NUMBER_INT);
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    // Validate all inputs
    $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);
    $id_personnalisations = filter_var($id_personnalisations, FILTER_VALIDATE_INT);
    $id = filter_var($id, FILTER_VALIDATE_INT);
    // If validate return boolean, set value as null
    gettype($mail) != 'boolean' ?: $mail = null;
    gettype($id_personnalisations) != 'boolean' ?: $id_personnalisations = null;
    gettype($id) != 'boolean' ?: $id = null;
    if ($mail != null && $id_personnalisations != null && $id != null){
      if ($id_personnalisations != 1){
        require '../model/deleteUserPersonnalisations_mod.php';
        $personnalisationsStmtStatus = deleteUserPersonnalisations($id_personnalisations);
      } else {
        $personnalisationsStmtStatus = true;
      }
      require '../model/deleteUserStats_mod.php';
      $userStmtStatus = deleteUserStats($id);
      require '../model/deleteUser_mod.php';
      [$stmtStatus, $stmt] = deleteUser($mail);
      // $stmtStatus = bool
      if ($stmtStatus && $personnalisationsStmtStatus && $userStmtStatus){
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
