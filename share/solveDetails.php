<div class="modal fade" id="solveDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form id="solveDetails" action="#" method="post">
        <div class="modal-header d-flex py-0">
          <h5 id="solveId" class="text-center mr-auto w-50 my-1 font-weight-bold">N°<span>0</span></h5>
          <button type="button" class="close pb-0 ml-auto" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container-fluid mx-0 px-0 py-4">
          <div class="col-12">
            <label for="scrambleChosen" class="sr-only">Mélange</label>
            <input id="scrambleChosen" class="text-center" type="text" name="scramble" value="U U D D L R L R B A Start" readonly>
          </div>
          <div class="d-flex col-12">
            <div class="col-6 text-center">
              <img id="scrambleRepresentation" src="../share/visualcube.php?fmt=png&bg=t&pzl=3" alt="Scramble representation">
            </div>
            <div class="col-6">
              <div class="text-center pt-5">
                <label for="solveChosen" class="sr-only">Temps</label>
                <input id="solveChosen" class="text-center font-weight-bold" type="text" name="time" value="-" readonly>
              </div>
              <div class="text-center py-4">
                <label for="dateChosen" class="sr-only">Date</label>
                <input id="dateChosen" class="text-center" type="text" name="date" value="01-01-1700 12:00:00" readonly>
              </div>
            </div>
          </div>
          <div id="timeTools" class="col-12 my-2">
            <ul class="list-group list-group-horizontal text-center">
              <li id="add2" class="list-group-item list-group-item-secondary list-group-item-action col-4 py-2">+2</li>
              <li id="dnf" class="list-group-item list-group-item-secondary list-group-item-action col-4 py-2">DNF</li>
              <li id="deleteSolve" class="list-group-item list-group-item-secondary list-group-item-action col-4 py-2">Supprimer</li>
            </ul>
          </div>
        </div>
        <div class="modal-footer p-0 m-0">
          <button type="button" class="btn btn-secondary btn-block my-0" data-dismiss="modal">Fermer</button>
          <button type="submit" name="saveSolve" class="btn btn-secondary btn-block my-0">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>
