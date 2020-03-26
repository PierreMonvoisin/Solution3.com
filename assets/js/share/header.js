$(function () {
  var currentFile = (window.location.pathname.split('/')).pop();
  if (currentFile == 'index.php' || currentFile == ''){
    $('#homeLink').attr('href', 'index.php');
    $('#timerLink').attr('href', 'view/timer.php');
    $('#lessonsLink').attr('href', 'view/learningMenu.php');
    $('#multiplayerLink').attr('href', 'view/multiplayer.php');
    if ($('#accountLink').attr('href') == 'signin.php'){
      $('#accountLink').attr('href', 'view/signin.php')
    } else {
      $('#accountLink').attr('href', 'view/user.php')
    }
  }
  // Set default position as open
  var position = 'open';
  $('#scrollButton').mouseenter(function(){
    if (position === 'closed'){
      $('#scrollButton').css({'transition': '0.5s', 'transform': 'scale(1.15)'});
    }
  })
  $('#scrollButton').mouseleave(function(){
    $('#scrollButton').css({'transition': '0.5s', 'transform': 'scale(1)'});
  })
  // On button click, execute the right function
  $('#scrollButton').click(function () {
    if (position === 'closed') {
      // If header is closed, open it
      headerOpening();
    } else {
      // If it is open, close it
      headerClosing();
    }
  });
  $('body').click(function(){
    if (position === 'open') {
      headerClosing();
    }
  })
  // Open the top menu
  function headerOpening() {
    $('header').slideDown('slow', function () {
      // Set position as open at the end of the animation
      position = 'open';
      // Change direction of arrow button
      $('#scrollButton img').attr('src', 'https://image.flaticon.com/icons/svg/271/271239.svg');
    });
  }
  // Close the top menu
  function headerClosing() {
    $('header').slideUp('slow', function () {
      // Set position as closed at the end of the animation
      position = 'closed';
      // Change direction of arrow button
      $('#scrollButton img').attr('src', 'https://image.flaticon.com/icons/svg/32/32195.svg')
    });
  }
  // Close header on page load
  headerClosing();
});
