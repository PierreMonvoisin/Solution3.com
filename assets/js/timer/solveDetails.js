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
  var solvesLoaded = false;
  $(document).on('show.bs.modal', '#solveDetailsModal', function() {
    if (solvesLoaded != true){
      var id = Number($('#solveId span').html());
      var ao5SolveArray = [];
      var ao12SolveArray = [];
      var ao50SolveArray = [];
      if (id >= 5){
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
        var solveDisplayed = 0;
        for (var [scramble, time] of Object.entries(ao5SolveArray)) {
          displayAo5Details(scramble, time, solveDisplayed);
          solveDisplayed++;
        }
        solvesLoaded = true;
      }
    }
  });
  // Different Tab display
  var openTab = 'single';
  $('#singleTabButton').click(function(){
    if (openTab != 'single'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 600, function(){
        $('#singleTab').animate({ width: 'toggle' }, 600);
        openTab = 'single';
      });
    }
  })
  $('#ao5TabButton').click(function () {
    if (openTab != 'ao5'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 600, function(){
        $('#ao5Tab').animate({ width: 'toggle' }, 600);
        openTab = 'ao5';
      });
    }
  });
  $('#ao12TabButton').click(function(){
    if (openTab != 'ao12'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 600, function(){
        $('#ao12Tab').animate({ width: 'toggle' }, 600);
        openTab = 'ao12';
      });
    }
  })
  $('#ao50TabButton').click(function(){
    if (openTab != 'ao50'){
      $('#'+ openTab +'Tab').animate({ width: 'toggle' }, 600, function(){
        $('#ao50Tab').animate({ width: 'toggle' }, 600);
        openTab = 'ao50';
      });
    }
  })
});
