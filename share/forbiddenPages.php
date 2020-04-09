<?php // Check if user is connected or not and block some pages in consequence
// Get the url page link
$pagePath = explode('/', $_SERVER['REQUEST_URI']);
// Create the options array with the reg ex for the page
$pageNameOptions = ['options'=>['regexp'=>'/^([a-zA-Z_-]{3,35})(\.php)$/']];
$pageName = filter_var(array_pop($pagePath), FILTER_VALIDATE_REGEXP, $pageNameOptions);
// Declare all pages allowed in the filter
$allowedPages = ['/', 'index.php', 'timer.php', 'learningMenu.php', 'multiplayer.php', 'signin.php', 'login.php', 'user.php'];
$forbiddenConnectedPages = ['signin.php', 'login.php'];
$forbiddenDisconnectedPages = ['user.php'];
if ($pageName != false || $_SERVER['REQUEST_URI'] == '/'){
  if ($pageName == false){
    $pageName = '/';
  }
  // If the page is recognized and allowed
  if (in_array($pageName, $allowedPages)){
    // Check is the user is connected
    isset($_SESSION['mail']) && ! empty(trim($_SESSION['mail'])) ? $mail = trim($_SESSION['mail']) : $mail = null;
    isset($_SESSION['id']) && ! empty(trim($_SESSION['id'])) ? $id = trim($_SESSION['id']) : $id = null;
    if ($mail != null && $id != null){
      // If he is, check if the page is allowed as a connected account
      if (in_array($pageName, $forbiddenConnectedPages)){
        header('Location: ../view/user.php');
      }
    } else {
      // If is not connected, check if the page is allowed for a random user
      if (in_array($pageName, $forbiddenDisconnectedPages)){
        header('Location: ../view/signin.php');
      }
    }
  } else {
    header('Location: /');
  }
} else {
  echo 'page non reconnue<br>Page : '; var_dump($pageName);
  // Wait before the refresh to check wich page it is
  header('refresh:1;url=/');
} ?>
