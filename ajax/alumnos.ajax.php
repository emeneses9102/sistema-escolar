<?php

require_once "../controlador/alumnos.controlador.php";
require_once "../modelo/alumnos.modelo.php";

class AjaxAlumnos{
    
    public $idUsuario;

    public function ajaxEditarAlumno(){
        $item="usuario_id";
        $valor = $this->idUsuario;
        $respuesta = ControladorAlumnos::ctrMostrarAlumno($item,$valor);
        echo json_encode($respuesta);
        
    }

    public function ajaxDesactivarAlumno(){
        
        $valor = $this->idUsuario;
        $tabla = "usuario";
        $respuesta = ModeloAlumnos::mdlDescativarAlumno($valor,$tabla);
        return $respuesta;
    }

    public function ajaxEliminarAlumno(){
        
        $valor = $this->idUsuario;
        $claveSeguridad = $this->claveSeguridad;
        $tabla = "usuario";
        $respuesta = ModeloAlumnos::mdlEliminarAlumno($valor,$tabla,$claveSeguridad);
        
        echo $respuesta;
    }

    public function ajaxEstadoAlumno(){
        
        $valor = $this->estadoAlumno;
        $tabla = "usuario";
        $respuesta = ModeloAlumnos::mdlEstadoAlumno($valor,$tabla);
        var_dump($respuesta);
        echo $respuesta;
    }


}
//Editar USuario
if(isset($_POST["idUsuario"]))
{
    
    $editar = new AjaxAlumnos();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarAlumno();
}

//Desactivar usuario
if(isset($_POST['desactivar'])){
    $desactivar = new AjaxAlumnos();
    $desactivar->idUsuario = $_POST["idusuario"];
    $desactivar-> ajaxDesactivarAlumno();
}

if(isset($_POST['eliminar'])){
    $eliminar = new AjaxAlumnos();
    $eliminar->idUsuario = $_POST["idusuario"];
    $eliminar->claveSeguridad = $_POST["claveSeguridad"];
    $eliminar-> ajaxEliminarAlumno();
}

if(isset($_POST["estadoAlumno"]))
{
    
    $editar = new AjaxAlumnos();
    $editar->estadoAlumno = $_POST["estadoAlumno"];
    $editar->ajaxEstadoAlumno();
}