// H = hours - M = minutes - S = seconds - m = milliseconds //
var hoursInMilli, minutesInMilli, secondsInMilli;
hoursInMilli = minutesInMilli = secondsInMilli = 0;
// Transform hours, minutes and seconds to milliseconds and return full milliseconds time
function fullTimeToMilliseconds(hours, minutes, seconds, milliseconds){
  hoursInMilli = hours * 3600000;
  minutesInMilli = minutes * 60000;
  secondsInMilli = seconds * 1000;
  return hoursInMilli + minutesInMilli + secondsInMilli + milliseconds;
}
// Transform HH:MM:SS.mmm to milliseconds
function formattedTimeToMilliseconds(formattedTime){
  if (formattedTime == 'DNF' || formattedTime == '-'){
    return formattedTime;
  }
  if (formattedTime == undefined){
    return '';
  }
  // Check how many ' : ' there are in the string to know how long the time is
  var timeLength = formattedTime.match(/:/g);
  var solveArray = [];
  // No ' : ' found, so only SS.mmm
  if (timeLength == null){
    // Split and delete separator
    solveArray = formattedTime.split(' ');
    var seconds = solveArray[0].replace('.', '');
    // Multiply seconds by 1000
    seconds = seconds * 1000;
    // Get the last 3 digits of the milliseconds
    var milliseconds = solveArray[1].toString();
    var milli = milliseconds.substring(milliseconds.length - 3, milliseconds.length);
    // Add them up together
    var timeInMilliseconds = Number(seconds) + Number(milli);
    return timeInMilliseconds;

  }
  // One ' : ' found so MM:SS.mmm
  else if (timeLength.length == 1){
    // Split and delete separator
    solveArray = formattedTime.split(':');
    var secondsSolveArray = solveArray[1].split(' ');
    var seconds = secondsSolveArray[1].replace('.', '');
    // Multiply minutes by 60000
    var minutes = solveArray[0] * 60000;
    // Multiply seconds by 1000
    seconds = seconds * 1000;
    var milliseconds = secondsSolveArray[2].toString();
    var milli = milliseconds.substring(milliseconds.length - 3, milliseconds.length);
    var timeInMilliseconds = Number(minutes) + Number(seconds) + Number(milli);
    return timeInMilliseconds;
  }
  // Two ' : ' found so HH:MM:SS.mmm
  else if (timeLength.length == 2){
    // Split and delete separator
    solveArray = formattedTime.split(':');
    var secondsSolveArray = solveArray[2].split(' ');
    var seconds = secondsSolveArray[1].replace('.', '');
    // Multiply hours by 3600000
    var hours = solveArray[0] * 3600000;
    // Multiply minutes by 60000
    var minutes = solveArray[1] * 60000;
    // Multiply seconds by 1000
    seconds = seconds * 1000;
    var milliseconds = secondsSolveArray[2].toString();
    var milli = milliseconds.substring(milliseconds.length - 3, milliseconds.length);
    var timeInMilliseconds = Number(hours) + Number(minutes) + Number(seconds) + Number(milli);
    return timeInMilliseconds;
  }
  // If all else fails, return 0
  return 0;
}
var milliInHours, milliInMinutes, milliInSeconds;
milliInHours = milliInMinutes = milliInSeconds = 0;
// Transform milliseconds to hours, minutes, seconds milliseconds and return HH:MM:SS.mmm
function millisecondsToFullTime(milliseconds){
  if (milliseconds == 'DNF'){
    return milliseconds;
  }
  var milliInHours = Math.floor(milliseconds / 1000 / 60 / 60);
  if (isNaN(milliInHours)){
    return '-';
  }
  var milliInMinutes = Math.floor(milliseconds / 1000 / 60);
  while (milliInMinutes >= 60){
    milliInMinutes = milliInMinutes - 60;
  }
  var milliInSeconds = Math.floor(milliseconds / 1000);
  while (milliInSeconds >= 60){
    milliInSeconds = milliInSeconds - 60;
  }
  while (milliseconds >= 1000){
    milliseconds = milliseconds - 1000;
  }
  // Prepend zeros to the milliseconds to always have 3 number to stop the time ' shaking '
  milliseconds = milliseconds.toString();
  if (milliseconds.length < 2){
    milliseconds = '0' + milliseconds;
  }
  if (milliseconds.length < 3){
    milliseconds = '0' + milliseconds;
  }
  var fullTime = '';
  // If hours or minutes are 0, don't display them
  if (milliInHours == 0 && milliInMinutes == 0){
    fullTime = prependZero(milliInSeconds, 2) + '. ' + milliseconds;
  } else if (milliInHours == 0){
    fullTime = prependZero(milliInMinutes, 2) + ': ' + prependZero(milliInSeconds, 2) + '. ' + milliseconds;
  } else {
    fullTime = prependZero(milliInHours, 2) + ': ' + prependZero(milliInMinutes, 2) + ': ' + prependZero(milliInSeconds, 2) + '. ' + milliseconds;
  }
  return fullTime;
}
// Add two seconds to the time
function addTwoSeconds(time){
  // Transform time to milliseconds
  var timeInMilliseconds = formattedTimeToMilliseconds(time);
  if (timeInMilliseconds == 0 || isNaN(timeInMilliseconds)){
    return 'ERROR';
  }
  // Add 2000 milliseconds
  var twoSecondsAdded = timeInMilliseconds + 2000;
  // Transform time to formatted time
  return millisecondsToFullTime(twoSecondsAdded);
}
// Prepend zeros to the digits in stopwatch
function prependZero(time, length) {
  // stringify time
  time = new String(time);
  return new Array(Math.max(length - time.length + 1, 0)).join("0") + time;
}
