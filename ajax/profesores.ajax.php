<?php

require_once "../controlador/profesores.controlador.php";
require_once "../modelo/profesores.modelo.php";

class AjaxProfesores{
    
    public $idUsuario;

    public function ajaxEditarProfesor(){
        $item="usuario_id";
        $valor = $this->idUsuario;
        $respuesta = ControladorProfesores::ctrMostrarProfesor($item,$valor);
        echo json_encode($respuesta);
        
    }

    public function ajaxDesactivarProfesor(){
        
        $valor = $this->idUsuario;
        $tabla = "usuario";
        $respuesta = ModeloProfesores::mdlDescativarProfesor($valor,$tabla);
        return $respuesta;
    }

    public function ajaxMostrarProfesor(){
        $item="usuario_id";
        $valor = $this->idProfesor;
        $respuesta = ControladorProfesores::ctrMostrarProfesor($item,$valor);
        echo json_encode($respuesta);
        
    }


}
//Editar USuario
if(isset($_POST["idUsuario"]))
{
    
    $editar = new AjaxProfesores();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarProfesor();
}

//Desactivar usuario
if(isset($_POST['desactivar'])){
    $desactivar = new AjaxProfesores();
    $desactivar->idUsuario = $_POST["idusuario"];
    $desactivar-> ajaxDesactivarProfesor();
}
if(isset($_POST['idProfesor'])){
    $mostrarProf  = new AjaxProfesores();
    $mostrarProf->idProfesor = $_POST['idProfesor'];
    $mostrarProf->ajaxMostrarProfesor();
}
