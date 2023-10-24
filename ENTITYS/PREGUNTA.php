<?php
    class PREGUNTA{
        private $id;
        private $Categoria;
        private $Dificultad;
        private $Enunciado;
        private $rep1;
        private $rep2;
        private $rep3;
        private $correcta;
        private $url;
        private $tipo;

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
    }








?>