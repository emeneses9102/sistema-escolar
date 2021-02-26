<?php
require_once "../controlador/cobros.controlador.php";
require_once "../modelo/cobros.modelo.php";
class AjaxCobros{
    public function ajaxRegistrarCobros(){
        $respuesta = ControladorCobros::ctrRegistrarCobro();
        echo $respuesta;
    }
    public function ajaxMostrarCobros(){
        $tabla="cobros";
        $item = "";
        $valor = "";
        $respuesta = ModeloCobros::mdlMostrarcobros($item,$valor,$tabla);
        echo json_encode($respuesta);
    }
    public function ajaxMostrarCobrosID(){
        $tabla="cobros";
        $item = "idCobros";
        $valor = $this->idCobro;
        $respuesta = ModeloCobros::mdlMostrarcobros($item,$valor,$tabla);
        echo json_encode($respuesta);
    }
    public function ajaxActualizarCobros(){
        $respuesta = ControladorCobros::ctrActualizarCobro();
        //var_dump($respuesta);
        echo $respuesta;
    }
    public function ajaxEliminarCobrosID(){
        $tabla="cobros";
        $item = "idCobros";
        $valor = $this->idEliminar;
        $respuesta = ModeloCobros::mdlEliminarCobro($item,$valor,$tabla);
        //var_dump($respuesta);
        echo $respuesta;
    }

}

if(isset($_POST["cod_pago"]))
{
    $listar = new AjaxCobros();
    $listar->cod_pago = $_POST["cod_pago"];
    $listar->ajaxRegistrarCobros();
}
if(isset($_POST["mostrar"]))
{
    $listar = new AjaxCobros();
    $listar->ajaxMostrarCobros();
}
if(isset($_POST["idCobro"]))
{
    $listar = new AjaxCobros();
    $listar->idCobro = $_POST["idCobro"];
    $listar->ajaxMostrarCobrosID();
}

if(isset($_POST["id_editCobro"]))
{
    $listar = new AjaxCobros();
    $listar->id_editCobro = $_POST["id_editCobro"];
    $listar->ajaxActualizarCobros();
}
if(isset($_POST["eliminarID"]))
{
    $listar = new AjaxCobros();
    $listar->idEliminar = $_POST["eliminarID"];
    $listar->ajaxEliminarCobrosID();
}