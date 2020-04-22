$(function(){
  var expiryDate = new Date();
  expiryDate.setTime(expiryDate.getTime() + (7 * 24 * 60 * 60 * 1000));
  if (typeof(Storage) != "undefined") {
    // Check if the user has already allowed the storage modal
    if (! localStorage.getItem('storageAuthorization')){
      $('#userAuthorizationModal').modal({backdrop: 'static', keyboard: false});
    } else {
      if (getCookie('storageAuthorization') == ''){
        document.cookie('storageAuthorization=true; expires=' + expiryDate.toUTCString() + '; path=/');
      }
    }
  } else {
    alert('Le stockage local n\'est pas disponible sur votre navigateur.\n\tL\'utilisation de Solution³ va être compromise !');
  }
  // If the user declines, send him to Google
  $('.storageDecline').click(function(){
    $('#userAuthorizationModal').modal('hide');
  });
  // If the user allow, add his choice to the local storage not to ask him again
  $('.storageAllow').click(function(){
    $('#userAuthorizationModal').modal('hide');
    if (typeof(Storage) != "undefined") {
      localStorage.setItem('storageAuthorization', 'true');
      document.cookie('storageAuthorization=true; expires=' + expiryDate.toUTCString() + '; path=/');
    }
  });
});
