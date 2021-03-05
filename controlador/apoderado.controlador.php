<?php
class ControladorApoderado{
         //Mostrar usuario
         static public function ctrMostrarApoderado($item,$valor){
            $tabla = "apoderado";
    
            $respuesta = ModeloApoderado::mdlMostrarApoderado($tabla, $item, $valor);
            //var_dump($respuesta);
            return $respuesta;
         }
}
?>