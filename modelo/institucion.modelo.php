<?php
require_once "conexion.php";

class ModeloInstitucion{
    static public function mdlGuardarInstitucion($tabla,$datos){
        if($datos['id_institucion'] == ""){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_institucion, razonSocial_institucion, ruc_institucion, slogan_institucion, direccion_institucion, email_institucion, telefono_institucion, rector_institucion, clave_seguridad) VALUES (?,?,?,?,?,?,?,?,?) ");
            $respuesta = $stmt->execute([$datos['nombre_institucion'],$datos['razon_social'],$datos['ruc_institucion'],$datos['slogan_institucion'],$datos['direccion_institucion'],$datos['email_institucion'],$datos['telefono_institucion'],$datos['rector_institucion'],$datos['clave_seguridad']]);
            if($respuesta == true){
                return 'ok';
            }else{
                return 'error';
            }
        }else{
             $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_institucion = ?, razonSocial_institucion = ?, ruc_institucion = ?, slogan_institucion = ?, direccion_institucion = ?, email_institucion = ?, telefono_institucion = ?, rector_institucion = ?, clave_seguridad = ? WHERE id_institucion = ?  ");
            $respuesta = $stmt->execute([$datos['nombre_institucion'],$datos['razon_social'],$datos['ruc_institucion'],$datos['slogan_institucion'],$datos['direccion_institucion'],$datos['email_institucion'],$datos['telefono_institucion'],$datos['rector_institucion'],$datos['clave_seguridad'],$datos['id_institucion']]);
            if($respuesta == true){
                return 'ok';
            }else{
                return 'error';
            }
        }
    }

    static public function MdlMostrarInstitucion($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
        $stmt -> execute();
        if($stmt->rowCount()>0){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return "vacio";
        }
        
    }

    static public function mdlGuardarPagina($tabla,$datos){
        if($datos['id_pagina'] == ""){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_pagina, nombre_logo) VALUES (?,?)");
            $respuesta = $stmt->execute([$datos['nombre_pag'],$datos['nombre_logo']]);
            
            if($respuesta == true){
                return 'ok';
            }else{
                return 'error';
            }
        }else{
             $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_pagina = ?, nombre_logo = ? WHERE id_configuracion = ?  ");
            $respuesta = $stmt->execute([$datos['nombre_pag'],$datos['nombre_logo'],$datos['id_pagina']]);
            if($respuesta == true){
                return 'ok';
            }else{
                return 'error';
            }
        }
    }

    static public function MdlMostrarPagina($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
        $stmt -> execute();
        if($stmt->rowCount()>0){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return "vacio";
        }
    }

    //
    static public function MdlMostrarCuentas($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
        $stmt -> execute();
        if($stmt->rowCount()>0){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return "vacio";
        }
    }
    static public function MdlMostrarBancos($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT nombre_banco FROM $tabla ");
        $stmt -> execute();
        if($stmt->rowCount()>0){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return "vacio";
        }
    }

    static public function MdlMostrarDatoCuenta($tabla,$idCuenta){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where idCuentas = $idCuenta ");
        $stmt -> execute();
        if($stmt->rowCount()>0){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }else{
            return "vacio";
        }
    }

    static public function mdlRegistrarcuenta($tabla,$datos){
        /*$consulta = Conexion::conectar()->prepare("SELECT cuentas FROM $tabla ");
        $consulta ->execute();
        $result =$consulta->fetch(PDO::FETCH_OBJ);
        $cuentas = $result->cuentas;
        if($cuentas != ""){
            $nCuentas = $cuentas."|".$dato;
            $dato = strval($nCuentas);
        }*/
        
        if($datos["cuenta_antigua"] != "")
        {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titular_cuenta = ?, nombre_banco=?, cci_cuenta=?, numero_cuenta=? WHERE idCuentas = ?");
            $respuesta = $stmt->execute([$datos['titular_cuenta'],$datos['banco_cuenta'],$datos['cci_cuenta'],$datos['cuenta'],$datos['cuenta_antigua']]);
        }
        else{
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titular_cuenta, nombre_banco, cci_cuenta, numero_cuenta) VALUES (?,?,?,?)");
            $respuesta = $stmt->execute([$datos['titular_cuenta'],$datos['banco_cuenta'],$datos['cci_cuenta'],$datos['cuenta']]);
        }
        //print_r($stmt->errorInfo());
        if($respuesta == true){
            return 'ok';
        }else{
            return 'error';
        }
    }

    static public function mdlActualizarCuenta($nCuenta,$aCuenta){
        $consulta = Conexion::conectar()->prepare("SELECT cuentas FROM configuracion ");
        $consulta ->execute();
        $result =$consulta->fetch(PDO::FETCH_OBJ);
        $cuentas = $result->cuentas;
        $nuevaCuenta ="";
        $datos = explode("|",$cuentas);
        
        foreach ($datos as $cuenta) {
            if($nuevaCuenta == ""){
                if($cuenta == $aCuenta){
                    $nuevaCuenta=$nCuenta;
                }else{
                    $nuevaCuenta =$cuenta;
                }
                
            }
            else if($cuenta == $aCuenta){
                $nuevaCuenta=$nuevaCuenta."|".$nCuenta;
                
            } else{
                $nuevaCuenta=$nuevaCuenta."|".$cuenta;
                
            }
            
        }
        $stmt = Conexion::conectar()->prepare("UPDATE configuracion SET cuentas = '$nuevaCuenta'");
        $respuesta = $stmt->execute();
        if($respuesta == true){
            return 'ok';
        }else{
            return 'error';
        }

    }

    static public function mdlEliminarCuenta($dCuenta){
       
        $stmt = Conexion::conectar()->prepare("DELETE FROM cuentas WHERE idcuentas = $dCuenta");
        $respuesta = $stmt->execute();
        //print_r($stmt->errorInfo());
        if($respuesta == true){
            return 'ok';
        }else{
            return 'error';
        }

    }

    static public function mdlDatosCulqui($llave,$titulo,$llave_publica,$comision_culqi){
        $stmt = Conexion::conectar()->prepare("UPDATE configuracion SET titulo_culqui = ?, llave_culqui = ?, llave_publica = ?, comision_culqi=?");
        $respuesta = $stmt->execute([$titulo,$llave,$llave_publica,$comision_culqi]);
        if($respuesta == true){
            return 'ok';
        }else{
            return 'error';
        }
    }

    static public function mdlDatosPaypal($titulo_paypal,$url_paypal,$comision_paypal){
        $stmt = Conexion::conectar()->prepare("UPDATE configuracion SET titulo_paypal = ?, url_paypal = ?, comision_paypal = ?");
        $respuesta = $stmt->execute([$titulo_paypal,$url_paypal,$comision_paypal]);
        if($respuesta == true){
            return 'ok';
        }else{
            return 'error';
        }
    }

    static public function MdlInformacionPago($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
        $stmt -> execute();
        if($stmt->rowCount()>0){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return "vacio";
        }
        
    }

    static public function MdlEstadoCulqi($estado){
        $estado = ($estado == '0')?'1':'0';
        $stmt = Conexion::conectar()->prepare("UPDATE configuracion SET estado_culqi = $estado");
        $respuesta = $stmt -> execute();
        if($respuesta == true){
            return 'ok';
        }else{
            return 'error';
        }
        
    }

    static public function MdlEstadoPaypal($estado){
        $estado = ($estado == '0')?'1':'0';
        $stmt = Conexion::conectar()->prepare("UPDATE configuracion SET estado_paypal = $estado");
        $respuesta = $stmt -> execute();
        if($respuesta == true){
            return 'ok';
        }else{
            return 'error';
        }
        
    }
}