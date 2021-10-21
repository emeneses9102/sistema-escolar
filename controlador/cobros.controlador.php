<?php

class ControladorCobros{
    static public function ctrRegistrarCobro(){
        $tabla = "cobros";
        if(isset($_POST['detalle_pago'])){
            $datos = array("detalle_pago" => $_POST['detalle_pago'],
                            "fecha_vencimiento" => $_POST['fecha_vencimiento'],
                            "monto" => $_POST['monto'],
                            "cob_niveles" => $_POST['cob_niveles']);
            //var_dump($datos);
            $respuesta = ModeloCobros::mdlRegistrarCobro($tabla,$datos);
            return $respuesta; 
            

        }
    }
    static public function ctrActualizarCobro(){
        $tabla = "cobros";
        if(isset($_POST['id_editCobro'])){
            $datos = array("id_editCobro" => $_POST['id_editCobro'],
                            "cod_editpago" => $_POST['cod_editpago'],
                            "detalle_pago" => $_POST['detalle_pago'],
                            "fecha_vencimiento" => $_POST['fecha_vencimiento'],
                            "monto" => $_POST['monto'],
                            "cob_niveles" => $_POST['cob_niveles']);
            //var_dump($datos);
            $respuesta = ModeloCobros::mdlActualizarCobro($tabla,$datos);
            return $respuesta; 
            

        }
    }

    static public function ctrMostrarCobros($item,$valor){
        $tabla="cobros";
        $respuesta = ModeloCobros::mdlMostrarcobros($item,$valor,$tabla);
        return $respuesta;
    }
}