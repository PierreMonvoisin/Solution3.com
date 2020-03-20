$(function(){
  var plusTwoPenalty = false;
  var dnfPenalty = false;
  var deletePenalty = false;
  var solveIndex = 0;
  $('#add2').click(function(){
    var currentSolveIndex = $('#solveId span').html();
    if (currentSolveIndex != solveIndex && $('#solveChosen').val() != 'DNF'){
      plusTwoPenalty = false; dnfPenalty = false;
      if (plusTwoPenalty != true && dnfPenalty != true && deletePenalty != true){
        var modalTime = $('#solveChosen').val();
        addTwoSecondsInAverages(modalTime);
        addTwoSecondsInLocalStorage_LS(currentSolveIndex);
        var timePlusTwo = addTwoSeconds(modalTime);
        $('#solveChosen').val(timePlusTwo);
        $('#' + currentSolveIndex + ' .timeValue').html(timePlusTwo);
        var sideStatsIndex = $('#sideStatIndex').html();
        if (currentSolveIndex == sideStatsIndex){
          $('#sideStatSingle').html(timePlusTwo);
        }
        solveIndex = currentSolveIndex;
      }
      plusTwoPenalty = true;
    }
  })
  $('#dnf').click(function(){
    var currentSolveIndex = $('#solveId span').html();
    if (currentSolveIndex != solveIndex && $('#solveChosen').val() != 'DNF'){
      dnfPenalty = false;
      if (dnfPenalty != true && deletePenalty != true){
        var modalTime = $('#solveChosen').val();
        $('#solveChosen').val('DNF');
        $('#' + currentSolveIndex + ' .timeValue').html('DNF');
        var sideStatsIndex = $('#sideStatIndex').html();
        if (currentSolveIndex == sideStatsIndex){
          $('#sideStatSingle').html('DNF');
        }
        solveIndex = currentSolveIndex;
      }
      dnfPenalty = true;
    }
  })
  $('#deleteSolve').click(function(){
    var modalTime = $('#solveChosen').val();
    deleteTimeInAverages(modalTime);
    var currentSolveIndex = $('#solveId span').html();
    deleteTimeInLocalStorage_LS(currentSolveIndex);
    var sideStatsIndex = $('#sideStatIndex').html();
    $('#solveId span').html('0');
    $('#scrambleChosen').val('U U D D L R L R B A Start');
    $('#scrambleRepresentation').attr('src', "../share/visualcube.php?fmt=png&bg=t&pzl=3");
    $('#solveChosen').val('-');
    $('#' + currentSolveIndex).remove();
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
    solveIndex = 0;
    if ($('#historyTbody *').length < 5){
      $('#noSolve').show();
      $('#milliseconds').html('000');
      $('#seconds').html('00');
    }
  })
  $(document).on('hidden.bs.modal', '#solveDetailsModal', function() {
    // Reset scramble representation on modal close
    $('#scrambleRepresentation').attr('src', '../share/visualcube.php?fmt=png&bg=t&pzl=3');
  })
  var solvesLoaded = 0;
  $(document).on('show.bs.modal', '#solveDetailsModal', function() {
    var id = Number($('#solveId span').html());
    if (solvesLoaded != id){
      solvesLoaded = id;
      $('#ao5Tab form').empty();
      $('#ao12Tab form').empty();
      $('#ao50Tab form').empty();
      var ao5SolveArray = [];
      var ao12SolveArray = [];
      var ao50SolveArray = [];
      if (id >= 5){
        var dateTime = $('#' + id + ' .indexValue').attr('id');
        // Rearange date to french format
        dateTime = dateTime.split('_');
        var [yyyy, mm, dd] = dateTime[0].split('-');
        var dateFormatFR = (dd + '/' + mm + '/' + yyyy);
        dateTime = dateFormatFR + ' ' + dateTime[1];
        var ao5Found = $('#' + id + ' .ao5Value').html();
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
        // Average of 5
        for (var [scramble, time] of Object.entries(ao5SolveArray)) {
          // Add spaces to better display scramble
          scramble = (scramble.split(/(?=[A-Z])/)).join(' ');
          displayAo5Details(scramble, time, nbSolveDisplayed);
          solveDisplayed.push(time);
          nbSolveDisplayed++;
        }
        var [worstIndex, bestIndex] = bestAndWorstInList(solveDisplayed);
        var worstTime = $('#ao5_time' + worstIndex).val();
        var bestTime = $('#ao5_time' + bestIndex).val();
        $('#ao5_time' + worstIndex).val('( ' + worstTime + ' )');
        $('#ao5_time' + bestIndex).val('( ' + bestTime + ' )');
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
        // Average of 12
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
          // Average of 50
          if (id >= 50){
            var ao50Found = $('#' + id + ' .ao50Value').html();
            for (var [scramble, time] of Object.entries(ao50SolveArray)) {
              // Add spaces to better display scramble
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
        solvesLoaded = true;
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
  })
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
  })
  $('#ao50TabButton').click(function(){
    if (openTab != 'ao50'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 550, function(){
        $('#submitSolveSave').attr('form', 'ao50Details');
        $('#submitSolveSave').attr('name', 'saveAo50');
        $('#ao50Tab').animate({ width: 'toggle' }, 550);
        openTab = 'ao50';
      });
    }
  })
});
