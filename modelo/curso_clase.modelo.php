<?php
require_once "conexion.php";
class ModeloCursoClase{
    static public function MdlAgregarCursoClase($tabla,$idCurso,$idClase){
        $stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla(idCursos,idClases) VALUES (?,?)");
        $respuesta = $stmt->execute([$idCurso,$idClase]);
        //print_r($stmt->errorInfo());
        if($respuesta == true)
            {
                return "ok";
            }
            else{
                return "error";
            }
    }
}