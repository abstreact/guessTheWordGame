<?php
require 'PHPMailer-master/src/PHPMailer.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'theguessthewordgame@gmail.com';
$mail->Password = 'Samifrasheri12';
$mail->setFrom('theguessthewordgame@gmail.com');
$mail->addAddress('theguessthewordgame@gmail.com');
$mail->Subject = 'Hello from PHPMailer!';
$mail->Body = 'This is a test.';
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}