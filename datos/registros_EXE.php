<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->
<!-- Todo este archivo es el que permite la exportación a XLS-EXCEL. -->
<?php 

	header('Content-type:application/xls');
	header('content-Disposition: attachament; filename=registros.xls');
	header('Content-Type: text/html; charset=utf-8');

	require_once("conexion.php");

	session_start();

	$nombre = $_SESSION['nombres'];

	$query = "SELECT t1.nombre, t1.apellido, t2.nombre_doc, t1.num_doc, t1.telefono, t1.direccion, t5.nombre_nivel, t1.programa, t1.ficha, t3.nombre_jornada, t7.nombre_sede, t4.nombre_mot_reporte, t6.nombre_reporte, t1.accion, t1.documento_soporte, t1.nombre_ins, t1.apellido_ins, t1.telefono_ins, t1.correo_ins FROM obj_alerta AS t1, obj_doc_sena AS t2, obj_jornada_sena AS t3, obj_mot_reporte_sena AS t4, obj_nivel_forma_sena AS t5, obj_per_reporte_sena AS t6, obj_sede_sena AS  t7 WHERE t1.responsable = '$nombre' AND t2.id_obj_doc_sena = t1.doc AND t5.id_obj_nivel_sena = t1.nivel AND t1.jornada = t3.id_obj_jornada_sena AND t1.sede = t7.id_obj_sede_sena AND t1.cusa_reporte = t4.id_obj_mot_reporte_sena AND t1.reporte_diri = t6.id_obj_per_reporte_sena;";

	$resultado = Conexion::conectar()->prepare($query);
	$resultado->execute();

?>

<meta charset="UTF-8"/>
<table class="table table-bordered" id="">

    <thead>
        <tr>
            <th>NOMBRE APRENDIZ</th>
            <th>APELLIDO APRENDIZ</th>
            <th>TIPO DOC</th>
            <th>DOCUMENTO</th>
            <th>TELEFONO</th>
            <th>DIRECCIÓN</th>
            <th>NIVEL</th>
            <th>PROGRAMA</th>
            <th>FICHA</th>
            <th>JORNADA</th>
            <th>SEDE</th>
            <th>CAUSA</th>
            <th>DIRIGIDO</th>
            <th>ACCIÓN</th>
            <th>SOPORTE</th>
            <th>NOMBRE INSTRUCTOR</th>
            <th>APELLIDO INSTRUCTOR</th>
            <th>TELEFONO INSTRUCTOR</th>
            <th>CORREO INSTRUCTOR</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($filas = $resultado->fetch())
            {                                            
        ?>
            <tr class="">
                <td><?php echo $filas['nombre']?></td>
                <td><?php echo $filas['apellido']?></td>
                <td><?php echo $filas['nombre_doc']?></td>
                <td><?php echo $filas['num_doc']?></td>
                <td><?php echo $filas['telefono']?></td>
                <td><?php echo $filas['direccion']?></td>
                <td><?php echo $filas['nombre_nivel']?></td>
                <td><?php echo $filas['programa']?></td>
                <td><?php echo $filas['ficha']?></td>
                <td><?php echo $filas['nombre_jornada']?></td>
                <td><?php echo $filas['nombre_sede']?></td>
                <td><?php echo $filas['nombre_mot_reporte']?></td>
                <td><?php echo $filas['nombre_reporte']?></td>
                <td><?php echo $filas['accion']?></td>
                <td><a target="_blank" href="../doc/<?php echo $filas['documento_soporte']?>"><?php echo $filas['documento_soporte']?></a></td>
                <td><?php echo $filas['nombre_ins']?></td>
                <td><?php echo $filas['apellido_ins']?></td>
                <td><?php echo $filas['telefono_ins']?></td>
                <td><?php echo $filas['correo_ins']?></td>
            </tr>
        <?php
            }
        ?>
    </tbody>

</table>