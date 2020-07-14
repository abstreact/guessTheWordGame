<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./style.css"/>
	<?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\PHPMailer.php';
            require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\SMTP.php';
            require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\Exception.php';
            require 'C:\xampp\phpMyAdmin\vendor\autoload.php';
            //require 'C:\xampp\htdocs\guessTheWordGame\index.php';
            if(isset($_POST['submit'])) {
                $name = $_POST['name'];
                $mail = $_POST['mail'];
                $body = $_POST['body'];
                $message = $_POST['message'];
                $name = $_POST["name"];
                $mail = $_POST["mail"];
                $body = $_POST["body"];
                $message = $_POST["message"];
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->SMTPAuth = true;
                $mail->Username = 'theguessthewordgame@gmail.com';
                $mail->Password = 'Samifrasheri12';
                $mail->setFrom('theguessthewordgame@gmail.com', 'guessTheWord feedback');
                $mail->addAddress('theguessthewordgame@gmail.com', 'guessTheWord');
                $mail->Subject = 'guessTheWord Test';
                $mail->Body = "Test mesazh nga: $name.\nPermbajtja: $body\n$message\nBruh";
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
                echo "<script type='text/javascript'>alert('Faleminderit per feedback $name!');</script>";
                header('Location: index.php');
                
        }
        ?>

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
                        <button class="generateButtonc generateWord">NEW WORD</button>
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
                            <input class = "name" type="text" name="name" placeholder="Full name">
                            <input type="text" name="mail" placeholder="Your e-mail">
                            <input type="text" name="body" placeholder="Subject">
                            <textarea name="message" placeholder="Message"></textarea>
                            <button type="submit" name="submit" >Submit form</button>
                        </form>
                        
                    </main>
                    <button class="flipP">Back</button>
                </div>
            </div>
		</div>
		
		
		
    <script src="./app.js"></script>
</body>
</html>