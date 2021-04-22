<?php 
require_once "../controlador/reporte.controlador.php";
require_once "../modelo/reporte.modelo.php";

class ajaxReporteCobros{

    public function ajaxCantidadTotalCobros(){

        $valor = $this->id_nivel;

        $valorr = $this->id_grado;

        $valorrr = $this->id_seccion;

        $inifec = $this->iniciofecha;

        $finfec = $this->finfecha;

$resultadosmeses[][] = array();

$valoresPrimeraFec = explode ("-", $inifec);   
$valoresSegundaFec = explode ("-", $finfec); 

$anyoFec1  = $valoresPrimeraFec[0];  
$mesFec1  = $valoresPrimeraFec[1];  

$anyoFec2  = $valoresSegundaFec[0];  
$mesFec2 = $valoresSegundaFec[1];  

if($mesFec1<10){
    $comparativo1 = $mesFec1[1];
}else{
    $comparativo1 = $mesFec1;
}

if($mesFec2<10){
    $comparativo2 = $mesFec2[1];
}else{
    $comparativo2 = $mesFec2;
}
$articulos = array();

if($comparativo1 <= $comparativo2){
$mayor=$comparativo2;
}else{
$mayor=$comparativo1;
}

if($mayor == $comparativo2){
    while ($comparativo1 <= $comparativo2) {
        $variable = $comparativo1++;
        $articulos[] = $variable;
    }

}else{
    $num = 1;
    while ($comparativo1 <= 12) {
        $variable = $comparativo1++;
        $articulos[] = $variable;
    }
    while ($num <= $comparativo2) {
        $variable = $num++;
        $articulos[] = $variable;
    }
}

$numero=-1;
foreach ($articulos as $valorArti){
    $numero++;
    if (!(empty($valorArti))){
         if($valorArti==1){
            $resultadosmeses[$numero][0] = "Enero";
         }else if($valorArti==2){
            $resultadosmeses[$numero][0] = "Febrero";
         }else if($valorArti==3){
            $resultadosmeses[$numero][0] = "Marzo";
         }else if($valorArti==4){
            $resultadosmeses[$numero][0] = "Abril";
         }
         else if($valorArti==5){
            $resultadosmeses[$numero][0] = "Mayo";
         }else if($valorArti==6){
            $resultadosmeses[$numero][0] = "Junio";
         }else if($valorArti==7){
            $resultadosmeses[$numero][0] = "Julio";
         }else if($valorArti==8){
            $resultadosmeses[$numero][0] = "Agosto";
         }else if($valorArti==9){
            $resultadosmeses[$numero][0] = "Setiembre";
         }else if($valorArti==10){
            $resultadosmeses[$numero][0] = "Octubre";
         }else if($valorArti==11){
            $resultadosmeses[$numero][0] = "Noviembre";
         }else if($valorArti==12){
            $resultadosmeses[$numero][0] = "Diciembre";
         }
     }
}
$value1 = $anyoFec2."-01-01";
$value2 = $anyoFec2."-01-31";
$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}
$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
  
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}
$texto = $anyoFec2[2].$anyoFec2[3];

if($texto%4 == 0){
    $value1 = $anyoFec2."-02-01";
    $value2 = $anyoFec2."-02-29";
}else{
    $value1 = $anyoFec2."-02-01";
    $value2 = $anyoFec2."-02-28";
}

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];
if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-03-01";
$value2 = $anyoFec2."-03-31";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];
if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
    
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-04-01";
$value2 = $anyoFec2."-04-30";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
  
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;

    }
}

$value1 = $anyoFec2."-05-01";
$value2 = $anyoFec2."-05-31";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-06-01";
$value2 = $anyoFec2."-06-30";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
     
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-07-01";
$value2 = $anyoFec2."-07-31";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-08-01";
$value2 = $anyoFec2."-08-31";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
  
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
        
    }
}
$value1 = $anyoFec2."-09-01";
$value2 = $anyoFec2."-09-30";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){

        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
       
    }
}


$value1 = $anyoFec2."-10-01";
$value2 = $anyoFec2."-10-31";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
      
    }
}

if(!($anyoFec1 == $anyoFec2)){
$value1 = $anyoFec1."-11-01";
$value2 = $anyoFec1."-11-30";
}else{
$value1 = $anyoFec2."-11-01";
$value2 = $anyoFec2."-11-30";  
}

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];
if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    
    }
}

if(!($anyoFec1 == $anyoFec2)){
$value1 = $anyoFec1."-12-01";
$value2 = $anyoFec1."-12-31";
}else{
    $value1 = $anyoFec2."-12-01";
    $value2 = $anyoFec2."-12-31";  
}

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}
$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobros($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobros'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;

    }
}
        echo json_encode($resultadosmeses);
    }



    public function ajaxCantidadTotalCobrosPagados(){

        $valor = $this->id_nivel2;

        $valorr = $this->id_grado2;

        $valorrr = $this->id_seccion2;

        $inifec = $this->iniciofecha;

        $finfec = $this->finfecha;

$resultadosmeses[][] = array();

$valoresPrimeraFec = explode ("-", $inifec);   
$valoresSegundaFec = explode ("-", $finfec); 

$anyoFec1  = $valoresPrimeraFec[0];  
$mesFec1  = $valoresPrimeraFec[1];  

$anyoFec2  = $valoresSegundaFec[0];  
$mesFec2 = $valoresSegundaFec[1];  

if($mesFec1<10){
    $comparativo1 = $mesFec1[1];
}else{
    $comparativo1 = $mesFec1;
}

if($mesFec2<10){
    $comparativo2 = $mesFec2[1];
}else{
    $comparativo2 = $mesFec2;
}
$articulos = array();

if($comparativo1 <= $comparativo2){
$mayor=$comparativo2;
}else{
$mayor=$comparativo1;
}

if($mayor == $comparativo2){
    while ($comparativo1 <= $comparativo2) {
        $variable = $comparativo1++;
        $articulos[] = $variable;
    }

}else{
    $num = 1;
    while ($comparativo1 <= 12) {
        $variable = $comparativo1++;
        $articulos[] = $variable;
    }
    while ($num <= $comparativo2) {
        $variable = $num++;
        $articulos[] = $variable;
    }
}

$numero=-1;
foreach ($articulos as $valorArti){
    $numero++;
    if (!(empty($valorArti))){
         if($valorArti==1){
            $resultadosmeses[$numero][0] = "Enero";
         }else if($valorArti==2){
            $resultadosmeses[$numero][0] = "Febrero";
         }else if($valorArti==3){
            $resultadosmeses[$numero][0] = "Marzo";
         }else if($valorArti==4){
            $resultadosmeses[$numero][0] = "Abril";
         }
         else if($valorArti==5){
            $resultadosmeses[$numero][0] = "Mayo";
         }else if($valorArti==6){
            $resultadosmeses[$numero][0] = "Junio";
         }else if($valorArti==7){
            $resultadosmeses[$numero][0] = "Julio";
         }else if($valorArti==8){
            $resultadosmeses[$numero][0] = "Agosto";
         }else if($valorArti==9){
            $resultadosmeses[$numero][0] = "Setiembre";
         }else if($valorArti==10){
            $resultadosmeses[$numero][0] = "Octubre";
         }else if($valorArti==11){
            $resultadosmeses[$numero][0] = "Noviembre";
         }else if($valorArti==12){
            $resultadosmeses[$numero][0] = "Diciembre";
         }
     }
}
$value1 = $anyoFec2."-01-01";
$value2 = $anyoFec2."-01-31";
$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}
$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$texto = $anyoFec2[2].$anyoFec2[3];
if($texto%4 == 0){
    $value1 = $anyoFec2."-02-01";
    $value2 = $anyoFec2."-02-29";
}else{
    $value1 = $anyoFec2."-02-01";
    $value2 = $anyoFec2."-02-28";
}
$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];
if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-03-01";
$value2 = $anyoFec2."-03-31";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];
if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-04-01";
$value2 = $anyoFec2."-04-30";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-05-01";
$value2 = $anyoFec2."-05-31";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-06-01";
$value2 = $anyoFec2."-06-30";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-07-01";
$value2 = $anyoFec2."-07-31";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

$value1 = $anyoFec2."-08-01";
$value2 = $anyoFec2."-08-31";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}
$value1 = $anyoFec2."-09-01";
$value2 = $anyoFec2."-09-30";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}


$value1 = $anyoFec2."-10-01";
$value2 = $anyoFec2."-10-31";

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

if(!($anyoFec1 == $anyoFec2)){
$value1 = $anyoFec1."-11-01";
$value2 = $anyoFec1."-11-30";
}else{
$value1 = $anyoFec2."-11-01";
$value2 = $anyoFec2."-11-30";  
}

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];
if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}

$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}

if(!($anyoFec1 == $anyoFec2)){
$value1 = $anyoFec1."-12-01";
$value2 = $anyoFec1."-12-31";
}else{
    $value1 = $anyoFec2."-12-01";
    $value2 = $anyoFec2."-12-31";  
}

$valorValue1 = explode ("-", $value1); 
$mesValue1  = $valorValue1[1];

if($mesValue1<10){
    $finalFec = $mesValue1[1];
}else{
    $finalFec = $mesValue1;
}
$numero2=-1;
foreach ($articulos as $valorArti){
    $numero2++;
    if( $valorArti == $finalFec ){
        $respuesta = ModeloReporteCobros::mdlCantidadTotalCobrosPagados($value1,$value2,$valor,$valorr,$valorrr);
        $resultadosmeses[$numero2][1] = $respuesta['TotalCobrosPagados'];
        $resultadosmeses[$numero2][2] = $value1;
        $resultadosmeses[$numero2][3] = $value2;
        $resultadosmeses[$numero2][4] = $valor;
        $resultadosmeses[$numero2][5] = $valorr;
        $resultadosmeses[$numero2][6] = $valorrr;
    }
}
        echo json_encode($resultadosmeses);
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

    public function ajaxNombreNivelGradoSeccion(){

        $valor = $this->id_nivel6;

        $valor1 = $this->id_grado6;

        $valor2 = $this->id_seccion6;

        $respuesta = ModeloReporteCobros::mdlNivelNom($valor,$valor1,$valor2);

        echo json_encode($respuesta);
    }

    public function ajaxMontoPagado(){

        $valor = $this->id_nivel7;

        $valor1 = $this->id_grado7;

        $valor2 = $this->id_seccion7;

        $valor3 = $this->iniciofecha7;

        $valor4 = $this->finfecha7;

        $respuesta = ModeloReporteCobros::mdlIngresoSoles($valor,$valor1,$valor2,$valor3,$valor4);

        echo $respuesta['monto_pagado'];
    }
}


if(isset($_POST["id_nivel"]) && isset($_POST["id_grado"]) && isset($_POST["id_seccion"]) && isset($_POST["iniciofecha"]) && isset($_POST["finfecha"]))
{  
    $contador = new ajaxReporteCobros();
    $contador->id_nivel = $_POST["id_nivel"];
    $contador->id_grado = $_POST["id_grado"];
    $contador->id_seccion = $_POST["id_seccion"];
    $contador->iniciofecha = $_POST["iniciofecha"];
    $contador->finfecha = $_POST["finfecha"];
    $contador->ajaxCantidadTotalCobros();
}



if(isset($_POST["id_nivel2"]) && isset($_POST["id_grado2"]) && isset($_POST["id_seccion2"]) && isset($_POST["iniciofecha"]) && isset($_POST["finfecha"]))
{  
    $contador = new ajaxReporteCobros();
    $contador->id_nivel2 = $_POST["id_nivel2"];
    $contador->id_grado2 = $_POST["id_grado2"];
    $contador->id_seccion2 = $_POST["id_seccion2"];
    $contador->iniciofecha = $_POST["iniciofecha"];
    $contador->finfecha = $_POST["finfecha"];
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


if(isset($_POST["id_nivel6"]) && isset($_POST["id_grado6"]) && isset($_POST["id_seccion6"])){
    $valores = new ajaxReporteCobros();
    $valores->id_nivel6 = $_POST["id_nivel6"];
    $valores->id_grado6 = $_POST["id_grado6"];
    $valores->id_seccion6 = $_POST["id_seccion6"];
    $valores->ajaxNombreNivelGradoSeccion();
}

if(isset($_POST["id_nivel7"]) && isset($_POST["id_grado7"]) && isset($_POST["id_seccion7"]) && isset($_POST["iniciofecha7"]) && isset($_POST["finfecha7"])){
    $valores = new ajaxReporteCobros();
    $valores->id_nivel7 = $_POST["id_nivel7"];
    $valores->id_grado7 = $_POST["id_grado7"];
    $valores->id_seccion7 = $_POST["id_seccion7"];
    $valores->iniciofecha7 = $_POST["iniciofecha7"];
    $valores->finfecha7 = $_POST["finfecha7"];
    $valores->ajaxMontoPagado();
}
?>