<?php

require './PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'email-smtp.us-west-2.amazonaws.com';
$mail->Port = 25;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
//$mail->Username = "infoperu@refermat.com";
//$mail->Password = "refermat3";

$mail->Username = "AKIAYBGTRTRLX6BEHFHT";
$mail->Password = "BPVkh1TqOOYRV4OqLiZaPivA5k0Zo6RjZ5hKVKiO813v";    	
$mail->setFrom("infoperu@refermat.com", "REFERMAT VENTAS");
//$mail->setFrom("AKIAYBGTRTRLX6BEHFHT", "REFERMAT");

//$mail->Username = "refermatventasperu@gmail.com";
//$mail->Password = "refermat2020";    	

$mail->Subject = 'MENSAJERIA - REFERMAT';
//$mail->addAddress($email, "REFERMAT");
$mail->addAddress("Refermatventasperu@gmail.com", "REFERMAT");

$mail->Body = "	<p><b>Su mensaje: </b>  <p>-----------------------------------</p>";

    	$mail->AltBody = "Enviado desde Mensajería de REFERMAT";

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}






    ?>
