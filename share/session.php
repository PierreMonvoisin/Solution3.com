<?php
// Get avater url if user is connected
if (isset($_COOKIE['avatarUrl']) && ! empty($_COOKIE['avatarUrl'])){
  $url = $_COOKIE['avatarUrl'];
  require 'tools/db/userInfosSession.php';
  $infos = DBInfoIntoSession($url);
  // isset($_COOKIE['PHPSESSID'])
  if (gettype($infos) != 'boolean' && ! isset($_SESSION['username'])){
    // Reset the cookie
    $cookieName = 'avatarUrl'; $cookieValue = $infos['avatar_url'];
    // Unix timestamp + (86400 seconds in a day * 7 to make a week)
    $cookieExpDate = time() + (86400 * 7);
    // Available on the whole website
    $cookiePath = '/';
    // Add simple information to get once the user already logged in
    setcookie($cookieName, $cookieValue, $cookieExpDate, $cookiePath);
    // Start the session
    session_start();
    $_SESSION['username'] = $infos['username'];
    $_SESSION['mail'] = $infos['mail'];
    $_SESSION['main_font_color'] = $infos['main_font_color'];
    $_SESSION['secondary_font_color'] = $infos['secondary_font_color'];
    $_SESSION['main_background_color'] = $infos['main_background_color'];
    $_SESSION['secondary_background_color'] = $infos['secondary_background_color'];
    $_SESSION['display_timer'] = $infos['display_timer'];
    $_SESSION['main_font'] = $infos['main_font'];
    $_SESSION['timer_font'] = $infos['timer_font'];

    // Set CSS properties

  } else {
    session_start();
  }
}
?>
