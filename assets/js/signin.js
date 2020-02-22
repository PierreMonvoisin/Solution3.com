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
        message = 'Merci d\'avoir renseigné tous les champs';
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
        $('.outputMessage').text(newUserValidity);
        // If returned value is a boolean true, display confirmation message
      } else if (newUserValidity){
        $('.outputMessage').text(message);
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
          if (typeof(Storage) != "undefined") {
            // Add url to the local storage
            localStorage.setItem('userAvatarUrl', JSON.stringify(userAvatarUrl));
            // Add url value in the form input
          } else {
            // Alert if browser does not support local storage function
            alert('Désolé, notre navigateur ne supporte pas le local storage');
            // Redirect the window after 3 seconds
            setTimeout(function(){ location.href = "https://www.google.com/"; }, 2000);
          }
        }
      }
    } else if (errors.length > 0){
      // If error log has at least one value
      $('.outputMessage').text(message);
    }
  });
  // Sign off function after redirection from user.php
  // Function to find a cookie and its value from https://www.w3schools.com/js/js_cookies.asp
  function getCookie(cookieName) {
    var name = cookieName + '=';
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieList = decodedCookie.split(';');
    for(var i = 0; i < cookieList.length; i++) {
      var cookie = cookieList[i];
      while (cookie.charAt(0) == ' ') {
        cookie = cookie.substring(1);
      }
      if (cookie.indexOf(name) == 0) {
        return cookie.substring(name.length, cookie.length);
      }
    }
    return '';
  }
  // Check for the clearLocalStorage cookie to delete all solves from localStorage
  if (getCookie('clearLocalStorage') != ''){
    if (localStorage.getItem('storageAuthorization') == 'true'){
      localStorage.clear();
      localStorage.setItem('storageAuthorization', 'true');
    } else {
      localStorage.clear();
    }
  }
});
