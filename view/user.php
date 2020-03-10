<?php require '../controller/logOff_ctrl.php';
// Store user infos in session storage to use them on all pages
require '../share/session.php';
require '../controller/updatePersonnalisations_ctrl.php';
require '../controller/deleteUser_ctrl.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <!-- ³ = alt + 0179 -->
  <title>Compte - Solution³</title>
  <?php
  require '../share/requiredHeadTags.html';
  include '../share/fonts.html'; ?>
  <link rel="stylesheet" type="text/css" href="../assets/css/user.css">
</head>
<body class="bg-silver">
  <!-- Header -->
  <?php require '../share/header.php'; ?>
  <div class="container-fluid w-100">
    <div id="avatarHeader" class="row bg-taupe">
      <img id="topAvatar" class="mx-auto my-2 bg-light border border-dark"
      src="<?= isset($_COOKIE['avatarUrl']) && !empty($_COOKIE['avatarUrl']) ? $_COOKIE['avatarUrl'] : '../share/visualcube.php?fmt=png&bg=t&pzl=3' ?>"
      alt="Avatar Picture">
      <h1 id="usernameTitle" class="col-6 text-center my-auto pr-5 pl-0"><?= $_SESSION['username'] ?? 'Compte personnel' ?></h1>
    </div>
  </div>
  <?php if ($deleteError != false) { ?>
    <h4 class="text-center font-weight-bold px-0 pt-2"><?= $deleteErrorMessage ?></h4>
  <?php } else if ($deleteConfirmation != false) { ?>
    <h4 class="text-center font-weight-bold px-0 pt-2"><?= $deleteConfirmationMessage ?></h4>
  <?php } else if ($updateError != false){ ?>
    <h4 class="text-center font-weight-bold px-0 pt-2"><?= $updateErrorMessage ?></h4>
  <?php } else if ($udpateConfirmation != false){ ?>
    <h4 class="text-center font-weight-bold px-0 pt-2"><?= $udpateConfirmationMessage ?></h4>
  <?php } ?>
  <h4></h4>
  <div id="userStats" class="container w-100">
    <div class="row justify-content-between">
      <!-- General info -->
      <?php include 'personnalInfos.php'; ?>
      <div id="overview" class="card my-2 col-12 px-0 bg-copper shadow">
        <h4 class="text-center font-weight-bold px-0 pt-2">Statistiques</h4>
        <div class="card-body pt-1 pb-3 px-0 userStat d-flex justify-content-around">
          <table id="overviewStats" class="col-5 table bg-light mb-0 text-center">
            <thead>
              <tr>
                <th>/</th>
                <th>Single</th>
                <th>Ao5</th>
                <th>Ao12</th>
                <th>Ao50</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Dernier</th>
                <td id="lastSingle">-</td>
                <td id="lastAo5">-</td>
                <td id="lastAo12">-</td>
                <td id="lastAo50">-</td>
              </tr>
              <tr>
                <th>Meilleur</th>
                <td id="bestSingle">-</td>
                <td id="bestAo5">-</td>
                <td id="bestAo12">-</td>
                <td id="best1o50">-</td>
              </tr>
              <tr>
                <th>Pire</th>
                <td id="worstSingle">-</td>
                <td id="worstAo5">-</td>
                <td id="worstAo12">-</td>
                <td id="worstAo50">-</td>
              </tr>
            </tbody>
          </table>
          <!-- Chart -->
          <div class="col-6 p-0" id="chartContainer"></div>
        </div>
      </div>
      <!-- Settings -->
      <div id="settings" class="card col-xl-3 col-lg-4 col-md-5 my-2 px-0 bg-copper shadow">
        <div class="card-body p-2 userStat">
          <h4 class="text-center font-weight-bold">Outils</h4>
          <div class="card">
            <div class="btn-group-vertical" role="group">
              <button id="settingsButton" type="button" class="btn btn-secondary btn-lg">Paramètres</button>
              <button id="signOffButton" type="button" class="btn btn-secondary btn-lg">Se déconnecter</button>
              <button id="deleteAccountButton" type="button" class="btn btn-secondary btn-lg">Supprimer votre compte</button>
            </div>
          </div>
        </div>
      </div>
      <!-- History log -->
      <div id="history" class="card col-xl-8 col-md-7 col-12 my-2 px-0 bg-copper shadow">
        <div class="card-body userStat p-2">
          <h4 class="text-center font-weight-bold">Historique</h4>
          <table class="table text-center">
            <thead class="thead-light">
              <tr>
                <th class="py-1">N°</th>
                <th class="py-1">Time</th>
                <th class="py-1">Ao5</th>
                <th class="py-1">Ao12</th>
                <th class="py-1">Ao50</th>
              </tr>
            </thead>
            <tbody>
              <tr id="noSolve">
                <td colspan="5" class="py-2">Pas d'historique</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
  // Sign off confirmation modal
  require '../share/deleteAccountConfirmation.php';
  // Sign off confirmation modal
  require '../share/signOffConfirmation.php';
  // Update infos confirmation modal
  require '../share/updateInfos.php';
  // Local storage authorization modal
  require '../share/userAuthorization.php';
  // Settings modal
  require '../share/settings.php';
  // Required scripts
  require '../share/requiredScriptTags.html'; ?>
  <script src="../assets/js/user.js"></script>
  <script src="../assets/js/personnalInfos.js"></script>
  <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src="../assets/js/share/graph.js"></script> -->
</body>
</html>
