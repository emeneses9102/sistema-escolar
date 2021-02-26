<?php
require_once "conexion.php";

class ModeloInstitucion{
    static public function mdlGuardarInstitucion($tabla,$datos){
        if($datos['id_institucion'] == ""){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_institucion, razonSocial_institucion, ruc_institucion, slogan_institucion, direccion_institucion, email_institucion, telefono_institucion, rector_institucion) VALUES (?,?,?,?,?,?,?,?) ");
            $respuesta = $stmt->execute([$datos['nombre_institucion'],$datos['razon_social'],$datos['ruc_institucion'],$datos['slogan_institucion'],$datos['direccion_institucion'],$datos['email_institucion'],$datos['telefono_institucion'],$datos['rector_institucion']]);
            if($respuesta == true){
                return 'ok';
            }else{
                return 'error';
            }
        }else{
             $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_institucion = ?, razonSocial_institucion = ?, ruc_institucion = ?, slogan_institucion = ?, direccion_institucion = ?, email_institucion = ?, telefono_institucion = ?, rector_institucion = ? WHERE id_institucion = ?  ");
            $respuesta = $stmt->execute([$datos['nombre_institucion'],$datos['razon_social'],$datos['ruc_institucion'],$datos['slogan_institucion'],$datos['direccion_institucion'],$datos['email_institucion'],$datos['telefono_institucion'],$datos['rector_institucion'],$datos['id_institucion']]);
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
            return $stmt->fetch();
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
            return $stmt->fetch();
        }else{
            return "vacio";
        }
    }
}