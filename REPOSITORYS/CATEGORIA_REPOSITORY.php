<?php
    AUTOLOAD::AutoLoad();

    class CATEGORIA_REPOSITORY{
        public static function FindAll(){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->query("SELECT * from CATEGORIA");

            $idCategoria=null;

            $array=null;

            $i=0;

            $nombre="";


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $idCategoria=$tuplas->idCategoria;
                $nombre=$tuplas->nombre;
                $Categoria=new CATEGORIA($idCategoria,$nombre);
                $array[$i]=$Categoria;
                $i++;
            }

            

            return $array;
        }
        public static function DeleteById($idCategoria){
            $conexion=CONEXION::AbreConexion();

            $resultado=$conexion->exec("DELETE from CATEGORIA where idCategoria=$idCategoria");

        }
        public static function UpdateById($idCategoria,$objetoActualizado){
            $conexion=CONEXION::AbreConexion();
            $idCategoria=$objetoActualizado->getId();
            $nombre=$objetoActualizado->getNombre();

            $resultado=$conexion->exec("UPDATE CATEGORIA set nombre=upper('$nombre') where idCategoria='$idCategoria'");
        }

        public static function Insert($objeto){
            $conexion=CONEXION::AbreConexion();

            $nombre=$objeto->getNombre();

            $resultado=$conexion->exec("INSERT INTO CATEGORIA (nombre) values (upper('$nombre'))");
        }

        public static function FindBy($idCategoria) {
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->query("SELECT * FROM CATEGORIA WHERE id='$idCategoria'");
        
            $Categoria = null;
        
            if ($resultado) {
                $tupla = $resultado->fetch(PDO::FETCH_OBJ);
        
                if ($tupla) {
                    $idCategoria=$tupla->idCategoria;
                    $nombre=$tupla->nombre;
                    $Categoria=new CATEGORIA($idCategoria,$nombre);
                }
            }
        
            return $Categoria;
        }

    }
?>