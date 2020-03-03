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
// Prepend zeros to the digits in stopwatch
function prependZero(time, length) {
  time = new String(time); // stringify time
  return new Array(Math.max(length - time.length + 1, 0)).join("0") + time;
}
