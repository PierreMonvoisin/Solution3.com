$(function(){
  // Update modal
  $('#modifyButton').click(function(){
    $('#updateModal').modal('show');
  })
  $('#cancelUpdate').click(function(){
    $('#updateModal').modal('hide');
  })
  $('#password').blur(function(){
    if (($(this).val()).trim() != ''){
      $('#updateConfirmation').attr('disabled', false);
    } else {
      $('#updateConfirmation').attr('disabled', true);
    }
  })
});
