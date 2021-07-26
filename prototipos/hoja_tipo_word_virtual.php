<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->
<?php 
	require_once("../vista/plantillas/head.php");
?>

	<div class="container">

		<form action="#" method="post">

			<h1>Bienvenidos al sistema de reporte</h1>
			<div class="row ctn">
				<label>Asunto</label>
				<textarea class="cd" name="asunto"></textarea>
				<label>Contenido</label>
				<textarea class="cd" name="cuerpo" rows="10"></textarea>
				<label>Correo del intructor</label>
				<input class="cd" type="email" name="correo">

				<input class="btn btn-primary cd" type="submit" name="enviar">	

			</div>

		</form>

	</div>


<?php 
	require_once("../vista/plantillas/footer.php");
?>