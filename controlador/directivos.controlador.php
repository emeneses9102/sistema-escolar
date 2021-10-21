<?php
class ControladorDirectivo{

     //Crear Direcrtivos
     static public function ctrCrearDirectivo(){
        
        if(isset($_POST['usuario'])){
            
            if(preg_match('/^[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+$/',$_POST['nombre']) &&
            preg_match('/^[a-zA-Z0-9_]+$/',$_POST['usuario']) && 
            preg_match('/^[a-zA-Z0-9]+$/',$_POST['clave'])){
                $ruta="";
                //Validar imagen de usuario
                if(isset($_FILES["nuevaFoto"]["tmp_name"])){
                    list($ancho,$alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    //creamos el directorio
                    $directorio = "vista/images/usuarios/".$_POST["usuario"];
                    mkdir($directorio, 0755);

                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
                        //Guardamos la imagen
                        $aleatorio = mt_rand(100,999);
                        $ruta = "vista/images/usuarios/".$_POST["usuario"]."/".$aleatorio.".jpg";
                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                        imagejpeg($destino,$ruta);
                    }

                    if($_FILES["nuevaFoto"]["type"] == "image/png"){
                        //Guardamos la imagen
                        $aleatorio = mt_rand(100,999);
                        $ruta = "vista/images/usuarios/".$_POST["usuario"]."/".$aleatorio.".png";
                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                        imagepng($destino,$ruta);
                    }
                }
                
                $tabla="usuario";
                $encriptar=password_hash($_POST['clave'],PASSWORD_DEFAULT);
                if($_POST['date'] == 0){
                    $_POST['date']= NULL;
                 }
                $datos = array("nombre" => $_POST['nombre'],
                                "apellidos" => $_POST['apellidos'],
                                "direccion" => $_POST['direccion'],
                                "telefono" => $_POST['telefono'],
                                "celular" => $_POST['celular'],
                                "dni" => $_POST['dni'],
                                "usuario" => $_POST['usuario'],
                                "clave" => $encriptar,
                                "listRol" => $_POST['listRol'],
                                "listEstado" => $_POST['listEstado'],
                                "correo" => $_POST['correo'],
                                "nacionalidad" => $_POST['nacionalidad'],
                                "fecha_nacimiento" => $_POST['date'],
                                "foto"=>$ruta);
                
               

                $respuesta = ModeloDirectivo :: mdlIngresarDirectivo($tabla,$datos);
                
                

                if($respuesta == "ok"){
                    echo '<script>
                    swal.fire({
                        type:"success",
                        title : "El Directivo ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        if(result.value){
                            window.location = "directivos";
                        }
                    })
    
                    </script>';
                }
                else{
                    if($respuesta == "repet"){
                        echo '<script>
                        swal.fire({
                            type:"error",
                            title : "El directivo ya existe",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "directivos";
                            }
                        })
        
                        </script>';
                    }else{
                        echo '<script>
                        swal.fire({
                            type:"error",
                            title : "El Directivo no se registró",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "directivos";
                            }
                        })
        
                        </script>';
                    }
                    
                }
            }
            
            else{
                
                echo '<script>
                swal.fire({
                    type:"error",
                    title : "El Directivo no puede ir vacío o llevar caracteres especiales",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "directivos";
                    }
                })

                </script>';
            }
        }
    }
     //Mostrar usuario
     static public function ctrMostrarDirectivo($item,$valor){
        $tabla = "usuario";

        $respuesta = ModeloDirectivo::MdlMostrarDirectivo($tabla, $item, $valor);
        return $respuesta;
     }

     //Editar usuario
     static public function ctrEditarDirectivo(){
         if(isset($_POST['idusuario'])){
            if(preg_match('/^[a-zA-Z0-9_\sñÑáéíóúÁÉÍÓÚ]+$/',$_POST['editNombre'])){
                $ruta=$_POST['editFotoActual'];
                //Validar imagen de usuario
                if(isset($_FILES["editNuevaFoto"]["tmp_name"]) && $_FILES['editNuevaFoto']['name'] != null){
                    list($ancho,$alto) = getimagesize($_FILES["editNuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    
                    //creamos el directorio
                    $directorio = "vista/images/usuarios/".$_POST["editUsuario"];
                    //validamos si existe alguna imagen guardada en la ruta

                    if(!empty($_POST['editFotoActual'])){
                       echo '<script>alert('.$_POST['editFotoActual'].')</script>';
                        unlink($_POST['editFotoActual']);
                    }else{
                        
                        mkdir($directorio, 0755);
                    }

                    if($_FILES["editNuevaFoto"]["type"] == "image/jpeg"){
                        //Guardamos la imagen
                        $aleatorio = mt_rand(100,999);
                        $ruta = "vista/images/usuarios/".$_POST["editUsuario"]."/".$aleatorio.".jpg";
                        $origen = imagecreatefromjpeg($_FILES["editNuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                        imagejpeg($destino,$ruta);
                    }
                    if($_FILES["editNuevaFoto"]["type"] == "image/png"){
                        //Guardamos la imagen
                        $aleatorio = mt_rand(100,999);
                        $ruta = "vista/images/usuarios/".$_POST["editUsuario"]."/".$aleatorio.".png";
                        $origen = imagecreatefrompng($_FILES["editNuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                        imagepng($destino,$ruta);
                    }
                }
                $tabla="usuario";
                if(isset($_POST['editClave']) && !empty($_POST['editClave'])){
                    if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['editClave'])){
                        $encriptar=password_hash($_POST['editClave'],PASSWORD_DEFAULT);
                    }else{
                        echo '<script>
                            swal.fire({
                                type:"error",
                                title : "La contraseña no puede ir vacía o llevar caracteres especiales",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "directivos";
                                }
                            })

                            </script>';
                    }
                    
                }else{
                    $encriptar = $_POST['editClaveActual'];
                }
                if($_POST['editDate'] == 0){
                    $_POST['editDate']= NULL;
                 }
                $datos = array("nombre" => $_POST['editNombre'],
                                "idusuario" => $_POST['idusuario'],
                                "apellidos" => $_POST['editApellidos'],
                                "direccion" => $_POST['editDireccion'],
                                "telefono" => $_POST['editTelefono'],
                                "celular" => $_POST['editCelular'],
                                "dni" => $_POST['editDni'],
                                "usuario" => $_POST['editUsuario'],
                                "clave" => $encriptar,
                                "listRol" => $_POST['editListRol'],
                                "listEstado" => $_POST['editListEstado'],
                                "correo" => $_POST['editCorreo'],
                                "nacionalidad" => $_POST['editNacionalidad'],
                                "fecha_nacimiento" => $_POST['editDate'],
                                "foto"=>$ruta);
                
               
               

                $respuesta = ModeloDirectivo :: mdlEditarDirectivo($tabla,$datos);

                if($respuesta == "ok"){
                    echo '<script>
                    swal.fire({
                        icon:"success",
                        title : "El Directivo ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        if(result.value){
                            window.location = "directivos";
                        }
                    })
    
                    </script>';
                    if($_SESSION['usuario'] ==$_POST['editUsuario'] ){
                        $_SESSION['foto'] =$ruta;
                    }
                    
                }
                else{
                    
                        echo '<script>
                        swal.fire({
                            type:"error",
                            title : "El Directivo no se actualizó",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "directivo";
                            }
                        })
        
                        </script>';
                    
                    
                }

            }
         }
     }

}