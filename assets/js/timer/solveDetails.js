$(function(){
  var solveIndex = -1;
  // On +2 button click
  $('#add2').click(function(){
    // Get the index of the solve chosen
    var currentSolveIndex = $('#solveId span').html();
    // Check if it is a new solve that is chosen and is not a DNF
    if (currentSolveIndex != solveIndex && $('#solveChosen').val() != 'DNF'){
      // Get the time of the solve chosen
      var modalTime = $('#solveChosen').val();
      // Change the time in average and local storage
      addTwoSecondsInAverages(modalTime);
      addTwoSecondsInLocalStorage_LS(currentSolveIndex);
      // Add two seconds to the modal time and display it
      var timePlusTwo = addTwoSeconds(modalTime);
      $('#solveChosen').val(timePlusTwo);
      $('#' + currentSolveIndex + ' .timeValue').html(timePlusTwo);
      // If the solve chosen is the last one, change the stats
      var sideStatsIndex = $('#sideStatIndex').html();
      if (currentSolveIndex == sideStatsIndex){
        $('#sideStatSingle').html(timePlusTwo);
      }
      solveIndex = currentSolveIndex;
    }
  });
  // On DNF button click
  $('#dnf').click(function(){
    // Get the index of the solve chosen
    var currentSolveIndex = $('#solveId span').html();
    // Check if it is a new solve that is chosen and is not a DNF
    if (currentSolveIndex != solveIndex && $('#solveChosen').val() != 'DNF'){
      var modalTime = $('#solveChosen').val();
      // Change the time in average and local storage
      dnfTimeInLocalStorage_LS(currentSolveIndex);
      dnfTimeInAverages(modalTime);
      // Change time text to DNF
      $('#solveChosen').val('DNF');
      $('#' + currentSolveIndex + ' .timeValue').html('DNF');
      // If the solve chosen is the last one, change the stats
      var sideStatsIndex = $('#sideStatIndex').html();
      if (currentSolveIndex == sideStatsIndex){
        $('#sideStatSingle').html('DNF');
      }
      solveIndex = currentSolveIndex;
    }
  });
  // On delete button click
  $('#deleteSolve').click(function(){
    // Get the index and time of the solve chosen
    var modalTime = $('#solveChosen').val();
    var currentSolveIndex = $('#solveId span').html();
    // Delete time in average and local storage
    deleteTimeInAverages(modalTime, Number(currentSolveIndex));
    deleteTimeInLocalStorage_LS(currentSolveIndex);
    // Change all modal text and delete the solve in history
    $('#solveId span').html('0');
    $('#scrambleChosen').val('U U D D L R L R B A Start');
    $('#scrambleRepresentation').attr('src', "../share/visualcube.php?fmt=png&bg=t&pzl=3");
    $('#solveChosen').val('-');
    $('#' + currentSolveIndex).remove();
    // If the solve deleted is the last one, change all text in stats
    var sideStatsIndex = $('#sideStatIndex').html();
    if (currentSolveIndex == sideStatsIndex){
      $('#sideStatIndex').html('0');
      $('#sideStatSingle').html('-');
      $('#sideStatAo5').html('-');
      $('#sideStatAo12').html('-');
      $('#sideStatAo50').html('-');
      $('#hours').html('00');
      $('#minutes').html('00');
      $('#seconds').html('00');
      $('#milliseconds').html('000');
    }
    solveIndex = -1;
    // If the solve deleted was the last one in the solve history, display no solve message and reset timer
    if ($('#historyTbody *').length < 5){
      $('#noSolve').show();
      $('#milliseconds').html('000');
      $('#seconds').html('00');
    }
  });
  $(document).on('hidden.bs.modal', '#solveDetailsModal', function() {
    // Reset scramble representation on modal close
    $('#scrambleRepresentation').attr('src', '../share/visualcube.php?fmt=png&bg=t&pzl=3');
  });
  var solvesLoaded = 0;
  // On modal opening
  $(document).on('show.bs.modal', '#solveDetailsModal', function() {
    // Get the index of the solve openned
    var id = Number($('#solveId span').html());
    // If the solve chosen is different from the last modal opening
    if (solvesLoaded != id){
      // Update solvesLoaded
      solvesLoaded = id;
      // Clear all averages tab
      $('#ao5Tab form').empty();
      $('#ao12Tab form').empty();
      $('#ao50Tab form').empty();
      var ao5SolveArray = [];
      var ao12SolveArray = [];
      var ao50SolveArray = [];
      if (id >= 5){
        // Get the date from the solve history
        var dateTime = $('#' + id + ' .indexValue').attr('id');
        // Rearange date to french format
        dateTime = dateTime.split('_');
        var [yyyy, mm, dd] = dateTime[0].split('-');
        var dateFormatFR = (dd + '/' + mm + '/' + yyyy);
        dateTime = dateFormatFR + ' ' + dateTime[1];
        var ao5Found = $('#' + id + ' .ao5Value').html();
        // For each solve, put the scramble and the time in associative array
        for (var i = id; i > 0; i--){
          var timeFound = $('#' + i + ' .timeValue').html();
          var scrambleFound = $('#' + i + ' .timeValue').attr('id');
          if (Object.keys(ao5SolveArray).length < 5){
            ao5SolveArray[scrambleFound] = timeFound;
          }
          if (Object.keys(ao12SolveArray).length < 12){
            ao12SolveArray[scrambleFound] = timeFound;
          }
          if (Object.keys(ao50SolveArray).length < 50){
            ao50SolveArray[scrambleFound] = timeFound;
          }
        }
        var nbSolveDisplayed = 0;
        var solveDisplayed = [];
        // Average of 5 //
        // For each solve, format the value to better display them
        for (var [scramble, time] of Object.entries(ao5SolveArray)) {
          // Add spaces before each uppercase letter to better display scramble
          scramble = (scramble.split(/(?=[A-Z])/)).join(' ');
          // Display current solve in average tab
          displayAo5Details(scramble, time, nbSolveDisplayed);
          solveDisplayed.push(time);
          nbSolveDisplayed++;
        }
        // Get the best and worst times in the average displayed
        var [worstIndex, bestIndex] = bestAndWorstInList(solveDisplayed);
        var worstTime = $('#ao5_time' + worstIndex).val();
        var bestTime = $('#ao5_time' + bestIndex).val();
        // Add brackets to signify the best and worst time
        $('#ao5_time' + worstIndex).val('( ' + worstTime + ' )');
        $('#ao5_time' + bestIndex).val('( ' + bestTime + ' )');
        // Create the title and date time to display them on top of the tab
        var avg5Datetime = document.createElement('div');
        avg5Datetime.setAttribute('class', 'col-12 text-right mb-2 mt-0 py-0');
        avg5Datetime.innerHTML = `<input class="col-12 text-right py-0" type="text" name="date" value="${dateTime}" readonly>`;
        $('#ao5Tab form').prepend(avg5Datetime);
        var avg5Title = document.createElement('h4');
        avg5Title.setAttribute('id', 'averageOF5Title');
        avg5Title.setAttribute('class', 'col-12 text-center');
        avg5Title.innerHTML = `<input class="col-12 text-center text-bold py-0" type="text" name="fullAvgOf5" value="${ao5Found}" readonly>`;
        $('#ao5Tab form').prepend(avg5Title);
        nbSolveDisplayed = 0; solveDisplayed = [];
        // Average of 12 //
        if (id >= 12){
          var ao12Found = $('#' + id + ' .ao12Value').html();
          for (var [scramble, time] of Object.entries(ao12SolveArray)) {
            // Add spaces to better display scramble
            scramble = (scramble.split(/(?=[A-Z])/)).join(' ');
            displayAo12Details(scramble, time, nbSolveDisplayed);
            solveDisplayed.push(time);
            nbSolveDisplayed++;
          }
          [worstIndex, bestIndex] = bestAndWorstInList(solveDisplayed);
          worstTime = $('#ao12_time' + worstIndex).val();
          bestTime = $('#ao12_time' + bestIndex).val();
          $('#ao12_time' + worstIndex).val('( ' + worstTime + ' )');
          $('#ao12_time' + bestIndex).val('( ' + bestTime + ' )');
          var avg12Datetime = document.createElement('div');
          avg12Datetime.setAttribute('class', 'col-12 text-right mb-2 mt-0 py-0');
          avg12Datetime.innerHTML = `<input class="col-12 text-right py-0" type="text" name="date" value="${dateTime}" readonly>`;
          $('#ao12Tab form').prepend(avg12Datetime);
          var avg12Title = document.createElement('h4');
          avg12Title.setAttribute('id', 'averageOF12Title');
          avg12Title.setAttribute('class', 'col-12 text-center');
          avg12Title.innerHTML = `<input class="col-12 text-center text-bold py-0" type="text" name="fullAvgOf12" value="${ao12Found}" readonly>`;
          $('#ao12Tab form').prepend(avg12Title);
          nbSolveDisplayed = 0; solveDisplayed = [];
          // Average of 50 //
          if (id >= 50){
            var ao50Found = $('#' + id + ' .ao50Value').html();
            for (var [scramble, time] of Object.entries(ao50SolveArray)) {
              scramble = (scramble.split(/(?=[A-Z])/)).join(' ');
              displayAo50Details(scramble, time, nbSolveDisplayed);
              solveDisplayed.push(time);
              nbSolveDisplayed++;
            }
            [worstIndex, bestIndex] = bestAndWorstInList(solveDisplayed);
            worstTime = $('#ao50_time' + worstIndex).val();
            bestTime = $('#ao50_time' + bestIndex).val();
            $('#ao50_time' + worstIndex).val('( ' + worstTime + ' )');
            $('#ao50_time' + bestIndex).val('( ' + bestTime + ' )');
            var avg50Datetime = document.createElement('div');
            avg50Datetime.setAttribute('class', 'col-12 text-right mb-2 mt-0 py-0');
            avg50Datetime.innerHTML = `<input class="col-12 text-right py-0" type="text" name="date" value="${dateTime}" readonly>`;
            $('#ao50Tab form').prepend(avg50Datetime);
            var avg50Title = document.createElement('h4');
            avg50Title.setAttribute('id', 'averageOF50Title');
            avg50Title.setAttribute('class', 'col-12 text-center');
            avg50Title.innerHTML = `<input class="col-12 text-center text-bold py-0" type="text" name="fullAvgOf50" value="${ao50Found}" readonly>`;
            $('#ao50Tab form').prepend(avg50Title);
            nbSolveDisplayed = 0; solveDisplayed = [];
          }
        }
      }
    }
  });
  // Different Tab display
  var openTab = 'single';
  $('#singleTabButton').click(function(){
    if (openTab != 'single'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 550, function(){
        $('#submitSolveSave').attr('form', 'singleDetails');
        $('#submitSolveSave').attr('name', 'saveSolve');
        $('#singleTab').animate({ width: 'toggle' }, 550);
        openTab = 'single';
      });
    }
  });
  $('#ao5TabButton').click(function () {
    if (openTab != 'ao5'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 550, function(){
        $('#submitSolveSave').attr('form', 'ao5Details');
        $('#submitSolveSave').attr('name', 'saveAo5');
        $('#ao5Tab').animate({ width: 'toggle' }, 550);
        openTab = 'ao5';
      });
    }
  });
  $('#ao12TabButton').click(function(){
    if (openTab != 'ao12'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 550, function(){
        $('#submitSolveSave').attr('form', 'ao12Details');
        $('#submitSolveSave').attr('name', 'saveAo12');
        $('#ao12Tab').animate({ width: 'toggle' }, 550);
        openTab = 'ao12';
      });
    }
  });
  $('#ao50TabButton').click(function(){
    if (openTab != 'ao50'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 550, function(){
        $('#submitSolveSave').attr('form', 'ao50Details');
        $('#submitSolveSave').attr('name', 'saveAo50');
        $('#ao50Tab').animate({ width: 'toggle' }, 550);
        openTab = 'ao50';
      });
    }
  });
});
