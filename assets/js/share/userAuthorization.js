$(function(){
  if (typeof(Storage) != "undefined") {
    // Check if the user has already allowed the storage modal
    if (! localStorage.getItem('storageAuthorization')){
      $('#userAuthorizationModal').modal({backdrop: 'static', keyboard: false});
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
    }
  });
});
