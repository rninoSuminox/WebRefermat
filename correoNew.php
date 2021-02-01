<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/PHPMailerAutoload.php';

require './PHPMailerNew/src/Exception.php';
require './PHPMailerNew/src/PHPMailer.php';
require './PHPMailerNew/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
     $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'email-smtp.us-west-2.amazonaws.com';
    $mail->SMTPAuth = 'login';
    $mail->Username = "AKIAYBGTRTRLX6BEHFHT";
    $mail->Password = "BPVkh1TqOOYRV4OqLiZaPivA5k0Zo6RjZ5hKVKiO813v";    	
          
    $mail->Port = 465;
    $mail->SMTPSecure = 'tls';
    
   $mail->setFrom("infoperu@refermat.com", "REFERMAT VENTAS");
   $mail->addAddress("Refermatventasperu@gmail.com", "REFERMAT");
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'MENSAJERIA - REFERMAT';
    $mail->Body = "	<p><b>Su mensaje: </b>  <p>-----------------------------------</p>";
    $mail->AltBody = "Enviado desde Mensajería de REFERMAT";
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

    ?>










