<?php 

	require_once("conexion.php");
	
	$vtg = $_GET['valor'];


    $sql_registro = "SELECT correo_ins FROM obj_alerta WHERE id_obj_alerta = '$vtg'";
    $resultado_registro = Conexion::conectar()->prepare($sql_registro);
    $resultado_registro->execute();
    $total_registro = $resultado_registro->fetch()['correo_ins'];

    if(isset($_POST['ENVIAR']))
    {
    
        $asunto = $_POST['asunto'];
        $contenido = $_POST['cuerpo'];
        $correo = $_POST['correo'];

        
        if(empty($asunto) || empty($contenido) || empty($correo)) 
        {
            
            echo '<div class="alert alert-danger">Error: Llena todos los campos.</div>';
            
        }else{

            require_once("enviarMaiIns.php");

            $query = "DELETE FROM obj_alerta WHERE id_obj_alerta = $vtg";
            $resultado = Conexion::conectar()->prepare($query);
            

            if ($resultado->execute())
            {
               
                header('Location: admin.php');

            }

        }

    }


require_once("../vista/enviar_reporte.php");


?>



