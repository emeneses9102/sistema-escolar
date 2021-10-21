<?php
require_once "conexion.php";

class ModelosubirImagen{

    static public function MdlSubirImagen($comprobante, $fecha, $tipago, $idAlumnocobros,$notas,$banco){

        $stmt = Conexion::conectar()->prepare("UPDATE alumno_cobros SET estado='3',comprobanteURL = ? , fecha_pago= ? , tipo_pago= ?, comentarios=?, banco= ?  WHERE  idAlumno_cobros= ? ");
        $respuesta = $stmt->execute([$comprobante, $fecha, $tipago,$notas,$banco, $idAlumnocobros]);

        if($respuesta == true){
                return "ok";
            }
            else{
                return "error";
            }
    }

    static public function MdlSubirImagenComprobante($comprobante, $idAlumnocobros){

        $stmt = Conexion::conectar()->prepare("UPDATE alumno_cobros SET comprobantegeneradoURL = ?, enviado = 1  WHERE  idAlumno_cobros= ? ");
        $respuesta = $stmt->execute([$comprobante, $idAlumnocobros]);

        if($respuesta == true){
                return "ok";
            }
            else{
                return "error";
            }
    }
}
?>