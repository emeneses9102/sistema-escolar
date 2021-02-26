<?php

require_once "../controlador/usuarios.controlador.php";
require_once "../modelo/usuarios.modelo.php";

class AjaxUsuarios{
    
    public $idUsuario;

    public function ajaxEditarUsuario(){
        $item="usuario_id";
        $valor = $this->idUsuario;
        $respuesta = ControladorUsuarios::ctrMostrarUsuario($item,$valor);
        echo json_encode($respuesta);
        
    }

    public function ajaxDesactivarUsuario(){
        
        $valor = $this->idUsuario;
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlDescativarUsuario($valor,$tabla);
        return $respuesta;
    }


}
//Editar USuario
if(isset($_POST["idUsuario"]))
{
    
    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuario();
}

//Desactivar usuario
if(isset($_POST['desactivar'])){
    $desactivar = new AjaxUsuarios();
    $desactivar->idUsuario = $_POST["idusuario"];
    $desactivar-> ajaxDesactivarUsuario();
}
