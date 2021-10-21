<?php
class ControladorCursosProfesor {

    //Mostrar usuario
    static public function ctrMostrarCursos($item,$valor){
        $tabla = "cursos_clases";

        $respuesta = ModeloCursosProfesor::MdlMostrarCursos($tabla, $item, $valor);
        //var_dump($respuesta);
        return $respuesta;
     }

}