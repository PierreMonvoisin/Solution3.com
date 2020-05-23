if (localStorage.getItem('main_font_color') != null){
  var mainFontColor = localStorage.getItem('main_font_color').trim();
  var secondaryFontColor = localStorage.getItem('secondary_font_color').trim();
  var mainBackgroundColor = localStorage.getItem('main_background_color').trim();
  var secondaryBackgroundColor = localStorage.getItem('secondary_background_color').trim();
  var headerBackgroundColor = localStorage.getItem('header_background_color').trim();
  var statsBackgroundColor = localStorage.getItem('stats_background_color').trim();
  var displayTimer = Number(localStorage.getItem('display_timer').trim());
  var mainFont = localStorage.getItem('main_font').trim();
  var timerFont = localStorage.getItem('timer_font').trim();

  $('.main_font_color').css('color', mainFontColor);
  $('.secondary_font_color').css('color', secondaryFontColor);
  $('.main_background_color').css('background-color', mainBackgroundColor);
  $('.secondary_background_color').css('background-color', secondaryBackgroundColor);
  $('.header_background_color').css('background-color', headerBackgroundColor);
  $('.button_header_background_color').css('background-color', lightenDarkenHexColor(headerBackgroundColor, 40));
  $('.stats_background_color').css('background-color', statsBackgroundColor);
  if (! displayTimer){
    localStorage.setItem('hideTimer', 'true');
  } else {
    localStorage.removeItem('hideTimer');
  }
  $('body, html').css('font-family', mainFont);
  $('.timer_font').css('font-family', timerFont);
  
  // Change the form's inputs on personnalisations load
}
