<?php
// Get avater url if user is connected and the session didn't start yet
if (isset($_COOKIE['avatarUrl']) && ! empty($_COOKIE['avatarUrl'])){
  if (empty($_COOKIE['PHPSESSID'])){
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
      // Start the session
      session_start();
      $_SESSION['username'] = $userInfos['username'];
      $_SESSION['mail'] = $userInfos['mail'];
      $_SESSION['main_font_color'] = $userInfos['main_font_color'];
      $_SESSION['secondary_font_color'] = $userInfos['secondary_font_color'];
      $_SESSION['main_background_color'] = $userInfos['main_background_color'];
      $_SESSION['secondary_background_color'] = $userInfos['secondary_background_color'];
      $_SESSION['display_timer'] = $userInfos['display_timer'];
      $_SESSION['main_font'] = $userInfos['main_font'];
      $_SESSION['timer_font'] = $userInfos['timer_font'];
      // Set CSS properties

    } else {
      // Error message from the database
    }
  } else {
    session_start();
  }
}
?>
