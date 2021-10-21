<?php 
require_once "conexion.php";
class ModeloApoderado{

    static public function mdlMostrarApoderado($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
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
        
        $stmt = Conexion::conectar()->prepare("SELECT apo.*, alu.*,aluco.*, cob.*, usu.*, apo2.id_apoderado AS id_apoderado2, apo2.nombres_apoderado AS nombres_apoderado2,
        apo2.apellidos_apoderado AS apellidos_apoderado2, apo2.correo_apoderado AS correo_apoderado2, apo3.id_apoderado AS id_apoderado3, apo3.nombres_apoderado AS nombres_apoderado3,
        apo3.apellidos_apoderado AS apellidos_apoderado3, apo3.correo_apoderado AS correo_apoderado3  FROM $tabla AS apo 
               INNER JOIN alumno AS alu ON apo.id_apoderado = alu.id_apoderado
                LEFT JOIN apoderado AS apo2 ON apo2.id_apoderado = alu.id_apoderado2 
                LEFT JOIN apoderado AS apo3 ON apo3.id_apoderado = alu.id_apoderado3
               INNER JOIN alumno_cobros as aluco ON alu.idAlumno=aluco.idAlumno 
               INNER JOIN cobros AS cob ON aluco.idCobro=cob.idCobros 
               INNER JOIN usuario AS usu ON alu.id_usuario=usu.usuario_id 
        WHERE $item = $valor AND aluco.estado=2");
        $stmt -> execute();
   
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>