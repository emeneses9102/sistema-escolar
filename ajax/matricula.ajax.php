<?php

require_once "../controlador/matricula.controlador.php";
require_once "../modelo/matricula.modelo.php";

class AjaxMatricula{

    public function ajaxRegistrarMatricula(){
        $respuesta = ControladorMatricula::ctrRegistrarMatricula();
        //var_dump($respuesta);
        echo $respuesta;
    }
    public function ajaxRegistrarMatriculaGrupo(){
        $id_nivel = $this->id_Nivel;
        $valor = $this->id_SeccionG;
        $GrupoID = $this->GrupoID;
        $respuesta = ModeloMatricula::mdlRegistrarMatriculaGrupo($GrupoID,$valor,$id_nivel);
        return $respuesta;
    }
}

if(isset($_POST["matCod_Alumno"]))
{
    $listar = new AjaxMatricula();
    $listar->matCod_Alumno = $_POST["matCod_Alumno"];
    $listar->ajaxRegistrarMatricula();
}

if(isset($_POST["id_SeccionG"]))
{
    $matricularGrupo = new AjaxMatricula();
    $matricularGrupo->id_Nivel = $_POST["id_Nivel"];
    $matricularGrupo->id_SeccionG = $_POST["id_SeccionG"];
    $matricularGrupo->GrupoID = json_decode($_POST['GrupoID']);
    $matricularGrupo->ajaxRegistrarMatriculaGrupo();
}