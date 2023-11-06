<?php
    AUTOLOAD::AutoLoad();

    class DIFICULTAD_REPOSITORY{
        public static function FindAll(){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->query("SELECT * from DIFICULTAD");

            $idDificultad=null;

            $array=null;

            $i=0;

            $nombre="";


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $idDificultad=$tuplas->idDificultad;
                $nombre=$tuplas->nombre;
                $Categoria=new DIFICULTAD($idDificultad,$nombre);
                $array[$i]=$Categoria;
                $i++;
            }

            

            return $array;
        }
        public static function DeleteById($idDificultad){
            $conexion=CONEXION::AbreConexion();

            $resultado=$conexion->exec("DELETE from DIFICULTAD where idDificultad=$idDificultad");

        }
        public static function UpdateById($idDificultad,$objetoActualizado){
            $conexion=CONEXION::AbreConexion();
            $nombre=$objetoActualizado->getNombre();

            $resultado=$conexion->exec("UPDATE DIFICULTAD set nombre=upper('$nombre') where idDificultad='$idDificultad'");
        }

        public static function Insert($objeto){
            $conexion=CONEXION::AbreConexion();

            $nombre=$objeto->getNom();

            $resultado=$conexion->exec("INSERT INTO DIFICULTAD (nombre) values (upper('$nombre'))");
        }

        public static function FindBy($idDificultad) {
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->query("SELECT * FROM DIFICULTAD WHERE idDificultad='$idDificultad'");
        
            $Categoria = null;
        
            if ($resultado) {
                $tupla = $resultado->fetch(PDO::FETCH_OBJ);
        
                if ($tupla) {
                    $idCategoria=$tupla->idDificultad;
                    $nombre=$tupla->nombre;
                    $Categoria=new DIFICULTAD($idCategoria,$nombre);
                }
            }
        
            return $Categoria;
        }

    }
?>