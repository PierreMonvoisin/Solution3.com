function addSolve_LS(index, time, ao5, ao12, ao50, currentScramble, dateTime){
  if (typeof(Storage) != "undefined") {
    localStorage.setItem('index', index);
    localStorage.setItem('time', time);
    localStorage.setItem('scramble', currentScramble);
    localStorage.setItem('dateTime', dateTime);

    localStorage.setItem(`index_${index}`, index);
    localStorage.setItem(`time_${index}`, time);
    localStorage.setItem(`scramble_${index}`, currentScramble);
    localStorage.setItem(`dateTime_${index}`, dateTime);
    if (ao5 != '-'){
      localStorage.setItem('ao5', ao5);
      localStorage.setItem(`ao5_${index}`, ao5);
    }
    if (ao12 != '-'){
      localStorage.setItem('ao12', ao12);
      localStorage.setItem(`ao12_${index}`, ao12);
    }
    if (ao50 != '-'){
      localStorage.setItem('ao50', ao50);
      localStorage.setItem(`ao50_${index}`, ao50);
    }
  } else {
    console.warn('Impossible d\'enregistrer la résolution dans le stockage local du navigateur !');
  }
}
