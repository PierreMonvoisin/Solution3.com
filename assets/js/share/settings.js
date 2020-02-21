$(function () {
  // Initiate all variables to default value
  var mainFontColor, secondaryFontColor, mainBackgroundColor, secondaryBackgroundColor, headerBackgroundColor, statsBackgroundColor, displayTimer, mainFont, timerFont;
  var current_mainFontColor, current_secondaryFontColor, current_mainBackgroundColor, current_secondaryBackgroundColor, current_headerBackgroundColor, current_statsBackgroundColor, current_displayTimer, current_mainFont, current_timerFont;
  mainFontColor = current_mainFontColor = '#000000';
  secondaryFontColor = current_secondaryFontColor = '#FFFFFF';
  mainBackgroundColor = current_mainBackgroundColor = '#E8DCD8';
  secondaryBackgroundColor = current_secondaryBackgroundColor = '#C1C1C1';
  headerBackgroundColor = current_headerBackgroundColor = '#463730';
  statsBackgroundColor = current_statsBackgroundColor = '#BF6B44';
  displayTimer = current_displayTimer = 1;
  mainFont = current_mainFont = '"Roboto", sans-serif';
  timerFont = current_timerFont = '"Gugi", cursive';
  // Get the name of the current file open
  var current_file = (window.location.pathname.split('/')).pop();

  // Get the current personnalisation value
  if (current_file === 'learningMenu.php'){
    current_mainFontColor = '#000000';
  } else if (current_file === 'user.php'){
    current_mainFontColor = $('#overviewStats').css('color');
  } else if (current_file === 'timer.php'){
    current_mainFontColor = $('#scramble').css('color');
  }
  // Set the correct value on change
  $('#mainFontColor').change(function () {
    mainFontColor = $(this).val();
    if (current_file === 'user.php') {
      $('#overviewStats, #history table, #history table th').css('color', mainFontColor);
    } else if (current_file === 'timer.php') {
      $('#scramble, #timer, #averageOf5, #averageOf12, #statsInMenu, .solveListTitle').css('color', mainFontColor);
      $('#scramble span').css('border-color', mainFontColor);
    }
  });
  // Get the current personnalisation value
  current_secondaryFontColor = $('header a').css('color');
  // Set the correct value on change
  $('#secondaryFontColor').change(function () {
    secondaryFontColor = $(this).val();
    if (current_file === 'learningMenu.php') {
      $('header a, .sectionTitle').css('color', secondaryFontColor);
    } else if (current_file === 'user.php') {
      $('#userStats h5, #usernameTitle, header a').css('color', secondaryFontColor);
    } else if (current_file === 'timer.php') {
      $('#statsTable, #historyTbody, header a').css('color', secondaryFontColor);
      $('#historyTbody td').css('border-color', secondaryFontColor);
      $('.statsHr').css('background-color', secondaryFontColor);
    }
  });
  // Get the current personnalisation value
  if (current_file === 'learningMenu.php'){
    current_mainBackgroundColor = $('body').css('background-color');
  } else {
    current_secondaryBackgroundColor = $('body').css('background-color');
  }
  // Set the correct value on change
  $('#mainBackgroundColor').change(function () {
    mainBackgroundColor = $(this).val();
    if (current_file === 'learningMenu.php') {
      $('body').css('background-color', mainBackgroundColor);
    }
  });
  $('#secondaryBackgroundColor').change(function () {
    secondaryBackgroundColor = $(this).val();
    if (current_file === 'user.php' || current_file === 'timer.php') {
      $('body').css('background-color', secondaryBackgroundColor);
    }
  });
  // Get the current personnalisation value
  current_headerBackgroundColor = $('header').css('background-color');
  // Set the correct value on change
  $('#headerBackgroundColor').change(function () {
    headerBackgroundColor = $(this).val();
    $('header, #scrollButton').css('background-color', headerBackgroundColor);
    $('header button').css('background-color', lightenDarkenHexColor(headerBackgroundColor, 40));
    if (current_file === 'user.php') {
      $('#avatarHeader').css('background-color', headerBackgroundColor);
    }
  });
  // Get the current personnalisation value
  if (current_file === 'timer.php'){
    current_statsBackgroundColor = $('#sideTimer').css('background-color');
  }
  // Set the correct value on change
  $('#statsBackgroundColor').change(function() {
    statsBackgroundColor = $(this).val();
    $('#sideTimer').css('background-color', statsBackgroundColor);
  });
  // Get the current personnalisation value
  if (typeof(localStorage.getItem('displayTimer')) != "undefined" && localStorage.getItem('displayTimer') !== null){
    current_displayTimer = localStorage.getItem('displayTimer');
    current_displayTimer == 'yep' ? current_displayTimer = 1 : current_displayTimer = 0;
  } else {
    current_displayTimer = 1;
  }
  // Set the correct value on change
  $('#displayTimer').change(function(){
    $('#timer').css('visibility', 'visible');
    localStorage.setItem('displayTimer', 'yep');
  })
  $('#hideTimer').change(function(){
    localStorage.setItem('displayTimer', 'nope');
  })
  // Get the current personnalisation value
  current_mainFont = $('html').css('font-family');
  if (current_file == 'timer.php'){
    current_timerFont = $('#timer').css('font-family');
  }
  // Set the correct value on change
  $('#mainFont').change(function () {
    mainFont = $(this).val();
    $('html, body').css('font-family', mainFont);
  });
  $('#timerFont').change(function() {
    timerFont = $(this).val();
    $('#timer').css('font-family', timerFont);
  })
  $('#cancel').click(function(){
    // Set the settings back to before the changes
    if (current_file == 'learningMenu.php'){
      $('header a, .sectionTitle').css('color', current_secondaryFontColor);
      $('body').css('background-color', current_mainBackgroundColor);
      $('header, #scrollButton').css('background-color', current_headerBackgroundColor);
      $('header button').css('background-color', lightenDarkenHexColor(rgbToHex(current_headerBackgroundColor), 40));
      $('html, body').css('font-family', current_mainFont);
    } else if (current_file == 'user.php'){

    } else if (current_file == 'timer.php'){
      
    }
    // Set the values in the form back to before the changes
    $('#mainFontColor').val(current_mainFontColor);
    $('#secondaryFontColor').val(rgbToHex(current_secondaryFontColor));
    $('#mainBackgroundColor').val(rgbToHex(current_mainBackgroundColor));
    $('#secondaryBackgroundColor').val(current_secondaryBackgroundColor);
    $('#headerBackgroundColor').val(rgbToHex(current_headerBackgroundColor));
    $('#statsBackgroundColor').val(current_statsBackgroundColor);
    // Detect if the timer was not to be displayed
    if (! current_displayTimer){
      $('#hideTimer').attr("checked", "checked");
    }
    $('#mainFont').val(current_mainFont);
    $("option[value='" + current_mainFont +"']").attr('selected', true);
    $('#timerFont').val(current_timerFont);
    $("option[value='" + current_timerFont +"']").attr('selected', true);
  })
  // Need to learn how to works, but it works
  function lightenDarkenHexColor(color,amount) {
    var usePound = false;
    if ( color[0] == "#" ) {
      color = color.slice(1);
      usePound = true;
    }
    var num = parseInt(color,16);
    var r = (num >> 16) + amount;
    if (r > 255){ r = 255; }
    else if (r < 0){ r = 0; }
    var b = ((num >> 8) & 0x00FF) + amount;
    if (b > 255){ b = 255; }
    else if (b < 0){ b = 0; }
    var g = (num & 0x0000FF) + amount;
    if (g > 255){ g = 255; }
    else if (g < 0){ g = 0; }
    return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);
  }
  // Original content : https://stackoverflow.com/q/5560248
  function rgbToHex(rgb) {
    if (/^#[0-9A-F]{6}$/i.test(rgb)){ return rgb; }
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    function hex(x) {
      return ("0" + parseInt(x).toString(16)).slice(-2);
    }
    return ("#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3])).toUpperCase();
  }
  // Original content : https://stackoverflow.com/a/3627747
});
