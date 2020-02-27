$(function(){
  // signOffModal
  $('#signOffButton').click(function(){
    $('#signOffModal').modal('show');
  });
  $('#cancelSignOff').click(function(){
    $('#signOffModal').modal('hide');
  });
  // settingsModal
  $('#settingsButton').click(function(){
    $('#settingsModal').modal('show');
  });
});
