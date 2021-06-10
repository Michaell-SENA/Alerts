<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->
<?php 
	require_once("plantillas/parteSuperior.php");
?>

	<div class="containerr">
		
		<div class="col-md-12 fondo-data-tipo"><h4 class="data-tipo">Datos del aprendiz.</h4></div>

	<form action="../datos/registro_alerta.php" method="post" enctype="multipart/form-data">

		<div class="row unid">
			<div class="col-md-6">Nombre: <input class="input-1" type="text" name="nombre" required></div>
			<div class="col-md-6">Apellido: <input class="input-1" type="text" name="apellido" required></div>
		</div>


		<div class="row unid">
			
			<div class="col-md-6">Tipo de documento:
				<select class="input-1" name="doc" id="doc">
					<option value=''></option>
	            <?php
	                while($filas = $resultado->fetch())
	                {  
	            ?>
					<option value="<?php echo $filas['id_obj_doc_sena']?>"><?php echo $filas['nombre_doc']?></option>
	            <?php
	                }
	            ?>
	        	</select>
			</div>

			<div class="col-md-6">Numero de documento: <input class="input-1" type="number" name="num_doc" required></div>

		</div>


		<div class="row unid">
			<div class="col-md-6">Teléfono: <input class="input-1" type="number" name="telefono" required></div>
			<div class="col-md-6">Dirección de correspondencia: <input class="input-1" type="text" name="direccion" required></div>
		</div>


		<div class="row unid">
			
			<div class="col-md-6">Nivel de formacion:
				<select class="input-1" name="nivel" id="nivel">
					<option value=''></option>
	            <?php
	                while($filas = $resultado1->fetch())
	                {  
	            ?>
					<option value="<?php echo $filas['id_obj_nivel_sena']?>"><?php echo $filas['nombre_nivel']?></option>
	            <?php
	                }
	            ?>
	        	</select>
			</div>

			<div class="col-md-6">Programa de formación: <input class="input-1" type="text" name="programa" required></div>

		</div>


		<div class="row unid">
			
			<div class="col-md-6">Numero de ficha: <input class="input-1" type="number" name="ficha" required></div>

			<div class="col-md-6">Jornada:
				<select class="input-1" name="jornada" id="jornada">
					<option value=''></option>
	            <?php
	                while($filas = $resultado2->fetch())
	                {  
	            ?>
					<option value="<?php echo $filas['id_obj_jornada_sena']?>"><?php echo $filas['nombre_jornada']?></option>
	            <?php
	                }
	            ?>
	        	</select>
			</div>

		</div>


		<div class="row unid">
			
			<div class="col-md-6">Sede donde recibe formación:
				<select class="input-1" name="sede" id="sede">
					<option value=''></option>
	            <?php
	                while($filas = $resultado3->fetch())
	                {  
	            ?>
					<option value="<?php echo $filas['id_obj_sede_sena']?>"><?php echo $filas['nombre_sede']?></option>
	            <?php
	                }
	            ?>
	        	</select>
			</div>

		</div>


		<div class="col-md-12 fondo-data-tipo"><h4 class="data-tipo">Motivos del reporte.</h4></div>

		<div class="row unid">
			
			<div class="col-md-12">Causa del reporte:</div>
	        <?php
	            while($filas = $resultado5->fetch())
	          	{  
	         ?>
				<div class="col-md-4 mov-parraf"><input value="<?php echo $filas['id_obj_mot_reporte_sena'];?>" class="input-1" type="checkbox" name="cusa_reporte"><?php echo $filas['nombre_mot_reporte']?></div>
	        <?php
	            }
	        ?>

		</div>


		<div class="row unid">

			<div class="col-md-6">Reporte dirigido a:
				<select class="input-1" name="reporte_diri" id="reporte_diri">
					<option value=''></option>
	            <?php
	                while($filas = $resultado4->fetch())
	                {  
	            ?>
					<option value="<?php echo $filas['id_obj_per_reporte_sena']?>"><?php echo $filas['nombre_reporte']?></option>
	            <?php
	                }
	            ?>
	        	</select>
			</div>

			<div class="col-md-6">Acciones realizadas por parte del instructor: <input class="input-1" type="text" name="accion" required></div>

		</div>


		<div class="row unid">
			<div class="col-md-6">Documentos de soporte al reporte: <input class="input-1" type="file" name="file" required></div>
		</div>

		<div class="col-md-12 fondo-data-tipo"><h4 class="data-tipo">Datos del instructor.</h4></div>


		<div class="row unid">
			<div class="col-md-6">Nombre: <input class="input-1" type="text" name="nombre_ins" required></div>
			<div class="col-md-6">Apellido: <input class="input-1" type="text" name="apellido_ins" required></div>
		</div>

		<div class="row unid">
			<div class="col-md-6">Número de telefono: <input class="input-1" type="number" name="telefono_ins" required></div>
			<div class="col-md-6">Dirección de correo electrónico: <input class="input-1" type="text" name="correo_ins" required></div>
		</div>
		<hr>
		<div class="col-md-12">
			<button name="enviar" type="submit" class="btn btn-bt btn-primary">Guardar.</button>
		</div>
	</form>

	</div>

<?php 
	require_once("plantillas/parteInferior.php");
?>