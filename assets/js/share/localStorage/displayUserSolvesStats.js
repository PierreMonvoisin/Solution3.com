// If the local storage is available
if (typeof(Storage) != "undefined") {
  // If there is at least one solve in the local storage
  if (localStorage.getItem('index')){
    var lastIndex = Number(localStorage.getItem('index'));
    if (lastIndex > 0){
      // Get the last solve, ao5, ao12 and ao50
      var lastSingle = localStorage.getItem('time');
      // If the value is null, replace it with '-' or '', else format it for display
      lastSingle == null ? lastSingle = '-' : lastSingle = millisecondsToFullTime(lastSingle);
      var lastAo5 = localStorage.getItem('ao5');
      lastAo5 == null ? lastAo5 = '-' : lastAo5 = millisecondsToFullTime(lastAo5);
      var lastAo12 = localStorage.getItem('ao12');
      lastAo12 == null ? lastAo12 = '-' : lastAo12 = millisecondsToFullTime(lastAo12);
      var lastAo50 = localStorage.getItem('ao50');
      lastAo50 == null ? lastAo50 = '-' : lastAo50 = millisecondsToFullTime(lastAo50);
      // Put last solves in stats
      $('#lastSingle').text(lastSingle);
      $('#lastAo5').text(lastAo5);
      $('#lastAo12').text(lastAo12);
      $('#lastAo50').text(lastAo50);

      var bestSingle, bestAo5, bestAo12, bestAo50;
      bestSingle = bestAo5 = bestAo12 = bestAo50 = 999999999999;
      var worstSingle, worstAo5, worstAo12, worstAo50;
      worstSingle = worstAo5 = worstAo12 = worstAo50 = 0;
      var testSingle, testAo5, testAo12, testAo50;
      testSingle = testAo5 = testAo12 = testAo50 = 0;
      // For each solve in history
      for (var i = lastIndex; i >= 1; i--) {
        // Get the time, ao5, a12 and 50 to find if it is the best or worst time or average in storage
        testSingle = Number(localStorage.getItem('time_' + i));
        if (testSingle < bestSingle && testSingle != 0){
          bestSingle = testSingle;
        }
        if (testSingle >= worstSingle && testSingle != 0){
          worstSingle = testSingle;
        }
        testAo5 = Number(localStorage.getItem('ao5_' + i));
        if (testAo5 != null && ! isNaN(testAo5)){
          if (testAo5 != 0 && testAo5 <= bestAo5){
            bestAo5 = testAo5;
          }
          if (testAo5 != 0 && testAo5 >= worstAo5){
            worstAo5 = testAo5;
          }
        }

        testAo12 = Number(localStorage.getItem('ao12_' + i));
        if (testAo12 != null && ! isNaN(testAo12)){
          if (testAo12 != 0 && testAo12 <= bestAo12){
            bestAo12 = testAo12;
          }
          if (testAo12 != 0 && testAo12 >= worstAo12){
            worstAo12 = testAo12;
          }
        }

        testAo50 = Number(localStorage.getItem('ao50_' + i));
        if (testAo50 != null && ! isNaN(testAo50)){
          if (testAo50 != 0 && testAo50 <= bestAo50){
            bestAo50 = testAo50;
          }
          if (testAo50 != 0 && testAo50 >= worstAo50){
            worstAo50 = testAo50;
          }
        }
      }
      // If the value is a number and isn't the defaut one, format it to better display it
      isNaN(bestSingle) || bestSingle == 999999999999 ? bestSingle = '-' : bestSingle = millisecondsToFullTime(bestSingle);
      isNaN(bestAo5) || bestAo5 == 999999999999 ? bestAo5 = '-' : bestAo5 = millisecondsToFullTime(bestAo5);
      isNaN(bestAo12) || bestAo12 == 999999999999 ? bestAo12 = '-' : bestAo12 = millisecondsToFullTime(bestAo12);
      isNaN(bestAo50) || bestAo50 == 999999999999 ? bestAo50 = '-' : bestAo50 = millisecondsToFullTime(bestAo50);

      isNaN(worstSingle) || worstSingle == 0 ? worstSingle = '-' : worstSingle = millisecondsToFullTime(worstSingle);
      isNaN(worstAo5) || worstAo5 == 0 ? worstAo5 = '-' : worstAo5 = millisecondsToFullTime(worstAo5);
      isNaN(worstAo12) || worstAo12 == 0 ? worstAo12 = '-' : worstAo12 = millisecondsToFullTime(worstAo12);
      isNaN(worstAo50) || worstAo50 == 0 ? worstAo50 = '-' : worstAo50 = millisecondsToFullTime(worstAo50);
      // Put best solves in stats
      $('#bestSingle').text(bestSingle);
      $('#bestAo5').text(bestAo5);
      $('#bestAo12').text(bestAo12);
      $('#bestAo50').text(bestAo50);
      // Put worst solves in stats
      $('#worstSingle').text(worstSingle);
      $('#worstAo5').text(worstAo5);
      $('#worstAo12').text(worstAo12);
      $('#worstAo50').text(worstAo50);
    }
  }
}
