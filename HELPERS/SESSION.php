<?php
    require_once "AUTOLOAD.php";
    AutoLoad();
    class SESSION{

        public static function leer_session($clave) {
            $usuario=$_SESSION[$clave];
            return $usuario;
        }
    
        public static function Cerrar_Sesion() {
            session_destroy();
            header("Location: http://localhost/AUTOESCUELA/index.php");
        }
    
        public static function iniciaSesion($clave,$valor,$redireccion){
            SESSION::CreaSesion();
            $_SESSION[$clave]=$valor;
            header("Location: $redireccion");
        }
    
        public static function CreaSesion(){
            session_start();
        }

    }
    

    



?>