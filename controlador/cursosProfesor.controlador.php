<?php
class ControladorCursosProfesor {

    //Mostrar usuario
    static public function ctrMostrarCursos($item,$valor){
        $tabla = "cursos_clases";

        $respuesta = ModeloCursosProfesor::MdlMostrarCursos($tabla, $item, $valor);
        //var_dump($respuesta);
        return $respuesta;
     }

    static public function ctrRegistrarCalificacion(){
        $tabla = "confNotas";
        if(isset($_POST['nombreCalificacion'])){
          $datos = array("nombreCalificacion" => $_POST['nombreCalificacion'],
                          "siglasCalificacion" => $_POST['siglasCalificacion'],
                          "pesoCalificacion" => $_POST['pesoCalificacion'],
                          "chkSubNotas" => $_POST['chkSubNotas'],
                          "detalleCalificaciones" => $_POST['detalleCalificaciones'],
                          "id_curso_" => $_POST['id_curso_'],
                          "periodoVal" => $_POST['periodoVal']);
          //var_dump($datos);
          $respuesta = ModeloCursosProfesor::mdlRegistrarCalificacion($tabla,$datos);
          return $respuesta; 
          
  
      }
    }
    static public function ctrRegistrarCalificacionParcial(){
      $tabla = "nota_parcial";
      if(isset($_POST['nombreNotaParcial'])){
        $datos = array("nombreNotaParcial" => $_POST['nombreNotaParcial'],
                        "siglasNotaParcial" => $_POST['siglasNotaParcial'],
                        "pesoNotaParcial" => $_POST['pesoNotaParcial'],
                        "notaReferenciada" => $_POST['notaReferenciada'],
                        "detalleNotaParcial" => $_POST['detalleNotaParcial']);
        //var_dump($datos);
        $respuesta = ModeloCursosProfesor::mdlRegistrarCalificacionParcial($tabla,$datos);
        return $respuesta; 
        

    }
  }

}