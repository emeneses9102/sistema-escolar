<?php 
class ControladorReporteCobros{
    static public function ctrCantidadTotalCobros(){
        $ActualYear = date("Y");

        $value1 = $ActualYear."-01-01";

        $value2 = $ActualYear."-01-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2);

        $articulos = array();
        $articulos[] = $respuesta['TotalCobros'];

        $bisiesto = date("L");

        if($bisiesto == 0){
            $value1 = $ActualYear."-02-01";
            $value2 = $ActualYear."-02-28";
        }else{
            $value1 = $ActualYear."-02-01";
            $value2 = $ActualYear."-02-29";
        }

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2);


        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-03-01";

        $value2 = $ActualYear."-03-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-04-01";

        $value2 = $ActualYear."-04-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-05-01";

        $value2 = $ActualYear."-05-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2);

        $articulos[] = $respuesta['TotalCobros'];

        return $articulos;

    }

    static public function ctrCantidadTotalCobrosPagados(){

        $ActualYear = date("Y");

        $value1 = $ActualYear."-01-01";

        $value2 = $ActualYear."-01-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2);

        $articulos = array();
        $articulos[] = $respuesta['TotalCobrosPagados'];

        $bisiesto = date("L");

        if($bisiesto == 0){
            $value1 = $ActualYear."-02-01";
            $value2 = $ActualYear."-02-28";
        }else{
            $value1 = $ActualYear."-02-01";
            $value2 = $ActualYear."-02-29";
        }

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2);


        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-03-01";

        $value2 = $ActualYear."-03-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-04-01";

        $value2 = $ActualYear."-04-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-05-01";

        $value2 = $ActualYear."-05-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        return $articulos;
        
    }
}
?>