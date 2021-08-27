<?php 

	require_once('../conexion.php');
	
	if (isset($_GET['cl']) && isset($_GET['sinc']))
	{
			
		$resul = $_GET['cl'];
		$id = $_GET['sinc'];
				
		$sql2 = "DELETE FROM obj_events WHERE id = $id AND permiso = '$resul'";
		$query2 = Conexion::conectar()->prepare( $sql2 );
			
		$query2->execute();	
			
	}

?>