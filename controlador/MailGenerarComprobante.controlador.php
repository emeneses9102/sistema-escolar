<?php 
class ControladorMailGenerarComprobante{
    static public function ctrEnviarMailComprobante(){
        if(isset($_FILES['archivocomprobante'])){
            $archivo = $_FILES['archivocomprobante']; 
            $nombre_archivo = $archivo['name'];
            $archivo1=$archivo['tmp_name'];
            $tipo = $archivo['type'];
        }

        $asunto="VOUCHER DE PAGO";
        $mensaje = "DATOS DEL VOUCHER:"."<br><br>";

        if(isset($_POST['nombresapoderado'])){
            $nombresapoderado=$_POST['nombresapoderado'];
        }

        if(isset($_POST['detallemensualidad'])){
            $detallemensualidad=$_POST['detallemensualidad'];
        }

        if(isset($_POST['montomensualidad'])){
            $montomensualidad=$_POST['montomensualidad'];
        }

        if(isset($_POST['montomensualidad'])){
            $montomensualidad=$_POST['montomensualidad'];
        }

        if(isset($_POST['correoapoderado'])){
            $correoapoderado=$_POST['correoapoderado'];
        }

        if(isset($_POST['idalumnocobroscomprobante'])){
            $idalumnocobroscomprobante=$_POST['idalumnocobroscomprobante']; 
        }


        $fecha=date("dmYHi");
        $numeroramdon=rand(0,9);

        $fechaActual=date("Y-m-d");

        $horaActual=date("H-i-s");

        if(isset($_POST['dniapoderado'])){
            $dniapoderado=$_POST['dniapoderado'];

        $mensaje .="Datos de apoderado : ".$nombresapoderado."<br>";
        $mensaje .="DNI : ".$dniapoderado."<br>";
        $mensaje .="Detalle de pago : ".$detallemensualidad."<br>";
        $mensaje .="Monto : ".$montomensualidad."<br>";
        
        if(empty($nombre_archivo)){
            echo '<script>
            swal.fire({
                type:"error",
                title : "Cargue una imagen",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: false
            }).then((result)=>{
                if(result.value){
                    window.location = "listaDeuda";
                }
            })
            </script>';
        }else{
            if(!($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "application/pdf")){
                echo '<script>
                swal.fire({
                    type:"error",
                    title : "Cargar en formato png, jpeg o jpg",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "listaDeuda";
                    }
                })

                </script>';
            }else {
                $porciones = explode("/",$tipo);
                $extension=$porciones[1];
                $fecha0=date("Y");
                $fecha1=date("Y-m");
                $directorio = './colegio/comprobantes/'.$fecha0.'/'.$fecha1;

                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777, true);
                    echo "<script>console.log('Se creó una carpeta para alojar los comprobantes');</script>";
                }

                $dir=opendir($directorio); //Abrimos el directorio de destino
                $target_path = $directorio.'/'.$dniapoderado.'_'.$fechaActual.'_'.$horaActual.'.'.$extension; 

                if(move_uploaded_file($archivo1, $target_path)) {
                    $to = $correoapoderado.'';

                    //remitente del correo
                    $from = 'jhobyllstephany.2012@gmail.com';
                    $fromName='COMPROBANTE DE PAGO';

                    $file = $target_path;

                    //Contenido del Email
                    $htmlContent = '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head><body><p>'.$mensaje.'</p></body>';

                    //Encabezado para información del remitente
                    $headers = "From: ".$fromName." <".$from.">";

                    //Limite Email
                    $semi_rand = md5(time()); 
                    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

                    //Encabezados para archivo adjunto 
                    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

                    //límite multiparte
                    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

                    //preparación de archivo
                    if(!empty($file) > 0){
                        if(is_file($file)){
                            $message .= "--{$mime_boundary}\n";
                            $fp =    @fopen($file,"rb");
                            $data =  @fread($fp,filesize($file));

                            @fclose($fp);
                            $data = chunk_split(base64_encode($data));
                            $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
                            "Content-Description: ".basename($files[$i])."\n" .
                            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
                            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                        }
                    }
                    $message .= "--{$mime_boundary}--";
                    $returnpath = "-f" . $from;

                    $respuesta = ModelosubirImagen::MdlSubirImagenComprobante($target_path, $idalumnocobroscomprobante);

                    if ($respuesta == "ok"){


                    if(mail($to, $asunto, $message, $headers, $returnpath)){

                        echo '<script>
                        swal.fire({
                            type:"success",
                            title : "Comprobante enviado exitosamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "listaDeuda";
                            }
                        })
                        </script>'; 

                    }else{
            
                        
                        echo '<script>
                                swal.fire({
                                type:"error",
                                            title : "error al enviar",
                                 showConfirmButton: true,
                                            confirmButtonText: "Cerrar",
                                            closeOnConfirm: false
                                        }).then((result)=>{
                                            if(result.value){
                                                window.location = "listaDeuda";
                                            }
                                        })
                        
                                        </script>';
                    }
                }else{
                    echo '<script>
                        swal.fire({
                            type:"error",
                            title : "error al guardar imagen en bd - '.$estado.' - '.$target_path.' - '.$fechaActual.' - '.$tipago.' - '.$codigoPago.'",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "pagosPendientes";
                            }
                        })

                        </script>';
                }
        //Asunto del email
        $asunto="VOUCHER DE PAGO";
                }else {	
                echo '<script>
                swal.fire({
                    type:"error",
                    title : "error al almacenar imagen",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "listaDeuda";
                    }
                })

                </script>';
    }
            }
        }
        
        }
        else{
            return;
       }
    }
}
?>