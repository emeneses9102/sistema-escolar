<?php

require_once "../controlador/periodos.controlador.php";
require_once "../modelo/periodos.modelo.php";

class AjaxPeriodos{
    public function ajaxRegistrarPeriodo(){
        $datos = array("nombrePeriodo" => $this->nombrePeriodo,
                        "abreviacionPeriodo" => $this->abreviacionPeriodo,
                        "pesoPeriodo" => $this->pesoPeriodo
                        );
        $tabla = 'periodos_academicos';
        $respuesta = ModeloPeriodos::mdlRegistrarPeriodo($datos,$tabla);
        echo $respuesta;  
    }

    public function ajaxEditarPeriodo(){
        $datos = array("nombrePeriodoEdit" => $this->nombrePeriodoEdit,
                        "abreviacionPeriodo" => $this->abreviacionPeriodo,
                        "pesoPeriodo" => $this->pesoPeriodo,
                        "editPeriodoID" => $this->editPeriodoID
                        );
        $tabla = 'periodos_academicos';
        $respuesta = ModeloPeriodos::mdlEditarPeriodo($datos,$tabla);
        echo $respuesta;  
    }

    public function ajaxMostrarPeriodos(){
        $tabla = 'periodos_academicos';
        $respuesta = ControladorPeriodos::ctrMostrarPeriodos($tabla);
        echo json_encode($respuesta);
    }
    
    public function ajaxBuscarPeriodo(){
        $valor = $this->idPeriodo;
        $tabla = 'periodos_academicos';
        $respuesta = ModeloPeriodos::mdlBuscarPeriodo($valor,$tabla);
        echo json_encode($respuesta);
    }

    public function ajaxEliminarPeriodo(){
        $idEliminarPeriodo = $this->idEliminarPeriodo;
        $tabla = 'periodos_academicos';
        $respuesta = ModeloPeriodos::mdlEliminarPeriodo($idEliminarPeriodo,$tabla);
        echo $respuesta;
    }
}

if(isset($_POST["nombrePeriodo"]))
{
    $listar = new AjaxPeriodos();
    $listar->nombrePeriodo = $_POST["nombrePeriodo"];
    $listar->abreviacionPeriodo = $_POST["abreviacionPeriodo"];
    $listar->pesoPeriodo = $_POST["pesoPeriodo"];
    $listar->ajaxRegistrarPeriodo();
}

if(isset($_POST["listarPeriodos"]))
{
    $listar = new AjaxPeriodos();
    $listar->ajaxMostrarPeriodos();
}

if(isset($_POST["idPeriodo"]))
{
    $listar = new AjaxPeriodos();
    $listar ->idPeriodo = $_POST["idPeriodo"];
    $listar->ajaxBuscarPeriodo();
}

if(isset($_POST["editPeriodoID"]))
{
    $listar = new AjaxPeriodos();
    $listar->nombrePeriodoEdit = $_POST["nombrePeriodoEdit"];
    $listar->abreviacionPeriodo = $_POST["abreviacionPeriodo"];
    $listar->pesoPeriodo = $_POST["pesoPeriodo"];
    $listar->editPeriodoID = $_POST["editPeriodoID"];
    $listar->ajaxEditarPeriodo();
}

if(isset($_POST["idEliminarPeriodo"]))
{
    $listar = new AjaxPeriodos();
    $listar->idEliminarPeriodo = $_POST["idEliminarPeriodo"];
    $listar->ajaxEliminarPeriodo();
}