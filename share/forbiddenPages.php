<?php // Check if user is connected or not and block some pages in consequence
$pageName = explode('/', "$_SERVER[REQUEST_URI]");
$pageNameOptions = ['options'=>['regexp'=>'/^([a-z]{3,35})(\.php)$/']];
$pageName = filter_var(array_pop($pageName), FILTER_VALIDATE_REGEXP, $pageNameOptions);
$forbiddenConnectedPages = ['signin.php', 'login.php'];
$forbiddenDisconnectedPages = ['user.php'];
if ($pageName != false){
  isset($_SESSION['mail']) && ! empty(trim($_SESSION['mail'])) ? $mail = trim($_SESSION['mail']) : $mail = null;
  isset($_SESSION['id']) && ! empty(trim($_SESSION['id'])) ? $id = trim($_SESSION['id']) : $id = null;
  if ($mail != null && $id != null){
    if (in_array($pageName, $forbiddenConnectedPages)){
      header('Location: ../view/user.php');
    }
  } else {
    if (in_array($pageName, $forbiddenDisconnectedPages)){
      header('Location: ../view/signin.php');
    }
  }
} else {
  echo 'page non reconnue';
} ?>
