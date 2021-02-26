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
