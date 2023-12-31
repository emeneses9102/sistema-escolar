<?php
require_once "../controlador/pagoPendiente.controlador.php";
require_once "../modelo/pagoPendiente.modelo.php";
class ajaxPagoPendientes{
    public function ajaxBuscarPago(){
        $tabla="cobros";
        $item = "idAlumno_cobros";
        $valor = $this->idPago;
        $respuesta = ModeloPagoPendiente::mdlBuscarCobroAlumno($item,$valor,$tabla);
        echo json_encode($respuesta);
    
    }
    public function ajaxRealizarPago(){
        $tabla="alumno_cobros";
        $item = "idAlumno_cobros";
        $valor = $this->idPago_alumno;
        $tipo = $this->tipoPago_alumno;
        $monto = $this->montoPago_alumno;
        $respuesta = ModeloPagoPendiente::mdlRealizarPago($item,$valor,$tabla,$tipo,$monto);
        echo $respuesta;
    
    }
    public function ajaxMostrarDatosPagoPendiente(){
        $valor = $this->id_PagoAlumnoCobros;
        $respuesta = ModeloPagoPendiente::mdlMostrarDatosPagoPendiente($valor);
        echo json_encode($respuesta);
    }
}
if(isset($_POST["idAlumnoxPago"]))
{
    $listar = new ajaxPagoPendientes();
    $listar->idPago = $_POST["idAlumnoxPago"];
    $listar->ajaxBuscarPago();
}

if(isset($_POST["idPago_alumno"]))
{
    $listar = new ajaxPagoPendientes();
    $listar->idPago_alumno = $_POST["idPago_alumno"];
    $listar->tipoPago_alumno = $_POST["tipoPago_alumno"];
    $listar->montoPago_alumno = $_POST["montoPago_alumno"];
    $listar->ajaxRealizarPago();
}
if(isset($_POST["id_PagoAlumnoCobros"]))
{
    $listar = new ajaxPagoPendientes();
    $listar->id_PagoAlumnoCobros = $_POST["id_PagoAlumnoCobros"];
    $listar->ajaxMostrarDatosPagoPendiente();
}
