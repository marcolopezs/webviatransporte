<?php
require_once("../../../panel@viat/conexion/conexion.php");

    session_start(); 
	
	// Enter your name or company name below
	$receiver_name = "Contacto";
	
	// Enter email address below for receiving the form
	// All Contact messages will be sent there
	$receiver_email = $web_correo;
	
	// Enter email subject below
	// This will be your message subject
	$msg_subject = "Contacto | Vialidad y Transporte";
	
	$sendername = strip_tags(trim($_POST["sendername"]));	
	$senderemail = strip_tags(trim($_POST["senderemail"]));
	$sendermessage = strip_tags(trim($_POST["sendermessage"]));
	
    require "PHPMailerAutoload.php";
    require "smartmessage.php";
		
    $mail = new PHPMailer();
	$mail->isSendmail();
	$mail->IsHTML(true);
	$mail->From = $senderemail;
	$mail->CharSet = "UTF-8";
	$mail->FromName = $sendername;
	$mail->Encoding = "base64";
	$mail->Timeout = 200;
	$mail->ContentType = "text/html";
	$mail->addAddress($receiver_email, $receiver_name);
	$mail->Subject = $msg_subject;	
	$mail->Body = $message;
	$mail->AltBody = "Use an HTML compatible email client";
	
	if(!$mail->Send()) {
	  echo '<div class="alert notification alert-error">El mensaje no se logró enviar</div>'; 
	} 
	else {
	  echo '<div class="alert notification alert-success">El mensaje se envió con éxito</div>';
	}	

?>