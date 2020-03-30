<?php
// Get avater url if user is connected and the session didn't start yet
if (isset($_COOKIE['avatarUrl']) && ! empty($_COOKIE['avatarUrl'])){
    $userAvatarUrl = explode('alg=', $_COOKIE['avatarUrl']);
    $userScramble = array_pop($userAvatarUrl);
  if (empty($_COOKIE['PHPSESSID']) || ! isset($_SESSION['mail'])){
    session_start();
    $url = $_COOKIE['avatarUrl'];
    require '../model/DBInfosToSessionStorage_mod.php';
    $userInfos = DBInfosToSessionStorage($url);
    // isset($_COOKIE['PHPSESSID'])
    if (gettype($userInfos) != 'boolean'){
      // Reset the cookie
      $cookieName = 'avatarUrl'; $cookieValue = $userInfos['avatar_url'];
      // Unix timestamp + (86400 seconds in a day * 7 to make a week)
      $cookieExpDate = time() + (86400 * 7);
      // Available on the whole website
      $cookiePath = '/';
      // Add simple information to get once the user already logged in
      setcookie($cookieName, $cookieValue, $cookieExpDate, $cookiePath);
      // Set all variables in session
      $_SESSION['id'] = $userInfos['id'];
      $_SESSION['username'] = $userInfos['username'];
      $_SESSION['mail'] = $userInfos['mail'];
      $_SESSION['avatar_url'] = $userInfos['avatar_url'];
      $_SESSION['id_personnalisations'] = $userInfos['id_personnalisations'];
      $_SESSION['main_font_color'] = $userInfos['main_font_color'];
      $_SESSION['secondary_font_color'] = $userInfos['secondary_font_color'];
      $_SESSION['main_background_color'] = $userInfos['main_background_color'];
      $_SESSION['secondary_background_color'] = $userInfos['secondary_background_color'];
      $_SESSION['header_background_color'] = $userInfos['header_background_color'];
      $_SESSION['stats_background_color'] = $userInfos['stats_background_color'];
      $_SESSION['display_timer'] = $userInfos['display_timer'];
      $_SESSION['main_font'] = $userInfos['main_font'];
      $_SESSION['timer_font'] = $userInfos['timer_font'];
    }
  }
} else {
  $userScramble = null;
} ?>
