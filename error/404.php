<?php $error = ['code'=>404, 'message'=>'Not Found'] ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php require 'errorHeader.php'; ?>
<body class="bg-silver container-fluid">
  <div class="row text-center">
    <h1 id="mainTitle"><?= $error['code'] ?> - <?= $error['message'] ?></h1>
  </div>
  <!-- <img src="https://media.tenor.com/images/f9066b57d6ac169141389af3314b06f7/tenor.gif" alt="none found"> -->

<?php require 'errorFooter.php'; ?>
</body>
</html>
