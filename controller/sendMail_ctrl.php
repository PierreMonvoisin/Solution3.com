<?php
function sendMail(){
  $to = 'monvoisin.pierr@gmail.com';
  $subject = 'First mail from Solution3';
  $message = 'Mega Proot';
  $headers = 'From: solution3.contact@gmail.com';
  $sent = mail($to, $subject, $message, $headers);
  if (!$sent) {
    var_dump(error_get_last()['message']);
  }
} ?>
