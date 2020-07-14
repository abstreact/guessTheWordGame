<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" type="text/css" />
	
	<?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\PHPMailer.php';
            require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\SMTP.php';
            require 'C:\xampp\htdocs\guessTheWordGame\phpMailSender\PHPMailer-master\src\Exception.php';
            require 'C:\xampp\phpMyAdmin\vendor\autoload.php';
            //require 'C:\xampp\htdocs\guessTheWordGame\index.php';
            if(isset($_POST['submit'])) {
                //vlerat nga input form html
                $name = $_POST['name'];
                $email = $_POST['email'];
                $body = $_POST['body'];
                $message = $_POST['message'];

                
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->SMTPAuth = true;
                $mail->Username = 'theguessthewordgame@gmail.com';
                $mail->Password = 'Samifrasheri12';
                $mail->setFrom('theguessthewordgame@gmail.com', 'Feedback from the Game');
                $mail->addAddress('theguessthewordgame@gmail.com', 'guessTheWord');
                $mail->Subject = 'guessTheWord Test';
                $mail->Body = "Keni nje mesazh nga: $name.\nTitulli: $body\nPermbajtja: \n$message\nEmail: $email\nBruh";
                if($mail->send()){
                    header('Location:index.php');
                    echo "<script type='text/javascript'>alert('Faleminderit per feedback $name! From IN');</script>";
                }
                echo "<script type='text/javascript'>alert('Faleminderit per feedback $name!');</script>";
                //header('Location: index.php');
                
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
                        
                        <form name="contact-form" class="contact-form" action="index.php" method = "post">
                            <div class="form-content">
                            <label for="name">Emri juaj: </label>
                            <input id = "name" class = "name" type="text" name="name" placeholder="Full name">
                            <label for="email">Emaili juaj: </label>
                            <input id = "email" class = "email" type="text" name="email" placeholder="Your e-mail">
                            <label for="body">Titulli: </label>
                            <input id = "body" class = "body" type="text" name="body" placeholder="Subject">
                            <label for="message">Mesazhi: </label>
                            <textarea id = "message" class = "message" name="message" placeholder="Message"></textarea>
                            <button class = "submit" type="submit" name="submit" >Dergo email</button>
                            </div>
                        </form>
                        
                    </main>
                    <button class="flipP">Back</button>
                </div>
            </div>
		</div>
		
		
		
    <script src="./app.js"></script>
</body>
</html>