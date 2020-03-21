function dnfTimeInLocalStorage_LS(index){
  if (typeof(Storage) != "undefined") {
    var timeToUpdate = localStorage.getItem('time_' + index);
    if (timeToUpdate != null && timeToUpdate != 'null'){
      if (localStorage.getItem('time_' + index + '_updated') != true){
        timeToUpdate = 'DNF';
        localStorage.setItem('time_' + index, timeToUpdate);
        localStorage.setItem('time_' + index + '_updated', 'true');
        var currentIndex = localStorage.getItem('index');
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
