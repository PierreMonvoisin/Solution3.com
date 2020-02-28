<?php // Store user infos in session storage to use them on all pages
require '../share/session.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <!-- ³ = alt + 0179 -->
  <title>Timer - Solution³</title>
  <?php
  require '../share/requiredHeadTags.html';
  include '../share/fonts.html'; ?>
  <link rel="stylesheet" type="text/css" href="../assets/css/timer.css">
</head>
<body class="bg-silver">
  <?php include '../share/header.php'; ?>
  <!-- Main container -->
  <div id="timerContainer" class="d-flex">
    <div id="timerBody" class="d-flex flex-column">
      <div class="p-0 m-0 d-flex mt-1">
        <!-- Stats button -->
        <button id="menuToggle" type="button" class="btn btn-dark btn-block">Cacher les statistiques</button>
        <!-- Settings button -->
        <button id="settingsButton" type="button" class="btn btn-light btn-block m-0">Paramètres</button>
      </div>
      <!-- Scramble -->
      <div class="row text-center mb-0 mx-0 mt-xl-2 mt-lg-5 mt-5">
        <h2 id="scramble" class="mt-4"><span class="py-2 px-2">Error</span></h2>
      </div>
      <!-- Timer -->
      <div class="row text-center mx-auto">
        <h1 class="p-0 m-0" id="timer">
          <span id="hours">00</span><span id="separatorHours">:</span>
          <span id="minutes">00</span><span id="separatorMinutes">:</span>
          <span id="seconds">00</span><span id="separatorSeconds">.</span>
          <span id="milliseconds">000</span>
        </h1>
      </div>
      <!-- Under timer stats -->
      <div class="row text-center mx-auto mb-2 mt-1">
        <h2 class="p-0 m-0">
          <span id="averageOf5">Average of 5 : <span>-</span></span>
        </h2>
      </div>
      <div class="row text-center mx-auto">
        <h2 class="p-0 m-0">
          <span id="averageOf12">Average of 12 : <span>-</span></span>
        </h2>
      </div>
      <!-- Invisible button -->
      <div class="mx-auto" id="controls">
        <button id="start_stop" class="btn btn-light">Start</button>
      </div>
      <!-- Stats menu -->
      <div id="sideTimer" class="row m-0 bg-copper">
        <div id="sideStats">
          <p id="statsInMenu" class="bg-light font-weight-bold text-center mb-0 py-1">Statistique</p>
          <div id="statsTable" class="d-flex py-2">
            <div class="text-left ml-4 mr-0 w-50">
              <div>Numéro : </div>
              <hr class="p-0 m-0 statsHr">
              <div>Temps : </div>
              <hr class="p-0 m-0 statsHr">
              <div>Average of 5 : </div>
              <hr class="p-0 m-0 statsHr">
              <div>Average of 12 : </div>
              <hr class="p-0 m-0 statsHr">
              <div>Average of 50 : </div>
            </div>
            <div class="text-center mr-3 w-50">
              <div>n° <span id="sideStatIndex">0</span></div>
              <hr class="p-0 m-0 statsHr">
              <div><span id="sideStatSingle">-</span></div>
              <hr class="p-0 m-0 statsHr">
              <div><span id="sideStatAo5">-</span></div>
              <hr class="p-0 m-0 statsHr">
              <div><span id="sideStatAo12">-</span></div>
              <hr class="p-0 m-0 statsHr">
              <div><span id="sideStatAo50">-</span></div>
            </div>
          </div>
        </div>

        <!-- Solve history -->
        <table id="solveList" class="table text-center mb-0">
          <thead class="bg-light">
            <tr>
              <th class="solveListTitle py-1 px-2 border-bottom-0">N°</th>
              <th class="solveListTitle py-1 px-2 border-bottom-0">Time</th>
              <th class="solveListTitle py-1 px-2 border-bottom-0">Ao5</th>
              <th class="solveListTitle py-1 px-2 border-bottom-0">Ao12</th>
            </tr>
          </thead>
          <tbody id="historyTbody">
            <tr id="noSolve">
              <td colspan="4" class="border-left-0 border-right-0 border-top-0">Pas de statistique</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php // Local storage authorization modal
  include '../share/userAuthorization.php';
  // Settings modal
  require '../share/settings.php';
  // Required scripts
  require '../share/requiredScriptTags.html'; ?>
  <script src="../assets/js/timer.js"></script>
  <!-- <script src="assets/js/tools/timer/stopwatch.js"></script>
  <script src="assets/js/tools/timer/localstorage.js"></script>
  <script src="assets/js/tools/timer/averages.js"></script>
  <script src="assets/js/tools/timer/scrambler.js"></script> -->
</body>
</html>
