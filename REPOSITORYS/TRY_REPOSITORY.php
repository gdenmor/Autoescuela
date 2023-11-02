<?php
    AUTOLOAD::AutoLoad();

    class TRY_REPOSITORY{
        public static function FindAll(){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->query("SELECT * from INTENTO");

            $idIntento=null;

            $array=null;

            $i=0;

            $idUser=0;



            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $idIntento=$tuplas->idIntento;
                $idUser=$tuplas->id;
                $User=USER_REPOSITORY::FindBy($idUser);
                $JSONRespuestas=$tuplas->JSONRespuestas;
                $fechaRealizado=$tuplas->fecha;
                $idExamen=$tuplas->idExamen;
                $Examen=TEST_REPOSITORY::FindBy($idExamen);
                $Intento=new TRYS($idIntento,$User,$fechaRealizado,$JSONRespuestas,$Examen);
                $array[$i]=$Intento;
                $i++;
            }

            

            return $array;
        }
        public static function DeleteById($idIntento){
            $conexion=CONEXION::AbreConexion();

            $resultado=$conexion->exec("DELETE from INTENTO where idIntento=$idIntento");

        }
        public static function UpdateById($id,$objetoActualizado){
            $conexion=CONEXION::AbreConexion();
            $idUser=$objetoActualizado->getUser()->getId();
            $fechaRealizado=$objetoActualizado->getfecha();
            $JSONRespuestas=$objetoActualizado->getJsonFileRespuestas();
            $idExamen=$objetoActualizado->getExamen()->getId();

            $resultado=$conexion->exec("UPDATE INTENTO set id=upper('$idUser'), fecha='$fechaRealizado', JSONRespuestas='upper($JSONRespuestas'), idExamen='$idExamen' where idIntento= '$id'");
        }

        public static function Insert($objeto){
            $conexion=CONEXION::AbreConexion();

            $idUser=$objeto->getUser()->getId();
            $fechaRealizado=$objeto->getfecha();
            $JSONRespuestas=json_encode($objeto->getJsonFileRespuestas());
            $idExamen=$objeto->getExamen()->getId();

            $resultado=$conexion->exec("INSERT INTO INTENTO (id, fecha, JSONRespuestas,idExamen) values (upper('$idUser'),upper('$fechaRealizado'),upper('$JSONRespuestas'),'$idExamen')");
        }

        public static function FindBy($idIntento) {
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->query("SELECT * FROM INTENTO WHERE idIntento='$idIntento'");
        
            $User = null;
        
            if ($resultado) {
                $tupla = $resultado->fetch(PDO::FETCH_OBJ);
        
                if ($tupla) {
                    $idIntento=$tupla->idIntento;
                    $idUser=$tupla->id;
                    $User=USER_REPOSITORY::FindBy($idUser);
                    $JSONRespuestas=$tupla->JSONRespuestas;
                    $fechaRealizado=$tupla->fecha;
                    $idExamen=$tupla->idExamen;
                    $Examen=TEST_REPOSITORY::FindBy($idExamen);//QUEDA OBTENER UN EXAMEN
                    $Intento=new TRYS($idIntento,$User,$fechaRealizado,$JSONRespuestas,$Examen);
                }
            }
        
            return $User;
        }

        public static function IntentosdeUnExamen($idExamen) {
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->query("SELECT * FROM INTENTO WHERE idExamen='$idExamen'");
        
            $User = null;
            $array=null;

            $i=0;
        
            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $idIntento=$tuplas->idIntento;
                $idUser=$tuplas->id;
                $User=USER_REPOSITORY::FindBy($idUser);
                $JSONRespuestas=$tuplas->JSONRespuestas;
                $fechaRealizado=$tuplas->fecha;
                $idExamen=$tuplas->idExamen;
                $Examen=TEST_REPOSITORY::FindBy($idExamen);
                $Intento=new TRYS($idIntento,$User,$fechaRealizado,$JSONRespuestas,$Examen);
                $array[$i]=$Intento;
                $i++;
            }
        
            return $array;
        }

        public static function IntentosdeUnUsuario($idUsuario) {
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->query("SELECT * FROM INTENTO WHERE id='$idUsuario'");
        
            $User = null;
            $array=null;

            $i=0;
        
            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $idIntento=$tuplas->idIntento;
                $idUser=$tuplas->id;
                $User=USER_REPOSITORY::FindBy($idUser);
                $JSONRespuestas=$tuplas->JSONRespuestas;
                $fechaRealizado=$tuplas->fecha;
                $idExamen=$tuplas->idExamen;
                $Examen=TEST_REPOSITORY::FindBy($idExamen);
                $Intento=new TRYS($idIntento,$User,$fechaRealizado,$JSONRespuestas,$Examen);
                $array[$i]=$Intento;
                $i++;
            }
        
            return $array;
        }
    }
?>