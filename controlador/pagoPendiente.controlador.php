<?php
class ControladorPagoPendiente{
    
    //Mostrar cobros pendientes por alumno
    static public function ctrMostrarCobrosxAlumno($item,$valor){
        $tabla = "cobros";
        $respuesta = ModeloPagoPendiente::mdlCobrosxAlumno($tabla,$item,$valor);
        return $respuesta;
        }
          //Mostrar cobros realizados por alumno
    static public function ctrMostrarCobrosRxAlumno($item,$valor){
        $tabla = "cobros";
        $respuesta = ModeloPagoPendiente::mdlCobrosRxAlumno($tabla,$item,$valor);
        return $respuesta;
        }

    static public function ctrMostrarDatosPagoPendiente($item,$valor){
        $respuesta = ModeloPagoPendiente::mdlMostrarDatosPagoPendiente($item,$valor);
        return $respuesta;
    }
}
?>