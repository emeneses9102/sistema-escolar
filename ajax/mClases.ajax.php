<?php

require_once "../controlador/mClases.controlador.php";
require_once "../modelo/mClases.modelo.php";

require_once "../controlador/mCursos.controlador.php";
require_once "../modelo/mCursos.modelo.php";

class ajaxClases{
     public function ajaxCrearClase(){
            $tabla="clases";
            $datos = ["idSeccion_grados" => $_POST["idSeccion_grados"],
                    "codigoClase" => $_POST['codigoClase'],
                    "nombre_clase" => $_POST['nombre_clase']];
            $respuesta = ModeloClases :: mdlCrearClase($tabla,$datos);
            //print_r($respuesta);
            echo $respuesta;
    }

     public function ajaxMostrarCursos(){
        $tabla = "cursos";
        $item = $this->idSeccion;
        $valor = "";
        $respuesta = ModeloCursos::MdlMostrarcursos($tabla, $item, $valor);
        echo json_encode($respuesta);
    }

    public function ajaxMostrarClases(){
        $tabla = "clases";
        $item = "idClases";
        $valor = $this->idClase;
        $respuesta = ModeloClases::MdlMostrarclases($tabla, $item, $valor);
        echo json_encode($respuesta);
    }
    public function ajaxCrearDetalleCurso(){
        $tabla="detalle_curso";
        $datos = ["idFormato_calif" => $_POST["idFormato_calif"],
                "idProfesor_" => $_POST['idProfesor_'],
                "idCuso_" => $_POST['idCuso_'],
                "cod_curso" => $_POST['cod_curso']];
        $respuesta = ModeloClases :: mdlCrearDetalleCurso($tabla,$datos);
        //print_r($respuesta);
        echo $respuesta;
}
    
}

//validamos la llamada
if(isset($_POST['nombre_clase'])){
    $clase = new AjaxClases();
    $clase->ajaxCrearClase();
}

if(isset($_POST['idseccion_'])){
    $clase = new AjaxClases();
    $clase ->idSeccion = $_POST['idseccion_'];
    $clase->ajaxMostrarCursos();
}

if(isset($_POST['idClase'])){
    $clase = new AjaxClases();
    $clase ->idClase= $_POST['idClase'];
    $clase->ajaxMostrarClases();
}
if(isset($_POST['ID_dato'])){
    $clase = new AjaxClases();
    $clase ->idSeccion= $_POST['ID_dato'];
    $clase->ajaxMostrarCursos();
}

if(isset($_POST['idFormato_calif'])){
    $clase = new AjaxClases();
    $clase->ajaxCrearDetalleCurso();
}