var currentFile = (window.location.pathname.split('/')).pop();
currentFile = currentFile.replace('.php', '');

if (localStorage.getItem('main_font_color') != null && getCookie('personnalisationsStored') != ''){
  var mainFontColor = localStorage.getItem('main_font_color').trim();
  var secondaryFontColor = localStorage.getItem('secondary_font_color').trim();
  var mainBackgroundColor = localStorage.getItem('main_background_color').trim();
  var secondaryBackgroundColor = localStorage.getItem('secondary_background_color').trim();
  var headerBackgroundColor = localStorage.getItem('header_background_color').trim();
  var statsBackgroundColor = localStorage.getItem('stats_background_color').trim();
  var displayTimer = localStorage.getItem('display_timer').trim();
  var mainFont = localStorage.getItem('main_font').trim();
  var timerFont = localStorage.getItem('timer_font').trim();

  // Put everything in css specific to each page
  console.log(currentFile);
}
