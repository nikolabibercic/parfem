<?php

$from = $setting->selectSettingValue(25);
$to = $setting->selectSettingValue(26);

$from = $from[0]->setting_value;
$email = $_POST['email'];
$to = $to[0]->setting_value;
$subject = 'Mejl od korisnika: '.$email;
$message = $_POST['text'];
$header = 'FROM: '.$from. "\r\n" . 'Reply-To: '.$email;

mail($to,$subject,$message,$header);

header("Location: ../views/contact.view.php?email=true");

?>