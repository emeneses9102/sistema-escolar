<?php

require_once "../controlador/administrativos.controlador.php";
require_once "../modelo/administrativos.modelo.php";

class AjaxAdm{
    
    public $idUsuario;

    public function ajaxEditarAdm(){
        $item="usuario_id";
        $valor = $this->idUsuario;
        $respuesta = ControladorAdm::ctrMostrarAdm($item,$valor);
        echo json_encode($respuesta);
        
    }

    public function ajaxDesactivarAdm(){
        
        $valor = $this->idUsuario;
        $tabla = "usuario";
        $respuesta = ModeloAdm::mdlDescativarAdm($valor,$tabla);
        return $respuesta;
    }


}
//Editar USuario
if(isset($_POST["idUsuario"]))
{
    
    $editar = new AjaxAdm();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarAdm();
}

//Desactivar usuario
if(isset($_POST['desactivar'])){
    $desactivar = new AjaxAdm();
    $desactivar->idUsuario = $_POST["idusuario"];
    $desactivar-> ajaxDesactivarAdm();
}
