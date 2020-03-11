var hoursInMilli, minutesInMilli, secondsInMilli;
hoursInMilli = minutesInMilli = secondsInMilli = 0;
// Transform hours, minutes and seconds to milliseconds and return full milliseconds time
function fullTimeToMilliseconds(hours, minutes, seconds, milliseconds){
  hoursInMilli = hours * 3600000;
  minutesInMilli = minutes * 60000;
  secondsInMilli = seconds * 1000;
  return hoursInMilli + minutesInMilli + secondsInMilli + milliseconds;
}
var milliInHours, milliInMinutes, milliInSeconds;
milliInHours = milliInMinutes = milliInSeconds = 0;
// Transform milliseconds to hours, minutes, seconds milliseconds and return full time well formatted
function millisecondsToFullTime(milliseconds){
  var milliInHours = Math.floor(milliseconds / 1000 / 60 / 60);
  if (isNaN(milliInHours)){
    return '-';
  }
  var milliInMinutes = Math.floor(milliseconds / 1000 / 60);
  var milliInSeconds = Math.floor(milliseconds / 1000);
  milliseconds = milliseconds.toString();
  var milli = milliseconds.substring(milliseconds.length - 3, milliseconds.length);
  var fullTime = '';
  if (milliInHours == 0 && milliInMinutes == 0){
    fullTime = prependZero(milliInSeconds, 2) + '. ' + milli;
  } else if (milliInHours == 0){
    fullTime = prependZero(milliInMinutes, 2) + ': ' + prependZero(milliInSeconds, 2) + '. ' + milli;
  } else {
    fullTime = prependZero(milliInHours, 2) + prependZero(milliInMinutes, 2) + ': ' + prependZero(milliInSeconds, 2) + '. ' + milli;
  }
  return fullTime;
}
// Prepend zeros to the digits in stopwatch
function prependZero(time, length) {
  time = new String(time); // stringify time
  return new Array(Math.max(length - time.length + 1, 0)).join("0") + time;
}
