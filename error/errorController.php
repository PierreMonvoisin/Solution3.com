<?php
$errorCode = http_response_code();
$acceptedErrors = [400, 401, 403, 404, 500];
if (in_array($errorCode, $acceptedErrors)){
  header('Location: /error/' .$errorCode. '.php');
} else {
  header('Location: /');
} ?>
