<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form id="settingsForm" action="#" method="post">
          <div class="settingsInputGroup d-flex py-2">
            <label class="offset-sm-1 col-sm-5 text-center" for="mainFontColor">Couleur principale de la police:</label>
            <div class="col-sm-6 d-flex">
              <input id="mainFontColor" class="mx-auto" type="color" name="mainFontColor" value="#000000">
            </div>
          </div>
          <div class="settingsInputGroup d-flex py-2">
            <label class="offset-sm-1 col-sm-5 text-center" for="secondaryFontColor">Couleur secondaire de la police:</label>
            <div class="col-sm-6 d-flex">
              <input id="secondaryFontColor" class="mx-auto" type="color" name="secondaryFontColor" value="#FFFFFF">
            </div>
          </div>
          <div class="settingsInputGroup d-flex py-2">
            <label class="offset-sm-1 col-sm-5 text-center" for="mainBackgroundColor">Couleur de fond principale:</label>
            <div class="col-sm-6 d-flex">
              <input id="mainBackgroundColor" class="mx-auto" type="color" name="mainBackgroundColor" value="#E8DCD8">
            </div>
          </div>
          <div class="settingsInputGroup d-flex py-2">
            <label class="offset-sm-1 col-sm-5 text-center" for="secondaryBackgroundColor">Couleur de fond secondaire:</label>
            <div class="col-sm-6 d-flex">
              <input id="secondaryBackgroundColor" class="mx-auto" type="color" name="secondaryBackgroundColor" value="#C1C1C1">
            </div>
          </div>
          <div class="settingsInputGroup d-flex py-2">
            <label class="offset-sm-1 col-sm-5 text-center" for="headerBackgroundColor">Couleur de l'entête:</label>
            <div class="col-sm-6 d-flex">
              <input id="headerBackgroundColor" class="mx-auto" type="color" name="headerBackgroundColor" value="#463730">
            </div>
          </div>
          <div class="settingsInputGroup d-flex py-2">
            <label class="offset-sm-1 col-sm-5 text-center" for="statsBackgroundColor">Couleur des statistiques:</label>
            <div class="col-sm-6 d-flex">
              <input id="statsBackgroundColor" class="mx-auto" type="color" name="statsBackgroundColor" value="#BF6B44">
            </div>
          </div>
          <div class="form-check settingsInputGroup d-flex px-0 py-2">
            <label class="form-check-label offset-sm-1 col-sm-5 text-center" for="displayTimer">Afficher le chronomètre lors de la résolution:</label>
            <div class="col-sm-6 text-center mx-auto w-50">
              <input class="form-check-input" type="radio" name="displayTimer" id="displayTimer" value="1" checked>
              <label class="form-check-label ml-1" for="displayTimer">Oui</label>
              <input class="form-check-input ml-4" type="radio" name="displayTimer" id="hideTimer" value="0">
              <label class="form-check-label ml-5" for="hideTimer">Non</label>
            </div>
          </div>
          <div class="settingsInputGroup d-flex py-2">
            <label class="offset-sm-1 col-sm-5 text-center" for="mainFont">Police principale:</label>
            <div class="col-sm-6 d-flex">
              <select name="mainFont" id="mainFont" class="custom-select mx-auto w-auto">
                <option value='1' selected>Roboto, sans-serif</option>
                <option value='2'>Bitter, serif</option>
              </select>
            </div>
          </div>
          <div class="settingsInputGroup d-flex py-2">
            <label class="offset-sm-1 col-sm-5 text-center" for="timerFont">Police du chronomètre:</label>
            <div class="col-sm-6 d-flex">
              <select name="timerFont" id="timerFont" class="custom-select mx-auto w-auto">
                <option value='3' selected>Gugi, cursive</option>
                <option value='4'>Odibee Sans, cursive</option>
                <option value='5'>Black Ops One, cursive</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-dark">
        <button id="cancel" type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
        <button id="submitChanges" name="submitChanges" type="submit" class="btn btn-success ml-auto" form="settingsForm">Enregistrer les changements
        </button>
      </div>
    </div>
  </div>
</div>
