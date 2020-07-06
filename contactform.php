<?php

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];

    $mailTo = "lecig76107@wwmails.com";
    $headers = "From: ".$mailFrom;
    $txt = "Ti ke marr nje email prej ".$name.".\n\n".$message."\n\nGuess the word game!";

    mail($mailTo,$subject,$txt,$headers);
    header("Location: index.php?mailsend" )
}