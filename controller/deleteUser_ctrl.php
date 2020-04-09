<?php require '../share/forbiddenPages.php';
$deleteError = false; $deleteConfirmation = false; $deleteConfirmationMessage = 'ERROR'; $deleteErrorMessage = 'ERROR';
// On form post and deleteAccountConfirmation button pressed
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteAccountConfirmation'])) {
  $mail = null; $id_personnalisations = null;
  // Check if value is set and isn't empty
  isset($_SESSION['mail']) && ! empty(trim($_SESSION['mail'])) ? $mail = trim($_SESSION['mail']) : $mail = null;
  isset($_SESSION['id']) && ! empty(trim($_SESSION['id'])) ? $id = trim($_SESSION['id']) : $id = null;
  isset($_SESSION['id_personnalisations']) && ! empty(trim($_SESSION['id_personnalisations'])) ? $id_personnalisations = trim($_SESSION['id_personnalisations']) : $id_personnalisations = null;
  // If all values are set
  if ($mail != null && $id_personnalisations != null && $id != null){
    // Sanitize all inputs
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
    // If all values are valid
    if ($mail != null && $id_personnalisations != null && $id != null){
      // If the user personnalisation isn't the default one, delete it
      if ($id_personnalisations != 1){
        require '../model/deleteUserPersonnalisations_mod.php';
        $personnalisationsStmtStatus = deleteUserPersonnalisations($id_personnalisations);
      } else {
        $personnalisationsStmtStatus = true;
      }
      // Delete user
      require '../model/deleteUser_mod.php';
      [$stmtStatus, $stmt] = deleteUser($mail);
      // Delete the user stats if there are some
      require '../model/deleteUserStats_mod.php';
      $userStmtStatus = deleteUserStats($id);
      // if all deletion worked well
      if ($stmtStatus && $personnalisationsStmtStatus && $userStmtStatus){
        $deleteConfirmationMessage = 'Votre compte a bien été supprimé. Vous allez être déconnecté(e).<br>Merci pour votre confiance, à bientôt !';
        $deleteConfirmation = true;
        // Disconnect the user and put him on the log in page
        signOff();
        header('refresh:3;url=signin.php');
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
