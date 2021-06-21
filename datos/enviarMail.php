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

  $mail->setFrom($correo_aprendiz);
  $mail->addAddress($correo_aprendiz);
  $mail->addReplyTo($correo_aprendiz);


  $mail->isHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Subject='Reporte de alerta temprana';
  $mail->Body='<center><div style="border: solid 1px orange ; color: #000">
  <h1>Aprendiz: </h1><h1 style="color: #000">'.$nombre.
  '</h1><br><h1>Se ha asignado un reporte de alerta temprana de parte de: </<h1><br>'.$nombre_ins.
   ' '.$apellido_ins.'<br><br><br><span>CENTRO DE DESARROLLO AGROINDUSTRIAL, TURÍSTICO Y TECNOLÓGICO DEL GUAVIARE</span>
  </div></center>';

  if(!$mail->send())
  {

    $result="Algo anda mal";

  }else{

    $result="Gracias".$correo_aprendiz;

  }


?>
