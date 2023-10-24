<?php
    interface BaseDeDatos{

        public static function FindByUsuario($usuario,$contraseña);
        public static function FindAll();
        public static function DeleteById($id);
        public static function UpdateById($id,$objetoActualizado);
        public static function Insert($objeto);

    }

?>