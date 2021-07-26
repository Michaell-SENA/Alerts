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

	
    //Hace lectura de los contenidos a mostrar en los SELECT.
	$nombre = $_SESSION['nombres'];

	$query = "SELECT * FROM obj_doc_sena";
    $resultado = Conexion::conectar()->prepare($query);
    $resultado->execute();


    $query1 = "SELECT * FROM obj_nivel_forma_sena";
    $resultado1 = Conexion::conectar()->prepare($query1);
    $resultado1->execute();


    $query2 = "SELECT * FROM obj_jornada_sena";
    $resultado2 = Conexion::conectar()->prepare($query2);
    $resultado2->execute();


    $query3 = "SELECT * FROM obj_sede_sena";
    $resultado3 = Conexion::conectar()->prepare($query3);
    $resultado3->execute();


	$query4 = "SELECT * FROM obj_per_reporte_sena";
    $resultado4 = Conexion::conectar()->prepare($query4);
    $resultado4->execute();

    $query5 = "SELECT * FROM obj_mot_reporte_sena LIMIT 0, 3";
    $resultado5 = Conexion::conectar()->prepare($query5);
    $resultado5->execute();

    $sql_correo = "SELECT correo AS correo FROM obj_registro_sena WHERE nombre = '$nombre'";
    $resultado_correo = Conexion::conectar()->prepare($sql_correo);
    $resultado_correo->execute();
    $total_correo = $resultado_correo->fetch()['correo'];


	require_once("../vista/alerta_temprana.php");

?>