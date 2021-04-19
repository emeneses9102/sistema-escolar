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

        $value1 = $ActualYear."-06-01";

        $value2 = $ActualYear."-06-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-07-01";

        $value2 = $ActualYear."-07-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-08-01";

        $value2 = $ActualYear."-08-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-09-01";

        $value2 = $ActualYear."-09-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-10-01";

        $value2 = $ActualYear."-10-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-11-01";

        $value2 = $ActualYear."-11-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobros'];

        $value1 = $ActualYear."-12-01";

        $value2 = $ActualYear."-12-31";

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

        $value1 = $ActualYear."-06-01";

        $value2 = $ActualYear."-06-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-07-01";

        $value2 = $ActualYear."-07-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-08-01";

        $value2 = $ActualYear."-08-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-09-01";

        $value2 = $ActualYear."-09-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-10-01";

        $value2 = $ActualYear."-10-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-11-01";

        $value2 = $ActualYear."-11-30";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        $value1 = $ActualYear."-12-01";

        $value2 = $ActualYear."-12-31";

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);

        $articulos[] = $respuesta['TotalCobrosPagados'];

        echo json_encode($articulos);
    }

    public function ajaxCantidadTotalCobrosgraficocircular(){

        $valor = $this->id_nivel3;

        $valor1 = $this->id_grado3;

        $valor2 = $this->id_seccion3;

        $valor3 = $this->iniciofecha;

        $valor4 = $this->finfecha;

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosgraficocircular($valor,$valor1,$valor2,$valor3,$valor4);

        echo $respuesta['TotalCobros'];

    }

    public function ajaxCantidadTotalCobrosPagadosgraficocircular(){

        $valor = $this->id_nivel4;

        $valor1 = $this->id_grado4;

        $valor2 = $this->id_seccion4;

        $valor3 = $this->iniciofecha1;

        $valor4 = $this->finfecha1;

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagadosgraficocircular($valor,$valor1,$valor2,$valor3,$valor4);

        echo $respuesta['TotalCobrosPagados'];

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

if(isset($_POST["id_nivel3"]) && isset($_POST["id_grado3"]) && isset($_POST["id_seccion3"]) && isset($_POST["iniciofecha"]) && isset($_POST["finfecha"]))
{  
    $contador = new ajaxReporteCobros();
    $contador->id_nivel3 = $_POST["id_nivel3"];
    $contador->id_grado3 = $_POST["id_grado3"];
    $contador->id_seccion3 = $_POST["id_seccion3"];
    $contador->iniciofecha = $_POST["iniciofecha"];
    $contador->finfecha = $_POST["finfecha"];
    $contador->ajaxCantidadTotalCobrosgraficocircular();
}

if(isset($_POST["id_nivel4"]) && isset($_POST["id_grado4"]) && isset($_POST["id_seccion4"]) && isset($_POST["iniciofecha1"]) && isset($_POST["finfecha1"]))
{  
    $contador = new ajaxReporteCobros();
    $contador->id_nivel4 = $_POST["id_nivel4"];
    $contador->id_grado4 = $_POST["id_grado4"];
    $contador->id_seccion4 = $_POST["id_seccion4"];
    $contador->iniciofecha1 = $_POST["iniciofecha1"];
    $contador->finfecha1 = $_POST["finfecha1"];
    $contador->ajaxCantidadTotalCobrosPagadosgraficocircular();
}

?>