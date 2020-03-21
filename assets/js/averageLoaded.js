$(function(){
  var nbAverages = $('.averageLoaded').length;
  if (nbAverages > 0){
    $("#ao5Button").click(function() {
      $('html, body').animate({
        scrollTop: $("#savedAverage .card-body").offset().top
      }, 2000);
      $('#savedAverage .card-body').animate({
        scrollTop: $("#ao5Saved").position().top
      }, 2000);
    });$("#ao12Button").click(function() {
      $('html, body').animate({
        scrollTop: $("#savedAverage .card-body").offset().top
      }, 2000);
      $('#savedAverage .card-body').animate({
        scrollTop: $("#ao12Saved").position().top
      }, 2000);
    });
    $("#ao50Button").click(function() {
      $('html, body').animate({
        scrollTop: $("#savedAverage .card-body").offset().top
      }, 2000);
      $('#savedAverage .card-body').animate({
        scrollTop: $("#ao50Saved").position().top
      }, 2000);
    });
    if (nbAverages > 1){
      $('#averageTitle').text('Moyennes enregistrées');
    }
  }
});
