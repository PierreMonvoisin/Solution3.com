$(function(){
  $('#add2').click(function(){
    var modalTime = $('#solveChosen').val();
    var solveIndex = $('#solveId span').html();
    var historyTime = $('#' + solveIndex + ' .timeValue').html();
    var testTime = addTwoSeconds(modalTime);
    console.log(testTime);
    var sideStatsIndex = $('#sideStatIndex').html();
    if (solveIndex == sideStatsIndex){
      // Change time
    }
  })
});
