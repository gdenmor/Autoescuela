<?php
    class TRYS{
        private $idTry;
        private $User;
        private $fecha;
        private $JSONrespuestas;
        private $Examen;

        public function __construct($idTry, $User, $fecha,$JSONrespuestas,$Examen){
            $this->idTry = $idTry;
            $this->User = $User;
            $this->fecha = $fecha;
            $this->JSONrespuestas = json_decode($JSONrespuestas);
            $this->Examen = $Examen;
        }

        public function getExamen(){
            return $this->Examen;
        }

        public function setExamen($Examen){
            $this->Examen = $Examen;
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