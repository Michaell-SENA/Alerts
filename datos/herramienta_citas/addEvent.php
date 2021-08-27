<?php

// Conexion a la base de datos
require_once('../conexion.php');

if (isset($_POST['title']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['ficha']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$ficha = $_POST['ficha'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO obj_events(title, correo, telefono, ficha, start, end, color, permiso) values ('$title', '$correo', '$telefono', '$ficha', '$start', '$end', '$color', 'PERMITIDO')";
	
	echo $sql;
	
	$query = Conexion::conectar()->prepare( $sql );
	if ($query == false) {
	 print_r(Conexion::conectar()->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
