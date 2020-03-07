<?php
// Log out
function signOff(){
  // Set cookie for one minute to clear the localStorage in JS
  setcookie('clearLocalStorage', 'true', time() + 60, '/');
  // Empty out the session
  if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
  }
  $_SESSION = [];
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
  }
  session_destroy();
  session_write_close();
  // Delete the cookie for the avatar url by setting its expiration date 1 hour ago
  setcookie('avatarUrl', '', time() - 3600, '/');
}
if (isset($_POST['signOffConfirmation'])) {
  unset($_POST['signOffConfirmation']);
  signOff();
  // Redirect directly to the new user page
  header("Location: login.php");
  exit();
}
?>
