<?php
    $to = "arif.uz.zaman1880@gmail.com";
    $subject = "Request to do your work";
    $body = "I request you to accept me to do your posted work. Please, send back a mail if you agreed.";
    $headers = "From: arif.uz.zaman1903@gmail.com\r\n";
    if (mail($to, $subject, $body, $headers)) {
        echo 'Email sent successfully!';
    } else {
        echo "Failed to send email!";
    }

?>