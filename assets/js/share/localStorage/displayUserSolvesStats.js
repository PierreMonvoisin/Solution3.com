if (typeof(Storage) != "undefined") {
  if (localStorage.getItem('index')){
    var lastIndex = Number(localStorage.getItem('index'));
    if (lastIndex > 0){
      var lastSingle = localStorage.getItem('time');
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
      for (var i = lastIndex; i >= 1; i--) {
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
// Check for solves in the local storage on load
if (localStorage.getItem('indexLog')){
  // Best solves
  var testBest, bestSingle, bestAo5, bestAo12, bestAo50;
  testBest = bestSingle = bestAo5 = bestAo12 = bestAo50 = 999999999999;
  for (var numberOfSolve = Number(lastIndex); numberOfSolve > 0; numberOfSolve--){
    testBest = JSON.parse(localStorage.getItem(`singleHistory${numberOfSolve}`));
    testBest < bestSingle ? bestSingle = testBest : bestSingle;
    testBest = JSON.parse(localStorage.getItem(`averageOf5History${numberOfSolve}`));
    testBest < bestAo5 ? bestAo5 = testBest : bestAo5;
    testBest = JSON.parse(localStorage.getItem(`averageOf12History${numberOfSolve}`));
    testBest < bestAo12 ? bestAo12 = testBest : bestAo12;
    testBest = JSON.parse(localStorage.getItem(`averageOf50History${numberOfSolve}`));
    testBest < bestAo50 ? bestAo50 = testBest : bestAo50;
  }
  // Check if there was not enough solve to calculate worst time
  // Not enough solve mean '-' in localStorage which return 0 in variable
  (bestAo5 == 0 || bestAo5 == 999999999999) ? bestAo5 = '-' : bestAo5 = correctTime(bestAo5);
  (bestAo12 == 0 || bestAo12 == 999999999999) ? bestAo12 = '-' : bestAo12 = correctTime(bestAo12);
  (bestAo50 == 0 || bestAo50 == 999999999999) ? bestAo50 = '-' : bestAo50 = correctTime(bestAo50);
  // Put worst solves in stats
  $('#bestSingle').text(correctTime(bestSingle));
  $('#bestAo5').text(bestAo5);
  $('#bestAo12').text(bestAo12);
  $('#bestAo50').text(bestAo50);
  // Worst solves
  var testWorst, worstSingle, worstAo5, worstAo12, worstAo50;
  testWorst = worstSingle = worstAo5 = worstAo12 = worstAo50 = 0;
  for (numberOfSolve = Number(lastIndex); numberOfSolve > 0; numberOfSolve--){
    testWorst = JSON.parse(localStorage.getItem(`singleHistory${numberOfSolve}`));
    testWorst > worstSingle ? worstSingle = testWorst : worstSingle;
    testWorst = JSON.parse(localStorage.getItem(`averageOf5History${numberOfSolve}`));
    testWorst > worstAo5 ? worstAo5 = testWorst : worstAo5;
    testWorst = JSON.parse(localStorage.getItem(`averageOf12History${numberOfSolve}`));
    testWorst > worstAo12 ? worstAo12 = testWorst : worstAo12;
    testWorst = JSON.parse(localStorage.getItem(`averageOf50History${numberOfSolve}`));
    testWorst > worstAo50 ? worstAo50 = testWorst : worstAo50;
  }
  worstAo5 == 0 ? worstAo5 = '-' : worstAo5 = correctTime(worstAo5);
  worstAo12 == 0 ? worstAo12 = '-' : worstAo12 = correctTime(worstAo12);
  worstAo50 == 0 ? worstAo50 = '-' : worstAo50 = correctTime(worstAo50);
  // Put worst solves in stats
  $('#worstSingle').text(correctTime(worstSingle));
  $('#worstAo5').text(worstAo5);
  $('#worstAo12').text(worstAo12);
  $('#worstAo50').text(worstAo50);
}
