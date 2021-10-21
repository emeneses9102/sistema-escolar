<?php

require_once "conexion.php";

class ModeloUsuarios{

    //MostrarUsuarios
    static public function mdlMostrarUsuarios($tabla,$item,$valor){
        
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla as u 
            INNER JOIN 
            rol as r ON u.rol = r.rol_id 
            /*LEFT JOIN
            alumno AS a ON a.id_usuario = u.usuario_id*/
            WHERE u.$item =:$item AND u.estado !=0");
            $stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
            $stmt -> execute();
           //print_r($stmt->errorInfo());
            return $stmt->fetch();
            
        }
        else
        {//usamos esta consulta para listar todos los usuarios
            $stmt = Conexion::conectar()->prepare("SELECT * from $tabla AS u 
            INNER JOIN 
            rol AS r ON u.rol = r.rol_id
            LEFT JOIN
            alumno AS a ON a.id_usuario = u.usuario_id
            ORDER BY u.usuario_id asc
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
            $stmt -> execute();
            
            return $stmt->fetchAll();
            
        }
        
        
    }
   
    
    static public function mdlIngresarUsuarios($tabla,$datos,$datos_apoderado){
        //validamos usuario
        $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuarios WHERE nombre = ? AND apellidos = ? ');
        $consultaID->execute([$datos['nombre'], $datos['apellidos']]);
        $result= $consultaID->fetch(PDO::FETCH_OBJ);
        if($result > 0){
            return 'repet';
        }
        
        $stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla(nombre,apellidos,direccion,correo,telefono_fijo,celular,dni,fecha_nacimiento,nacionalidad,usuario,clave,rol,estado,foto) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listRol'],$datos['listEstado'],$datos['foto']]);
        
        
        if($datos_apoderado != 'empty'){
            $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuarios WHERE usuario = ?');
            $consultaID->execute([$datos['usuario']]);
            $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);

           
            $query = Conexion::conectar()->prepare ("INSERT INTO alumno(ocupacion,tipo_responsable, nombre_responsable,apellido_responsable, dni_responsable, correo_responsable, telefono_responsable, direccion_responsable,id_usuario) VALUES (?,?,?,?,?,?,?,?,?)");

            $respuesta2= $query->execute([$datos_apoderado['ocupacion-ap'],$datos_apoderado['tipo-ap'],$datos_apoderado['nombre-ap'],$datos_apoderado['apellidos-ap'],$datos_apoderado['dni-ap'],$datos_apoderado['correo-ap'],$datos_apoderado['telefono-ap'],$datos_apoderado['direccion-ap'],$resultConsulta->usuario_id]);

            if($respuesta == true && $respuesta2 == true)
            {
                return "ok";
            }
            else{
                return "error";
            }
        }
        
        
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

    static public function mdlEditarUsuarios($tabla,$datos,$datos_apoderado){
        $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET nombre = ?, apellidos = ?, direccion = ?, correo = ?, telefono_fijo = ?, celular = ?, dni = ?,fecha_nacimiento= ? ,nacionalidad = ?, usuario = ?, clave = ?, rol = ?, estado = ?, foto = ? WHERE usuario_id = ?");
        $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listRol'],$datos['listEstado'],$datos['foto'],$datos['idusuario']]);
        
        
        if($datos_apoderado != 'empty'){
            $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuarios WHERE usuario_id = ?');
            $consultaID->execute([$datos['idusuario']]);
            $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);
            //Validamos si existe algun apoderado
            $consultaAp = Conexion::conectar()->prepare('SELECT * FROM alumno WHERE id_usuario = ?');
            $consultaAp->execute([$datos['idusuario']]);
            $rConsulta= $consultaAp->fetch(PDO::FETCH_OBJ);
          
            if($consultaAp->rowCount()>0)
            {
                
                $query = Conexion::conectar()->prepare ("UPDATE alumno SET ocupacion = ?, tipo_responsable = ?, nombre_responsable = ?, apellido_responsable = ?, dni_responsable = ?, correo_responsable = ?, telefono_responsable = ?, direccion_responsable = ? WHERE id_usuario = ?");

                $respuesta2= $query->execute([$datos_apoderado['ocupacion-ap'],$datos_apoderado['tipo-ap'],$datos_apoderado['nombre-ap'],$datos_apoderado['apellidos-ap'],$datos_apoderado['dni-ap'],$datos_apoderado['correo-ap'],$datos_apoderado['telefono-ap'],$datos_apoderado['direccion-ap'],$resultConsulta->usuario_id]);

                if($respuesta == true && $respuesta2 == true)
                {
                    return "ok";
                }
                else{
                    return "error";
                }
            }else{
                $query = Conexion::conectar()->prepare ("INSERT INTO alumno(ocupacion,tipo_responsable, nombre_responsable,apellido_responsable, dni_responsable, correo_responsable, telefono_responsable, direccion_responsable,id_usuario) VALUES (?,?,?,?,?,?,?,?,?)");

                $respuesta2= $query->execute([$datos_apoderado['ocupacion-ap'],$datos_apoderado['tipo-ap'],$datos_apoderado['nombre-ap'],$datos_apoderado['apellidos-ap'],$datos_apoderado['dni-ap'],$datos_apoderado['correo-ap'],$datos_apoderado['telefono-ap'],$datos_apoderado['direccion-ap'],$resultConsulta->usuario_id]);

                if($respuesta == true && $respuesta2 == true)
                {
                    return "ok";
                }
                else{
                    return "error";
                }
            }

            
            
        }
        
        
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

    static public function mdlDescativarUsuario($valor,$tabla){
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
