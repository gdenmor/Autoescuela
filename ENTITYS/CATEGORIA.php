<?php
    class CATEGORIA{
        private $id;
        private $nombre;

        public function __construct($id, $nombre){
            $this->id = $id;
            $this->nombre = $nombre;
        }

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function __toString(){
            return "".$this->id."".$this->nombre."";
        }

        public function setid($id){
            $this->id = $id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
    }


?>