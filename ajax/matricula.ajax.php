<?php

require_once "../controlador/matricula.controlador.php";
require_once "../modelo/matricula.modelo.php";

class AjaxMatricula{

    public function ajaxRegistrarMatricula(){
        $respuesta = ControladorMAtricula::ctrRegistrarMatricula();
        //var_dump($respuesta);
        echo $respuesta;
    }
}

if(isset($_POST["matCod_Alumno"]))
{
    $listar = new AjaxMatricula();
    $listar->matCod_Alumno = $_POST["matCod_Alumno"];
    $listar->ajaxRegistrarMatricula();
}