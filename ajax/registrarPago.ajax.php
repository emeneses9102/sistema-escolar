<?php

require_once "../controlador/registrarPago.controlador.php";
require_once "../modelo/registrarPago.modelo.php";

class AjaxRegistrarPago{
    public function ajaxBuscarAlumnoPago(){
        $seleccion = $this->seleccion;
        $alumnoBuscar = $this->alumnoBuscar;
        $respuesta = ControladorRegistrarPago::ctrBuscarAlumnoPago($seleccion,$alumnoBuscar);
        echo json_encode($respuesta);
    }
    public function ajaxBuscarAlumnoxID(){
        $idAlumnoBuscar = $this->idMostrar;
        $tabla="usuario";
        $campo ="usuario_id";
        $respuesta = ModeloRegistrarPago::mdlBuscarAlumnoxID($idAlumnoBuscar,$tabla,$campo);
        echo json_encode($respuesta);
    }
}

if(isset($_POST["seleccion"]))
{
    $buscar= new AjaxRegistrarPago();
    $buscar->seleccion = $_POST["seleccion"];
    $buscar->alumnoBuscar = $_POST["alumnoBuscar"];
    $buscar->ajaxBuscarAlumnoPago();
}

if(isset($_POST["idMostrarPago"]))
{
    $buscar= new AjaxRegistrarPago();
    $buscar->idMostrar = $_POST["idMostrarPago"];
    $buscar->ajaxBuscarAlumnoxID();
}