<?php
    require_once "INTERFACES.php";
    require_once "USER.php";
    class USER_REPOSITORY implements BaseDeDatos{
        public static function FindByID($id){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->query("SELECT * from USUARIO where id= $id");

            $id=null;

            $array=null;

            $i=0;

            $usuario=null;
            $contraseña=null;
            $rol=null;


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $usuario=$tuplas->nombre;
                $contrasenia=$tuplas->contraseña;
                $rol=$tuplas->rol;
                $User=new USER($id,$usuario,$contraseña,$rol);
                $array[$i]=$User;
                $i++;
            }

            

            return $array;
        }
        public static function FindAll(){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->query("SELECT * from USUARIO");

            $id=null;

            $array=null;

            $i=0;

            $usuario=null;
            $contraseña=null;
            $rol=null;


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $usuario=$tuplas->nombre;
                $contrasenia=$tuplas->contraseña;
                $rol=$tuplas->rol;
                $User=new USER($id,$usuario,$contraseña,$rol);
                $array[$i]=$User;
                $i++;
            }

            

            return $array;
        }
        public static function DeleteById($id){
            $conexion=CONEXION::AbreConexion();

            $resultado=$conexion->exec("DELETE * from producto where id=$id");

        }
        public static function UpdateById($id,$objetoActualizado){
            $conexion=CONEXION::AbreConexion();

            $resultado=$conexion->exec("UPDATE from USUARIO set nombre=$objetoActualizado->nombre, contraseña=$objetoActualizado->contraseña where id=$id");
        }
        public static function Insert($objeto){
            $conexion=CONEXION::AbreConexion();

            $resultado=$conexion->exec("INSERT INTO USUARIO values ($objeto->id,$objeto->nombre,$objeto->contraseña,$objeto->rol)");
        }
    }




?>