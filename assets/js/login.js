$(function(){
  var message = 'ERROR', validity = false;
  var errorLog = [], valueLog = [], formInfos = [[], false, 'ERROR'];
  // Check all form inputs
  function checkInputs() {
    // Initiate all values
    errorLog = [], valueLog = [], validity = false, formInfos = [[], [], false, 'ERROR'];
    // Check for the form to create a new user
    $('#loginCard :input[class=form-control]').each(function(){
      // For all the inputs, check if they are empty
      if (($(this).val()).trim() === ''){
        // If yes, put their name in the error log
        errorLog.push($(this).attr('id'));
      } else {
        // If no, put their value in the value log
        valueLog.push(($(this).val()).trim());
      }
      // If there has at least one value in the error log
      if (errorLog.length > 0){
        message = 'Veuillez renseigner tous les champs';
        validity = false;
      } else {
        message = 'Merci d\'avoir renseigné tous les champs, veuillez confirmer votre connexion';
        validity = true;
      }
      // Return both logs, the validity status and the final message
      formInfos = [valueLog, errorLog, validity, message];
    });
    return formInfos;
  }
  $('#loginPassword, #loginMail').blur(function(){
    // Launch the function to collect, sanitize and validate all inputs values
    var results = checkInputs();
    var loginValidity = '';
    // Debug lines
    // console.log('final result is :');
    // console.log(results);
    var [values, errors, status, message] = results;
    // If the status is true, the error log is empty and the value log has 2 values
    if (status && errors.length == 0 && values.length == 2 ){
      loginValidity = loginValidate(values);
      // If the returned value is neither " false " nor empty (so a string), dispay error message
      if (loginValidity && loginValidity != ''){
        $('.outputMessage').text(message);
        $('button[disabled]').attr('disabled', false);
      } else {
        $('.outputMessage').text(message);
      }
    } else if (errors.length > 0){
      // If error log has at least one value
      $('.outputMessage').text(message);
    }
  });
});
