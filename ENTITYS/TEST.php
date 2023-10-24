<?php
    class TEST{
        private $id;
        private $fechahora;
        private $Intento=[];
        private $User=[];

        public function __construct($id, $fechahora, $Intento, $User){
            $this->id = $id;
            $this->fechahora = $fechahora;
            $this->Intento = $Intento;
            $this->User=$User;
        }

        public function getId(){
            return $this->id;
        }

        public function getFechahora(){
            return $this->fechahora;
        }

        public function getIntento(){
            return $this->Intento;
        }

        public function getUser(){
            return $this->User;
        }

        public function __toString(){
            return "".$this->id."".$this->fechahora;
        }

        public function setID($id){
            $this->id = $id;
        }

        public function setFechahora($fechahora){
            $this->fechahora = $fechahora;
        }

        public function setIntento($Intento){
            $this->Intento = $Intento;
        }

        public function setUser($User){
            $this->User = $User;
        }
    }




?>