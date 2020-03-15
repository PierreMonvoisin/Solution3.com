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
    }
    solveIndex = 0;
    if ($('#historyTbody *').length < 5){
      $('#noSolve').show();
      $('#milliseconds').html('000');
      $('#seconds').html('00');
    }
  })
});
