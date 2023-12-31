<?php

class ControladorMailPagoPendiente
{
    static public function ctrEnviarMail()
    {

        if (isset($_FILES['archivo1'])) {
            $archivo = $_FILES['archivo1'];
            $nombre_archivo = $archivo['name'];
            $archivo1 = $archivo['tmp_name'];
            $tipo = $archivo['type'];
        }

        $asunto = "VOUCHER DE PAGO";
        $mensaje = "LOS DATOS DEL ALUMNO SON:<br><br>";

        if (isset($_POST['codigo_alu'])) {
            $CodigoAlu = $_POST['codigo_alu'];
        }

        if (isset($_POST['grado_seccion'])) {
            $gradoseccion = $_POST['grado_seccion'];
        }

        if (isset($_POST['detalle'])) {
            $detallecor = $_POST['detalle'];
        }

        if (isset($_POST['notas'])) {
            $notas = $_POST['notas'];
        }

        if (isset($_POST['dniCodigoPago'])) {
            $dniCodigoPago = $_POST['dniCodigoPago'];
        }

        if (isset($_POST['codigoPago'])) {
            $codigoPago = $_POST['codigoPago'];
        }

        if (isset($_POST['ctasBancarias'])) {
            $banco = $_POST['ctasBancarias'];
        }



        $fecha = date("dmYHi");
        $numeroramdon = rand(0, 9);

        $fechaActual = date("Y-m-d");
        $tipago = 'Depósito';

        $horaActual = date("H-i-s");


        if (isset($_POST['alumno'])) {

            $alumnoa = $_POST['alumno'];

            $mensaje .= "Alumno : " . $alumnoa . "<br>";
            $mensaje .= "Código alumno : " . $CodigoAlu . "<br>";
            $mensaje .= "Detalle de pago : " . $detallecor . "<br>";
            $mensaje .= "Grado y Sección : " . $gradoseccion . "<br>";
            $mensaje .= "Notas : " . $notas . "<br>";

            if (empty($nombre_archivo)) {
                echo '<script>
            swal.fire({
                type:"error",
                title : "Cargue una imagen",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: false
            }).then((result)=>{
                if(result.value){
                    window.location = "pagosPendientes";
                }
            })

            </script>';
            } else {
                if (!($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "application/pdf")) {
                    echo '<script>
                swal.fire({
                    type:"error",
                    title : "Cargar en formato png, jpeg o jpg",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "pagosPendientes";
                    }
                })

                </script>';
                } else {

                    /******************************** */
                    $porciones = explode("/", $tipo);
                    $extension = $porciones[1];

                    //$directorio='./colegio/upload/2021/2021-03';//Declaramos un  variable con la ruta donde guardaremos los archivos

                    //Validamos si la ruta de destino existe, en caso de no existir la creamos

                    $fecha0 = date("Y");
                    $fecha1 = date("Y-m");
                    $directorio = './colegio/upload/' . $fecha0 . '/' . $fecha1;

                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0777, true);
                        echo "<script>console.log('Se creó una carpeta para alojar los comprobantes');</script>";
                    }
                    /*if(!file_exists($directorio)){
           mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
       }*/

                    $dir = opendir($directorio); //Abrimos el directorio de destino
                    $target_path = $directorio . '/' . $dniCodigoPago . '_' . $fechaActual . '_' . $horaActual . '.' . $extension; //Indicamos la ruta de destino, así como el nombre del archivo

                    if (move_uploaded_file($archivo1, $target_path)) {

                        //configurar el correo
                        $mostrarDatos_inst = new ControladorInstitucion();
                        $respuesta = $mostrarDatos_inst->ctrMostrarDatos_Inst();
                        if ($respuesta["email_institucion"] == "" || $respuesta["email_institucion"] == null) {
                            $correo = "edgarmc11@hotmail.com";
                        }else{
                            $correo = $respuesta["email_institucion"];
                        }
                        $to = $correo;

                        //remitente del correo
                        $from = $correo;
                        $fromName = 'VOUCHER DE PAGO';

                        //Asunto del email
                        $asunto = "VOUCHER DE PAGO";

                        //Ruta del archivo adjunto
                        $file = $target_path;

                        //Contenido del Email
                        $htmlContent = '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head><body><p>' . $mensaje . '</p></body>';

                        //Encabezado para información del remitente
                        $headers = "From: " . $fromName . " <" . $from . ">";

                        //Limite Email
                        $semi_rand = md5(time());
                        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

                        //Encabezados para archivo adjunto 
                        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

                        //límite multiparte
                        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";



                        //preparación de archivo
                        if (!empty($file) > 0) {
                            if (is_file($file)) {
                                $message .= "--{$mime_boundary}\n";
                                $fp =    @fopen($file, "rb");
                                $data =  @fread($fp, filesize($file));

                                @fclose($fp);
                                $data = chunk_split(base64_encode($data));
                                $message .= "Content-Type: application/octet-stream; name=\"" . basename($file) . "\"\n" .
                                    "Content-Description: " . basename($files[$i]) . "\n" .
                                    "Content-Disposition: attachment;\n" . " filename=\"" . basename($file) . "\"; size=" . filesize($file) . ";\n" .
                                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                            }
                        }
                        $message .= "--{$mime_boundary}--";
                        $returnpath = "-f" . $from;


                        $respuesta = ModelosubirImagen::MdlSubirImagen($target_path, $fechaActual, $tipago, $codigoPago, $notas, $banco);

                        if ($respuesta == "ok") {

                            if (mail($to, $asunto, $message, $headers, $returnpath)) {


                                echo '<script>
                                        swal.fire({
                                            type:"success",
                                            title : "Voucher enviado exitosamente!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar",
                                            closeOnConfirm: false
                                        }).then((result)=>{
                                            if(result.value){
                                                window.location = "pagosPendientes";
                                            }
                                        })

                                        </script>';
                            } else {
                                echo '<script>
                                        swal.fire({
                                        type:"error",
                                        title : "error al enviar!",
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
                        } else {

                            echo '<script>
                        swal.fire({
                            type:"error",
                            title : "error al guardar imagen en bd - ' . $estado . ' - ' . $target_path . ' - ' . $fechaActual . ' - ' . $tipago . ' - ' . $codigoPago . '",
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


                        //Enviar EMail


                    } else {
                        echo '<script>
                swal.fire({
                    type:"error",
                    title : "error al almacenar imagen",
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
                }
            }
        } else {
            return;
        }
        /******************************** */
    }
}
