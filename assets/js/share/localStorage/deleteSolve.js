function deleteTimeInLocalStorage_LS(index){
  if (typeof(Storage) != "undefined") {
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
      if (currentIndex != null && currentIndex != 'null'){
        if (index == currentIndex){
          localStorage.removeItem('index');
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
