<?php
    class DIFICULTAD{
        private $id;
        private $nombre;

        public function __construct($id, $nombre){
            $this->id = $id;
            $this->nombre = $nombre;
        }

        public function getId(){
            return $this->id;
        }

        public function getNom(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function __toString(){
            return "".$this->id."".$this->nombre."";
        }

        public function setID($id){
            $this->id = $id;
        }
    }

?>