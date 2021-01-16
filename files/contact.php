<?php

$from = 'office@parfem.in.rs';
$email = $_POST['email'];
$to = 'nikolabibercic@gmail.com';
$subject = 'Mejl od korisnika: '.$email;
$message = $_POST['text'];
$header = 'FROM: '.$from. "\r\n" . 'Reply-To: '.$email;

mail($to,$subject,$message,$header);

header("Location: ../views/contact.view.php?email=true");

?>