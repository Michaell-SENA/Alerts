<?php

    include 'Conexion.php'; 

        session_start();

        echo $nombre = $_POST['nombre'];
        echo $apellido = $_POST['apellido'];
        echo $doc = $_POST['doc'];
        echo $num_doc = $_POST['num_doc'];
        echo $telefono = $_POST['telefono'];
        echo $direccion = $_POST['direccion'];
        echo $nivel = $_POST['nivel'];
        echo $programa = $_POST['programa'];
        echo $ficha = $_POST['ficha'];
        echo $jornada = $_POST['jornada'];
        echo $sede = $_POST['sede'];
        echo $cusa_reporte = $_POST['cusa_reporte'];
        echo $reporte_diri = $_POST['reporte_diri'];
        echo $accion = $_POST['accion'];
        echo $nombre_ins = $_POST['nombre_ins'];
        echo $apellido_ins = $_POST['apellido_ins'];
        echo $telefono_ins = $_POST['telefono_ins'];
        echo $correo_ins = $_POST['correo_ins'];
        echo $responsable = $_SESSION['nombres'];


    if($_FILES['file']["error"]>0)
    {

        // header('Location: ../vista/agregarProductos.php');
        echo "error: no exixte archivo o archivo no seleccionado.";

    }else{

        $limite_kb = 3457.6; 

        if($_FILES['file']["size"] <= $limite_kb*1024)
        {

            $ruta = "../doc/";

            $archivo = $ruta.$_FILES['file']["name"];

            $imagenProducto = $_FILES['file']["name"];

            if(!file_exists($ruta))
            {

                mkdir($ruta);

            }

            if(!file_exists($archivo))
            {

                $resultado = @move_uploaded_file($_FILES['file']["tmp_name"], $archivo);

                if($resultado)
                {

                    // echo "archivo guardado";
                    require_once("registro_alerta_dos.php");
                    // header('Location: ../vista/agregarProductos.php');

                }else{

                    // header('Location: ../vista/agregarProductos.php');
                    echo "error"; 

                }

            }else{

                // echo "archivo existe";
                require_once("registro_alerta_dos.php");
                // header('Location: ../vista/agregarProductos.php');

            }

        }else{

            // header('Location: ../vista/agregarProductos.php'); 
           echo "Error en el archivo o excede el tamaño permitido";
        }

    }


?>