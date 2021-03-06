<?php

require_once "conexion.php";

class ModeloAdm{

    //MostrarUsuarios
    static public function mdlMostrarAdm($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla as u 
            INNER JOIN 
            rol as r ON u.rol = r.rol_id 
            WHERE u.$item =:$item AND u.estado !=0");
            $stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
            $stmt -> execute();
           
            return $stmt->fetch();
            
        }
        else
        {//usamos esta consulta para listar todos los usuarios
            $stmt = Conexion::conectar()->prepare("SELECT * from $tabla AS u 
            INNER JOIN 
            rol AS r ON u.rol = r.rol_id
            WHERE  u.rol = 2
            ORDER BY u.usuario_id asc
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
            $stmt -> execute();
            
            return $stmt->fetchAll();
            
        }
        
        
    }
   
    
    static public function mdlIngresarAdm($tabla,$datos){
        //validamos usuario
        $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE dni = ? OR usuario = ? ');
        $consultaID->execute([$datos['dni'], $datos['usaurio']]);
        $result= $consultaID->fetch(PDO::FETCH_OBJ);
        if($result > 0){
            return 'repet';
        }
        
        $stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla(nombres,apellidos,direccion,correo,telefono_fijo,celular,dni,fecha_nacimiento,nacionalidad,usuario,clave,rol,estado,foto) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listRol'],$datos['listEstado'],$datos['foto']]);
        //print_r($stmt->errorInfo());

        if($respuesta == true)
        {
            return "ok";
        }
        else{
            return "error";
        }
        $respuesta->close();
        $respuesta =null;
    }

    static public function mdlEditarAdm($tabla,$datos){
        $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET nombres = ?, apellidos = ?, direccion = ?, correo = ?, telefono_fijo = ?, celular = ?, dni = ?,fecha_nacimiento= ? ,nacionalidad = ?, usuario = ?, clave = ?, rol = ?, estado = ?, foto = ? WHERE usuario_id = ?");
        $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listRol'],$datos['listEstado'],$datos['foto'],$datos['idusuario']]);
        
        
        
        
        
        if($respuesta == true)
        {
            return "ok";
        }
        else{
            return "error";
        }
        $respuesta->close();
        $respuesta =null;
    }

    static public function mdlDescativarAdm($valor,$tabla){
        $estado = 2;
        
        $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET estado = ?  WHERE usuario_id = ?");
        $respuesta = $stmt->execute([$estado,$valor]);
        
        if($respuesta == true)
        {
            return "ok";
        }
        else{
            return "error";
        }
        $respuesta->close();
        $respuesta =null;
    }

}
