<?php

class ControladorNiveles{

    static public function ctrCrearNiveles(){
        
        if(isset($_POST['nombreNivel'])){
            $tabla = "niveles";
            $datos = array("nombreNivel" => $_POST['nombreNivel'],
                    "descripcion" => $_POST['descripcionNivel'],
                    "nivel_color" => $_POST['nivel_color']);
            $respuesta = ModeloNiveles :: mdlCrearNivel($tabla,$datos,);  
            //var_dump($respuesta);
           
            if($respuesta == "ok"){
                echo '<script>
                swal.fire({
                    icon:"success",
                    title : "El nivel ha sido registrado ",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "mniveles";
                    }
                })

                </script>';
            }else{
                echo '<script>
                        swal.fire({
                            icon:"error",
                            title : "El nivel no se registró",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "mniveles";
                            }
                        })
        
                        </script>';
            }   
        }
    }

    static public function ctrMostrarNiveles($item,$valor){
        $tabla = "niveles";
        $respuesta = ModeloNiveles::MdlMostrarNiveles($tabla, $valor);
        return $respuesta;
    }

    static public function ctrActualizarNivel(){
        if(isset($_POST['idNivel'])){
            $tabla = "niveles";
            $datos = array("idNivel" => $_POST['idNivel'],
                    "nombreNivel" => $_POST['enombreNivel'],
                    "descripcion" => $_POST['edescripcionNivel'],
                    "nivel_color" => $_POST['enivel_color']);
            $respuesta = ModeloNiveles :: mdlEditarNivel($tabla,$datos);  
            var_dump($respuesta);
           
            if($respuesta == "ok"){
                echo '<script>
                swal.fire({
                    icon:"success",
                    title : "El nivel ha sido actualizado ",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "mniveles";
                    }
                })

                </script>';
            }else if($respuesta == "repet"){
                echo '<script>
                swal.fire({
                    icon:"alert",
                    title : "El nombre del nivel no debe repetirse ",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                })
                </script>';
            }
            else if($respuesta == "empty"){
                echo '<script>
                swal.fire({
                    icon:"alert",
                    title : "El nombre del nivel no puede ir vac ",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                })
                </script>';
            }else if($respuesta == "error"){
                echo '<script>
                        swal.fire({
                            icon:"error",
                            title : "El nivel no se actualizó",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "mniveles";
                            }
                        })
        
                        </script>';
            }   
        }
    }

}

?>