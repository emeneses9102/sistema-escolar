<?php 
require_once "conexion.php";
class ModeloApoderado{

    static public function mdlMostrarApoderado($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM apoderado WHERE $item = :$item");
            $stmt -> bindParam(":".$item,$valor , PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt->fetch();
        }
        else
        {//usamos esta consulta para listar todos los usuarios
            $stmt = Conexion::conectar()->prepare("SELECT * FROM apoderado");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetchAll();
            
        }
    }
}
?>