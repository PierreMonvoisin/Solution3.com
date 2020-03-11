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
function displayCurrentSolve(index, time, ao5, ao12, ao50){
  var currentTime = millisecondsToFullTime(time);
  var currentAo5 = millisecondsToFullTime(ao5);
  var currentAo12 = millisecondsToFullTime(ao12);
  var currentAo50 = millisecondsToFullTime(ao50);
  // Put averages under timer
  $('#averageOf5 span').text(currentAo5);
  $('#averageOf12 span').text(currentAo12);
  // Create new line to put the informations in solve history
  var tr, _tr = '</tr>', tdSide, td1, td2, _td = '</td>';
  tr = '<tr id="' + index + '">';
  tdLeft = '<td class="py-1 px-1 border-left-0 border-right-0 border-top-0">';
  tdRight = '<td id="solveDetailsButton" class="py-1 px-1 border-left-0 border-right-0 border-top-0">';
  td1 = '<td class="py-1 px-1 border-top-0">';
  td2 = '<td class="py-1 px-1 border-left-0 border-top-0 border-right-0">';
  td3 = '<td class="py-1 px-1 border-top-0">';
  $('#solveList tbody').prepend(tr + '\n' + tdLeft + '#' + index + _td + '\n' + td1 + currentTime + _td + td2 + currentAo5 + _td + td3 + currentAo12 + _td + tdRight + 'Tools' + _td + _tr);
  // Put solve in solve statistics
  $('#sideStatIndex').html(index);
  $('#sideStatSingle').html(currentTime);
  $('#sideStatAo5').html(currentAo5);
  $('#sideStatAo12').html(currentAo12);
  $('#sideStatAo50').html(currentAo50);
}
