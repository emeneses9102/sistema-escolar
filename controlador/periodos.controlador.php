<?php
class ControladorPeriodos{
    static public function ctrMostrarPeriodos(){
        $tabla = "periodos_academicos";
        $respuesta = ModeloPeriodos::MdlMostrarPeriodos($tabla);
        return $respuesta;
    }
}