<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->
<?php 

	include "plantillas/head.php";

?>

<div class="img-con">
	<img class="img" src="../assets/img/logo_user_register.png">
</div>

<div class="container">
	<form action="inicio_sesion.php" method="post">

		<h5>INICIO SESIÓN</h5><br>

		<div class="col-md-12 casilla">
		  <i class="fas fa-envelope"></i><label for="exampleInputEmail1" class="form-label">Correo</label>
		  <input name="ini_correo" type="email" class="form-control" id="exampleInputEmail1">
		</div>


		<div class="col-md-12 casilla">
		  <i class="fas fa-lock"></i><label for="exampleInputPasswors1" class="form-label">Contraseña</label>
		  <input name="ini_contrasena" type="password" class="form-control" id="exampleInputPasswors1"><br>
		</div>

		<div class="col-md-12">
			<button name="enviar" type="submit" class="btn boton fon">Iniciar sesión.</button>
			<a class="btn boton fon" href="../datos/registro.php">Registrar.</a>
		</div>

	</form>

</div>

<?php 

	include "plantillas/footer.php";

?>