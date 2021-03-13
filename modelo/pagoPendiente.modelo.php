<?php 
require_once "conexion.php";

class ModeloPagoPendiente{
        //Mostrar cobros pendientes de alumno
        static public function mdlCobrosxAlumno($tabla,$item,$valor){
            if($item != null)
                {
                    $stmt = Conexion::conectar()->prepare("SELECT c.codigo,c.detalle,ac.montoCobrar,c.fecha_vencimiento,c.monto,ac.idAlumno_cobros  FROM cobros AS c 
                    INNER JOIN alumno_cobros AS ac ON c.idCobros=ac.idCobro 
                    INNER JOIN alumno al ON ac.idAlumno=al.idAlumno 
                    INNER JOIN usuario us ON al.id_usuario=us.usuario_id WHERE us.$item =:$item AND ac.estado=1");
                    $stmt -> bindParam(":".$item,$valor , PDO::PARAM_INT); 
                    $stmt -> execute();
                    return $stmt->fetchAll();
                }
                else
                {//usamos esta consulta para listar todos los cobros
                    $stmt = Conexion::conectar()->prepare("SELECT c.codigo,c.detalle,ac.montoCobrar,c.fecha_vencimiento,c.monto,ac.idAlumno_cobros FROM cobros AS c 
                    INNER JOIN alumno_cobros AS ac ON c.idCobros=ac.idCobro 
                    INNER JOIN alumno al ON ac.idAlumno=al.idAlumno 
                    INNER JOIN usuario us ON al.id_usuario=us.usuario_id
                    ORDER BY c.monto asc");
                    $stmt -> execute();
                    return $stmt->fetchAll();
                }
        }

         //Mostrar cobros realizados de alumno
         static public function mdlCobrosRxAlumno($tabla,$item,$valor){
             if($item != null)
            {
                $stmt = Conexion::conectar()->prepare("SELECT c.codigo,c.detalle,ac.montoCobrar,c.fecha_vencimiento,c.monto   FROM cobros AS c 
                INNER JOIN alumno_cobros AS ac ON c.idCobros=ac.idCobro 
                INNER JOIN alumno al ON ac.idAlumno=al.idAlumno 
                INNER JOIN usuario us ON al.id_usuario=us.usuario_id WHERE us.$item =:$item AND ac.estado=2");
                $stmt -> bindParam(":".$item,$valor , PDO::PARAM_INT); 
                $stmt -> execute();
                return $stmt->fetchAll();
            }
            else
            {//usamos esta consulta para listar todos los cobros
                $stmt = Conexion::conectar()->prepare("SELECT c.codigo,c.detalle,ac.montoCobrar,c.fecha_vencimiento FROM cobros AS c 
                INNER JOIN alumno_cobros AS ac ON c.idCobros=ac.idCobro 
                INNER JOIN alumno al ON ac.idAlumno=al.idAlumno 
                INNER JOIN usuario us ON al.id_usuario=us.usuario_id
                ORDER BY c.monto asc");
                $stmt -> execute();
                return $stmt->fetchAll();
            }
         }
         static public function mdlBuscarCobroAlumno($item,$valor,$tabla){
            $stmt = Conexion::conectar()->prepare("SELECT *  FROM cobros AS c 
            INNER JOIN alumno_cobros AS ac ON c.idCobros=ac.idCobro 
            INNER JOIN alumno al ON ac.idAlumno=al.idAlumno 
            INNER JOIN usuario us ON al.id_usuario=us.usuario_id WHERE ac.$item = $valor");

            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetch();   
         }

         static public function mdlRealizarPago($item,$valor,$tabla,$tipo,$monto){
            date_default_timezone_set('America/Lima');
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 2, tipo_pago =?, monto_pagado = ?,fecha_pago =? WHERE $item = $valor ");
            $respuesta = $stmt ->execute([$tipo,$monto,date("Y/m/d")]);
            //print_r($stmt->errorInfo());
            if($respuesta == true){
                return "ok";
            }else{
                return "error";
            }
        }
}
?>