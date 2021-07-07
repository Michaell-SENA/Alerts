<?php 
	require_once("plantillas/parteSuperior2.php");
?>

<form action="../datos/registro_alerta.php?condicion=APRENDIZ" method="post" enctype="multipart/form-data">

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

			<div class="col-md-6">Correo: <input class="input-1" type="text" name="correo_aprendiz" required></div>

		</div>

		<div class="row unid">

			<div class="col-md-6">Motivos del reporte:<textarea name="res" class="area"></textarea></div>

			<div class="col-md-6"><button name="enviar" type="submit" class="btn btn-bt btn-primary">Enviar.</button></div>

		</div>

	</form>

<?php 
	require_once("plantillas/parteInferior.php");
?>