<div class="modal fade" id="solveDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form id="solveDetails" action="#" method="post">
        <div class="modal-header d-flex py-0">
          <h5 id="solveId" class="text-center mr-auto w-50 my-1 font-weight-bold">N°<span>54</span></h5>
            <button type="button" class="close pb-0 ml-auto" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body container-fluid mx-0 px-0 py-4">
            <div class="col-12">
              <label for="scrambleChosen" class="sr-only">Mélange</label>
              <input id="scrambleChosen" class="text-center" type="text" name="scramble" value="F D2 U R' L' B2 U L' R2 F2 L2 F2 L' U' D' B R2 D' U2 L2 U L2 R D R'" readonly>
            </div>
            <div class="d-flex col-12">
              <div class="col-6 text-center">
                <img id="scrambleRepresentation" src="../share/visualcube.php?fmt=png&bg=t&pzl=3&alg=FD2UR'L'B2UL'R2F2L2F2L'U'D'BR2D'U2L2UL2RDR'" alt="Scramble representation">
              </div>
              <div class="col-6">
                <div class="text-center pt-5">
                  <label for="solveChosen" class="sr-only">Temps</label>
                  <input id="solveChosen" class="text-center font-weight-bold" type="text" name="time" value="18.265" readonly>
                </div>
                <div class="text-center py-4">
                  <label for="dateChosen" class="sr-only">Date</label>
                  <input id="dateChosen" class="text-center" type="text" name="date" value="01-01-1700 12:00:00" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer p-0 m-0">
            <button type="button" class="btn btn-secondary btn-block my-0" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-secondary btn-block my-0">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
