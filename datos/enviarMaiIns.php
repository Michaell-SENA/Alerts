<?php

  require_once("PHPMailer/PHPMailerAutoload.php");

  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->Host='smtp.gmail.com';
  $mail->Port=587;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';
  $mail->Username='2000emina@gmail.com';
  $mail->Password='pagos1234';

  $mail->setFrom($correo);
  $mail->addAddress($correo);
  $mail->addReplyTo($correo);
  $mail->AddEmbeddedImage('../assets/img/logoSena.png', 'logoinen', 'logoSena.png');

  $mail->isHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Subject=$asunto;
  $mail->Body=$contenido;

  if(!$mail->send())
  {

    $result="Algo anda mal";

  }else{

    $result="Gracias".$correo;

  }


?>
