<?php

class ControladorMailPagoPendiente{
    static public function ctrEnviarMail(){
        
       if(isset($_POST['alumno'])){
        $sDe="edgarmc11@hotmail.com";
        $sAsunto="VOUCHER DE PAGO";
        $sPara="edgarmc9102@gmail.com";
        $sTexto="Los datos introducidos en el formulario son:\n\n";


        $bHayFicheros = 0;
        $sCabeceraTexto = "";
        $sAdjuntos = "";
        $sTexto1 = "";
        $sTexto .= "LOS DATOS DEL ALUMNO SON:\n";
    
        if ($sDe)$sCabeceras = "From:".$sDe."\n";
        else $sCabeceras = "";
        $sCabeceras .= "MIME-version: 1.0\n";
    
        foreach ($_POST as $sNombre => $sValor){
        $sTexto1 = $sTexto1."\n".$sNombre." = ".$sValor; }
        $sTexto .= $sTexto1;
    
        

        foreach($_FILES["archivo1"]['tmp_name'] as $key => $tmp_name)
        {  
            
            $filename = $_FILES["archivo1"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo1"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            $tipo1 = $_FILES["archivo1"]["type"][$key];
            $size1 = $_FILES["archivo1"]["size"][$key];

        array_push ( $array , $valor1 );
                
            
                    if ($bHayFicheros == 0){
                        $bHayFicheros = 1;
                        $sCabeceras .= "Content-type: multipart/mixed;";
                        $sCabeceras .= "boundary=\"--_Separador-de-mensajes_--\"\n";
    
                        $sCabeceraTexto = "----_Separador-de-mensajes_--\n";
                        $sCabeceraTexto .= "Content-type: text/plain;charset=iso-8859-1\n";
                        $sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n";
    
                        $sTexto = $sCabeceraTexto.$sTexto;
                    }
                    if ($size1 > 0){
                        $sAdjuntos .= "\n\n----_Separador-de-mensajes_--\n";
                        $sAdjuntos .= "Content-type: ".$tipo1.";name=\"".$filename."\"\n";;
                        $sAdjuntos .= "Content-Transfer-Encoding: BASE64\n";
                        $sAdjuntos .= "Content-disposition: attachment;filename=\"".$filename."\"\n\n";
    
                        $oFichero = fopen($source, 'r');
                        $sContenido = fread($oFichero, filesize($source));
                        $sAdjuntos .= chunk_split(base64_encode($sContenido));
                        fclose($oFichero);
                    }
            
    
        }
        foreach($_FILES["archivo1"]['tmp_name'] as $key => $tmp_name){
            $filename2 = $_FILES["archivo1"]["name"][$key];
            $tipo2 = $_FILES["archivo1"]["type"][$key];
            if(empty($filename2)){
                echo '<script>
                swal.fire({
                    type:"error",
                    title : "Cargue una imagen ",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "pagosPendientes";
                    }
                })
    
                </script>';
            }else{
                if(!($tipo2 == "image/jpg" || $tipo2 == "image/jpeg" || $tipo2 == "image/png" || $tipo2 == "application/pdf")){
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
                }else {
                    if ($bHayFicheros){
                        $sTexto .= $sAdjuntos."\n\n----_Separador-de-mensajes_----\n";
                        if(mail($sPara, $sAsunto, $sTexto, $sCabeceras)){
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
                        }
                        else{
                            echo '<script>
                            swal.fire({
                                type:"error",
                                title : "error al enviar :(",
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
    
            }
    
        }
       }else{
            return;
       }
       
    }


}


