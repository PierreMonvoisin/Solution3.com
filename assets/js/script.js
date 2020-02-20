$(function(){
  // Launch the tooltip function
  $('[data-toggle="tooltip"]').tooltip();
  // Relocate the user on click of a button
  $('#topLeftButton').click(function(){
    window.location = 'view/user.php';
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
