<?php
    require_once "INTERFACE.php";
    require_once "../ENTITYS/USER.php";
    require_once "../REPOSITORYS/CONEXION.php";
    class USER_REPOSITORY implements BaseDeDatos{
        public static function FindByUsuario($usuario,$contraseña){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->query("SELECT * from USUARIO where nombre= $usuario and contraseña=$contraseña");

            $id=null;

            $array=null;

            $i=0;

            $usuario=null;
            $contraseña=null;
            $rol=null;
            $User=null;


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $usuario=$tuplas->nombre;
                $contrasenia=$tuplas->contraseña;
                $rol=$tuplas->rol;
                $User=new USER($usuario,$contraseña,$rol);
                $i++;
            }

            

            return $User;
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
                $User=new USER($usuario,$contraseña,$rol);
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

            $resultado=$conexion->exec("UPDATE from USUARIO set nombre=$objetoActualizado->nombre, contraseña=$objetoActualizado->contraseña, rol=$objetoActualizado-> where id=$id");
        }
        public static function Insert($objeto){
            $conexion=CONEXION::AbreConexion();

            $usuario=$objeto->getUsername();
            $password=$objeto->getPassword();
            $rol=$objeto->getRol();

            $resultado=$conexion->exec("INSERT INTO USUARIO (nombre, contraseña, rol) values ('$usuario','$password','$rol')");
        }
    }




?>