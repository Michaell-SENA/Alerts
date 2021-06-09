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