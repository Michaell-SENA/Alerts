<?php 	

	$hoy = date("Y-m-d");
	echo $hoy;


	require_once("datos/conexion.php");

	$sql_registro = "SELECT fecha_registro FROM obj_alerta";

    $resultado_registro = Conexion::conectar()->prepare($sql_registro);

    $resultado_registro->execute();

	// $fila = $resultado_registro->fetchAll();

    // print_r($fila);

	while($filas = $resultado_registro->fetch())
	{

		$fecha = $filas['fecha_registro'];


		$datosFecha[] = array('fecha' => $fecha);

	}


	foreach ($datosFecha as  $value) 
	{


		$firstDate  = new DateTime($value['fecha']);
		$firstDateS = $value['fecha'];
		$secondDate = new DateTime($hoy);

		$intvl = $firstDate->diff($secondDate);

		// echo $intvl->y . " año, " . $intvl->m." mes y ".$intvl->d." dia"; 
		// echo "\n";
		// Total amount of days
		

		if ($intvl->days == '1') 
		{
			
			echo $intvl->days . " dias ";

			$query = "UPDATE obj_alerta
			SET estado='NARANJA'
			WHERE estado='VERDE' AND fecha_registro = '$firstDateS';";

    		$resultado = Conexion::conectar()->prepare($query);
    		$resultado->execute();

		}else{


			echo "ninguna es el limite";

		}

	    // print_r($value); /* Obtener el Array completo por cada fila devuelta de la consulta*/

	    // if( $value['fecha'] >= '2021-07-12 10:34:51' )
	    // {

	    // 	echo "bien";

	    // }else{

	    // 	echo "mal";

	    // }

	    // echo $value['fecha']; /* Obtener un campo especifico del array */

	 }


	

	// EJEMPLO DE COMPARACION DE INFORMACION, SE UTILIZARA PARA ESTABLECER Y CAMBIAR VALORES DE LA BASE DE DATOS
	// $valor1 = 12;


	// if ($valor1 == 12)
	// {
	 	
	// 	$valor2 = 15;

	// 	if ($valor1 == $valor2-3) 
	// 	{
		
	// 		echo "Correcto";

	// 	}

	// }

?>