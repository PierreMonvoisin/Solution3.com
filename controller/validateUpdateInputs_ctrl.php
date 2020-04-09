<?php require '../share/forbiddenPages.php';
function validateUpdateInputs($name, $value){
  if ($name == 'username'){
    // Sanitize and validate the username
    $value = filter_var($value, FILTER_SANITIZE_STRING);
    // Create the options array with the reg ex for the username
    $usernameOptions = ['options'=>['regexp'=>'/^[\w\x{00C0}-\x{00FF} "\'-]{1,15}$/']];
    $value = filter_var($value, FILTER_VALIDATE_REGEXP, $usernameOptions);
    return $value;
  } else if ($name == 'password'){
    // Sanitize and validate the password
    $value = filter_var($value, FILTER_SANITIZE_STRING);
    // Create the options array with the reg ex for the password
    $passwordOptions = ['options'=>['regexp'=>'/^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])?[\w!@#$%^&*]{8,}$/']];
    $value = filter_var($value, FILTER_VALIDATE_REGEXP, $passwordOptions);
    return $value;
  } else {
    // If the name is not recognized, return false;
    return false;
  }
}
?>
