<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->
<?php

    include 'Conexion.php'; 

        if (isset($_GET['condicion']))
        {

            if ($_GET['condicion'] == 'APRENDIZ')
            {
            
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $doc = $_POST['doc'];
                $num_doc = $_POST['num_doc'];
                $telefono = $_POST['telefono'];
                $direccion = $_POST['direccion'];
                $nivel = $_POST['nivel'];
                $programa = $_POST['programa'];
                $ficha = $_POST['ficha'];
                $jornada = $_POST['jornada'];
                $sede = $_POST['sede'];
                $correo_aprendiz = "";
                $causa_reporte_aprendiz = $_POST['res'];
                $cusa_reporte = 4;
                $reporte_diri = 1;
                $accion = "";
                $nombre_ins = "";
                $apellido_ins = "";
                $correo_ins = $_POST['correo_ins'];
                $responsable = "";
                $telefono_ins = 0;
                $imagenProducto = "";
                $hoy = date("d");

                require_once("registro_alerta_dos.php");
                header("Location: registro.php");

            }else{

                echo "Error";

            }
        
        
                    
        }else{


            require_once("alerta_temprana.php");


            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $doc = $_POST['doc'];
            $num_doc = $_POST['num_doc'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $nivel = $_POST['nivel'];
            $programa = $_POST['programa'];
            $ficha = $_POST['ficha'];
            $jornada = $_POST['jornada'];
            $sede = $_POST['sede'];
            $cusa_reporte = $_POST['cusa_reporte'];
            $reporte_diri = $_POST['reporte_diri'];
            $accion = $_POST['accion'];
            $nombre_ins = $_POST['nombre_ins'];
            $apellido_ins = $_POST['apellido_ins'];
            $telefono_ins = $_POST['telefono_ins'];
            $correo_ins = $_POST['correo_ins'];
            $responsable = $_SESSION['nombres'];
            $correo_aprendiz = $_POST['correo_aprendiz'];
            $causa_reporte_aprendiz = "";
            $hoy = date("d");

            //Verificamos si se selecciono un archivo.
            if($_FILES['file']["error"]>0)
            {

                echo '<div class="alert alert-danger">Error: no existe archivo documento de soporte o archivo no seleccionado.</div>';
         

            }else{

                //Tomamos en cuenta el tamaño del archivo y estipulamos un limite de peso en KB.
                $limite_kb = 3457.6; 

                if($_FILES['file']["size"] <= $limite_kb*1024)
                {

                    //Accedemos a la ruta donde se guardara.
                    $ruta = "../doc/";

                    //A la misma ruta le damos el atributo del nombre del archivo que cargamos.
                    $archivo = $ruta.$_FILES['file']["name"];

                    //Accedemos solo al nombre del archivo para luego ser guardado en la BD. 
                    $imagenProducto = $_FILES['file']["name"];

                    //Verificamos la ruta de guardado anteriormente y si esta no existe o se borro por accidente entonces se crea con el nombre que le pasamos por la variable.
                    if(!file_exists($ruta))
                    {

                        mkdir($ruta);

                    }

                    //Se encarga de verificar que el archivo exista en la ruta y con su nombre y si ya existe lo remplaza y procede con el registro de los datos. 
                    if(!file_exists($archivo))
                    {

                        $resultado = @move_uploaded_file($_FILES['file']["tmp_name"], $archivo);

                        if($resultado)
                        {

                            require_once("registro_alerta_dos.php");
                            require_once("enviarMail.php");

                        }else{

                            echo '<div class="alert alert-danger">Error: No se guardo el archivo.</div>'; 

                        }

                    }else{

                        // echo "archivo existe";
                        require_once("registro_alerta_dos.php");
                        require_once("enviarMail.php");
                        // header('Location: ../vista/agregarProductos.php');

                    }

                }else{

                    // header('Location: ../vista/agregarProductos.php'); 
                    echo '<div class="alert alert-danger">Error en el archivo o excede el tamaño permitido.</div>';
                }

            }

        }

    

?>