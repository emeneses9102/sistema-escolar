<?php

class ControladorCompetencias{
  static public function ctrRegistrarCompetencia(){
      $tabla = "competencias";
      if(isset($_POST['nombre_competencia'])){
        $datos = array("nombre_competencia" => $_POST['nombre_competencia'],
                        "nombre_cortoCompetencia" => $_POST['nombre_cortoCompetencia'],
                        "identificador_competencia" => $_POST['identificador_competencia']);
        //var_dump($datos);
        $respuesta = ModeloCompetencias::mdlRegistrarCompetencia($tabla,$datos);
        return $respuesta; 
        

    }
  }
  static public function ctrMostrarCompetencias($item, $valor){
    $tabla = "competencias";

    $respuesta = ModeloCompetencias::MdlMostrarCompetencias($item, $valor,$tabla);
    return $respuesta;
  }

  static public function ctrEditarCompetencia(){
    $tabla = "competencias";
    if(isset($_POST['IDEditarCompetencia'])){
      $datos = array("IDEditarCompetencia" => $_POST['IDEditarCompetencia'],
                      "nombre_competencia" => $_POST['nombre_competencia1'],
                      "nombre_cortoCompetencia" => $_POST['nombre_cortoCompetencia'],
                      "identificador_competencia" => $_POST['identificador_competencia']);
      //var_dump($datos);
      $respuesta = ModeloCompetencias::mdlEditarCompetencia($tabla,$datos);
      return $respuesta; 
      

  }
}

}