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

    static public function mdlDetalledatosapoderado($tabla,$item,$valor){
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS apo 
        INNER JOIN alumno AS alu ON apo.id_apoderado = alu.id_apoderado 
        INNER JOIN alumno_cobros as aluco ON alu.idAlumno=aluco.idAlumno 
        INNER JOIN cobros AS cob ON aluco.idCobro=cob.idCobros 
        INNER JOIN usuario AS usu ON alu.id_usuario=usu.usuario_id 
        WHERE $item = $valor AND aluco.estado=2");
        $stmt -> execute();
   
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>