<div class="modal fade" id="solveDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form id="solveDetails" action="#" method="post">
        <div class="modal-header text-right">
          <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container-fluid mx-0 px-0">
          <div class="d-flex">
            <div class="col-4">
              <label for="solveChosen" class="sr-only">Temps</label>
              <input id="solveChosen" class="display-3" type="text" name="solve" value="18.265" readonly>
            </div>
            <div class="col-8">
              <label for="scrambleChosen" class="sr-only">Mélange</label>
              <input id="scrambleChosen" class="text-left" type="text" name="scamble" value="F D2 U R' L' B2 U L' R2 F2 L2 F2 L' U' D' B R2 D' U2 L2 U L2 R D R'" readonly>
            </div>
          </div>
          <div class="d-flex">
            <div class="col-6 text-center">
              <img id="scrambleRepresentation" src="../share/visualcube.php?fmt=png&bg=t&pzl=3&alg=FD2UR'L'B2UL'R2F2L2F2L'U'D'BR2D'U2L2UL2RDR'" alt="Scramble representation">
            </div>
            <div class="col-5 ml-auto">
              <label for="dateChosen" class="sr-only">Date</label>
              <input id="dateChosen" class="text-right" type="text" name="date" value="11/03/2020 22:40" readonly>
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
