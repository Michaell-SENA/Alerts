<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->
<?php 

    session_start();

    if(isset($_SESSION['nombres']))
    {


    }else{

        header('Location: inicio_sesion.php');

    }

    $nombre = $_SESSION['nombres'];

?>
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
				<input class="cd" type="email" name="correo" value="<?php echo $total_registro ?>" readonly onmousedown="return false;" required>

				<div class="row col-md-12">
					<input class="btn btn-primary cd col-md-6 sep" type="submit" name="ENVIAR">
					<a class="btn btn-primary cd col-md-6 sep" href="../vista/casos_asignados.php?id=<?php echo $_SESSION['id']?>&nombre=<?php echo $_SESSION['nombres']; ?>&pagina=1">Volver</a>
				</div>

			
			</div>

		</form>

	</div>


<?php 
	require_once("../vista/plantillas/footer.php");
?>