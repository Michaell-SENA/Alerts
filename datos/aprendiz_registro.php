<?php 

	require_once("conexion.php");

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

	require_once("../vista/aprendiz_registro.php");

?>