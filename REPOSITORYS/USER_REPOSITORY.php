<?php
    require_once "INTERFACE.php";
    require_once "ENTITYS/USER.php";
    require_once "CONEXION.php";
    class USER_REPOSITORY implements BaseDeDatos{
        public static function FindByUsuario($usuario,$contraseña){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->query("SELECT * from USUARIO where nombre= '$usuario' and contraseña= '$contraseña'");

            $id=null;

            $array=null;

            $i=0;

            $usuario=null;
            $rol=null;
            $User=null;
            $contrasenia=null;


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $usuario=$tuplas->nombre;
                $contrasenia=$tuplas->contraseña;
                $rol=$tuplas->rol;
                $User=new USER($id,$usuario,$contrasenia,$rol);
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
            $contrasena=null;
            $rol=null;


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $usuario=$tuplas->nombre;
                $contrasena=$tuplas->contraseña;
                $rol=$tuplas->rol;
                $User=new USER($id,$usuario,$contrasena,$rol);
                $array[$i]=$User;
                $i++;
            }

            

            return $array;
        }
        public static function DeleteById($id){
            $conexion=CONEXION::AbreConexion();

            $resultado=$conexion->exec("DELETE from producto where id=$id");

        }
        public static function UpdateById($id,$objetoActualizado){
            $conexion=CONEXION::AbreConexion();
            $usuario=$objetoActualizado->getUsername();
            $password=$objetoActualizado->getPassword();
            $rol=$objetoActualizado->getRol();

            $resultado=$conexion->exec("UPDATE USUARIO set nombre='$usuario', contraseña='$password', rol='$rol' where id='$id'");
        }
        public static function Insert($objeto){
            $conexion=CONEXION::AbreConexion();

            $usuario=$objeto->getUsername();
            $password=$objeto->getPassword();
            $rol=$objeto->getRol();

            $resultado=$conexion->exec("INSERT INTO USUARIO (nombre, contraseña, rol) values (upper('$usuario'),upper('$password'),upper('$rol'))");
        }

        public static function FindBy($id){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->query("SELECT * from USUARIO where id=$id");

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
                $User=new USER($id,$usuario,$contraseña,$rol);
                $i++;
            }

            

            return $User;
        }
    }




?>