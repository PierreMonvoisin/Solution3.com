<?php // Check if user is connected or not and block some pages in consequence
$pagePath = explode('/', $_SERVER['REQUEST_URI']);
$pageNameOptions = ['options'=>['regexp'=>'/^([a-zA-Z_-]{3,35})(\.php)$/']];
$pageName = filter_var(array_pop($pagePath), FILTER_VALIDATE_REGEXP, $pageNameOptions);
$allowedPages = ['/', 'index.php', 'timer.php', 'learningMenu.php', 'multiplayer.php', 'signin.php', 'login.php', 'user.php'];
$forbiddenConnectedPages = ['signin.php', 'login.php'];
$forbiddenDisconnectedPages = ['user.php'];
if ($pageName != false || $_SERVER['REQUEST_URI'] == '/'){
  if ($pageName == false){
    $pageName = '/';
  }
  if (in_array($pageName, $allowedPages)){
    // var_dump($pageName);
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
    header('Location: /');
  }
} else {
  echo 'page non reconnue<br>Page : '; var_dump($pageName);
} ?>
