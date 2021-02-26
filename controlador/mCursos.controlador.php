<?php
class ControladorCursos{
    static public function ctrCrearCurso(){
        if(isset($_POST['nombre_curso'])){
            $tabla="cursos";
            $datos = array("nombreCurso" => $_POST['nombre_curso'],
                            "nombreCorto" => $_POST['nombrec_curso'],
                            "codigoCurso" => $_POST['codigo_curso'],
                            "descripcion" => $_POST['descripcion_curso'],
                            );

            $respuesta = ModeloCursos :: mdlCrearCursos($tabla,$datos);
            if($respuesta == "ok"){
                echo '<script>
                swal.fire({
                    icon:"success",
                    title : "El curso ha sido registrado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "mCursos";
                    }
                })

                </script>';
            }else  if($respuesta == "repet"){
                echo '<script>
                swal.fire({
                    icon:"error",
                    title : "Error al registrar el curso",
                    text:"El nombre o el código no pueden repetirse",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                })

                </script>';
            }else{
                echo '<script>
                swal.fire({
                    icon:"error",
                    title : "Error al registrar el curso",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                })

                </script>';
            }
        }
    }

    //Mostrar usuario
    static public function ctrMostrarCursos($item,$valor){
        $tabla = "cursos";

        $respuesta = ModeloCursos::MdlMostrarcursos($tabla, $item, $valor);
        return $respuesta;
     }

     static public function ctrActualizarCurso(){
        if(isset($_POST['enombre_curso'])){
            $tabla="cursos";
            $datos = array("idCurso" => $_POST['idCurso'],
                            "nombreCurso" => $_POST['enombre_curso'],
                            "nombreCorto" => $_POST['enombrec_curso'],
                            "codigoCurso" => $_POST['ecodigo_curso'],
                            "descripcion" => $_POST['edescripcion_curso']);

            $respuesta = ModeloCursos :: mdlActualizarCursos($tabla,$datos);
            if($respuesta == "ok"){
                echo '<script>
                swal.fire({
                    icon:"success",
                    title : "El curso ha sido actualizado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "mCursos";
                    }
                })

                </script>';
            }else  if($respuesta == "empty"){
                echo '<script>
                swal.fire({
                    icon:"error",
                    title : "Error al actualizar el curso",
                    text:"El profesor no puede ir vacío",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    
                })

                </script>';
            }else{
                echo '<script>
                swal.fire({
                    icon:"error",
                    title : "Error al actualizar el curso",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                 
                })

                </script>';
            }
        }
     }
}