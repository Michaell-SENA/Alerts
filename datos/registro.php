<?php

	include "conexion.php";


	if (isset($_POST['enviar'])) 
	{


	    $nombre = $_POST['reg_nombre'];
	    $tel = $_POST['reg_telefono'];
	    $correo = $_POST['reg_correo'];
	    $contrasena = $_POST['reg_contrasena'];
	    $cargo = $_POST['reporte_diri'];

		//Valida que todos los campos esten enviando información, para poder continuar.
	    //Caso contrario, entonces genera error.
		if(empty($tel) || empty($nombre) || empty($correo) || empty($contrasena) || empty($cargo)) 
	    {
	    	
	    	echo '<div class="alert alert-danger">Error: Llena todos los campos.</div>';
	    	
	    }else{


	    	//Valida que la contraseña tenga 6 o mas caracteres para poder avanzar.
	    	//Caso contrario, entonces genera error.

		    if( strlen($contrasena) < 6) 
		    {

		    	echo '<div class="alert alert-danger">Error: La contraseña debe tener almenos 6 caracteres.</div>';

		    }else{

		    	$query_email = "SELECT correo FROM obj_registro_sena WHERE correo = :correo";
				$resultado_email = Conexion::conectar()->prepare($query_email);
		    	$resultado_email->bindParam(":correo",$correo);
		    	$resultado_email->execute();


		    	$query_nombre = "SELECT nombre FROM obj_registro_sena WHERE nombre = :nombre";
				$resultado_nombre = Conexion::conectar()->prepare($query_nombre);
		    	$resultado_nombre->bindParam(":nombre",$nombre);
		    	$resultado_nombre->execute();

		    	if($resultado_email->rowCount()>0) 
		    	{
		    	
		    		echo '<div class="alert alert-danger">Error: El correo ya ha sido registrado</div>';

		    	}else{

		    		if ($resultado_nombre->rowCount()>0) 
		    		{
		    			
		    			echo '<div class="alert alert-danger">Error: El usuario ya ha sido registrado</div>';

		    		}else{


				    	$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

				    	$query = "INSERT INTO obj_registro_sena(nombre,tel,correo,contrasena, cargo)
				    	VALUES(:nombre, :telefono, :correo, :contrasena, :cargo)";

					    $resultado = Conexion::conectar()->prepare($query);

					    $resultado->bindParam(":nombre",$nombre);
					    $resultado->bindParam(":telefono",$tel);
					    $resultado->bindParam(":correo",$correo);
					    $resultado->bindParam(":contrasena",$contrasena);
					    $resultado->bindParam(":cargo",$cargo);

					    
					    if ($resultado->execute()) 
					    {
					    	
							echo '<div class="alert alert-success">Bien: Registro exitoso!!.</div>';

					    }


		    		}

		    	}
		    }


	    }

	}


	require_once("../vista/registro.php");


?>