<?php

class ControladorInstitucion{
   static public function ctrGuardarDatos_Inst(){
       if(isset($_POST['nombre_institucion'])){
        if(preg_match('/^[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+$/',$_POST['nombre_institucion'])){
            $tabla="institucion";
            $datos = array("nombre_institucion" => $_POST['nombre_institucion'],
                            "razon_social" => $_POST['razon_social'],
                            "ruc_institucion"=>$_POST['ruc_institucion'],
                            "slogan_institucion" =>$_POST['slogan_institucion'],
                            "direccion_institucion" =>$_POST['direccion_institucion'],
                            "email_institucion" =>$_POST['email_institucion'],
                            "telefono_institucion" => $_POST['telefono_institucion'],
                            "rector_institucion" =>$_POST['rector_institucion'],
                            "id_institucion" =>$_POST['id_institucion']);

            $respuesta = ModeloInstitucion :: mdlGuardarInstitucion($tabla,$datos);
            if($respuesta == "ok"){
                echo '<script>
                swal.fire({
                    icon:"success",
                    title : "Los datos han sido registrado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "confInstitucion";
                    }
                })

                </script>';
            }
            else{
                    echo '<script>
                    swal.fire({
                        icon:"error",
                        title : "La información no se registró",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        if(result.value){
                            window.location = "confInstitucion";
                        }
                    })
    
                    </script>';
                }
                
            
        }

       }else{
           
       }
   }
   
   static public function ctrMostrarDatos_Inst(){
    $tabla = "institucion";

    $respuesta = ModeloInstitucion::MdlMostrarInstitucion($tabla);
    
    return $respuesta;
 
   }

   static public function ctrGuardarDatos_Pag(){
    if(isset($_POST['nombre_pag'])){
     if(preg_match('/^[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+$/',$_POST['nombre_pag'])){
         $tabla="configuracion";
         $datos = array("nombre_pag" => $_POST['nombre_pag'],
                         "nombre_logo" => $_POST['nombre_logo'],
                         "id_pagina" =>$_POST['id_pagina']);

         $respuesta = ModeloInstitucion :: mdlGuardarPagina($tabla,$datos);
         
         if($respuesta == "ok"){
             $_SESSION['nombre_pagina']=$_POST['nombre_pag'];
             echo '<script>
             swal.fire({
                 icon:"success",
                 title : "Los datos han sido registrado correctamente",
                 showConfirmButton: true,
                 confirmButtonText: "Cerrar",
                 closeOnConfirm: false
             }).then((result)=>{
                 if(result.value){
                     window.location = "confInstitucion";
                 }
             })

             </script>';
         }
         else{
                 echo '<script>
                 swal.fire({
                     icon:"error",
                     title : "La información no se registró",
                     showConfirmButton: true,
                     confirmButtonText: "Cerrar",
                     closeOnConfirm: false
                 }).then((result)=>{
                     if(result.value){
                         window.location = "confInstitucion";
                     }
                 })
 
                 </script>';
             }
             
         
        }

    }
   }
   static public function ctrMostrarDatos_Pag(){
    $tabla = "configuracion";

    $respuesta = ModeloInstitucion::MdlMostrarPagina($tabla);
    
    return $respuesta;
   }
}