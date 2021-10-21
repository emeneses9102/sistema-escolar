<?php
class ControladorListaCursos{
    static public function ctrMostrarCursos($item,$valor){
      $tabla = "cursos_clases";

      $respuesta = ModelolistaCursos::MdlMostrarListaCursos($tabla, $item, $valor);
      //var_dump($respuesta);
      return $respuesta;
    }
}