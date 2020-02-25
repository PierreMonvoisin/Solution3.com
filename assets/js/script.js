$(function(){
  // Launch the tooltip function
  $('[data-toggle="tooltip"]').tooltip();
  var userLink = 'view/signin.php';
  if( getCookie('avatarUrl') != '' ){
    userLink = 'view/user.php';
  }
  // Relocate the user on click of a button
  $('#topLeftButton').click(function(){
    window.location = userLink;
  });
  $('#topRightButton').click(function(){
    window.location = 'view/timer.php';
  });
  $('#bottomLeftButton').click(function(){
    window.location = 'view/learningMenu.php';
  });
  $('#bottomRightButton').click(function(){
    window.location = 'view/multiplayer.php';
  });
});
