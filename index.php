<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <!-- ³ = alt + 0179 -->
  <title>Accueil - Solution³</title>
  <?php require 'share/requiredHeadTags.html'; ?>
  <?php include 'share/fonts.html'; ?>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body class="bg-gainsboro">
  <?php include 'share/header.php'; ?>
  <!-- Buttons -->
  <div id="mainBody" class="row m-0">
    <h1 id="mainTitle" class="col-12 mt-5 text-center">Welcome to the Jungle</h1>
    <div class="btn-group top-button-group btn-group-lg mt-5 mb-3 mx-auto col-8" role="group">
      <!-- Top Left -->
      <button id="topLeftButton" type="button" class="btn btn-success mr-3 py-5" data-toggle="tooltip" data-placement="left" title="Compte Personnel"></button>
      <!-- Top Right -->
      <button id="topRightButton" type="button" class="btn btn-primary py-5" data-toggle="tooltip" data-placement="right" title="Chronomètre"></button>
    </div>
    <div class="btn-group bottom-button-group btn-group-lg mb-3 mx-auto col-8" role="group">
      <!-- Bottom Left -->
      <button id="bottomLeftButton" type="button" class="btn btnTooLarge btn-warning text-white mr-3 py-5" data-toggle="tooltip" data-placement="left" title="Apprentissage"></button>
      <!-- Bottome Right -->
      <button id="bottomRightButton" type="button" class="btn btn-danger py-5" data-toggle="tooltip" data-placement="right" title="Multijoueurs"></button>
    </div>
  </div>
  <?php // Local storage authorization modal
  include 'share/userAuthorization.php';
  // Mandatory last script links
  require 'share/requiredScriptTags.html'; ?>
  <script src="assets/js/script.js"></script>
</body>
</html>
