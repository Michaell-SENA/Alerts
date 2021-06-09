<?php 

	require_once("../vista/inicio_sesion.php");

	include "conexion.php";

	if (isset($_POST['enviar'])) 
	{

		$correo = $_POST['ini_correo'];
		$contrasenas = $_POST['ini_contrasena'];


		if(empty($correo) || empty($contrasenas)) 
	    {
			
	    	echo '<div class="alert alert-danger">Error: Llena todos los campos.</div>';

		}else{

			$query = "SELECT nombre,correo,contrasena FROM obj_registro_sena WHERE correo = :correo";


		    $resultado = Conexion::conectar()->prepare($query);

		    $resultado->bindParam(":correo",$correo);

		    $resultado->execute();

		    if($resultado->rowCount()>0)
		    {

		        $filas = $resultado->fetch();
				
				session_start();

		        $pass1 = $filas['contrasena'];

		        $_SESSION['nombres'] = $filas['nombre'];


		        if(password_verify($contrasenas, $pass1)) 
		        {

		            echo "<script type='text/javascript'>

			           	$('body').overhang({
	                    type: 'success',
	                    message: 'Acceso permitido',
	                    callback: function() 
	                    {

							window.location.href = 'admin.php';

						}
	                	});

	                	</script>";

		        }else{

		        	echo '<div class="alert alert-danger">Error: Contraseña o usuario incorrectos.</div>';

		        }

		    }else{

		    	echo '<div class="alert alert-danger">Error: Contraseña o usuario incorrectos.</div>';

		    }

		}
	}    

	

?>