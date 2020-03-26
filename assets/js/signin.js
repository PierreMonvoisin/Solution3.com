$(function(){
  var topAvatar = 'default';
  // Add avatar if it is set in the localStorage
  if (typeof(Storage) != "undefined") {
    if (localStorage.getItem('userAvatarUrl')){
      // Set the status of the avatar as set
      topAvatar = 'set';
      // Add url value in the form input
      $('#avatarUrl').val(JSON.parse(localStorage.getItem('userAvatarUrl')));
    }
  } else {
    alert('Le stockage local n\'est pas disponible sur votre navigateur.\n\tL\'utilisation de Solution³ va être compromise !');
  }
  var message = 'ERROR', validity = false;
  var errorLog = [], valueLog = [], formInfos = [[], false, 'ERROR'];
  // Check all form inputs
  function checkInputs() {
    // Initiate all values
    errorLog = [], valueLog = [], validity = false, formInfos = [[], [], false, 'ERROR'];
    // Check for the form to create a new user
    $('#newUserCard :input[class=form-control]').each(function(){
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
        message = 'Merci d\'avoir renseigné tous les champs, veuillez confirmer la création de votre compte';
        validity = true;
      }
      // Return both logs, the validity status and the final message
      formInfos = [valueLog, errorLog, validity, message];
    });
    return formInfos;
  }
  $('#confirmation').blur(function(){
    // Launch the function to collect, sanitize and validate all inputs values
    var results = checkInputs();
    var newUserValidity = '';
    // Debug lines
    // console.log('final result is :');
    // console.log(results);
    var [values, errors, status, message] = results;
    // If the status is true, the error log is empty and the value log has 4 values
    if (status && errors.length == 0 && values.length == 4){
      newUserValidity = newUserValidate(values);
      // If the returned value is neither a boolean nor and empty string, dispay error message
      if (typeof newUserValidity != 'boolean' && newUserValidity != ''){
        $('.outputMessage').html(newUserValidity);
        // If returned value is a boolean true, display confirmation message
      } else if (newUserValidity){
        $('.outputMessage').html(message);
        $('button[disabled]').attr('disabled', false);
        // Set a new avatar if it isn't already
        if (topAvatar != 'set'){
          // Generate a random scramble to create a unique picture for the user
          var scramble = newScramble(15); // 15 letters long
          // Creation of url to put as randomly created scramble of image
          userAvatarUrl = '../share/visualcube.php?' + 'fmt=png&' + 'bg=t&' + 'pzl=3&' + 'alg=' + scramble;
          // Set the status of the avatar as set
          $('#avatarUrl').val(JSON.stringify(userAvatarUrl));
          document.cookie('avatarUrl='+ userAvatarUrl);
          topAvatar = 'set';
          if (localStorage.getItem('storageAuthorization')){
            localStorage.setItem('userAvatarUrl', userAvatarUrl);
          }
        }
      }
    } else if (errors.length > 0){
      // If error log has at least one value
      $('.outputMessage').text(message);
    }
  });
  // Sign off functions after redirection from user.php
  // Check for the clearLocalStorage cookie to delete all solves from localStorage on logOut
  if (getCookie('clearLocalStorage') != ''){
    if (localStorage.getItem('storageAuthorization')){
      if (localStorage.getItem('storageAuthorization') == 'true'){
        localStorage.clear();
        localStorage.setItem('storageAuthorization', 'true');
      } else {
        localStorage.clear();
      }
    }
  }
});
