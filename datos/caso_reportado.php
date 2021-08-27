<?php 

	require_once("conexion.php");

	$id = $_GET['id'];

	$nombreS = $_GET['nombre'];

	$sql_registro = "SELECT COUNT(*) AS total_registro FROM obj_casos_reportados AS t1, obj_registro_sena AS t8 WHERE t8.id_obj_registro_sena = $id AND t1.reporte_diri = t8.cargo";

    $resultado_registro = Conexion::conectar()->prepare($sql_registro);

    $resultado_registro->execute();

    $total_registro = $resultado_registro->fetch()['total_registro'];


    $total_registro;

    $por_pagina = 2;

    if (empty($_GET['pagina']))
    {
        $pagina = 1;
    }else{

        $pagina = $_GET['pagina'];

    }


    $desde = ($pagina-1) * $por_pagina;

    $total_paginas = ceil($total_registro / $por_pagina);

	$query = "SELECT t1.id_obj_casos_reportados, t1.causa_reporte_aprendiz, t1.nombre, t1.apellido, t2.nombre_doc, t1.num_doc, t1.telefono, t1.direccion, t5.nombre_nivel, t1.programa, t1.ficha, t3.nombre_jornada, t7.nombre_sede, t4.nombre_mot_reporte, t6.nombre_reporte, t1.accion, t1.documento_soporte, t1.nombre_ins, t1.apellido_ins, t1.telefono_ins, t1.correo_ins FROM obj_casos_reportados AS t1, obj_doc_sena AS t2, obj_jornada_sena AS t3, obj_mot_reporte_sena AS t4, obj_nivel_forma_sena AS t5, obj_per_reporte_sena AS t6, obj_sede_sena AS  t7, obj_registro_sena AS t8 WHERE t2.id_obj_doc_sena = t1.doc AND t5.id_obj_nivel_sena = t1.nivel AND t1.jornada = t3.id_obj_jornada_sena AND t1.sede = t7.id_obj_sede_sena AND t1.cusa_reporte = t4.id_obj_mot_reporte_sena AND t1.reporte_diri = t6.id_obj_per_reporte_sena AND t1.reporte_diri = t8.cargo AND t8.id_obj_registro_sena = $id LIMIT $desde,$por_pagina;";

        //se encarga de recoger los datos enviados des de el buscador.
        if(isset($_POST['busqueda']))
        {

            //se encarga de validar los datos enviados des de el buscador.
            if(!empty($_POST['busqueda']))
            {

               //se encarga de dividir el string para permitir que el sistema identifique por partes la info enviada.
                $busquedaa = explode(" ",$_POST['busqueda']);

                $query = "SELECT t1.id_obj_casos_reportados, t1.causa_reporte_aprendiz, t1.nombre, t1.apellido, t2.nombre_doc, t1.num_doc, t1.telefono, t1.direccion, t5.nombre_nivel, t1.programa, t1.ficha, t3.nombre_jornada, t7.nombre_sede, t4.nombre_mot_reporte, t6.nombre_reporte, t1.accion, t1.documento_soporte, t1.nombre_ins, t1.apellido_ins, t1.telefono_ins, t1.correo_ins FROM obj_casos_reportados AS t1, obj_doc_sena AS t2, obj_jornada_sena AS t3, obj_mot_reporte_sena AS t4, obj_nivel_forma_sena AS t5, obj_per_reporte_sena AS t6, obj_sede_sena AS  t7, obj_registro_sena AS t8 WHERE t2.id_obj_doc_sena = t1.doc AND t5.id_obj_nivel_sena = t1.nivel AND t1.jornada = t3.id_obj_jornada_sena AND t1.sede = t7.id_obj_sede_sena AND t1.cusa_reporte = t4.id_obj_mot_reporte_sena AND t1.reporte_diri = t6.id_obj_per_reporte_sena AND t1.reporte_diri = t8.cargo AND t8.id_obj_registro_sena = $id AND t1.num_doc LIKE '%$busquedaa[0]%'";

                for ($i=0; $i < count($busquedaa); $i++)
                { 
                    if(!empty($busquedaa[$i]))
                    {
                        $query .=" AND t1.num_doc LIKE '%$busquedaa[$i]%'";
                    }
                }

            }

        }

	$resultado = Conexion::conectar()->prepare($query);
	$resultado->execute();

	$parte1 = "
    	<table class='table table-bordered' id=''>

            <thead>
                <tr>
                    <th style='background: orange; border: 2px solid #fff'>NOMBRE APRENDIZ</th>
                    <th style='background: orange; border: 2px solid #fff'>APELLIDO APRENDIZ</th>
                    <th style='background: orange; border: 2px solid #fff'>TIPO DOC</th>
                    <th style='background: orange; border: 2px solid #fff'>DOCUMENTO</th>
                    <th style='background: orange; border: 2px solid #fff'>TELEFONO</th>
                    <th style='background: orange; border: 2px solid #fff'>DIRECCIÓN</th>
                    <th style='background: orange; border: 2px solid #fff'>NIVEL</th>
                    <th style='background: orange; border: 2px solid #fff'>PROGRAMA</th>
                    <th style='background: orange; border: 2px solid #fff'>FICHA</th>
                    <th style='background: orange; border: 2px solid #fff'>JORNADA</th>
                    <th style='background: orange; border: 2px solid #fff'>SEDE</th>
                    <th style='background: orange; border: 2px solid #fff'>CAUSA</th>
                    <th style='background: orange; border: 2px solid #fff'>CAUSA APRENDIZ</th>
                    <th style='background: orange; border: 2px solid #fff'>DIRIGIDO</th>
                    <th style='background: orange; border: 2px solid #fff'>ACCIÓN</th>
                    <th style='background: orange; border: 2px solid #fff'>SOPORTE</th>
                    <th style='background: orange; border: 2px solid #fff'>NOMBRE EMISOR</th>
                    <th style='background: orange; border: 2px solid #fff'>APELLIDO EMISOR</th>
                    <th style='background: orange; border: 2px solid #fff'>TELEFONO EMISOR</th>
                    <th style='background: orange; border: 2px solid #fff'>CORREO EMISOR</th>
                </tr>
            </thead>
            <tbody>";

            while($filas = $resultado->fetch())
            {                                            

            	$parte1 .='
            	<tr>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['nombre'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['apellido'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['nombre_doc'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['num_doc'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['telefono'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['direccion'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['nombre_nivel'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['programa'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['ficha'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['nombre_jornada'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['nombre_sede'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['nombre_mot_reporte'].'</td>
                    <td style="background: orange; border: 2px solid #fff">'.$filas['causa_reporte_aprendiz'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['nombre_reporte'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['accion'].'</td>
                	<td style="background: orange; border: 2px solid #fff"><a target="_blank" href="../doc/'.$filas['documento_soporte'].'">'.$filas['documento_soporte'].'</a></td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['nombre_ins'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['apellido_ins'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['telefono_ins'].'</td>
                	<td style="background: orange; border: 2px solid #fff">'.$filas['correo_ins'].'</td>
            	</tr>';
            }
            echo $parte1 .="
            </tbody>

        </table>";

        
?>