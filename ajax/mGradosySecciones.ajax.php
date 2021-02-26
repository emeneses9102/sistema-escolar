<?php

require_once "../controlador/mGradosySecciones.controlador.php";
require_once "../modelo/mGradosySecciones.modelo.php";

class AjaxGradosySecciones{

    public $idNivel;

    public function ajaxListarGrados(){
        
        $valor = $this->idNivel;
        $respuesta = ControladorGradosySecciones::ctrMostrarGrados($valor);
        echo json_encode($respuesta);
        
    }

    public $idGrado;
    public $nombre_seccion;

    public function ajaxGuardarSeccion(){
        $idGrado = $this->idGrado;
        $idSeccion=$this->idSeccion;
        $respuesta = ControladorGradosySecciones::ctrRegistrarSeccion($idSeccion,$idGrado);
    
        echo $respuesta;
    }

    public function ajaxListarSeccion(){
        $valor = $this->dato;
        $respuesta = ControladorGradosySecciones::ctrMostrarSecciones($valor);
        
        echo json_encode($respuesta);
    }

    public function ajaxMostrarSeccion(){
        $valor = $this->idGradom;
        $respuesta = ControladorGradosySecciones::ctrMostrarSecciones($valor);
        echo json_encode($respuesta);
    }


    public function ajaxEliminarGrado(){
        $valor = $this->ideGrado;
        $tabla = "grados";
        $respuesta = ModeloGradosySecciones::MdlEliminarGrado($valor,$tabla);
        
        return $respuesta;
    }

    public function ajaxEliminarSG(){
        $valor = $this->datoID;
        $tabla = "seccion_grados";
        $respuesta = ModeloGradosySecciones::MdlEliminarSG($tabla,$valor);
        echo $respuesta;
    }

    public function ajaxMostrarSD(){
        $idGradoSD = $this->idGradoSD;
        $idSeccionSD = $this->idSeccionSD;
        $respuesta = ModeloGradosySecciones::MdlMostrarSD($idGradoSD,$idSeccionSD);
        echo json_encode($respuesta);
    }
}

if(isset($_POST["idNivel"]))
{
    $listar = new AjaxGradosySecciones();
    $listar->idNivel = $_POST["idNivel"];
    $listar->ajaxListarGrados();
}

if(isset($_POST["idGrado"]))
{
    $listar = new AjaxGradosySecciones();
    $listar->idGrado = $_POST["idGrado"];
    $listar->idSeccion = $_POST["idSeccion"];
    $listar->ajaxGuardarSeccion();
}

if(isset($_POST["tipo"]))
{
    if($_POST["tipo"] == "listarSeccion")
    {
        $listar = new AjaxGradosySecciones();
        $listar->dato = $_POST["dato"];
        $listar->ajaxListarSeccion();
    }else{
            $listar = new AjaxGradosySecciones();
            $listar->idGradom = $_POST["id_Grado"];
            $listar->ajaxMostrarSeccion();
        }
    
    
    
}

if(isset($_POST['eliminarGrado'])){
    $eliminarGrado = new AjaxGradosySecciones();
    $eliminarGrado->ideGrado = $_POST["ideGrado"];
    $eliminarGrado-> ajaxEliminarGrado();
}
if(isset($_POST['idSeccionSD'])){
    $mostrarSD = new AjaxGradosySecciones();
    $mostrarSD->idGradoSD = $_POST['idGradoSD'];
    $mostrarSD->idSeccionSD = $_POST['idSeccionSD'];
    $mostrarSD->ajaxMostrarSD();
}
if(isset($_POST["datoID"] )){
      $eliminarSG = new AjaxGradosySecciones();
      $eliminarSG->datoID = $_POST['datoID'];
      $eliminarSG->ajaxEliminarSG();
  }




