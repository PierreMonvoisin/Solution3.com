var lastIndex, lastSingle, lastAo5, lastAo12, lastAo50;
lastIndex = lastSingle = lastAo5 = lastAo12 = lastAo50 = 0;
// Prepend zeros to the digits in stopwatch
function prependZero(time, length) {
  time = new String(time); // stringify time
  return new Array(Math.max(length - time.length + 1, 0)).join("0") + time;
}
// Turn time format H:M:S.MM to HH:MM:SS.MMM
function correctTime(time){
  if (time != '-'){
    // Turn the dot in ': ' to help split the time
    time = (time.toString()).replace(/\./g, ': ');
    // Split between hours, minutes, second and milliseconds
    time = time.split(': ');
    // Seconds and milli
    if (time.length == 2){
      time[1] = prependZero(time[1], 3);
      time = time[0] + '.' + time[1];
      // Minutes, seconds and milli
    } else if (time.length == 3){
      time[1] = prependZero(time[1], 2);
      time[2] = prependZero(time[2], 3);
      time = time[0] + ': ' + time[1] + '.' + time[2];
      // Hours, minutes, seconds and milli
    } else if (time.length == 4){
      time[1] = prependZero(time[1], 2);
      time[2] = prependZero(time[2], 2);
      time[3] = prependZero(time[3], 3);
      time = time[0] + ': ' + time[1] + ': ' + time[2] + '.' + time[3];
    } else {
      time = Number(time);
    }
  }
  // Return the time in milliseconds
  return time;
}
// Check for solves in the local storage on load
if (localStorage.getItem('indexLog')){
  // Get values from the local storage ( typeof = strings )
  lastIndex = JSON.parse(localStorage.getItem('indexLog'));
  lastSingle = JSON.parse(localStorage.getItem('singleLog'));
  lastAo5 = JSON.parse(localStorage.getItem('averageOf5Log'));
  lastAo12 = JSON.parse(localStorage.getItem('averageOf12Log'));
  lastAo50 = JSON.parse(localStorage.getItem('averageOf50Log'));
  // Delete " no solve " message
  $('#noSolve').hide();
  // Render chart to add DataPoints (necessary !)
  // renderChart();
  // Add solves in localStorage to history
  for (numberOfSolve = Number(lastIndex); numberOfSolve > 0; numberOfSolve--){
    var index = Number(JSON.parse(localStorage.getItem(`indexHistory${numberOfSolve}`)));
    var single = JSON.parse(localStorage.getItem(`singleHistory${numberOfSolve}`));
    var ao5 = JSON.parse(localStorage.getItem(`averageOf5History${numberOfSolve}`));
    var ao12 = JSON.parse(localStorage.getItem(`averageOf12History${numberOfSolve}`));
    var ao50 = JSON.parse(localStorage.getItem(`averageOf50History${numberOfSolve}`));
    // Check if averages are empty ( typeof string )
    isNaN(ao5) ? ao5 = '-': ao5 = correctTime(parseFloat(ao5));
    // ParseFloat to turn string to number and keep 3 numbers after the dot
    isNaN(ao12) ? ao12 = '-': ao12 = correctTime(parseFloat(ao12));
    isNaN(ao50) ? ao50 = '-': ao50 = correctTime(parseFloat(ao50));
    var tr = '<tr id="' + index + '">', _tr = '</tr>', td  = '<td class="py-2">', _td = '</td>';
    $('#history tbody').append(tr + '\n' + td + '#' + index + _td + '\n' + td + correctTime(parseFloat(single)) + _td + '\n' + td + ao5 + _td + '\n' + td + ao12 + _td + '\n' + td + ao50 + _td + _tr);
  }
}
// Render chart on page load
// renderChart();
