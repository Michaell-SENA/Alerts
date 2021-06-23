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
  $mail->AddEmbeddedImage('../assets/img/logoSena.png', 'logoinen', 'logoSena.png');

  $mail->isHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Subject='Reporte de alerta temprana';
  $mail->Body='<center><div style="border: solid 3px orange ; color: #000; font-size: 10px; padding: 40px;">
  <h1>Aprendiz: </h1><h1 style="color: #000">'.$nombre.
  '</h1><br><h1>Se ha asignado un reporte de alerta temprana de parte de: </<h1><br>'.$nombre_ins.
   ' '.$apellido_ins.', El personal de Bienestar al Aprendiz se pondra en contacto con usted.<br><br><br><span>CENTRO DE DESARROLLO AGROINDUSTRIAL, TURÍSTICO Y TECNOLÓGICO DEL GUAVIARE</span>
   <div style="background-image: url("../assets/img/logo_user_register.png"); height: 300px;"></div>
  </div></center>';

  if(!$mail->send())
  {

    $result="Algo anda mal";

  }else{

    $result="Gracias".$correo_aprendiz;

  }


?>
