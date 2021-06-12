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
	require_once("plantillas/parteSuperior.php");
?>
<div class="containerr">

	<div class="card-body text-center">
       
        <a class="btn btn-info boton-2" href="../datos/registros_EXE.php">DESCARGAR EXCEL</a>

        <div id="" class="table-responsive">
            
            <form class="busqu" method="POST" action="registros.php?nombre=<?php echo $nombre = $_SESSION['nombres'] ?>">

                <input class="form-control obj" type="text" name="busqueda" placeholder="Introduzca el numero de documento">
                <input class="btn btn-primary col-md-6 obj-btn" type="submit" id="" value="BUSCAR">

            </form>

    	   <?php 

            require_once("../datos/registros.php"); 


           ?>

    	</div>	
	</div>		
</div>
<?php 
	require_once("plantillas/parteInferior.php");
?>