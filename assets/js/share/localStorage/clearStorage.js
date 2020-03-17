function clearStorage_LS(){
  if (typeof(Storage) != "undefined") {
    if (localStorage.getItem('storageAuthorization') == 'true'){
      localStorage.clear();
      localStorage.setItem('storageAuthorization', 'true');
    } else {
      localStorage.clear();
    }
    location.reload();
  } else {
    console.warn('Impossible d\'effacer les résolutions dans le stockage local du navigateur !');
  }
}
