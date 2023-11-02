<?php
    AUTOLOAD::AutoLoad();

    class TEST_REPOSITORY{
        public static function FindAll(){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->query("SELECT * from EXAMEN");

            $i=0;
            $array=null;


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $idExamen=$tuplas->idExamen;
                $fechahora=$tuplas->fechahora;
                $Intentos=TRY_REPOSITORY::IntentosdeUnExamen($idExamen);
                $Preguntas=PREGUNTA_REPOSITORY::PreguntasdeUnExamen($idExamen);
                //FALTA SACAR EL ARRAY DE USUARIO
                $Examen=new TEST($idExamen,$fechahora,$Intentos,"",$Preguntas);
                $array[]=$Examen;
                $i++;
            }

            

            return $array;
        }
        public static function DeleteById($idExamen){
            $conexion=CONEXION::AbreConexion();

            $resultado=$conexion->exec("DELETE from EXAMEN where idExamen=$idExamen");

        }
        public static function UpdateById($idExamen,$objetoActualizado){
            $conexion=CONEXION::AbreConexion();
            $fechahora=$objetoActualizado->getFechahora();
            $idUser=$objetoActualizado->getUser()->getId();
            $resultado=$conexion->exec("UPDATE EXAMEN set idUser=upper('$idUser'), fechahora='$fechahora' where idExamen= '$idExamen'");
        }

        public static function Insert($objeto){
            $conexion=CONEXION::AbreConexion();

            $fechahora=$objeto->getFechahora();
            $idUser=$objeto->getUser()->getId();

            $resultado=$conexion->exec("INSERT INTO EXAMEN (idUser, fechahora) values ('$idUser','$fechahora')");
        }

        public static function FindBy($idExamen) {
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->query("SELECT * FROM EXAMEN WHERE idExamen='$idExamen'");
        
            $Examen = null;
        
            if ($resultado) {
                $tuplas = $resultado->fetch(PDO::FETCH_OBJ);
        
                if ($tuplas) {
                    $idExamen=$tuplas->idExamen;
                    $fechahora=$tuplas->fechahora;
                    $Intentos=TRY_REPOSITORY::IntentosdeUnExamen($idExamen);
                    $Preguntas=PREGUNTA_REPOSITORY::PreguntasdeUnExamen($idExamen);
                    //FALTA SACAR EL ARRAY DE USUARIO
                    $Examen=new TEST($idExamen,$fechahora,$Intentos,"",$Preguntas);
                    
                }
            }
        
            return $Examen;
        }
    }
?>