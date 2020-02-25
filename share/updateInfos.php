<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header px-3 py-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark">
        <h5 class="text-center text-white">Veuillez entrer votre mot de passe pour modifier vos information :</h5>
        <form action="#" method="post">
          <div class="d-flex justify-content-center mt-4">
            <label for="password" class="text-center text-white mr-2">Mot de passe :</label>
            <input id="password" type="password" name="password">
          </div>
          <div class="d-flex my-3 justify-content-around">
            <button id="cancelUpdate" type="button" class="btn btn-danger btn-lg">Annuler</button>
            <button id="updateConfirmation" type="submit" name="updateConfirmation" class="btn btn-success btn-lg" disabled>Modifier
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
