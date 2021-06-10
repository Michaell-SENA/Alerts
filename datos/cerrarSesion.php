<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->
<?php

	//Cierra sesiones.

    session_start();
    session_destroy();
    session_unset();

    header('Location: registro.php');

?>