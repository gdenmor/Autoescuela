<?php
    class USER{
        public $id;
        public $username;
        public $password;
        public $rol;
        public $validado;

        

        public function __construct($id,$username, $password,$rol,$validado){
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->rol = $rol;
            $this->validado = $validado;
        }

    

        public function getId(){
            return $this->id;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getPassword(){ 
            return $this->password;
        }

        public function setID($id){
            $this->id = $id;
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function __toString(){
            return $this->username.":".$this->password;
        }

        public function getRol(){
            return $this->rol;
        }

        public function setRol($rol){
            $this->rol = $rol;
        }
        
    }
?>