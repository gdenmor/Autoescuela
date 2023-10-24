<?php

    class CONEXION{
        private static $conexion=null;

        public static function AbreConexion(){
            if (CONEXION::$conexion==null){
                $conexion=new PDO("mysql:host=localhost;dbname=proyecto_autoescuela","root","Root");
            }

            return $conexion;
        }

    }




?>