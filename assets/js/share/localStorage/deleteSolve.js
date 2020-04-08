// Delete set solve in the local storage
function deleteTimeInLocalStorage_LS(index){
  // If the local storage is available
  if (typeof(Storage) != "undefined") {
    // If the time is found in LS and isn't null
    var timeToDelete = localStorage.getItem('time_' + index);
    if (timeToDelete != null && timeToDelete != 'null'){
      localStorage.removeItem('index_' + index);
      localStorage.removeItem('time_' + index);
      localStorage.removeItem('scramble_' + index);
      localStorage.removeItem('dateTime_' + index);
      localStorage.removeItem('ao5_' + index);
      localStorage.removeItem('ao12_' + index);
      localStorage.removeItem('ao50_' + index);
      var currentIndex = localStorage.getItem('index');
      // If the time deleted was the last solve in the list, update the last time
      if (currentIndex != null && currentIndex != 'null'){
        if (index == currentIndex){
          localStorage.removeItem('time');
          localStorage.removeItem('scramble');
          localStorage.removeItem('dateTime');
          localStorage.removeItem('ao5');
          localStorage.removeItem('ao12');
          localStorage.removeItem('ao50');
        }
      }
    }
  } else {
    console.warn('Impossible d\'enregistrer la résolution dans le stockage local du navigateur !');
  }
}
