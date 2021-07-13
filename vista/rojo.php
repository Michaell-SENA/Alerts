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
       
        <form class="busqu" method="POST" action="rojo.php?nombre=<?php echo $nombre = $_SESSION['nombres'] ?>">

                <input class="form-control obj" type="text" name="busqueda" placeholder="Introduzca el numero de documento">
                <input class="btn btn-primary col-md-6 obj-btn" type="submit" id="" value="BUSCAR">

        </form>

        <div id="" class="table-responsive">
            

    	   <?php 

                require_once("../datos/rojo.php"); 

           ?>
	    </div>

        <div class="footer">
            <div class="paginador">
                
                <ul>

                    <?php 

                        if ($pagina != 1) 
                        {
                        
                    ?>
                    
                        <li><a href="?nombre=<?php echo $nombreS ?>&pagina=<?php echo $pagina-1; ?>"><<</a></li>
                    <?php 

                        }

                        for ($i=1; $i <= $total_paginas; $i++) 
                        { 
                            
                            if ($i == $pagina)
                            {
                            
                                echo '<li class="pageSelected">'.$i.'</li>';

                            }else{

                                echo '<li><a href="?nombre='.$nombreS.'&pagina='.$i.'">'.$i.'</a></li>';

                            }
                            

                        }

                        if ($pagina != $total_paginas)
                        {
                            
                    ?>

                    <li><a href="?nombre=<?php echo $nombreS ?>&pagina=<?php echo $pagina+1; ?>">>></a></li>

                    <?php } ?>

                </ul>

            </div>
        </div>

    </div>  

</div>

<?php 
	require_once("plantillas/parteInferior.php");
?>