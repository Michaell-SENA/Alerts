<!-- "Somos lo que hacemos dia a dia de modo que la excelencia no es un acto, sino un hábito" - Aristóteles -->
<!-- Sistema de alertas tempranas realizado por programador @Michaell_Mendoza(@dante)  -->
<?php

    class Conexion
    {

        public static function conectar()
        {

            try
            {

                $con = new PDO("mysql:host=localhost; dbname=obj_pj_sena", "root", "toor");

                return $con;
                
            }catch(PDOException $ex)
            {

                die($ex->getMessage());

            }

        }

    }

?>