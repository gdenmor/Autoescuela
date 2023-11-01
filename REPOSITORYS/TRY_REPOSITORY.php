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


            $usuario=null;
            $contrasena=null;
            $rol=null;


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $idIntento=$tuplas->idIntento;
                $idUser=$tuplas->id;
                $User=USER_REPOSITORY::FindBy($idUser);
                $JSONRespuestas=$tuplas->JSONRespuestas;
                $fechaRealizado=$tuplas->fecha;
                $Intento=new TRYS($idIntento,$User,$fechaRealizado,$JSONRespuestas);
                $array[$i]=$Intento;
                $i++;
            }

            

            return $array;
        }
        public static function DeleteById($id){
            $conexion=CONEXION::AbreConexion();

            $resultado=$conexion->exec("DELETE from INTENTO where id=$id");

        }
        public static function UpdateById($id,$objetoActualizado){
            $conexion=CONEXION::AbreConexion();
            $idUser=$objetoActualizado->getUser()->getId();
            $fechaRealizado=$objetoActualizado->getfecha();
            $JSONRespuestas=$objetoActualizado->getJsonFileRespuestas();

            $resultado=$conexion->exec("UPDATE INTENTO set id=upper('$idUser'), fecha='$fechaRealizado', JSONRespuestas='upper($JSONRespuestas') where idIntento'$id'");
        }

        public static function Insert($objeto){
            $conexion=CONEXION::AbreConexion();

            $idUser=$objeto->getUser()->getId();
            $fechaRealizado=$objeto->getfecha();
            $JSONRespuestas=json_encode($objeto->getJsonFileRespuestas());

            $resultado=$conexion->exec("INSERT INTO INTENTO (id, fecha, JSONRespuestas) values (upper('$idUser'),upper('$fechaRealizado'),upper('$JSONRespuestas'))");
        }

        public static function FindBy($id) {
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->query("SELECT * FROM USUARIO WHERE id='$id'");
        
            $User = null;
        
            if ($resultado) {
                $tupla = $resultado->fetch(PDO::FETCH_OBJ);
        
                if ($tupla) {
                    $idIntento=$tupla->idIntento;
                    $idUser=$tupla->id;
                    $User=USER_REPOSITORY::FindBy($idUser);
                    $JSONRespuestas=$tupla->JSONRespuestas;
                    $fechaRealizado=$tupla->fecha;
                    $Intento=new TRYS($idIntento,$User,$fechaRealizado,$JSONRespuestas);
                }
            }
        
            return $User;
        }

        public static function PreguntasdeUnExamen($id) {
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->query("SELECT * FROM INTENTO WHERE idExamen='$id'");
        
            $User = null;
            $array=null;

            $i=0;
        
            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $idIntento=$tuplas->idIntento;
                $idUser=$tuplas->id;
                $User=USER_REPOSITORY::FindBy($idUser);
                $JSONRespuestas=$tuplas->JSONRespuestas;
                $fechaRealizado=$tuplas->fecha;
                $Intento=new TRYS($idIntento,$User,$fechaRealizado,$JSONRespuestas);
                $array[$i]=$Intento;
                $i++;
            }
        
            return $array;
        }
    }
?>