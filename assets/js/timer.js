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
  // Solve details modal with collection of solve informations
  $('#historyTbody').on('click', 'tr', function(){
    var id = $(this).attr('id');
    if (id != 'noSolve'){
      var time = $('#' + id + ' .timeValue').html();
      var scramble = $('#' + id + ' .timeValue').attr('id');
      var ao5 = $('#' + id + ' .ao5Value').html();
      var ao12 = $('#' + id + ' .ao12Value').html();
      var ao50 = $('#' + id + ' .ao50Value').html();

      $('#solveId span').text(id);
      $('#solveChosen').val(time);
      $('#scrambleChosen').val(scramble);
      $('#scrambleRepresentation img').attr('src', "../share/visualcube.php?fmt=png&bg=t&pzl=3&alg=" + scramble);
      $('#solveDetailsModal').modal('show');
    }
  })
  // settingsModal
  $('#settingsButton').click(function(){
    $('#settingsModal').modal('show');
  });
});
