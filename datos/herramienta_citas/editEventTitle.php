<?php
// Conexion a la base de datos
require_once('../conexion.php');


if (isset($_POST['title']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['ficha']) && isset($_POST['color']) && isset($_POST['id']))
{
	



	function shuffle_nums($min, $max, $count)
	{
		$nums = range($min, $max);
		shuffle($nums);
		
		$response = array();
		for($i=0;$i<$count && $i<count($nums);$i++)
		{
			array_push($response, $nums[$i]);
		}
		
		return implode($response);
	}
	
	
	

	$id = $_POST['id'];
	$title = $_POST['title'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$ficha = $_POST['ficha'];
	$color = $_POST['color'];
	$dijitos = shuffle_nums(1, 9, 3);


	$sql = "UPDATE obj_events SET  title = '$title', correo = '$correo', telefono = '$telefono', ficha = '$ficha', color = '$color', permiso = $dijitos WHERE id = $id AND title = '' AND correo = '' AND telefono = '' AND ficha = ''";

	
	$query = Conexion::conectar()->prepare( $sql );

	if ($query->execute())
	{
		

		require_once('../../datos/enviarMaiIcita.php');

	} 

}

session_start();

$_SESSION['enc'] = password_hash(10000, PASSWORD_DEFAULT);

$pe = $_SESSION['enc'];



header("Location: index.php?for=APRENDIZ&factor=$pe");
	
?>
