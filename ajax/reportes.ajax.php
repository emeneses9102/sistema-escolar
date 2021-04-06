<?php 
require_once "../controlador/reporte.controlador.php";
require_once "../modelo/reporte.modelo.php";

class ajaxReporteCobros{

    public function ajaxCantidadTotalCobros(){

        $valor = $this->id_nivel;

        $ActualYear = date("Y");

        $value1 = $ActualYear."-01-01";

        $value2 = $ActualYear."-01-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor);

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

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-03-01";

        $value2 = $ActualYear."-03-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-04-01";

        $value2 = $ActualYear."-04-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-05-01";

        $value2 = $ActualYear."-05-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor);

        $articulos[] = $respuesta['TotalCobros'];

        echo json_encode($articulos);
    }

    public function ajaxCantidadTotalCobrosPagados(){

        $valor = $this->id_nivel2;

        $ActualYear = date("Y");

        $value1 = $ActualYear."-01-01";

        $value2 = $ActualYear."-01-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor);

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

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor);


        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-03-01";

        $value2 = $ActualYear."-03-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-04-01";

        $value2 = $ActualYear."-04-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-05-01";

        $value2 = $ActualYear."-05-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        echo json_encode($articulos);
    }
}


if(isset($_POST["id_nivel"]))
{  
    $contador = new ajaxReporteCobros();
    $contador->id_nivel = $_POST["id_nivel"];
    $contador->ajaxCantidadTotalCobros();
}

if(isset($_POST["id_nivel2"]))
{  
    $contador = new ajaxReporteCobros();
    $contador->id_nivel2 = $_POST["id_nivel2"];
    $contador->ajaxCantidadTotalCobrosPagados();
}
?>