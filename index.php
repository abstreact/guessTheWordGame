
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css"/>
</head>
<body>
        <div class="whole-container">
            <div class="main-container" >

                <div class="game-container" >

                    <div class="body-first">
                        <div class="wordToGuessContainer">

                            <h1 class="wordToGuessLable">GUESS THE WORD</h1>
                            <div class="letter-container">

                            </div>
                        </div>  
                        <div class = "slidecontainer">

                            <div class="scoreContainer">
                                <h1 class="scoreTxt">SCORE: </h1>
                                <h1 class="score"></h1>
                                <h1 class="plus1" hidden>+1</h1>
                                <h1 class="minus1" hidden>-1</h1>
                            </div>
                        </div>
                    </div>
                    <div class="body-second">
                        <div class="input-container">

                        </div>
                    <div> 
                        <img class="tick"src="tick.png" hidden/>
                        <img class="cross"src="cross.png" hidden/>
                    </div>
                        <p class="empty" hidden>FILL THE WORD PLEASE!</p>
                        <button href="#" class="checkButtonc checkButton">CHECK!</button>
                        <button class="generateButtonc generateWord">GENERATE</button>
                        <!--<button class="checkButton" type="button">CHECK!</button>-->
                        <!--<button class="generateWord" type="button">Generate!</button>-->
                    </div>
                </div>
                <div class="help-container">
                    <div class="points-container">
                        <div>
                            <p class="p">Num of letters:</p>
                            <p class="points"></p>
                            <button class="contact-button">Contact</button>
                            <button class="aboutus-button">About us</button>
                        </div>
                        <input type="range" min="5" max="10" value="5" class="slider" id="myRange">
                    </div>
                </div>
            </div>
            <div class="aboutus-container">
                <div class="aboutus-content">
                    <h1 class="aboutus-text">BL3D1</h1>
                    <h1 class="aboutus-text1">BL3D1</h1>
                    <h1 class="aboutus-text2">BL3D1</h1>

                    <button class="flip">Back</button>
                </div>
            </div>
            <div class="contact-container">
                <div class="contact-content">
                    <main>
                        <p>SEND EMAIL</p>
                        <form name="contact-form" class="contact-form" action="index.php" method = "post">
                            <input type="text" name="name" placeholder="Full name">
                            <input type="text" name="mail" placeholder="Your e-mail">
                            <input type="text" name="body" placeholder="Subject">
                            <textarea name="message" placeholder="Message"></textarea>
                            <button type="submit" name="submit">Submit form</button>
                        </form>
                    </main>
                    <button class="flipP">Back</button>
                </div>
            </div>
		</div>
		<?php
		//Import PHPMailer classes
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		
		require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\PHPMailer.php';
		require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\SMTP.php';
		require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\Exception.php';
		require 'C:\xampp\phpMyAdmin\vendor\autoload.php';

		$name = $_POST['name'];
		$email = $_POST['mail'];
		$subject = $_POST['subject'];
		$body = $_POST['body'];
		$emailDefault = 'theguessthewordgame@gmail.com';
	
		if (isset($_POST['submit'])){
			sendMail();
		}
		
		function sendMail(){
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
			$mail->Subject = 'Test nga guessTheWord';

			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
			$mail->Body = "Test mesazh";
			//Replace the plain text body with one created manually
			//$mail->AltBody = 'This is a plain-text message body';

			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');

			//send the message, check for errors
			if (!$mail->send()) {
				echo 'Mailer Error: '. $mail->ErrorInfo;
			} else {
				echo 'Message sent!';
				//Section 2: IMAP
				//Uncomment these to save your message in the 'Sent Mail' folder.
				#if (save_mail($mail)) {
				#    echo "Message saved!";
				#}
			}

					}
					
					
	?>
		
		
    <script src="./app.js"></script>
</body>
</html>