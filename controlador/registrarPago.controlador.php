<?php
class ControladorRegistrarPago{
    static public function ctrBuscarAlumnoPago($seleccion,$alumnoBuscar){
        $value="";
        switch ($seleccion) {
            case 'codigo':
                $value = "cod_matricula";
                
               
                break;
            case 'dni':
                $value = "dni";
                break;
            case 'nombre':
                $value = "nombre";
                break;

            default:
                $value="";
                break;
        }

        $respuesta = ModeloRegistrarPago::mdlBuscarAlumno($value,$alumnoBuscar);
        
        return $respuesta;
    }
}
?>