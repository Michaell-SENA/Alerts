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

?>

	
	<h1 class="titulo">Bienvenido: <?php echo $nombre ?></h1>

	<h3 class="titulo">Esperamos que tenga una gran experiencia en nuestra plataforma</h3>
	

<?php 

	require_once("../vista/plantillas/parteInferior.php");

?>