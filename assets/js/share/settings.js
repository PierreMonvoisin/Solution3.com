$(function () {
  // Initiate all variables to null value
  var mainFontColor, secondaryFontColor, mainBackgroundColor, secondaryBackgroundColor, headerBackgroundColor, statsBackgroundColor, displayTimer, mainFont, timerFont;
  mainFontColor = secondaryFontColor = mainBackgroundColor = secondaryBackgroundColor = headerBackgroundColor = statsBackgroundColor = displayTimer = mainFont = timerFont = null;
  var current_mainFontColor, current_secondaryFontColor, current_mainBackgroundColor, current_secondaryBackgroundColor, current_headerBackgroundColor, current_statsBackgroundColor, current_displayTimer, current_mainFont, current_timerFont;
  current_mainFontColor = current_secondaryFontColor = current_mainBackgroundColor = current_secondaryBackgroundColor = current_headerBackgroundColor = current_statsBackgroundColor = current_displayTimer = current_mainFont = current_timerFont = null;
  // Get the name of the current file open
  var current_file = (window.location.pathname.split('/')).pop();

  // Get the current personnalisation value
  if (current_file === 'learningMenu.php'){
    current_mainFontColor = 'rgb(33, 37, 41)';
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
    $('header button').css('background-color', lightenColor(headerBackgroundColor, 15));
    if (current_file === 'user.php') {
      $('#avatarHeader').css('background-color', headerBackgroundColor);
    }
  });
  $('#statsBackgroundColor').change(function() {
    statsBackgroundColor = $(this).val();
    $('#sideTimer').css('background-color', statsBackgroundColor);
  });
  $('#displayTimer').change(function(){
    $('#timer').css('visibility', 'visible');
    localStorage.setItem('displayTimer', 'yep');
  })
  $('#hideTimer').change(function(){
    localStorage.setItem('displayTimer', 'nope');
  })
  $('#mainFont').change(function () {
    mainFont = $(this).val();
    $('html, body').css('font-family', mainFont);
  });
  $('#timerFont').change(function() {
    timerFont = $(this).val();
    $('#timer').css('font-family', timerFont);
  })
  // Need to learn how to works, but it works
  function lightenColor(color, percent) {
    var num = parseInt(color.replace("#",""),16);
    var amt = Math.round(2.55 * percent);
    var r = (num >> 16) + amt;
    var g = (num & 0x0000FF) + amt;
    var b = (num >> 8 & 0x00FF) + amt;
    return "#" + (0x1000000 + (r<255?r<1?0:r:255)*0x10000 + (b<255?b<1?0:b:255)*0x100 + (g<255?g<1?0:g:255)).toString(16).slice(1);
  };
  // Original content : https://gist.github.com/renancouto/4675192
});
