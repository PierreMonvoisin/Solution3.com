$(function () {
  // Set default position as open
  var position = 'open';
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
