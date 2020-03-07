<?php // Initiate the error and confirmation booleans and messages
$error = false; $confirmation = false; $confirmationMessage = 'ERROR'; $errorMessage = 'ERROR';
// Check if the post request contains the name of the login form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginSubmit'])) {
  // Initiate all variables to collect infos
  $loginMail = ''; $loginPassword = '';
  // Verifiy if all values are not empty. If they are, replace them with a null
  ! empty(trim($_POST['loginMail'])) ? $loginMail = $_POST['loginMail'] : $loginMail = null;
  ! empty(trim($_POST['loginPassword'])) ? $loginPassword = $_POST['loginPassword'] : $loginPassword = null;
  // Put all values in a single associative array
  $loginUserInfos = ['mail'=>$loginMail,'password'=>$loginPassword];
  // If the array contains a null value, display the error message
  if (in_array(null, $loginUserInfos)){
    $errorMessage = '- Un des champs est incomplet -';
    $error = true;
  } else {
    // Include the form validation file
    require 'validateAllLoginInputs_ctrl.php';
    // Sanitize and validate all values
    $cleanedLoginInfos = validateAllLoginInputs($loginUserInfos);
    if (gettype($cleanedLoginInfos) != 'string'){
      // Check with database if user exist
      $userInfos = $cleanedLoginInfos;
      require '../model/userValidity_mod.php';
      $results = userValidity($userInfos);
      if (gettype($results) != 'boolean'){
        if (password_verify($userInfos['password'], $results['password'])) {
          $cookieName = 'avatarUrl'; $cookieValue = $results['avatar_url'];
          // Unix timestamp + (86400 seconds in a day * 7 to make a week)
          $cookieExpDate = time() + (86400 * 7);
          // Available on the whole website
          $cookiePath = '/';
          // Add simple information to get once the user already logged in
          setcookie($cookieName, $cookieValue, $cookieExpDate, $cookiePath);
          // Valid inputs, user found and password correct
          $confirmationMessage = '- Vous êtes bien connecté(e) -';
          $confirmation = true;
          // Wait 1 seconds and change the location of the page to the user page
          header('refresh:1;url=user.php');
        } else {
          // Invalid email or password, please try again
          $errorMessage = '- Email ou mot de passe invalide, veuillez réessayer -';
          $error = true;
        }
      } else {
        // Invalid email or password, please try again
        $errorMessage = '- Email ou mot de passe invalide, veuillez réessayer -';
        $error = true;
      }
    } else {
      // If there is an error in the validation, display the appropriate error message
      $errorMessage = $cleanedLoginInfos;
      $error = true;
    }
  }
} ?>
