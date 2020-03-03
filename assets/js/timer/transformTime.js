// Transform hours, minutes and seconds to milliseconds and return full milliseconds time
function fullTimeToMilliseconds(hours, minutes, seconds, milliseconds){
  hoursInMilli = hours * 3600000;
  minutesInMilli = minutes * 60000;
  secondsInMilli = seconds * 1000;
  return hoursInMilli + minutesInMilli + secondsInMilli + milliseconds;
}
