<div class="modal fade" id="deleteAccountModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header px-3 py-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary">
        <h5 class="text-center text-white">Voulez vous vraiment supprimer votre compte ?</h5>
        <h5 class="text-center text-white">Cette action est irréversible !</h5>
        <form action="user.php" method="post">
          <div class="d-flex my-5 justify-content-around">
            <button id="deleteAccountConfirmation" type="submit" name="deleteAccountConfirmation" class="btn btn-danger btn-lg">Supprimer votre compte</button>
            <button id="cancelDeleteAccount" type="button" class="btn btn-success btn-lg">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
