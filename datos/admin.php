<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->

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

		echo "Contenido de preferencia del usuario";

	require_once("../vista/plantillas/parteInferior.php");


?>