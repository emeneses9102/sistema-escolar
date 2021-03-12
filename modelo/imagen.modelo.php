<?php
require_once "conexion.php";
class ModelosubirImagen{
    static public function MdlSubirImagen($item, $fecha, $tipago, $montopago, $valor,$cobros){

        $imagen = Conexion::conectar()->prepare("SELECT * FROM usuario as u 
            INNER JOIN alumno a
            ON a.id_usuario = u.usuario_id
            WHERE u.usuario_id =? ");
           
            $imagen -> execute([$valor]);
            $resultConsulta= $imagen->fetch(PDO::FETCH_OBJ);

        $stmt = Conexion::conectar()->prepare (" UPDATE alumno_cobros SET comprobanteURL = ?, fecha_pago=?, tipo_pago=?, monto_pagado=? WHERE  idAlumno = ?  AND idCobro = ?") ; 
        $respuesta = $stmt->execute([$item, $fecha, $tipago, $montopago, $resultConsulta->idAlumno, $cobros]);

        if($respuesta == true)
            {
                return "ok";
            }
            else{
                return "error";
            }
    }
}
?>