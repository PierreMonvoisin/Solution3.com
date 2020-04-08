$(function() {
  // Zoom on the correct button on list mouseover
  $('#default li').mouseover(function(){
    // Get the first class of the list item
    var classList = $(this)[0].className.split(' ');
    // Use the first class name as a selector and " zoom " on the correct button
    $("#" + classList[0]).css({'transition': '0.5s', 'transform': 'scale(1.1)'});
  });
  // Zoom back to initial on mouseleave
  $('#default li').mouseleave(function(){
    var classList = $(this)[0].className.split(' ');
    $("#" + classList[0]).css({'transition': '0.5s', 'transform': 'scale(1)'});
  });
  // Recognition of which button was pushed and launch the right function
  $('button').click(function () {
    var whichButton = $(this).attr('id');
    var buttonName = [];
    if (whichButton != undefined) {
      buttonName = whichButton.split(/(?=[A-Z])/);
    } else {
      return;
    }
    // Detection of which button was pressed
    if (buttonName[0] === 'Top' && buttonName[1] === 'Left') {
      // Top left
    } else if (buttonName[0] === 'Top') {
      // Top Right
    } else if (buttonName[1] === 'Left') {
      // Display settings modal
      $('#settingsModal').modal('show');
    } else {
      // Bottom Right
    }
  });
});
