<?php require '../share/forbiddenPages.php';
require '../controller/personnalInfos_ctrl.php';
// If the password is correct or the update form is validated
if (! isset($_POST['updateConfirmation']) || $formValidity != true){ ?>
  <div id="personnalInfos" class="card mx-auto my-2 col-lg-11 col-12 px-0 bg-copper shadow">
    <h4 class="text-center font-weight-bold px-0 pt-2">Informations personnelles</h4>
    <?php if ($error != false) { ?>
      <h4 class="text-center font-weight-bold px-0 pt-2"><?= $errorMessage ?></h4>
    <?php } else if ($confirmation == true) { ?>
      <h4 class="text-center font-weight-bold px-0 pt-2"><?= $confirmationMessage ?></h4>
    <?php } else if ($updateError != false) { ?>
      <h4 class="text-center font-weight-bold px-0 pt-2"><?= $updateErrorMessage ?></h4>
    <?php } else if ($updateConfirmation != false) { ?>
      <h4 class="text-center font-weight-bold px-0 pt-2"><?= $updateConfirmationMessage ?></h4>
    <?php } ?>
    <div class="card-body d-lg-flex text-center px-2">
      <div class="col-lg-6 col-12 d-flex px-0">
        <ul class="list-group userInfosTitle w-50">
          <li class="list-group-item bg-transparent border-0 font-weight-bold formLabel">Mail</li>
          <li class="list-group-item bg-transparent border-0 font-weight-bold formLabel">Mot de passe</li>
        </ul>
        <ul class="list-group userPersonnalInfos">
          <?php if (! empty($_SESSION['mail'])){
            $fullMail = trim($_SESSION['mail']);
            $add = '<wbr>';
            $at = strpos($fullMail, '@');
            $_SESSION['mail'] = substr_replace($fullMail, $add, $at, 0);
          } ?>
          <li class="list-group-item px-md-3 px-1"><?= $_SESSION['mail'] ?? 'john.doe@mail.com' ?></li>
          <li class="list-group-item px-md-3 px-1">••••••••</li>
        </ul>
      </div>
      <div class="col-lg-6 col-12 d-flex px-0">
        <ul class="list-group userInfosTitle w-50">
          <li class="list-group-item bg-transparent border-0 font-weight-bold formLabel">Nom d'utilisateur</li>
          <li class="list-group-item bg-transparent border-0 font-weight-bold formLabel">Mélange identifiant</li>
        </ul>
        <ul class="list-group userPersonnalInfos">
          <li class="list-group-item px-md-3 px-1"><?= $_SESSION['username'] ?? 'Johnny Doey' ?></li>
          <?php if (! empty($userScramble)){
            $fullScramble = trim($userScramble);
            $add = '<wbr>';
            $at = 15;
            $userScramble = substr_replace($fullScramble, $add, $at, 0);
          } ?>
          <li class="list-group-item px-md-3 px-1"><?= $userScramble ?? 'UFR2URF2B2L2F\'U2R\'ULDL' ?></li>
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
            <li class="list-group-item bg-transparent border-0 font-weight-bold formLabel">Mail</li>
            <li class="list-group-item bg-transparent border-0 font-weight-bold formLabel">Mot de passe</li>
            <li class="list-group-item bg-transparent border-0 font-weight-bold formLabel">Confirmation</li>
          </ul>
          <ul class="list-group userPersonnalInfos">
            <li class="list-group-item px-md-3 px-1 text-muted"><?= $_SESSION['mail'] ?? 'john.doe@mail.com' ?></li>
            <li class="list-group-item px-md-3 px-1">
              <label for="updatePassword" class="sr-only">Entrer votre nouveau mot de passe</label>
              <input id="updatePassword" type="password" name="updatePassword" placeholder="••••••••">
            </li>
            <li class="list-group-item px-md-3 px-1">
              <label for="confirmUpdatePassword" class="sr-only">Confirmer votre nouveau mot de passe</label>
              <input id="confirmUpdatePassword" type="password" name="confirmUpdatePassword" placeholder="••••••••">
            </li>
          </ul>
        </div>
        <div class="col-lg-6 col-12 d-flex px-0">
          <ul class="list-group userInfosTitle w-50">
            <li class="list-group-item bg-transparent border-0 font-weight-bold formLabel">Nom d'utilisateur</li>
            <li class="list-group-item bg-transparent border-0 font-weight-bold formLabel">Mélange identifiant</li>
          </ul>
          <ul class="list-group userPersonnalInfos">
            <li class="list-group-item px-md-3 px-1">
              <label for="updateUsername" class="sr-only">Entrer votre nouveau nom d'utilisateur</label>
              <input id="updateUsername" type="text" name="updateUsername" placeholder="<?= $_SESSION['username'] ?? 'Johnny Doey' ?>">
            </li>
            <li class="list-group-item px-md-3 px-1 text-muted"><?= $userScramble ?? 'UFR2URF2B2L2F\'U2R\'ULDL' ?></li>
          </ul>
        </div>
      </div>
      <div class="card-footer p-0 m-0">
        <button id="confirmUpdateForm" type="submit" name="confirmUpdateForm" class="btn btn-success btn-block">Confirmer les modifications</button>
      </div>
    </form>
  </div>
<?php } ?>
