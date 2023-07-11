<?php

require_once "../controlador/cursosProfesor.controlador.php";
require_once "../modelo/cursosProfesor.modelo.php";

class ajaxCursosProfesor{

    public function ajaxMostrarCurso(){
        $tabla = "cursos_clases";
        $valor = $this->idCurso;
        $item = "id_detalle_curso";
        $respuesta = ModeloCursosProfesor::mdlMostrarCursosxID($tabla, $item, $valor);
        echo json_encode($respuesta);
    }
    public function ajaxMostrarAlumnosCurso(){
        $tabla = "matricula";
        $valor = $this->idCursoGrado;
        $item = "idSeccion_Grados";
        $respuesta = ModeloCursosProfesor::mdlMostrarAlumnosCurso($tabla, $item, $valor);
        echo json_encode($respuesta);
    }
    public function ajaxRegistrarCalificacion(){
        $respuesta = ControladorCursosProfesor::ctrRegistrarCalificacion();
        echo $respuesta;
    }

    public function ajaxMostrarNotasParciales(){
        $tabla = "confNotas";
        $valor1 = $this->id_curso_cmb;
        $valor2 = $this->periodoVal_cmb;
        $respuesta = ModeloCursosProfesor::mdlMostrarNotasParciales($tabla, $valor1, $valor2);
        echo json_encode($respuesta);
    }
    public function ajaxRegistrarCalificacionParcial(){
        $respuesta = ControladorCursosProfesor::ctrRegistrarCalificacionParcial();
        echo $respuesta;
    }

}

//validamos la llamada
if(isset($_POST['idCurso'])){
    $curso = new ajaxCursosProfesor();
    $curso ->idCurso = $_POST['idCurso'];
    $curso->ajaxMostrarCurso();
}

//llamada para listar alumnos del curso
if(isset($_POST['idSeccionCurso'])){
    $curso = new ajaxCursosProfesor();
    $curso ->idCursoGrado = $_POST['idSeccionCurso'];
    $curso->ajaxMostrarAlumnosCurso();
}


if(isset($_POST['nombreCalificacion'])){
    $calificaciones = new ajaxCursosProfesor();
    $calificaciones ->nombreCalificacion = $_POST['nombreCalificacion'];
    $calificaciones->ajaxRegistrarCalificacion();
}

//llamada para lenar el select de notas parciales
if(isset($_POST['id_curso_cmb'])){
    $nota = new ajaxCursosProfesor();
    $nota -> id_curso_cmb = $_POST['id_curso_cmb'];
    $nota -> periodoVal_cmb = $_POST['periodoVal_cmb'];
    $nota->ajaxMostrarNotasParciales();
}

if(isset($_POST['nombreNotaParcial'])){
    $calificaciones = new ajaxCursosProfesor();
    $calificaciones ->nombreNotaParcial = $_POST['nombreNotaParcial'];
    $calificaciones->ajaxRegistrarCalificacionParcial();
}