<?php
$to = 'theguessthewordgame@gmail.com';
$subject = 'Hello from XAMPP!';
$message = 'This is a test';
$headers = "From: bledibllaca12@gmail.com\r\n";
if (mail($to, $subject, $message, $headers)) {
   echo "SUCCESS";
} else {
   echo "ERROR12";
}