<?php
class ControladorAlumnos{

    /* Método para ingresar  */
    static public function ctrIngresoAlumno(){
        if(isset($_POST['ingUsuario'])){
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['ingUsuario']) && 
            preg_match('/^[a-zA-Z0-9]+$/',$_POST['ingPass'])){

                $tabla = "usuarios";
                $encriptar=$_POST['ingPass'];
                $item = "usuario";
                $valor = $_POST['ingUsuario'];
                
                $respuesta = ModeloAlumnos::MdlMostrarAlumnos($tabla, $item, $valor);
                //var_dump($respuesta);
                if($respuesta == 0){
                    echo '<div class="alert alert-danger">Error al ingresar, vuelva a intentarlo</div>';
                }else{
                    if($respuesta['usuario'] == $_POST['ingUsuario'] && password_verify($encriptar, $respuesta['clave']) && $respuesta['estado'] == 1){
                        $_SESSION['iniciarSesion'] = 'ok';
                        $_SESSION['nombre']= $respuesta['nombre'];
                        $_SESSION['apellidos']= $respuesta['apellidos'];
                        $_SESSION['usuario']= $respuesta['usuario'];
                        $_SESSION['nombre_rol']=$respuesta['nombre_rol'];
                        $_SESSION['foto']= $respuesta['foto'];
                        
                        header('Location: inicio');
                    }else{
                        if($respuesta['estado'] == 2 ){
                            echo '<div class="text-danger mt-2">*Usuario inactivo</div>';
                        }else{
                            echo '<div class="text-danger mt-2">*Usuario o contraseña incorrecta</div>';
                        }
                        
                    }
                }
            }
        }
    }
    
     //Crear Usuario
     static public function ctrCrearAlumno(){
        
        if(isset($_POST['usuario'])){
            
            if(preg_match('/^[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+$/',$_POST['nombre']) &&
            preg_match('/^[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+$/',$_POST['apellidos'])&&
            preg_match('/^[a-zA-Z0-9]+$/',$_POST['usuario']) && 
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
                 if($_POST['dateAlumno'] == 0){
                    $_POST['dateAlumno']= NULL;
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
                                "fecha_nacimiento" => $_POST['dateAlumno'],
                                "foto"=>$ruta);
                
               
                if(isset($_POST['nombre-ap']) && !empty($_POST['nombre-ap'])){

                    $datos_apoderado = array("nombre-ap" => $_POST['nombre-ap'],
                                            "apellidos-ap" => $_POST['apellidos-ap'],
                                            "direccion-ap" => $_POST['direccion-ap'],
                                            "telefono-ap" => $_POST['telefono-ap'],
                                            "correo-ap"=> $_POST['correo-ap'],
                                            "tipo-ap"=> $_POST['tipo-ap'],
                                            "dni-ap" => $_POST['dni-ap'],
                                            "ocupacion-ap" => $_POST['ocupacion-ap']);
                                            
                                           

                }else{
                    $datos_apoderado = 'empty';
                }

                $respuesta = ModeloAlumnos :: mdlIngresarAlumnos($tabla,$datos,$datos_apoderado);
                //var_dump($respuesta);
                

                if($respuesta == "ok"){
                    echo '<script>
                    swal.fire({
                        type:"success",
                        title : "El usuario ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        if(result.value){
                            window.location = "alumnos";
                        }
                    })
    
                    </script>';
                }
                else{
                    if($respuesta == "repet"){
                        echo '<script>
                        swal.fire({
                            type:"error",
                            title : "El alumno ya existe",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "alumnos";
                            }
                        })
        
                        </script>';
                    }else{
                        echo '<script>
                        swal.fire({
                            type:"error",
                            title : "El usuario no se registró",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "alumnos";
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
                    title : "El usuario no puede ir vacío o llevar caracteres especiales",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "alumnos";
                    }
                })

                </script>';
            }
        }
    }
     //Mostrar usuario
     static public function ctrMostrarAlumno($item,$valor){
        $tabla = "usuario";

        $respuesta = ModeloAlumnos::MdlMostrarAlumnos($tabla, $item, $valor);
        //var_dump($respuesta);
        return $respuesta;
     }

     //Editar usuario
     static public function ctrEditarAlumnos(){
         if(isset($_POST['idusuario'])){
            if(preg_match('/^[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+$/',$_POST['editNombre'])){
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
                                    window.location = "alumnos";
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
                
               
                if(isset($_POST['editNombre-ap']) && !empty($_POST['editNombre-ap'])){
                    $datos_apoderado = array("nombre-ap" => $_POST['editNombre-ap'],
                                            "apellidos-ap" => $_POST['editApellidos-ap'],
                                            "direccion-ap" => $_POST['editDireccion-ap'],
                                            "telefono-ap" => $_POST['editTelefono-ap'],
                                            "correo-ap"=> $_POST['editCorreo-ap'],
                                            "tipo-ap"=> $_POST['editTipo-ap'],
                                            "dni-ap" => $_POST['editDni-ap'],
                                            "ocupacion-ap" => $_POST['editOcupacion-ap']);
                                            
                                           

                }else{
                    $datos_apoderado = 'empty';
                }

                $respuesta = ModeloAlumnos :: mdlEditarAlumnos($tabla,$datos,$datos_apoderado);
                var_dump($respuesta);
                if($respuesta == "ok"){
                    echo '<script>
                    swal.fire({
                        type:"success",
                        title : "El usuario ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        if(result.value){
                            window.location = "alumnos";
                        }
                    })
    
                    </script>';
                    if($_SESSION['usuario'] ==$_POST['editUsuario'] ){
                        $_SESSION['foto'] =$ruta;
                    }
                    
                }else if($respuesta == "repet-dni"){
                    echo '<script>
                        swal.fire({
                            type:"error",
                            title : "El apoderado ya se encuentra registrado",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "alumnos";
                            }
                        })
        
                        </script>';
                }
                else{
                    
                        echo '<script>
                        swal.fire({
                            type:"error",
                            title : "El usuario no se actualizó",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "alumnos";
                            }
                        })
        
                        </script>';
                    
                    
                }

            }
         }
     }

     static public function ctrMostrarDatoAlumno($valor){
        $tabla="usuario";
        $respuesta = ModeloAlumnos::mdlMostrarDatoAlumno($valor,$tabla);
        return $respuesta;
     }


     static public function ctrEditarAlumnosPerfil(){

        if(isset($_FILES['cargarfotoperfil'])){
            $archivo = $_FILES['cargarfotoperfil']; 
            $nombre_archivo = $archivo['name'];
            $archivo1=$archivo['tmp_name'];
            $tipo = $archivo['type'];
        }
        if(isset($_POST['idusuarioalumno'])){
            if(!($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "")){
                echo '<script>
                swal.fire({
                    type:"error",
                    title : "Cargar en formato png, jpeg o jpg",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "perfilAlumno";
                    }
                })
                </script>';
                //echo '<script>alert("error");</script>';
             }else{
            if(preg_match('/^[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+$/',$_POST['nombre2'])){
                    
                    $ruta=$_POST['nombreAnterior'];
                    
                    if(!(empty($nombre_archivo))){
                       
                    $directorio = "vista/images/usuarios/".$_POST["usuario2"];
                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0777, true);
                        echo "<script>console.log('Se creó una carpeta para alojar los comprobantes');</script>";
                    }
                    if(!empty($_POST['nombreAnterior'])){
                        echo '<script>alert('.$_POST['nombreAnterior'].')</script>';
                        unlink($_POST['nombreAnterior']);
                     }else{
                         mkdir($directorio, 0755);
                     }
                     $porciones = explode("/",$tipo);
                     $extension=$porciones[1];
                     
                     
                        $aleatorio = mt_rand(100,999);
                        $ruta = $directorio."/".$aleatorio.".".$extension;
                        move_uploaded_file($archivo1, $ruta);
                     }


                     if(isset($_POST['clave2']) && !empty($_POST['clave2'])){
                        if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['clave2'])){
                            $encriptar=password_hash($_POST['clave2'],PASSWORD_DEFAULT);
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
                                    window.location = "perfilAlumno";
                                }
                            })

                            </script>';
                    }
                    }else{
                        $encriptar = $_POST['clave3'];
                    }
                    if($_POST['date2'] == 0){
                        $_POST['date2']= NULL;
                    }

                     $datos = array("nombre" => $_POST['nombre2'],
                                "idusuario" => $_POST['idusuarioalumno'],
                                "apellidos" => $_POST['apellidos2'],
                                "direccion" => $_POST['direccion2'],
                                "telefono" => $_POST['telefono2'],
                                "celular" => $_POST['celular2'],
                                "dni" => $_POST['dni2'],
                                "usuario" => $_POST['usuario2'],
                                "clave" => $encriptar,
                                "listRol" => $_POST['listRol2'],
                                "listEstado" => $_POST['listEstado2'],
                                "nacionalidad" => $_POST['nacionalidad2'],
                                "fecha_nacimiento" => $_POST['date2'],
                                "foto"=>$ruta);

                            if(isset($_POST['dni-ap']) && !empty($_POST['dni-ap'])){
                                    $datos_apoderado = array("nombre-ap" => $_POST['nombre-ap'],
                                                            "apellidos-ap" => $_POST['apellidos-ap'],
                                                            "direccion-ap" => $_POST['direccion-ap'],
                                                            "telefono-ap" => $_POST['telefono-ap'],
                                                            "correo-ap"=> $_POST['correo-ap'],
                                                            "tipo-ap"=> $_POST['tipo-ap'],
                                                            "dni-ap" => $_POST['dni-ap'],
                                                            "ocupacion-ap" => $_POST['profesion-ap']);
                                                            
                                                           
                
                            }else{
                                    $datos_apoderado = 'empty';
                            }

                    $tabla = "usuario";
                    $respuesta = ModeloAlumnos :: mdlEditarDatosAlumnoPerfil($tabla,$datos,$datos_apoderado);
                    var_dump($respuesta);

                    if($respuesta == "ok"){
                        echo '<script>
                        swal.fire({
                            type:"success",
                            title : "El usuario ha sido editado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "perfilAlumno";
                            }
                        })
        
                        </script>';
                    }else if($respuesta == "repet-dni"){
                            echo '<script>
                                swal.fire({
                                    type:"error",
                                    title : "El apoderado ya se encuentra registrado",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "perfilAlumno";
                                    }
                                })
                
                                </script>';
                        }
                        else{
                            
                                echo '<script>
                                swal.fire({
                                    type:"error",
                                    title : "El usuario no se actualizó",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "perfilAlumno";
                                    }
                                })
                
                                </script>';
                            
                            
                        }
                    }
        }}
     }
}