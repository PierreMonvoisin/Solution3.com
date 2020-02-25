// Function to find a cookie and its value from https://www.w3schools.com/js/js_cookies.asp
function getCookie(cookieName) {
  var name = cookieName + '=';
  var decodedCookie = decodeURIComponent(document.cookie);
  var cookieList = decodedCookie.split(';');
  for(var i = 0; i < cookieList.length; i++) {
    var cookie = cookieList[i];
    while (cookie.charAt(0) == ' ') {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(name) == 0) {
      return cookie.substring(name.length, cookie.length);
    }
  }
  return '';
}
