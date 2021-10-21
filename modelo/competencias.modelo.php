<?php
require_once "conexion.php";
class ModeloCompetencias{
  static public function MdlMostrarCompetencias($item,$valor,$tabla){
    if($item != null){
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = $valor");
      $stmt -> execute();
      return $stmt->fetch();
    }else{
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      $stmt -> execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
  } 

  static public function MdlRegistrarCompetencia($tabla,$datos){
      $stmt2 = Conexion :: conectar()->prepare("SELECT * FROM $tabla WHERE identificadorCompetencia = ?");
      $stmt2->execute([$datos['identificador_competencia']]);    
      if($stmt2->rowCount()>0){
        return "repetido";
      }else{
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreCompetencia,nombreCorto,identificadorCompetencia) VALUES (?,?,?)");
        $respuesta = $stmt->execute([$datos['nombre_competencia'],$datos['nombre_cortoCompetencia'],$datos['identificador_competencia']]);
      }
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

  static public function MdlEliminarCompetencia($item,$valor,$tabla){
    $stmt = Conexion :: conectar()->prepare("DELETE FROM $tabla WHERE $item = $valor");
    $respuesta = $stmt->execute();
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

  static public function mdlEditarCompetencia($tabla,$datos){
    $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET nombreCompetencia = ?, identificadorCompetencia = ?, nombreCorto = ? WHERE idCompetencia = ?");
    $respuesta = $stmt->execute([$datos['nombre_competencia'],$datos['identificador_competencia'],$datos['nombre_cortoCompetencia'],$datos['IDEditarCompetencia']]);
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
}