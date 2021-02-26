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
        $respuesta = ModeloPagoPendiente::mdlRealizarPago($item,$valor,$tabla);
        echo $respuesta;
    
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
    $listar->ajaxRealizarPago();
}