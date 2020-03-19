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
  var solvesLoaded = 0;
  $(document).on('show.bs.modal', '#solveDetailsModal', function() {
    var id = Number($('#solveId span').html());
    if (solvesLoaded != id){
      solvesLoaded = id;
      $('#ao5Tab').empty();
      $('#ao12Tab').empty();
      $('#ao50Tab').empty();
      var ao5SolveArray = [];
      var ao12SolveArray = [];
      var ao50SolveArray = [];
      if (id >= 5){
        var ao5Found = $('#' + id + ' .ao5Value').html();
        var ao50Found = $('#' + id + ' .ao50Value').html();
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
        var avg5Title = document.createElement('h4');
        avg5Title.setAttribute('id', 'averageOF5Title');
        avg5Title.setAttribute('class', 'col-12 text-center');
        avg5Title.innerHTML = ao5Found;
        $('#ao5Tab').prepend(avg5Title);
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
          var avg12Title = document.createElement('h4');
          avg12Title.setAttribute('id', 'averageOF12Title');
          avg12Title.setAttribute('class', 'col-12 text-center');
          avg12Title.innerHTML = ao12Found;
          $('#ao12Tab').prepend(avg12Title);
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
            var avg50Title = document.createElement('h4');
            avg50Title.setAttribute('id', 'averageOF50Title');
            avg50Title.setAttribute('class', 'col-12 text-center');
            avg50Title.innerHTML = ao50Found;
            $('#ao50Tab').prepend(avg50Title);
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
        $('#singleTab').animate({ width: 'toggle' }, 550);
        openTab = 'single';
      });
    }
  })
  $('#ao5TabButton').click(function () {
    if (openTab != 'ao5'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 550, function(){
        $('#ao5Tab').animate({ width: 'toggle' }, 550);
        openTab = 'ao5';
      });
    }
  });
  $('#ao12TabButton').click(function(){
    if (openTab != 'ao12'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 550, function(){
        $('#ao12Tab').animate({ width: 'toggle' }, 550);
        openTab = 'ao12';
      });
    }
  })
  $('#ao50TabButton').click(function(){
    if (openTab != 'ao50'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 550, function(){
        $('#ao50Tab').animate({ width: 'toggle' }, 550);
        openTab = 'ao50';
      });
    }
  })
});
