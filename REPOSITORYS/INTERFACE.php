<?php
    interface BaseDeDatos{

        public static function FindByID($id);
        public static function FindAll();
        public static function DeleteById($id);
        public static function UpdateById($id,$objetoActualizado);
        public static function Insert($objeto);

    }

?>