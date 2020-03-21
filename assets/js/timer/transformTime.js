var hoursInMilli, minutesInMilli, secondsInMilli;
hoursInMilli = minutesInMilli = secondsInMilli = 0;
// Transform hours, minutes and seconds to milliseconds and return full milliseconds time
function fullTimeToMilliseconds(hours, minutes, seconds, milliseconds){
  hoursInMilli = hours * 3600000;
  minutesInMilli = minutes * 60000;
  secondsInMilli = seconds * 1000;
  return hoursInMilli + minutesInMilli + secondsInMilli + milliseconds;
}
function formattedTimeToMilliseconds(formattedTime){
  if (formattedTime == 'DNF' || formattedTime == '-'){
    return formattedTime;
  }
  if (formattedTime == undefined){
    return '';
  }
  var timeLength = formattedTime.match(/:/g);
  var solveArray = [];
  if (timeLength == null){
    // Only seconds and milliseconds
    solveArray = formattedTime.split(' ');
    var seconds = solveArray[0].replace('.', '');
    seconds = seconds * 1000;
    var milliseconds = solveArray[1].toString();
    var milli = milliseconds.substring(milliseconds.length - 3, milliseconds.length);
    var timeInMilliseconds = Number(seconds) + Number(milli);
    return timeInMilliseconds;

  } else if (timeLength.length == 1){
    // Minutes, seconds and milliseconds
    solveArray = formattedTime.split(':');
    var minutes = solveArray[0] * 60000;
    var secondsSolveArray = solveArray[1].split(' ');
    var seconds = secondsSolveArray[1].replace('.', '');
    seconds = seconds * 1000;
    var milliseconds = secondsSolveArray[2].toString();
    var milli = milliseconds.substring(milliseconds.length - 3, milliseconds.length);
    var timeInMilliseconds = Number(minutes) + Number(seconds) + Number(milli);
    return timeInMilliseconds;
  } else if (timeLength.length == 2){
    // Hours, minutes, seconds and milliseconds
    solveArray = formattedTime.split(':');
    var hours = solveArray[0] * 3600000;
    var minutes = solveArray[1] * 60000;
    var secondsSolveArray = solveArray[2].split(' ');
    var seconds = secondsSolveArray[1] * 1000;
    var milliseconds = secondsSolveArray[2].toString();
    var milli = milliseconds.substring(milliseconds.length - 3, milliseconds.length);
    var timeInMilliseconds = Number(hours) + Number(minutes) + Number(seconds) + Number(milli);
    return timeInMilliseconds;
  }
  return 0;
}
var milliInHours, milliInMinutes, milliInSeconds;
milliInHours = milliInMinutes = milliInSeconds = 0;
// Transform milliseconds to hours, minutes, seconds milliseconds and return full time well formatted
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
  milliseconds = milliseconds
  while (milliseconds >= 1000){
    milliseconds = milliseconds - 1000;
  }
  if (milliseconds < 100){
    milliseconds = '0' + milliseconds;
  }
  var fullTime = '';
  if (milliInHours == 0 && milliInMinutes == 0){
    fullTime = prependZero(milliInSeconds, 2) + '. ' + milliseconds;
  } else if (milliInHours == 0){
    fullTime = prependZero(milliInMinutes, 2) + ': ' + prependZero(milliInSeconds, 2) + '. ' + milliseconds;
  } else {
    fullTime = prependZero(milliInHours, 2) + ': ' + prependZero(milliInMinutes, 2) + ': ' + prependZero(milliInSeconds, 2) + '. ' + milliseconds;
  }
  return fullTime;
}
// Add two seconds of penalty to a solve
function addTwoSeconds(time){
  var timeInMilliseconds = formattedTimeToMilliseconds(time);
  if (timeInMilliseconds == 0 || isNaN(timeInMilliseconds)){
    return 'ERROR';
  }
  var twoSecondsAdded = timeInMilliseconds + 2000;
  var formattedNewTime = millisecondsToFullTime(twoSecondsAdded);
  return formattedNewTime;
}
// Prepend zeros to the digits in stopwatch
function prependZero(time, length) {
  // stringify time
  time = new String(time);
  return new Array(Math.max(length - time.length + 1, 0)).join("0") + time;
}
