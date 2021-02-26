<?php

require_once "../controlador/directivos.controlador.php";
require_once "../modelo/directivos.modelo.php";

class AjaxDirectivo{
    
    public $idUsuario;

    public function ajaxEditarDirectivo(){
        $item="usuario_id";
        $valor = $this->idUsuario;
        $respuesta = ControladorDirectivo::ctrMostrarDirectivo($item,$valor);
        echo json_encode($respuesta);
        
    }

    public function ajaxDesactivarDirectivo(){
        
        $valor = $this->idUsuario;
        $tabla = "usuario";
        $respuesta = ModeloDirectivo::mdlDescativarDirectivo($valor,$tabla);
        return $respuesta;
    }


}
//Editar USuario
if(isset($_POST["idUsuario"]))
{
    
    $editar = new AjaxDirectivo();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarDirectivo();
}

//Desactivar usuario
if(isset($_POST['desactivar'])){
    $desactivar = new AjaxDirectivo();
    $desactivar->idUsuario = $_POST["idusuario"];
    $desactivar-> ajaxDesactivarDirectivo();
}
