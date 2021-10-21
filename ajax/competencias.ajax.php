<?php


require_once "../controlador/competencias.controlador.php";
require_once "../modelo/competencias.modelo.php";

class AjaxCompetencias {

  public function ajaxAgregarCompetencia(){
    $respuesta = ControladorCompetencias::ctrRegistrarCompetencia();
    echo $respuesta;
  }
  public function ajaxMostrarCompetencias(){
    $tabla = "competencias";
    $item = "";
    $valor = "";
    $respuesta = ModeloCompetencias::MdlMostrarCompetencias($item,$valor,$tabla);
    echo json_encode($respuesta);
  }

  public function ajaxEliminarCompetencia(){
    $tabla="competencias";
    $item = "idCompetencia";
    $valor = $this->idEliminar;
    $respuesta = ModeloCompetencias::mdlEliminarCompetencia($item,$valor,$tabla);
    echo $respuesta;
  }
  public function ajaxBuscarCompetencia(){
    $tabla="competencias";
    $item = "idCompetencia";
    $valor = $this->idEditar;
    $respuesta = ModeloCompetencias::MdlMostrarCompetencias($item,$valor,$tabla);
    echo json_encode($respuesta);
  }
  public function ajaxEditarCompetencia(){
    $respuesta = ControladorCompetencias::ctrEditarCompetencia();
    echo $respuesta;
    
}
}




if(isset($_POST["nombre_competencia"]))
{
  $nuevo = new AjaxCompetencias();
  $nuevo->nombreCompetencia = $_POST["nombre_competencia"];
  $nuevo->ajaxAgregarCompetencia();
}

if(isset($_POST["mostrar"]))
{
    $mostrar = new AjaxCompetencias();
    $mostrar->ajaxMostrarCompetencias();
}
if(isset($_POST["eliminarID"]))
{
    $eliminar = new AjaxCompetencias();
    $eliminar->idEliminar = $_POST["eliminarID"];
    $eliminar->ajaxEliminarCompetencia();
}
if(isset($_POST["editarID"]))
{
    $editar = new AjaxCompetencias();
    $editar->idEditar = $_POST["editarID"];
    $editar->ajaxBuscarCompetencia();
}
if(isset($_POST["IDEditarCompetencia"]))
{
    $editar = new AjaxCompetencias();
    $editar->ajaxEditarCompetencia();
}