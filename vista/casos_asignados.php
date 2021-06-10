<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->
<?php 
	require_once("plantillas/parteSuperior.php");
?>
<div class="containerr">

	<div class="card-body text-center">

        <a class="btn btn-info boton-2" href="#">DESCARGAR EXCEL</a>

        <div class="table-responsive">

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
    	</div>	
	</div>		
</div>
<?php 
	require_once("plantillas/parteInferior.php");
?>