<div class="modal fade" id="solveDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex py-0">
        <h5 id="solveId" class="text-center mr-auto w-50 my-1 font-weight-bold">N°<span>0</span></h5>
        <button type="button" class="close pb-0 ml-auto" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container-fluid mx-0 px-0 pt-1 pb-3">
        <form id="singleDetails" action="#" method="post">
          <div class="col-12 px-0 py-1 btn-group border border-dark border-left-0 border-right-0" role="group">
            <button id="singleTabButton" type="button" class="btn btn-block btn-light my-0">Single</button>
            <button id="ao5TabButton" type="button" class="btn btn-block btn-light my-0">Moyenne de 5</button>
            <button id="ao12TabButton" type="button" class="btn btn-block btn-light my-0">Moyenne de 12</button>
            <button id="ao50TabButton" type="button" class="btn btn-block btn-light my-0">Moyenne de 50</button>
          </div>
          <div id="singleTab">
            <div class="col-12 pt-3">
              <label for="scrambleChosen" class="sr-only">Mélange</label>
              <textarea id="scrambleChosen" class="text-center" rows="2" wrap="soft" name="scramble" value="U U D D L R L R B A Start" readonly></textarea>
            </div>
            <div class="d-md-flex col-12">
              <div class="col-md-6 col-12 d-sm-block d-none text-center">
                <img id="scrambleRepresentation" class="py-3" src="../share/visualcube.php?fmt=png&bg=t&pzl=3" alt="Scramble representation">
              </div>
              <div class="col-md-6 col-12">
                <div class="text-center pt-md-5 pt-3">
                  <label for="solveChosen" class="sr-only">Temps</label>
                  <input id="solveChosen" class="text-center font-weight-bold" type="text" name="time" value="-" readonly>
                </div>
                <div class="text-center py-md-4 py-3">
                  <label for="dateChosen" class="sr-only">Date</label>
                  <input id="dateChosen" class="text-center" type="text" name="date" value="01-01-1700 12:00:00" readonly>
                </div>
              </div>
            </div>
            <div id="timeTools" class="col-12 my-2">
              <ul class="list-group list-group-horizontal text-center">
                <li id="add2" class="list-group-item list-group-item-secondary list-group-item-action col-4 py-2">+2</li>
                <li id="dnf" data-dismiss="modal" class="list-group-item list-group-item-secondary list-group-item-action col-4 py-2">DNF</li>
                <li id="deleteSolve" data-dismiss="modal" class="list-group-item list-group-item-secondary list-group-item-action col-4 py-2">Supprimer</li>
              </ul>
            </div>
          </div>
        </form>
        <div id="ao5Tab" class="col-12">
          <form id="ao5Details" class="col-12 pt-3 px-0" action="" method="post">

          </form>
        </div>
        <div id="ao12Tab" class="col-12">
          <form id="ao12Details" class="col-12 pt-3 px-0" action="" method="post">

          </form>
        </div>
        <div id="ao50Tab" class="col-12">
          <form id="ao50Details" class="col-12 pt-3 px-0" action="" method="post">

          </form>
        </div>
      </div>
      <div class="modal-footer p-0 m-0">
        <button type="button" class="btn btn-secondary btn-block my-0" data-dismiss="modal">Fermer</button>
        <button id="submitSolveSave" type="submit" form="singleDetails" name="saveSolve" class="btn btn-secondary btn-block my-0">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
