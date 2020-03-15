$(function(){
  var plusTwoPenalty = false;
  var dnfPenalty = false;
  var solveIndex = 0;
  $('#add2').click(function(){
    alert(solveIndex);
    var currentSolveIndex = $('#solveId span').html();
    if (currentSolveIndex != solveIndex && $('#solveChosen').val() != 'DNF'){
      plusTwoPenalty = false; dnfPenalty = false;
      if (plusTwoPenalty != true && dnfPenalty != true){
        var modalTime = $('#solveChosen').val();
        var timePlusTwo = addTwoSeconds(modalTime);
        $('#solveChosen').val(timePlusTwo);
        $('#' + currentSolveIndex + ' .timeValue').html(timePlusTwo);
        var sideStatsIndex = $('#sideStatIndex').html();
        if (currentSolveIndex == sideStatsIndex){
          $('#sideStatIndex').html(timePlusTwo);
        }
        solveIndex = currentSolveIndex;
      }
      plusTwoPenalty = true;
    }
  })
  $('#dnf').click(function(){
    var currentSolveIndex = $('#solveId span').html();
    if (currentSolveIndex != solveIndex && $('#solveChosen').val() != 'DNF'){
      plusTwoPenalty = false; dnfPenalty = false;
      if (dnfPenalty != true){
        $('#solveChosen').val('DNF');
        $('#' + currentSolveIndex + ' .timeValue').html('DNF');
        var sideStatsIndex = $('#sideStatIndex').html();
        if (currentSolveIndex == sideStatsIndex){
          $('#sideStatIndex').html('DNF');
        }
        solveIndex = currentSolveIndex;
      }
      dnfPenalty = true;
    }
  })
});
