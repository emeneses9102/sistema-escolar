<?php 
require_once "conexion.php";

class ModeloReporteCobros{
    static public function mdlCantidadTotalCobros($value1,$value2,$value){
        $condicional;
        if($value == 0){
            $condicional = ";";
        }else{
            $condicional = "AND co.cob_nivel =".$value.";";
        }

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS TotalCobros FROM alumno_cobros as aluco INNER JOIN cobros AS co ON  aluco.idCobro = co.idCobros WHERE co.fecha_vencimiento BETWEEN '$value1' AND '$value2' ".$condicional);
        $stmt -> execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respuesta;

    }


    static public function mdlCantidadTotalCobrosPagados($value1,$value2,$value){
        $condicional;
        if($value == 0){
            $condicional = ";";
        }else{
            $condicional = "AND co.cob_nivel =".$value.";";
        }

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS TotalCobrosPagados FROM alumno_cobros as aluco INNER JOIN cobros AS co ON  aluco.idCobro = co.idCobros WHERE co.fecha_vencimiento BETWEEN '$value1' AND '$value2' AND aluco.estado=2 ".$condicional);
        $stmt -> execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respuesta;
    }
}
?>