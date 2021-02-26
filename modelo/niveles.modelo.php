<?php
require_once "conexion.php";
class ModeloNiveles{

    static public function mdlCrearNivel($tabla,$datos){
        
        $smt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_nivel,descripcion,color) VALUES (?,?,?)");
        $respuesta = $smt->execute([$datos['nombreNivel'], $datos['descripcion'],$datos['nivel_color']]);
        
        if($respuesta == true)
        {
            return "ok";
        }
        else{
            return "error";
        }
        $respuesta->close();
        $respuesta =null;
    }

    static public function mdlMostrarNiveles($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado !=0 ORDER BY num_orden asc");
        //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
    
        $stmt -> execute();
       
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function mdlEditarNivel($tabla,$datos){
        if($datos['nombreNivel']==""){
            return "empty";
        }
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre_nivel= ? AND idNiveles != ?");
        $stmt -> execute([$datos['nombreNivel'],$datos['idNivel']]);
        $respuesta = $stmt->fetch(PDO::FETCH_OBJ);
        
        if($respuesta != null){
            return "repet";
        }else{
            $smt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_nivel = ?, descripcion = ?, color = ? WHERE idNiveles = ?");
            $respuesta2 = $smt -> execute([$datos['nombreNivel'], $datos['descripcion'], $datos['nivel_color'],$datos['idNivel']]);
            
            if($respuesta2 == true){
                return "ok";
            }else{
                return "error";
            }

        }
    }

    static public function mdlDescativarNivel($dato,$tabla){
         $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 0 WHERE idNiveles = ?");
         $respuesta2 = $stmt -> execute([$dato]);
        
         if($respuesta2 == true){
             return "ok";
         }else{
             return "error";
         }

    }

}

?>