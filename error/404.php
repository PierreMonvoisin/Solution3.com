<?php $error = ['code'=>404, 'message'=>'Not Found'] ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php require 'errorHeader.php'; ?>
<body class="bg-silver container-fluid d-flex">
  <div class="jumbotron py-2 m-auto">
    <div class="row text-center">
      <h1>La page que vous cherchez n'a pas été trouvé</h1>
      <h3 id="mainTitle" class="py-3"><?= $error['code'] ?> - <?= $error['message'] ?></h3>
      <div class="col-12">
        <img id="notFoundGif" class="mx-auto" src="https://i.ya-webdesign.com/images/confused-travolta-png-gif-1.gif" alt="not found gif">
      </div>
      <div class="d-flex mt-0 col-12">
        <button id="goToIndex" type="button" class="btn btn-dark btn-block font-weight-bold">Retourner à l'accueil</button>
        <button id="goToTimer" type="button" class="btn btn-light btn-block m-0 font-weight-bold">Retourner au chronomètre</button>
      </div>
    </div>
  </div>

  <?php require 'errorFooter.php'; ?>
</body>
</html>
