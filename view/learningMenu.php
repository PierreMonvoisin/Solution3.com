<?php require '../controller/logOff_ctrl.php';
// Store user infos in session storage to use them on all pages
require '../share/session.php';
require '../controller/updatePersonnalisations_ctrl.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <!-- ³ = alt + 0179 -->
  <title>Leçons - Solution³</title>
  <?php
  require '../share/requiredHeadTags.html';
  include '../share/fonts.html'; ?>
  <link rel="stylesheet" type="text/css" href="../assets/css/learningMenu.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/lessons/defaultLesson.css">
</head>
<body class="bg-gainsboro">
  <?php include '../share/header.php'; ?>
  <div id="mainMenu" class="container-fluid p-0">
    <div class="row w-100 p-0 m-0">
      <div id="leftButtons" class="col-lg col-12 p-0 m-0">
        <!--Top Left Button-->
        <button id="TopLeft" type="button" class="btn bg-blue shadow" title="Comment résoudre un rubik's cube"><img src="https://i.pinimg.com/originals/4f/37/4c/4f374c5803ccb759755066a8e887e623.png" alt="3x3 cube"></button>
        <!--Bottom Left Button-->
        <button id="BottomLeft" type="button" class="btn btn-light shadow" title="Paramètres"><img src="https://image.flaticon.com/icons/svg/1242/1242443.svg" alt="Settings"></button>
      </div>
      <div id="mainLesson" class="col-lg-10 col-12">
        <!-- Personnalisations modal error and confirmations message -->
        <?php if ($updateError != false){ ?>
          <h4 class="text-center font-weight-bold px-0 pt-2"><?= $updateErrorMessage ?></h4>
        <?php } else if ($udpateConfirmation != false){ ?>
          <h4 class="text-center font-weight-bold px-0 pt-2"><?= $udpateConfirmationMessage ?></h4>
        <?php } ?>
        <?php include 'lessons/defaultLesson.php'; ?>
      </div>
      <div id="rightButtons" class="col-lg col-12 p-0 ml-auto mr-0 my-0">
        <!--Top Right Button-->
        <button id="TopRight" type="button" class="btn bg-green shadow" title="Algorithmes et conseils"><img src="http://static1.squarespace.com/static/54f2df67e4b079e94c291e4f/t/54f700b9e4b06512fa5f4528/1425473725865/rubiks+cube+corner+permuted?format=1500w" alt="Algorithms"></button>
        <!--Bottom Right Button-->
        <button id="BottomRight" type="button" class="btn bg-yellow shadow" title="Rechercher dans les lessons"><img src="https://image.flaticon.com/icons/svg/639/639375.svg" alt="Search"></button>
      </div>
    </div>
  </div>
  <?php // Local storage authorization modal
  include '../share/userAuthorization.php';
  // Settings modal
  require '../share/settings.php';
  // Required scripts
  require '../share/requiredScriptTags.html'; ?>
  <script src="../assets/js/learningMenu.js"></script>
</body>
</html>
