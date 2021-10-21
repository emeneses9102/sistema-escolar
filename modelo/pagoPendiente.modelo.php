<?php 
require_once "conexion.php";

class ModeloPagoPendiente{
        //Mostrar cobros pendientes de alumno
        static public function mdlCobrosxAlumno($tabla,$item,$valor){
            if($item != null)
                {
                    $stmt = Conexion::conectar()->prepare("SELECT c.codigo,c.detalle,ac.montoCobrar,c.fecha_vencimiento,c.monto,ac.idAlumno_cobros,ac.estado  FROM cobros AS c 
                    INNER JOIN alumno_cobros AS ac ON c.idCobros=ac.idCobro 
                    INNER JOIN alumno al ON ac.idAlumno=al.idAlumno 
                    INNER JOIN usuario us ON al.id_usuario=us.usuario_id WHERE us.$item =:$item AND ac.estado!=2");//mostramos los "sin cancelar" y los pagos por confirmar
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
                $stmt = Conexion::conectar()->prepare("SELECT c.codigo,c.detalle,ac.fecha_pago,ac.montoCobrar,ac.tipo_pago,ac.monto_pagado,idAlumno_cobros FROM cobros AS c 
                INNER JOIN alumno_cobros AS ac ON c.idCobros=ac.idCobro 
                INNER JOIN alumno al ON ac.idAlumno=al.idAlumno 
                INNER JOIN usuario us ON al.id_usuario=us.usuario_id 
                WHERE us.$item = $valor AND ac.estado=2 
                ORDER BY ac.fecha_pago asc");
                $stmt -> execute();
                return $stmt->fetchAll();
            }
            else
            {//usamos esta consulta para listar todos los cobros
                $stmt = Conexion::conectar()->prepare("SELECT c.codigo,c.detalle,ac.fecha_pago,ac.montoCobrar,ac.tipo_pago,ac.monto_pagado FROM cobros AS c 
                INNER JOIN alumno_cobros AS ac ON c.idCobros=ac.idCobro 
                INNER JOIN alumno al ON ac.idAlumno=al.idAlumno 
                INNER JOIN usuario us ON al.id_usuario=us.usuario_id
                ORDER BY c.monto asc");
                $stmt -> execute();
                return $stmt->fetchAll();
            }
         }
         static public function mdlBuscarCobroAlumno($item,$valor,$tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM cobros AS c 
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

        static public function mdlMostrarDatosPagoPendiente($valor){

            $stmt = Conexion::conectar()->prepare("SELECT usu.nombres,usu.apellidos,usu.dni,alu.cod_matricula,gra.nombre_grado,sec.nombre_seccion,aluco.estado,cob.detalle FROM usuario AS usu
            INNER JOIN alumno AS alu ON usu.usuario_id=alu.id_usuario
            INNER JOIN alumno_cobros AS aluco ON alu.idAlumno=aluco.idAlumno
            INNER JOIN cobros AS cob ON aluco.idCobro=cob.idCobros  
            INNER JOIN matricula AS mat ON alu.idAlumno = mat.idAlumno 
            INNER JOIN seccion_grados AS secgra ON mat.idSeccion_Grados = secgra.idSeccion_Grados
            INNER JOIN grados AS gra ON secgra.idGrados = gra.idGrados 
            INNER JOIN seccion AS sec ON secgra.idSeccion = sec.idSeccion WHERE aluco.idAlumno_cobros = ? ");
            $stmt -> execute([$valor]);
            return $stmt->fetch();
        }
}
?>