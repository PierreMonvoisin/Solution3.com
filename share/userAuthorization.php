<?php
$pageUrl = explode('/', $_SERVER['SCRIPT_NAME']);
$page = end($pageUrl);
if ($page == 'index.php'){
  include 'controller/userAuthorization_ctrl.php';
} else {
  include '../controller/userAuthorization_ctrl.php';
}
?>
<!-- Modal -->
<div id="userAuthorizationModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <!-- Modal content-->
    <div class="modal-content bg-light border-0">
      <div class="modal-header text-right bg-dark">
        <button type="button" class="close py-0 text-white storageDecline" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <p>En poursuivant votre navigation sur Solution³, vous devez accepter l’utilisation de cookies, du stockage local de votre navigateur ainsi que du stockage en base de données pour avoir la meilleure expérience possible. Ces informations nous permettront de vous proposer le contrôle des informations générales associées à votre compte personnel et la bonne utilisation des outils nécessaire au fonctionnement de notre site.</p>
        <p>Vous pouvez refuser ces conditions en cliquant sur le bouton "Refuser". Pour vous assurer la meilleure utilisation de Solution³, le refus de ces conditions nous amènerons à limiter l’accès à certaines fonctionnalités.</p>
        <p>Merci de votre compréhension.</p>
      </div>
        <form class="modal-footer bg-dark" action="#" method="post">
          <button type="button" class="storageDecline btn btn-block btn-danger my-0 mx-5" data-dismiss="modal">Refuser</button>
          <button type="submit" name="storageAuthorization" class="storageAllow btn btn-block btn-success my-0 mx-5" data-dismiss="modal">Autoriser</button>
        </form>
    </div>
  </div>
</div>
