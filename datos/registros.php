<?php 

	require_once("conexion.php");

	session_start();

    if(isset($_SESSION['nombres']))
    {


    }else{

        header('Location: inicio_sesion.php');

    }

    $nombre = $_SESSION['nombres'];

		// $query = "SELECT * FROM obj_alerta  WHERE responsable = '$nombre'";

		$query = "SELECT t1.nombre, t1.apellido, t2.nombre_doc, t1.num_doc, t1.telefono, t1.direccion, t5.nombre_nivel, t1.programa, t1.ficha, t3.nombre_jornada, t7.nombre_sede, t4.nombre_mot_reporte, t6.nombre_reporte, t1.accion, t1.documento_soporte, t1.nombre_ins, t1.apellido_ins, t1.telefono_ins, t1.correo_ins FROM obj_alerta AS t1, obj_doc_sena AS t2, obj_jornada_sena AS t3, obj_mot_reporte_sena AS t4, obj_nivel_forma_sena AS t5, obj_per_reporte_sena AS t6, obj_sede_sena AS  t7 WHERE t1.responsable = '$nombre' AND t2.id_obj_doc_sena = t1.doc AND t5.id_obj_nivel_sena = t1.nivel AND t1.jornada = t3.id_obj_jornada_sena AND t1.sede = t7.id_obj_sede_sena AND t1.cusa_reporte = t4.id_obj_mot_reporte_sena AND t1.reporte_diri = t6.id_obj_per_reporte_sena ORDER BY fecha_registro DESC;";

		$resultado = Conexion::conectar()->prepare($query);
		$resultado->execute();


	require_once("../vista/registros.php");

?>