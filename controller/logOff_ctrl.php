<?php
// Log out
if (isset($_POST['signOffConfirmation'])) {
  // Set cookie for one minute to clear the localStorage in JS
  setcookie('clearLocalStorage', 'true', time() + 60, '/');
  unset($_POST['signOffConfirmation']);
  // Empty out the session
  session_start();
  $_SESSION = [];
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
  }
  session_destroy();
  session_write_close();
  // Delete the cookie for the avatar url by setting its expiration date 1 hour ago
  setcookie('avatarUrl', '', time() - 3600, '/');
  // Redirect directly to the new user page
  header("Location: signin.php");
}
?>
