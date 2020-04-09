<?php require '../share/forbiddenPages.php';
function sendMail(){
  // Destination
  $to = 'monvoisin.pierre@gmail.com';
  $subject = 'First mail from Solution3';
  $message = 'sendMail_ctrl.php is functionnal';
  $headers = 'From: solution3.contact@gmail.com';
  $sent = mail($to, $subject, $message, $headers);
  if (!$sent) {
    var_dump(error_get_last()['message']);
  }
} ?>
