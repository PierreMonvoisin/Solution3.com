if (typeof(Storage) != "undefined") {
  if (localStorage.getItem('index')){
    var numberOfSolve = Number(localStorage.getItem('index'));
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
          tr.innerHTML = `<td id="${dateTime_LS}" class="indexValue py-2">#${index_LS}</td>
          <td id="${scramble_LS}" class="timeValue py-2">${time_LS}</td>
          <td class="ao5Value py-2">${ao5_LS}</td>
          <td class="ao12Value py-2">${ao12_LS}</td>
          <td class="ao50Value py-2">${ao50_LS}</td>`;
          $('#history tbody').append(tr);
        }
      }
    }
  }
} else {
  console.warn('Impossible d\'afficher les résolutions depuis le stockage local du navigateur !');
}
