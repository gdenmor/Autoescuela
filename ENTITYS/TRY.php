<?php
    class TRYS{
        private $idTry;
        private $idUser;
        private $fecha;
        private $JSONrespuestas;

        public function __construct($idTry, $idUser, $fecha,$JSONrespuestas){
            $this->idTry = $idTry;
            $this->idUser = $idUser;
            $this->fecha = $fecha;
            $this->JSONrespuestas = json_decode($JSONrespuestas);
        }

        public function getIdTry(){
            return $this->idTry;
        }

        public function setIdTry($idTry){
            $this->idTry = $idTry;
        }

        public function getidUser(){
            return $this->idUser;
        }

        public function setJsonFileRespuestas($jsonRespuestas){
            $this->JSONrespuestas = json_encode($jsonRespuestas);
        }

        public function getJsonFileRespuestas(){
            return $this->JSONrespuestas;
        }
    }


?>