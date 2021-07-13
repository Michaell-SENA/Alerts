<?php 	

	function semaforo()
	{

		$hoy = date("Y-m-d");

		$sql_registro_fecha = "SELECT fecha_registro FROM obj_alerta";
	    $resultado_registro_fecha = Conexion::conectar()->prepare($sql_registro_fecha);
	    $resultado_registro_fecha->execute();

		while($fila = $resultado_registro_fecha->fetch())
		{

			$fecha = $fila['fecha_registro'];
			$datosFecha[] = array('fecha' => $fecha);

		}


		foreach ($datosFecha as  $value) 
		{


			$firstDate  = new DateTime($value['fecha']);
			$firstDateS = $value['fecha'];
			$secondDate = new DateTime($hoy);
			$intvl = $firstDate->diff($secondDate);


			if ($intvl->days == 0) 
			{
				
				// echo $intvl->days . " V---- ";

				$query = "UPDATE obj_alerta
				SET estado='VERDE'
				WHERE estado='VERDE' AND fecha_registro = '$firstDateS';";

	    		$resultado = Conexion::conectar()->prepare($query);
	    		$resultado->execute();



			}else if($intvl->days == 1)
			{

				// echo $intvl->days . " N---- ";

				$query = "UPDATE obj_alerta
				SET estado='NARANJA'
				WHERE estado='VERDE' AND fecha_registro = '$firstDateS';";

	    		$resultado = Conexion::conectar()->prepare($query);
	    		$resultado->execute();

			}else if($intvl->days > 1){
			

				// echo $intvl->days . " R---- ";

				$query = "UPDATE obj_alerta
				SET estado='ROJO'
				WHERE estado='NARANJA' AND fecha_registro = '$firstDateS';";

	    		$resultado = Conexion::conectar()->prepare($query);
	    		$resultado->execute();

			}

		}

	}


?>