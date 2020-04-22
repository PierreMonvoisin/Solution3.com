<?php
$personnalisationsArray = [];
// Get avater url if user is connected and the session didn't start yet
if (isset($_COOKIE['avatarUrl']) && ! empty($_COOKIE['avatarUrl'])){
    $userAvatarUrl = explode('alg=', $_COOKIE['avatarUrl']);
    $userScramble = array_pop($userAvatarUrl);
    // If the session isn't started or one of the value isn't set
  if (empty($_COOKIE['PHPSESSID']) || ! isset($_SESSION['mail'])){
    session_start();
    $url = $_COOKIE['avatarUrl'];
    $avatarUrlOptions = ['options'=>['regexp'=>"/^(\.\.\/share\/visualcube\.php\?fmt=png&bg=t&pzl=3&alg=)+([A-Z2']{15,30})+$/"]];
    if (! filter_var($url, FILTER_VALIDATE_REGEXP, $avatarUrlOptions)){
      return;
    }
    // Get all informations about the user form it's avatar url
    require '../model/DBInfosToSessionStorage_mod.php';
    $userInfos = DBInfosToSessionStorage($url);
    // If the user and its infos were found
    if (gettype($userInfos) != 'boolean'){
      // Re-set the cookie
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
      // Need to put all personnalisations informations into the JS and then the CSS
      $personnalisationsArray = ['main_font_color'=>$userInfos['main_font_color'],'secondary_font_color'=>$userInfos['secondary_font_color'],'main_background_color'=>$userInfos['main_background_color'],'secondary_background_color'=>$userInfos['secondary_background_color'],'header_background_color'=>$userInfos['header_background_color'],'stats_background_color'=>$userInfos['stats_background_color'],'display_timer'=>$userInfos['display_timer'],'main_font'=>$userInfos['main_font'],'timer_font'=>$userInfos['timer_font']];
    }
  }
} else {
  $userScramble = null;
} ?>
