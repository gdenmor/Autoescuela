<?php
    class PREGUNTA{
        public $id;
        public $Categoria;
        public $Dificultad;
        public $Enunciado;
        public $rep1;
        public $rep2;
        public $rep3;
        public $correcta;
        public $url;
        public $tipo;

        public function getId(){
            return $this->id;
        }

        public function getCategoria(){
            return $this->Categoria;
        }

        public function getDificultad(){
            return $this->Dificultad;
        }

        public function getEnunciado(){
            return $this->Enunciado;
        }
        public function getr1(){
            return $this->rep1;
        }

        public function getrep2(){
            return $this->rep2;
        }

        public function getrep3(){
            return $this->rep3;
        }

        public function getcorrecta(){
            return $this->correcta;
        }

        public function getUrl(){
            return $this->url;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setCategoria($Categoria){
            $this->Categoria = $Categoria;
        }

        public function setDificultad($Dificultad){
            $this->Dificultad = $Dificultad;
        }

        public function setEnunciado($Enunciado){
            $this->Enunciado = $Enunciado;
        }

        public function setr1($rep1){
            $this->rep1 = $rep1;
        }

        public function setrep2($rep2){
            $this->rep2 = $rep2;
        }

        public function setrep3($rep3){
            $this->rep3 = $rep3;
        }

        public function setcorrecta($correcta){
            $this->correcta = $correcta;
        }

        public function setUrl($url){
            $this->url = $url;
        }

        public function setTipo($tipo){
            $this->tipo = $tipo;
        }

        public function __construct($id,$Categoria,$Dificultad,$Enunciado,$rep1,$rep2,$rep3,$correcta,$url,$tipo) {
            $this->id = $id;
            $this->Categoria = $Categoria;
            $this->Dificultad = $Dificultad;
            $this->Enunciado = $Enunciado;
            $this->rep1 = $rep1;
            $this->rep2 = $rep2;
            $this->rep3 = $rep3;
            $this->correcta = $correcta;
            $this->url = $url;
            $this->tipo = $tipo;
        }
    }








?>