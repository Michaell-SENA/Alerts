<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->
<?php 

	require_once("../vista/inicio_sesion.php");

	include "conexion.php";

	if (isset($_POST['enviar'])) 
	{

		$correo = $_POST['ini_correo'];
		$contrasenas = $_POST['ini_contrasena'];

		//Valida si el campo correo y contraseña no estan vacios.
		if(empty($correo) || empty($contrasenas)) 
	    {
			
	    	echo '<div class="alert alert-danger">Error: Llena todos los campos.</div>';

		}else{

			//Valida que el correo y la contraseña conincidan con la del registro.
			$query = "SELECT id_obj_registro_sena, nombre,correo,contrasena FROM obj_registro_sena WHERE correo = :correo";

		    $resultado = Conexion::conectar()->prepare($query);

		    $resultado->bindParam(":correo",$correo);

		    $resultado->execute();

		    if($resultado->rowCount()>0)
		    {

		        $filas = $resultado->fetch();
				
				session_start();

				$_SESSION['id'] = $filas['id_obj_registro_sena'];

		        $pass1 = $filas['contrasena'];

		        $_SESSION['nombres'] = $filas['nombre'];

		        //Desencriptamos la contraseña de la BD y la verificamos con la que estamos accediendo.
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