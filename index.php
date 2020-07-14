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
                        <form class="contact-form"action="contactform.php" method = "post">
                            <input type="text" name="name" placeholder="Full name">
                            <input type="text" name="mail" placeholder="Your e-mail">
                            <input type="text" name="subject" placeholder="Subject">
                            <textarea name="message" placeholder="Message"></textarea>
                            <button type="submit" name="submit">Submit form</button>

                        </form>
                    </main>
                    <button class="flipP">Back</button>
                </div>
            </div>
        </div>

    <script src="./app.js"></script>
</body>
</html> 
