<?php

class ControladorMatricula{
    static public function ctrRegistrarMatricula(){
        $tabla ="matricula";

        if(isset($_POST['matCod_Alumno'])){
            $datos = array("matCod_Alumno" => $_POST['matCod_Alumno'],
                            "matID_Alumno" => $_POST['matID_Alumno'],
                            "matidSeccion" => $_POST['matidSeccion'],
                            "matidNivel" => $_POST['matidNivel'],);
            
            $respuesta = ModeloMatricula::mdlRegistrarMatricula($tabla,$datos);
            return $respuesta; 
            

        }
    }
}