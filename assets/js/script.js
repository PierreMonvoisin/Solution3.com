$(function(){
  // Launch the tooltip function
  $('[data-toggle="tooltip"]').tooltip();
  // Relocate the user on click of a button
  $('#topLeftButton').click(function(){
    window.location = 'user.php';
  });
  $('#topRightButton').click(function(){
    window.location = 'timer.php';
  });
  $('#bottomLeftButton').click(function(){
    window.location = 'learningMenu.php';
  });
  $('#bottomRightButton').click(function(){
    window.location = 'multiplayer.php';
  });
});
