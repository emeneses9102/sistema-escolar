<?php 
class ControladorGradosySecciones{
    static public function ctrCrearGrados(){
        $tabla = "grados";
        if(isset($_POST['nombreGrado'])){
            $datos = array("nombreGrado" => $_POST['nombreGrado'],
            "niveles" => $_POST['niveles']);
            //var_dump($datos);
            $respuesta = ModeloGradosySecciones::mdlCrearGrado($tabla,$datos);

            if($respuesta == "ok"){
                echo '<script>
                swal.fire({
                    icon:"success",
                    title : "El grado ha sido registrado ",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    
                }).then((result)=>{
                    if(result.value){
                        window.location = "mGradosySecciones";
                    }
                })

                </script>';
            }else if($respuesta == "repet"){
                echo '<script>
                swal.fire({
                    icon:"error",
                    title : "ya existe este grado en el nivel ",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
            
                }).then((result)=>{
                    if(result.value){
                        window.location = "mGradosySecciones";
                    }
                })

                </script>';
            }else{
                echo '<script>
                        swal.fire({
                            icon:"error",
                            title : "El grado no se registró",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
 
                        }).then((result)=>{
                            if(result.value){
                                window.location = "mGradosySecciones";
                            }
                        })
        
                        </script>';
            }   

        }

    }

    static public function ctrMostrarGrados($valor){
        $tabla = "grados";
        $respuesta = ModeloGradosySecciones::MdlMostrarGrados($tabla, $valor);
        return $respuesta;
    }

    static public function ctrCrearSecciones(){
        $tabla = "seccion";
        if(isset($_POST['nombreSeccion'])){
            $datos = array("nombreSeccion" => $_POST['nombreSeccion'],
            "letraCodigo" => $_POST['letraCodigo']);
            //var_dump($datos);
            $respuesta = ModeloGradosySecciones::mdlCrearSeccion($tabla,$datos);

            if($respuesta == "ok"){
                echo '<script>
                swal.fire({
                    icon:"success",
                    title : "Sección Registrada",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "mGradosySecciones";
                    }
                })

                </script>';
            }else{
                echo '<script>
                        swal.fire({
                            icon:"error",
                            title : "La sección no se registró",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "mGradosySecciones";
                            }
                        })
        
                        </script>';
            }   

        }

    }


    static public function ctrRegistrarSeccion($valor1,$valor2){
        if(!empty($valor1) && !empty($valor2)){
            $tabla = "seccion_grados";
            $respuesta = ModeloGradosySecciones::MdlRegistrarSeccion($tabla, $valor1, $valor2);
            return $respuesta;
        }else{
            return "los campos estan vacíos";
        }
    }

    static public function ctrMostrarSecciones($valor){
        $tabla = "seccion_grados";
        $respuesta = ModeloGradosySecciones::MdlMostrarSecciones_Grados($tabla, $valor);
        return $respuesta;
    }

    static public function ctrActualizarGrados(){
        if(isset($_POST['e_idGrado'])){
            $tabla="grados";
            $datos = array("idGrado"=>$_POST['e_idGrado'],
                            "nombreGrado"=>$_POST['enombreGrado'],
                            "eniveles"=>$_POST['eniveles']);
            if(!empty($_POST['enombreGrado'])){
                $respuesta = ModeloGradosySecciones::MdlActualizarGrados($tabla, $datos);
                if($respuesta == "repet"){
                    echo '<script>
                        swal.fire({
                        type:"error",
                        title : "El nombre no puede repetirse dentro del mismo nivel",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })

                    </script>';
                }else if($respuesta == "ok"){
                    echo '<script>
                        swal.fire({
                            type:"success",
                            title : "El grado ha sido registrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "mGradosySecciones";
                            }
                        })
        
                        </script>';
                }else if($respuesta == "error"){
                    echo '<script>
                        swal.fire({
                            type:"error",
                            title : "Error al actualizar el grado",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "mGradosySecciones";
                            }
                        })
        
                        </script>';
                }else if($respuesta == "empty"){
                    echo '<script>
                    swal.fire({
                        type:"error",
                        title : "El nombre no puede ir vacío",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })

                    </script>';
                }
                
            }
        }
    }
}
