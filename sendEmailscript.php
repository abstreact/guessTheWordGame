<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            
            require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\PHPMailer.php';
            require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\SMTP.php';
            require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\Exception.php';
            require 'C:\xampp\phpMyAdmin\vendor\autoload.php';
            require 'C:\xampp\htdocs\guessTheWordGame\index.php';
			
			$name = $_POST["name"];
            $mail = $_POST["mail"];
			$body = $_POST["body"];
			$message = $_POST["message"];

			//Create a new PHPMailer instance
			$mail = new PHPMailer;

			//Tell PHPMailer to use SMTP
			$mail->isSMTP();

			//Enable SMTP debugging
			// SMTP::DEBUG_OFF = off (for production use)
			// SMTP::DEBUG_CLIENT = client messages
			// SMTP::DEBUG_SERVER = client and server messages
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;

			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
			// use
			//$mail->Host = gethostbyname('smtp.gmail.com');
			// if your network does not support SMTP over IPv6

			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 465;

			//Set the encryption mechanism to use - STARTTLS or SMTPS
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;

			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = 'theguessthewordgame@gmail.com';

			//Password to use for SMTP authentication
			$mail->Password = 'Samifrasheri12';

			//Set who the message is to be sent from
			$mail->setFrom('theguessthewordgame@gmail.com', 'guessTheWord feedback');

			//Set an alternative reply-to address
			//$mail->addReplyTo('test2@gmail.com', 'First Last');

			//Set who the message is to be sent to
			$mail->addAddress('theguessthewordgame@gmail.com', 'guessTheWord');

			//Set the subject line
			$mail->Subject = 'guessTheWord Test';

			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
			$mail->Body = "Test mesazh nga: .\nPermbajtja:\nBruh";
			//Replace the plain text body with one created manually
			//$mail->AltBody = 'This is a plain-text message body';
            //$message = 'U dergua me sukses';
            //echo "<script type='text/javascript'>alert('Me sukses');</script>";
			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');
            
			//send the message, check for errors
			//if (!$mail->send()) {
			//	$message = 'U dergua me sukses';
            //    echo "<script type='text/javascript'>alert('Me sukses');</script>";
            //}
            //else{
                //echo $mail.error_log;
			//}
			//header('Location:index.php');
			if($mail->send()){
				header('Location:sindex.php');
			}
            header('Location: index.php');
            