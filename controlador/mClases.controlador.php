<?php

class ControladorClases{
    static public function ctrMostrarClases($item,$valor){
        $tabla = "clases";

        $respuesta = ModeloClases::MdlMostrarclases($tabla, $item, $valor);
        //var_dump($respuesta);
        return $respuesta;
     }

     static public function ctrActualizarClase(){
        if(isset($_POST['idClase'])){
            $tabla="clases";
            $datos = array("idClase" => $_POST['idClase'],
                            "enombre_clase" => $_POST['enombre_clase'],
                            "ecodigo_clase" => $_POST['ecodigo_clase']);

            $respuesta = ModeloClases :: mdlActualizarClases($tabla,$datos);
            if($respuesta == "ok"){
                echo '<script>
                swal.fire({
                    icon:"success",
                    title : "La clase ha sido actualizado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "mClases";
                    }
                })

                </script>';
            }else  if($respuesta == "empty"){
                echo '<script>
                swal.fire({
                    icon:"error",
                    title : "Error al actualizar la clase",
                    text:"El profesor no puede ir vacío",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    
                })

                </script>';
            }else{
                echo '<script>
                swal.fire({
                    icon:"error",
                    title : "Error al actualizar la clase",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                 
                })

                </script>';
            }
        }
     }
}