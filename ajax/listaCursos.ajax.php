<?php

require_once "../controlador/listaCursos.controlador.php";
require_once "../modelo/listaCursos.modelo.php";

class ajaxListaCursos{
  public function ajaxClearFiltro(){
    $item = "";
    $tabla = "cursos_clases";
    $valor = "";
    $respuesta = modeloListaCursos::mdlMostrarListaCursos($tabla,$item,$valor);
    //var_dump($respuesta);
    echo json_encode($respuesta);
  }
  public function ajaxFiltro1(){
    $valor = $this->seleccion;
    $tabla = "cursos_clases";
    $item="";
    $respuesta = modeloListaCursos::mdlFiltro1($tabla, $valor);
    //var_dump($respuesta);
    echo json_encode($respuesta);
  }

  public function ajaxFiltro2(){
    $valor = $this->seleccion2;
    $codNivel = $this->codNivel;
    $tabla = "cursos_clases";
    $item="";
    $respuesta = modeloListaCursos::mdlFiltro2($tabla, $valor,$codNivel);
    //var_dump($respuesta);
    echo json_encode($respuesta);
  }

  public function ajaxFiltro3(){
    $valor = $this->seleccion3;
    $codNivel = $this->codNivel;
    $codGrado = $this->codGrado;
    $tabla = "cursos_clases";
    $item="";
    $respuesta = modeloListaCursos::mdlFiltro3($tabla, $valor,$codNivel,$codGrado);
    //var_dump($respuesta);
    echo json_encode($respuesta);
  }
}

if(isset($_POST["seleccion"]))
{  
    $mostrar = new ajaxListaCursos();
    $mostrar->seleccion = $_POST["seleccion"];
    $mostrar->ajaxFiltro1();
}

if(isset($_POST["seleccion2"]))
{  
    $mostrar = new ajaxListaCursos();
    $mostrar->seleccion2 = $_POST["seleccion2"];
    $mostrar->codNivel = $_POST["codNivel"];
    $mostrar->ajaxFiltro2();
}

if(isset($_POST["seleccion3"]))
{  
    $mostrar = new ajaxListaCursos();
    $mostrar->seleccion3 = $_POST["seleccion3"];
    $mostrar->codNivel = $_POST["codNivel"];
    $mostrar->codGrado = $_POST["codGrado"];
    $mostrar->ajaxFiltro3();
}

if(isset($_POST["clearfiltro"]))
{  
    $mostrar = new ajaxListaCursos();
    
    $mostrar->ajaxClearFiltro();
}