$(function(){
  // Auto open the stats menu
  $('#sideTimer').slideToggle('fast', function(){
    $('#menuToggle').text('Cacher les statistiques');
  });
  $('#sideTimer').addClass('d-flex');
  // Side timer stats
  $('#menuToggle').click(function() {
    if ($('#sideTimer').is(":visible")) {
      // After animation ends, remove display flex
      $('#sideTimer').slideToggle('fast', function(){
        $('#sideTimer').removeClass('d-flex');
        $('#menuToggle').text('Afficher les statistiques');
      });
    } else {
      $('#sideTimer').addClass('d-flex');
      $('#sideTimer').slideToggle('fast', function(){
        $('#menuToggle').text('Cacher les statistiques');
      });
    }
  });
  // Check if hours and/or minutes are null, not to display them
  if ($("#hours").html() == '00'){
    $("#hours, #separatorHours").hide();
  }
  if ($("#minutes").html() == '00'){
    $("#minutes, #separatorMinutes").hide();
  } else {
    $("#minutes, #separatorMinutes").show();
  }
  // settingsModal
  $('#settingsButton').click(function(){
    $('#settingsModal').modal('show');
  });
});
