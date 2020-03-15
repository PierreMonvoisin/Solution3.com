// display the timer
function displayTimer(hours, minutes, seconds, milliseconds){
  $('#seconds, #separatorSeconds').show();
  $("#hours").html(prependZero(hours, 2));
  $("#minutes").html(prependZero(minutes, 2));
  $("#seconds").html(prependZero(seconds, 2));
  $("#milliseconds").html(milliseconds);
  //Check if hours and/or minutes are null, not to display them
  if ($("#hours").html() === '00' || $("#hours").html() === '0'){
    $("#hours, #separatorHours").hide();
  } else {
    $("#hours, #separatorHours").show();
  }
  if ($("#minutes").html() == '00' || $("#minutes").html() == '0'){
    $("#minutes, #separatorMinutes").hide();
  } else {
    $("#minutes, #separatorMinutes").show();
  }
}
// Display averages in history
function displayCurrentSolve(index, time, ao5, ao12, ao50, currentScramble, dateTime){
  var currentTime = millisecondsToFullTime(time);
  var currentAo5 = millisecondsToFullTime(ao5);
  var currentAo12 = millisecondsToFullTime(ao12);
  var currentAo50 = millisecondsToFullTime(ao50);
  // Put averages under timer
  $('#averageOf5 span').text(currentAo5);
  $('#averageOf12 span').text(currentAo12);
  // Create new line to put the informations in solve history
  var tr = document.createElement('tr');
  tr.setAttribute('id', index);
  tr.innerHTML = `<td id="${dateTime}" class="indexValue py-1 px-1 border-left-0 border-right-0 border-top-0">#${index}</td>
                  <td id="${currentScramble}" class="timeValue py-1 px-1 border-top-0">${currentTime}</td>
                  <td class="ao5Value py-1 px-1 border-left-0 border-top-0 border-right-0">${currentAo5}</td>
                  <td class="ao12Value py-1 px-1 border-top-0">${currentAo12}</td>
                  <td class="ao50Value py-1 px-1 border-left-0 border-right-0 border-top-0">${currentAo50}</td>`;
  $('#solveList tbody').prepend(tr);
  // Put solve in solve statistics
  $('#sideStatIndex').html(index);
  $('#sideStatSingle').html(currentTime);
  $('#sideStatAo5').html(currentAo5);
  $('#sideStatAo12').html(currentAo12);
  $('#sideStatAo50').html(currentAo50);
}
// Display the solve details in the modal
function displaySolveDetails(id, time, scramble, scrambleRepresentation, dateTime){
  // Rearange date to french format
  dateTime = dateTime.split('_');
  var [yyyy, mm, dd] = dateTime[0].split('-');
  var dateFormatFR = (dd + '-' + mm + '-' + yyyy);
  dateTime = dateFormatFR + ' ' + dateTime[1];
  // Add spaces to better display scramble
  scramble = (scramble.split(/(?=[A-Z])/)).join(' ');
  $('#solveId span').text(id);
  $('#solveChosen').val(time);
  $('#scrambleChosen').val(scramble);
  $('#scrambleRepresentation').attr('src', scrambleRepresentation);
  $('#dateChosen').val(dateTime);
  $('#solveDetailsModal').modal('show');
}
