<?php
$pageUrl = explode('/', $_SERVER['SCRIPT_NAME']);
$page = end($pageUrl);
if ($page == 'index.php'){
  require 'share/forbiddenPages.php';
} else {
  require '../share/forbiddenPages.php';
}
$cookieName = 'storageAuthorization'; $cookieValue = 'true';
// Unix timestamp + (86400 seconds in a day * 7 to make a week * 50 to almost make a year)
$cookieExpDate = time() + (86400 * 7 * 50);
// Available on the whole website
$cookiePath = '/';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['storageAuthorization'])) {
  // Add user authorization in cookies to able all storage functions
  setcookie($cookieName, $cookieValue, $cookieExpDate, $cookiePath);
}
if (! isset($_COOKIE['storageAuthorization'])){
  setcookie($cookieName, $cookieValue, $cookieExpDate, $cookiePath);
}
?>
