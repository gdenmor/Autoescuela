<?php
    class TRYS{
        private $idTry;
        private $User;
        private $fecha;
        private $JSONrespuestas;
        private $idExamen;
        private $calificacion;

        public function __construct($idTry, $User, $fecha,$JSONrespuestas,$idExamen,$calificacion){
            $this->idTry = $idTry;
            $this->User = $User;
            $this->fecha = $fecha;
            $this->JSONrespuestas = json_decode($JSONrespuestas);
            $this->idExamen = $idExamen;
            $this->calificacion = $calificacion;
        }

        public function getCalificacion(){
            return $this->calificacion;
        }


        public function setCalificacion($calificacion){
            $this->calificacion = $calificacion;
        }

        public function getIdExamen(){
            return $this->idExamen;
        }

        public function setIdExamen($idexamen){
            $this->idExamen = $idexamen;
        }
        

        public function getIdTry(){
            return $this->idTry;
        }

        public function setIdTry($idTry){
            $this->idTry = $idTry;
        }

        public function getUser(){
            return $this->User;
        }

        public function setUser($User){
            $this->User = $User;
        }

        public function setJsonFileRespuestas($jsonRespuestas){
            $this->JSONrespuestas = json_decode($jsonRespuestas);
        }

        public function getJsonFileRespuestas(){
            return $this->JSONrespuestas;
        }
        public function setfecha($fecha){
            $this->fecha = $fecha;
        }

        public function getfecha(){
            return $this->fecha;
        }
    }


?>