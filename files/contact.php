<?php

$from = "office@parfem.in.rs";
$to = $_POST['mail'];
$subject = "Mejl od korisnika ".$_POST['mail'];
$message = $_POST['text'];
$header = "FROM: ".$from;

mail($to,$subject,$message,$header);

header("Location: ../views/contact.view.php?email=true");

?>