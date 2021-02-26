<?php
class ControladorListaDeuda{
    static public function ctrMostrarDeudores($item,$valor){
        $tabla = "alumno_cobros";

        $respuesta = ModeloListaDeuda::mdlMostrarDeudores($tabla, $item, $valor);
        //var_dump($respuesta);
        return $respuesta;
     }
}