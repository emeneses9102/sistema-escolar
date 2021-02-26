<?php

require_once "../controlador/niveles.controlador.php";
require_once "../modelo/niveles.modelo.php";

class AjaxNiveles{
    public function ajaxDesactivarNivel(){
        $valor = $this->idNivel;
        $tabla = "niveles";
        $respuesta = ModeloNiveles::mdlDescativarNivel($valor,$tabla);
        
        echo $respuesta;
        
    }
}

if(isset($_POST["idNivel"]))
{
    $listar = new AjaxNiveles();
    $listar->idNivel = $_POST["idNivel"];
    
    $listar->ajaxDesactivarNivel();
}