if (typeof(Storage) != "undefined") {
  if (localStorage.getItem('index')){
    var numberOfSolve = Number(localStorage.getItem('index'));
    while (localStorage.getItem('index_' + numberOfSolve) == null  && numberOfSolve > 0){
      numberOfSolve--;
    }
    if (numberOfSolve > 0){
      // Delete "no solve" message
      $('#noSolve').hide();
      for (numberOfSolve; numberOfSolve >= 1; numberOfSolve--){
        var index_LS = localStorage.getItem(`index_${numberOfSolve}`);
        index_LS == null ? index_LS = '' : index_LS = Number(index_LS);
        var time_LS = localStorage.getItem(`time_${numberOfSolve}`);
        time_LS == null ? time_LS = '-' : time_LS = millisecondsToFullTime(time_LS);
        var ao5_LS = localStorage.getItem(`ao5_${numberOfSolve}`);
        ao5_LS == null ? ao5_LS = '-' : ao5_LS = millisecondsToFullTime(ao5_LS);
        var ao12_LS = localStorage.getItem(`ao12_${numberOfSolve}`);
        ao12_LS == null ? ao12_LS = '-' : ao12_LS = millisecondsToFullTime(ao12_LS);
        var ao50_LS = localStorage.getItem(`ao50_${numberOfSolve}`);
        ao50_LS == null ? ao50_LS = '-' : ao50_LS = millisecondsToFullTime(ao50_LS);
        var scramble_LS = localStorage.getItem(`scramble_${numberOfSolve}`);
        scramble_LS == null ? scramble_LS = '' : scramble_LS;
        var dateTime_LS = localStorage.getItem(`dateTime_${numberOfSolve}`);
        dateTime_LS == null ? dateTime_LS = '' : dateTime_LS;
        if (index_LS != '' && time_LS != '-' && scramble_LS != '-'){
          // Create new line to put the informations in solve history
          var tr = document.createElement('tr');
          tr.setAttribute('id', index_LS);
          tr.innerHTML = `<td id="${dateTime_LS}" class="indexValue py-1 px-1 border-left-0 border-right-0 border-top-0">#${index_LS}</td>
          <td id="${scramble_LS}" class="timeValue py-1 px-1 border-top-0">${time_LS}</td>
          <td class="ao5Value py-1 px-1 border-left-0 border-top-0 border-right-0">${ao5_LS}</td>
          <td class="ao12Value py-1 px-1 border-top-0">${ao12_LS}</td>
          <td class="ao50Value py-1 px-1 border-left-0 border-right-0 border-top-0">${ao50_LS}</td>`;
          $('#solveList tbody').append(tr);
          if (numberOfSolve == Number(localStorage.getItem('index'))){
            // Put solve in solve statistics
            $('#sideStatIndex').html(index_LS);
            $('#sideStatSingle').html(time_LS);
            $('#sideStatAo5').html(ao5_LS);
            $('#sideStatAo12').html(ao12_LS);
            $('#sideStatAo50').html(ao50_LS);
            // Put averages under timer
            $('#averageOf5 span').html(ao5_LS);
            $('#averageOf12 span').html(ao12_LS);
          }
          // Add the informations to the array of averages
          fromLStoAverageArray_LS(time_LS);
        }
      }
    }
  } else {
    // No solve
  }
} else {
  console.warn('Impossible d\'afficher les résolutions depuis le stockage local du navigateur !');
}
