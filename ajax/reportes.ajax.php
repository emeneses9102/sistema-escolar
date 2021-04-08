<?php 
require_once "../controlador/reporte.controlador.php";
require_once "../modelo/reporte.modelo.php";

class ajaxReporteCobros{

    public function ajaxCantidadTotalCobros(){

        $valor = $this->id_nivel;

        $valorr = $this->id_grado;

        $valorrr = $this->id_seccion;

        $ActualYear = date("Y");

        $value1 = $ActualYear."-01-01";

        $value2 = $ActualYear."-01-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

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

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-03-01";

        $value2 = $ActualYear."-03-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-04-01";

        $value2 = $ActualYear."-04-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-05-01";

        $value2 = $ActualYear."-05-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobros'];

        echo json_encode($articulos);
    }



    public function ajaxCantidadTotalCobrosPagados(){

        $valor = $this->id_nivel2;

        $valorr = $this->id_grado2;

        $valorrr = $this->id_seccion2;

        $ActualYear = date("Y");

        $value1 = $ActualYear."-01-01";

        $value2 = $ActualYear."-01-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

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

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);


        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-03-01";

        $value2 = $ActualYear."-03-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-04-01";

        $value2 = $ActualYear."-04-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-05-01";

        $value2 = $ActualYear."-05-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        echo json_encode($articulos);
    }
}


if(isset($_POST["id_nivel"]) && isset($_POST["id_grado"]) && isset($_POST["id_seccion"]))
{  
    $contador = new ajaxReporteCobros();
    $contador->id_nivel = $_POST["id_nivel"];
    $contador->id_grado = $_POST["id_grado"];
    $contador->id_seccion = $_POST["id_seccion"];
    $contador->ajaxCantidadTotalCobros();
}



if(isset($_POST["id_nivel2"]) && isset($_POST["id_grado2"]) && isset($_POST["id_seccion2"]))
{  
    $contador = new ajaxReporteCobros();
    $contador->id_nivel2 = $_POST["id_nivel2"];
    $contador->id_grado2 = $_POST["id_grado2"];
    $contador->id_seccion2 = $_POST["id_seccion2"];
    $contador->ajaxCantidadTotalCobrosPagados();
}
?>