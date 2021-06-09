<?php 

	include "plantillas/head.php";

?>

<div class="img-con">
	<img class="img" src="../assets/img/logo_user_register.png">
</div>

<div class="container">
	<form action="../datos/registro.php" method="post">

		<h5>REGISTRO</h5><br>

		<div class="col-md-12 casilla">
		  <i class="fas fa-user"></i><label for="exampleInputName1" class="form-label">Nombre</label>
		  <input name="reg_nombre" type="text" class="form-control" id="exampleInputName1">
		</div>

		<div class="col-md-12 casilla">
		  <i class="fas fa-phone-alt"></i><label for="exampleInputTelefono" class="form-label">Telefono</label>
		  <input name="reg_telefono" type="number" class="form-control" id="exampleInputTelefono">
		</div>


		<div class="col-md-12 casilla">
			<i class="fas fa-hand-pointer"></i><label for="exampleInputTelefono" class="form-label">Selecciona Cargo</label>
			<select class="col-md-12 casilla" name="reporte_diri" id="reporte_diri">
				<option value=''></option>
	           <?php

	           		$query4 = "SELECT * FROM obj_cargo";
				    $resultado4 = Conexion::conectar()->prepare($query4);
				    $resultado4->execute();

	               while($filas = $resultado4->fetch())
	               {  
	           ?>
				<option value="<?php echo $filas['id_cargo']?>"><?php echo $filas['cargo']?></option>
	           <?php
	               }
	           ?>
	        </select>
		</div>


		<div class="col-md-12 casilla">
		  <i class="fas fa-envelope"></i><label for="exampleInputEmail1" class="form-label">Correo</label>
		  <input name="reg_correo" type="email" class="form-control" id="exampleInputEmail1">
		</div>


		<div class="col-md-12 casilla">
		  <i class="fas fa-lock"></i><label for="exampleInputPasswors1" class="form-label">Contraseña</label>
		  <input name="reg_contrasena" type="password" class="form-control" id="exampleInputPasswors1">
		</div>
		<div class="col-md-12 casilla">
			<span id="passwordHelpInline" class="form-text mensaje-con">
		      La contraseña debe tener almenos 6 caracteres.
		    </span>
		</div>


		<div class="col-md-12">
			<button name="enviar" type="submit" class="btn btn-primary boton">Registrar.</button>
			<a class="btn btn-info boton" href="../datos/inicio_sesion.php">Iniciar sesión.</a>
		</div>
	</form>

</div>

<?php 

	include "plantillas/footer.php";

?>