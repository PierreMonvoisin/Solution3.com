// Add two seconds to the set time in the local storage
function addTwoSecondsInLocalStorage_LS(index){
  // If the local storage is available
  if (typeof(Storage) != "undefined") {
    // If the time is found in LS and isn't null
    var timeToUpdate = localStorage.getItem('time_' + index);
    if (timeToUpdate != null && timeToUpdate != 'null'){
      if (localStorage.getItem('time_' + index + '_updated') != true){
        // If the time wasn't modified yet, add 2000 milliseconds
        timeToUpdate = Number(timeToUpdate) + 2000;
        localStorage.setItem('time_' + index, timeToUpdate);
        localStorage.setItem('time_' + index + '_updated', 'true');
        var currentIndex = localStorage.getItem('index');
        // If the time changed was the last solve in the list, update the last time
        if (currentIndex != null && currentIndex != 'null'){
          if (index == currentIndex){
            localStorage.setItem('time', timeToUpdate);
          }
        }
      }
    }
  } else {
    console.warn('Impossible d\'enregistrer la résolution dans le stockage local du navigateur !');
  }
}
