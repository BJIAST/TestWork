<?php
if( isset($_POST['fbName']) && isset($_POST['fbEmail']) && isset($_POST['fbMessage']) ){
    $name = $_POST['fbName']; 
    $email = $_POST['fbEmail'];
    $massage = nl2br($_POST['fbMessage']);
    $to = "bjiast.01@gmail.com , mar_95@bk.ru"; 
    $from = $email;
    $subject = 'Feedback message';
    $mailMessage = '<b>Name:</b> '.$name.' <br><b>Email:</b> '.$email.' <p>'.$massage.'</p>';
    $headers = "From: $from\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    if( mail($to, $subject, $mailMessage, $headers) ){
        echo "success";
    } else {
        echo "The server failed to send the message. Please try again later.";
    }
}
?>