<?php session_start();
require '../share/forbiddenPages.php';
require '../controller/signin_ctrl.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <!-- ³ = alt + 0179 -->
  <title>Login - Solution³</title>
  <?php
  require '../share/requiredHeadTags.html';
  include '../share/fonts.html'; ?>
  <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body class="bg-silver">
  <?php include '../share/header.php'; ?>
  <div class="container-fluid d-flex" id="loginContainer">
    <div class="card m-auto pt-3 shadow-lg" id="newUserCard">
      <div class="bg-secondary mx-auto image-upload" id="avatarContainer">
        <img class="card-img-top"
        src="<?= $confirmation ? $userInfos['avatarUrl'] : '../share/visualcube.php?fmt=png&bg=t&pzl=3' ?>"
        alt="login" id="topAvatar"/>
      </div>
      <div class="card-body">
        <h3 class="card-title text-center">Nouveau Compte</h3>
        <!-- Display the error message if there is one -->
        <?php if ($error) { ?>
          <h4 class="text-center"><?= $errorMessage ?></h4>
        <?php } else if  ($confirmation) { ?>
          <h4 class="text-center"><?= $confirmationMessage ?></h4>
        <?php } else { ?>
          <h4 class="text-center outputMessage"></h4>
        <?php } ?>
        <form id="newUserForm" action="signin.php" method="post" autocomplete="on">
          <label for="avatarUrl" class="sr-only">Url de votre avatar</label>
          <input type="text" name="avatarUrl" id="avatarUrl" class="invisible">
          <!-- Username input -->
          <div class="form-group row">
            <label for="username" class="col-xl-3 col-form-label">Nom d'utilisateur</label>
            <div class="col-xl-9">
              <input name="username" type="text" class="form-control" id="username" placeholder="Username">
            </div>
          </div>
          <!-- Email input -->
          <div class="form-group row">
            <label for="newMail" class="col-xl-3 col-form-label">Email</label>
            <div class="col-xl-9">
              <input name="newMail" type="email" class="form-control" id="newMail" placeholder="Email">
            </div>
          </div>
          <!-- Password input -->
          <div class="form-group row">
            <label for="newPassword" class="col-xl-3 col-form-label">Mot de passe</label>
            <div class="col-xl-9">
              <input name="newPassword" type="password" class="form-control" id="newPassword" placeholder="Password">
            </div>
          </div>
          <!-- Password confirmation input -->
          <div class="form-group row">
            <label for="confirmation" class="col-xl-3 col-form-label finalInput">Confirmation du mot de passe</label>
            <div class="col-xl-9">
              <input name="confirmation" type="password" class="form-control" id="confirmation" placeholder="Confirmation">
            </div>
          </div>
          <!-- Buttons -->
          <div class="form-group row">
            <div class="col-xl-9 offset-xl-3 d-md-flex">
              <button type="submit" name="newSubmit" class="btn btn-success mr-1" disabled>Créer votre compte</button>
              <button formaction="login.php" type="submit" id="loginButton" class="btn btn-info">Se connecter</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php // Local storage authorization modal
  include '../share/userAuthorization.php';
  // Required scripts
  require '../share/requiredScriptTags.html'; ?>
  <script src="../assets/js/share/inputsValidations.js"></script>
  <script src="../assets/js/share/newScramble.js"></script>
  <script src="../assets/js/share/getCookie.js"></script>
  <script src="../assets/js/signin.js"></script>
  <script src="../assets/js/share/settings.js"></script>
  <script src="../assets/js/share/localStorage/loadPersonnalisations.js"></script>
</body>
</html>
