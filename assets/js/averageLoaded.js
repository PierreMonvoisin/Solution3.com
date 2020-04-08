$(function(){
  // Check how many averages are loaded
  var nbAverages = $('.averageLoaded').length;
  // If there is a least one
  if (nbAverages > 0){
    // On click of a button, scroll to the average
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
    // If there is two or more averages loaded, change the text to plural
    if (nbAverages > 1){
      $('#averageTitle').text('Moyennes enregistrées');
    }
  }
});
