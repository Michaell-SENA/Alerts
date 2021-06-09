<?php 

	require_once("conexion.php");

	session_start();

    if(isset($_SESSION['nombres']))
    {



    }else{

        header('Location: inicio_sesion.php');

    }

	

	$nombre = $_SESSION['nombres'];


	require_once("../vista/plantillas/parteSuperior.php");

	require_once("../vista/plantillas/parteInferior.php");


?>