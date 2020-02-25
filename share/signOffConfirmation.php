<div class="modal fade" id="signOffModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header px-3 py-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark">
        <h5 class="text-center text-white">Voulez vous vous déconnecter ?</h5>
        <form action="user.php" method="post">
          <div class="d-flex my-5 justify-content-around">
            <button id="cancelSignOff" type="button" class="btn btn-danger btn-lg">Annuler</button>
            <button id="signOffConfirmation" type="submit" name="signOffConfirmation" class="btn btn-success btn-lg">Se déconnecter
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
