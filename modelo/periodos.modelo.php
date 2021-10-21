<?php
require_once 'conexion.php';
class ModeloPeriodos{
    static public function mdlRegistrarPeriodo($datos,$tabla){   
        $query = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombrePeriodo = ? ");
        $query->execute([$datos['nombrePeriodo']]);
        $query->fetch(PDO::FETCH_OBJ);

        //Validar el porcentaje
        $stmt = Conexion::conectar()->prepare('SELECT SUM(pesoPeriodo) As pesoTotal FROM periodos_academicos');
        $stmt-> execute();
        $pesoActual = $stmt->fetch();
        //var_dump($pesoActual);
        if($pesoActual['pesoTotal'] == 100.0){
            return 'full';
        }
        if($pesoActual['pesoTotal'] + $datos['pesoPeriodo'] > 100.0 ){
            return 'exceed';
        }

        if($query->rowCount()>0){
            return 'repet';
        }
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombrePeriodo, abreviacionPeriodo, pesoPeriodo) VALUES (?, ?, ?)");
        $respuesta = $stmt->execute([$datos['nombrePeriodo'], $datos['abreviacionPeriodo'], $datos['pesoPeriodo']]);
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

    static public function mdlEditarPeriodo($datos,$tabla){   
        $query = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombrePeriodo = ? ");
        $query->execute([$datos['nombrePeriodoEdit']]);
        $resp= $query->fetch(PDO::FETCH_OBJ);
        //var_dump($resp->nombrePeriodo);
        //Validar el porcentaje
        $stmt = Conexion::conectar()->prepare('SELECT SUM(pesoPeriodo) As pesoTotal FROM periodos_academicos');
        $stmt-> execute();
        $pesoActual = $stmt->fetch();

        if($datos['pesoPeriodo'] != $resp->pesoPeriodo){
            $pa= $pesoActual['pesoTotal'];
        
            $dif= $datos['pesoPeriodo'] - $resp->pesoPeriodo;
            
            $nuevoPeso = $pa + $dif;
            if($nuevoPeso > 100.0 ){
                return 'exceed';
            }
        }
        
        //return $resp->pesoPeriodo . '//'.$dif . '//'.$nuevoPeso;

        
        
        if($resp->nombrePeriodo != $datos['nombrePeriodoEdit'] ){
            if($query->rowCount()>0){
                return 'repet';
            }
        }
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombrePeriodo = ?, abreviacionPeriodo = ?, pesoPeriodo = ? WHERE idPeriodoAcademico = ?");
        $respuesta = $stmt->execute([$datos['nombrePeriodoEdit'], $datos['abreviacionPeriodo'], $datos['pesoPeriodo'], $datos['editPeriodoID']]);
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

    static public function mdlMostrarPeriodos($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * from $tabla");
        $stmt -> execute();
        $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
    }

    static public function mdlBuscarPeriodo($valor,$tabla){
        $query = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idPeriodoAcademico = $valor ");
        $query-> execute();
        $respuesta= $query->fetch(PDO::FETCH_OBJ);
        return $respuesta;
    }

    static public function mdlEliminarPeriodo($valor,$tabla){
        $query = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPeriodoAcademico = $valor ");
        $respuesta= $query-> execute();
        if($respuesta == true){
            return "ok";
        }else{
            return "error";
        }
    }
}