$(function(){
  // Display new scramble on page load
  $('#scramble span').text(scrambler());
  // Indicator that timer is ready
  var timerReady, timerValidity = false;
  var delay = 400; // Delay ( in milliseconds ) between the key press and the timer ready state
  $(document).keydown(function(e) {
    // Indicator that timer is ready
    if ($('#start_stop').text() == 'Start'){
      // Keycode 32 = Spacebar
      if (e.keyCode == 32) {
        // Check if the user is holding the spacebar
        if(! $("#timer").hasClass('holding')){
          // Timer not ready so red
          $("#timer").addClass('text-danger');
          // Don't let the timer start until the timeout is over
          timerReady = setTimeout(function(){
            $("#timer").removeClass('text-danger');
            // Timer ready so green
            $("#timer").addClass('text-success');
            // Set timer as ready
            timerValidity = true;
            // Add the holding class after the first detection of a press
            $("#timer").addClass('holding');
          }, delay);
        }
      }
    }
  });
  // On every key up event
  $(document).keyup(function(e) {
    // If the user
    if (e.keyCode == 32) {
      // On timer launch, clear all the classes and the timeout for the color
      $("#timer").removeClass('text-danger');
      $("#timer").removeClass('text-success');
      $("#timer").removeClass('holding');
      // Clear the time out for the color of the text
      clearTimeout(timerReady);
      $("#start_stop").button().click();
      return;
    }
    // On any key up
    if ($("#start_stop").text() == "Stop"){
      $("#start_stop").button().click();
    }
  });
  // Set variables for timer
  var hours, minutes, seconds, milliseconds;
  hours = minutes = seconds = milliseconds = 0;
  var prev_hours, prev_minutes, prev_seconds, prev_milliseconds;
  prev_hours = prev_minutes = prev_seconds = prev_milliseconds = undefined;
  var timeUpdate;
  // Start/Stop button
  $("#start_stop").button().click(function(){
    // Start button ( if the spacebar was pressed too quickly, the function doesn't launch )
    if($(this).text() == "Start" && timerValidity == true){ // check button label
      $(this).html("<span>Stop</span>");
      // Launch the timer
      updateTime(0,0,0,0);
      timerValidity = false;
    }
    // Stop button
    else if($(this).text() == "Stop"){
      $(this).html("<span>Start</span>");
      // Stop the timer
      clearInterval(timeUpdate);
      // Display the time
      displayTimer(hours, minutes, seconds, milliseconds)
      // Add the solve to the log
      addToLog(hours, minutes, seconds, milliseconds);
      // Display new scramble
      $('#scramble span').text(scrambler());
    }
  });
  // Launch main stopwatch function
  function updateTime(prev_hours, prev_minutes, prev_seconds, prev_milliseconds){
    var startTime = new Date(); // fetch current time
    timeUpdate = setInterval(function () {
      // Calculate the time elapsed in milliseconds
      var timeElapsed = new Date().getTime() - startTime.getTime();
      // Calculate hours
      hours = parseInt(timeElapsed / 1000 / 60 / 60) + prev_hours;
      // Calculate minutes
      minutes = parseInt(timeElapsed / 1000 / 60) + prev_minutes;
      if (minutes > 60) minutes %= 60;
      // Calculate seconds
      seconds = parseInt(timeElapsed / 1000) + prev_seconds;
      if (seconds > 60) seconds %= 60;
      // Calculate milliseconds
      milliseconds = timeElapsed + prev_milliseconds;
      if (milliseconds > 1000) milliseconds %= 1000;
      // Set the stopwatch
      setStopwatch(hours, minutes, seconds, milliseconds);
    }, 1); // Update time in stopwatch every 1ms
  }
  // Set the time in html page
  function setStopwatch(hours, minutes, seconds, milliseconds){
    if (localStorage.getItem('displayTimer') == 'nope') {
      $('#seconds, #separatorSeconds').hide();
      // Maybe change the message
      $('#milliseconds').html('solving');
    } else {
      displayTimer(hours, minutes, seconds, milliseconds);
    }
  }
  var index, ao5, ao12, ao50;
  index = ao5 = ao12 = ao50 = 0;
  // Add solve to stats menu
  function addToLog(hours, minutes, seconds, milliseconds){
    // Delete "no solve" message
    $('#noSolve').hide();
    // Get index of last solve, if none found, attribute 1 to the current index
    var index = Number($('#solveList tbody tr:first-child').attr('id'));
    if (isNaN(index)){
      index = 1;
    } else {
      index++;
    }
    // Transform hours, minutes and seconds to milliseconds and return full milliseconds time
    var time = fullTimeToMilliseconds(hours, minutes, seconds, milliseconds);
    // Launch averages functions
    ao5 = averageOf5(time);
    // ao50 = averageOf50(time);
    // ao12 = averageOf12(time);
  }
});
