<?php
    class ExamenUser {
        private $Examen;
        private $Usuario;
    
        public function __construct($Examen, $Usuario) {
            $this->Examen = $Examen;
            $this->Usuario = $Usuario;
        }
    
        // Getters y setters para las propiedades
    
        public function getExamen() {
            return $this->Examen;
        }
    
        public function getUsuario() {
            return $this->Usuario;
        }
    
    }
    
?>