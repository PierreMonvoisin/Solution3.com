<?php require '../controller/personnalInfos_ctrl.php';
if (! isset($_POST['updateConfirmation']) || $formValidity != true){ ?>
  <div id="personnalInfos" class="card mx-auto my-2 col-lg-11 col-12 px-0 bg-copper shadow">
    <h4 class="text-center font-weight-bold px-0 pt-2">Informations personnelles</h4>
    <?php if ($error != false) { ?>
      <h4 class="text-center font-weight-bold px-0 pt-2"><?= $errorMessage ?></h4>
    <?php } ?>
    <div class="card-body d-lg-flex text-center px-2">
      <div class="col-lg-6 col-12 d-flex px-0">
        <ul class="list-group userInfosTitle w-50">
          <li class="list-group-item bg-transparent border-0 font-weight-bold text-white">Mail</li>
          <li class="list-group-item bg-transparent border-0 font-weight-bold text-white">Mot de passe</li>
        </ul>
        <ul class="list-group userPersonnalInfos">
          <li class="list-group-item list-group-item-action px-md-3 px-1"><?= $_SESSION['mail'] ?? 'john.doe@mail.com' ?></li>
          <li class="list-group-item list-group-item-action px-md-3 px-1">••••••••</li>
        </ul>
      </div>
      <div class="col-lg-6 col-12 d-flex px-0">
        <ul class="list-group userInfosTitle w-50">
          <li class="list-group-item bg-transparent border-0 font-weight-bold text-white">Nom d'utilisateur</li>
          <li class="list-group-item bg-transparent border-0 font-weight-bold text-white">Mélange identifiant</li>
        </ul>
        <ul class="list-group userPersonnalInfos">
          <li class="list-group-item list-group-item-action px-md-3 px-1"><?= $_SESSION['username'] ?? 'Johnny Doey' ?></li>
          <li class="list-group-item list-group-item-action px-md-3 px-1"><?= $userScramble ?? 'UFR2URF2B2L2F\'U2R\'ULDL' ?></li>
        </ul>
      </div>
    </div>
    <div class="card-footer p-0 m-0">
      <button id="modifyButton" type="button" class="btn btn-dark btn-block">Modifier vos informations</button>
    </div>
  </div>
<?php } else { ?>
  <div id="personnalInfos" class="card mx-auto my-2 col-lg-11 col-12 px-0 bg-copper shadow">
    <form action="#" method="post">
      <h4 class="text-center font-weight-bold px-0 pt-2">Modifiez vos informations personnelles</h4>
      <div class="card-body d-lg-flex text-center px-2">
        <div class="col-lg-6 col-12 d-flex px-0">
          <ul class="list-group userInfosTitle w-50">
            <li class="list-group-item bg-transparent border-0 font-weight-bold text-white">Mail</li>
            <li class="list-group-item bg-transparent border-0 font-weight-bold text-white">Mot de passe</li>
            <li class="list-group-item bg-transparent border-0 font-weight-bold text-white">Confirmation</li>
          </ul>
          <ul class="list-group userPersonnalInfos">
            <li class="list-group-item px-md-3 px-1 text-muted"><?= $_SESSION['mail'] ?? 'john.doe@mail.com' ?></li>
            <li class="list-group-item list-group-item-action px-md-3 px-1"><input type="text" name="updatePassword" placeholder="••••••••"></li>
            <li class="list-group-item list-group-item-action px-md-3 px-1"><input type="text" name="confirmUpdatePassword" placeholder="••••••••"></li>
          </ul>
        </div>
        <div class="col-lg-6 col-12 d-flex px-0">
          <ul class="list-group userInfosTitle w-50">
            <li class="list-group-item bg-transparent border-0 font-weight-bold text-white">Nom d'utilisateur</li>
            <li class="list-group-item bg-transparent border-0 font-weight-bold text-white">Mélange identifiant</li>
          </ul>
          <ul class="list-group userPersonnalInfos">
            <li class="list-group-item list-group-item-action px-md-3 px-1"><input type="text" name="updateUsername" placeholder="<?= $_SESSION['username'] ?? 'Johnny Doey' ?>"></li>
            <li class="list-group-item px-md-3 px-1 text-muted"><?= $userScramble ?? 'UFR2URF2B2L2F\'U2R\'ULDL' ?></li>
          </ul>
        </div>
      </div>
      <div class="card-footer p-0 m-0">
        <button id="confirmUpdateForm" type="submit" class="btn btn-success btn-block">Confirmer les modifications</button>
      </div>
    </form>
  </div>
<?php } ?>
