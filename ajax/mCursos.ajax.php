<?php

require_once "../controlador/mCursos.controlador.php";
require_once "../modelo/mCursos.modelo.php";

class AjaxCursos{
   

    public function ajaxMostrarCurso(){
        $item ='idCursos';
        $tabla="cursos";
        $valor = $this->idCurso;
        $respuesta = ModeloCursos::MdlMostrarcursos($tabla,$item,$valor);
        echo json_encode($respuesta);
    }
    public function ajaxEliminarCurso(){
        $item ='idCursos';
        $tabla="cursos";
        $valor = $this->idCursoE;
        $respuesta = ModeloCursos::MdlEliminarcursos($tabla,$item,$valor);
        echo $respuesta;
    }
    public function ajaxAgregarCursoClase(){
        $idCurso = $this->id_Curso;
        $idClase = $this->id_Clase;
        $tabla = "cursos_clases";
        $respuesta = ModeloCursos::MdlAgregarCursoClase($tabla,$idCurso,$idClase);
        echo $respuesta;
    }
    public function ajaxMostrarCursoClase(){
        $item ='idClases';
        $tabla="cursos_clases";
        $valor = $this->id_Clasem;
        $respuesta = ModeloCursos::MdlMostrarCursoClase($tabla,$item,$valor);
        echo json_encode($respuesta);
    }
    public function ajaxEliminarCursoClase(){
        $id_CursoE = $this->id_CursoE;
        $id_ClaseE_ = $this->id_ClaseE_;
        $tabla = "cursos_clases";
        $respuesta = ModeloCursos::MdlEliminarCursoClase($tabla,$id_CursoE,$id_ClaseE_);
        echo $respuesta;
    }
    public function ajaxMostrarNombreTipo(){
        $item ='idClases';
        $tabla="cursos_clases";
        $valor = $this->id_ClaseE;
        $respuesta = ModeloCursos::MdlMostrarNombreTipo($tabla,$item,$valor);
        echo json_encode($respuesta);
    }

}

//validamos la llamada
if(isset($_POST['idCursoE'])){
    $curso = new AjaxCursos();
    $curso->idCursoE = $_POST["idCursoE"];
    $curso->ajaxEliminarCurso();
}
if(isset($_POST['idCurso'])){
    $nCurso = new AjaxCursos();
    $nCurso->idCurso = $_POST['idCurso'];
    $nCurso->ajaxMostrarCurso();
}

if(isset($_POST['id_Curso'])){
    $nCurso = new AjaxCursos();
    $nCurso->id_Curso = $_POST['id_Curso'];
    $nCurso->id_Clase = $_POST['id_Clase'];
    $nCurso->ajaxAgregarCursoClase();
}

if(isset($_POST['id_Clasem'])){
    $nCurso = new AjaxCursos();
    $nCurso->id_Clasem = $_POST['id_Clasem'];
    $nCurso->ajaxMostrarCursoClase();
}

if(isset($_POST['id_CursoE'])){
    $nCurso = new AjaxCursos();
    $nCurso->id_CursoE = $_POST['id_CursoE'];
    $nCurso->id_ClaseE_ = $_POST['id_ClaseE_'];
    $nCurso->ajaxEliminarCursoClase();
}

if(isset($_POST['id_ClaseE'])){
    $nCurso = new AjaxCursos();
    $nCurso->id_ClaseE = $_POST['id_ClaseE'];
    $nCurso->ajaxMostrarNombreTipo();
}