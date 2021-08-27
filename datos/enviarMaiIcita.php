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
  $mail->Subject='Codigo seguridad de borrado';
  $mail->Body='<center><div style="border: solid 3px orange ; color: #000; font-size: 10px; padding: 40px;">
  <h1>Hola: </h1><h1 style="color: #000">'.$title.
  '</h1><br><h1>Se ha asignado un link de segurida para el borrado de su cita: </<h1><br><a href="http://localhost/registro_SENA/datos/herramienta_citas/eliminarcita.php?cl='.$dijitos.'&sinc='.$id.'">dale clic para borrar</a></div></center>';

  if(!$mail->send())
  {

    $result="Algo anda mal";

  }else{

    $result="Gracias".$correo;

  }


?>
