<?php

require_once "conexion.php";

class ModeloProfesores{

    //MostrarUsuarios
    static public function mdlMostrarProfesores($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS u
            INNER JOIN rol AS r
            ON r.rol_id = u.rol
            INNER JOIN profesor AS p
            ON u.usuario_id = p.id_usuario
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
            LEFT JOIN
            profesor AS a ON a.id_usuario = u.usuario_id
            WHERE u.rol = 3
            ORDER BY u.usuario_id asc
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
            $stmt -> execute();
            
            return $stmt->fetchAll();
            
        }
        
        
    }
   
    
    static public function mdlIngresarProfesores($tabla,$datos){
        //validamos usuario
        $consultaID = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE dni = ? OR usuario = ?");
        $consultaID->execute([$datos['dni'],$datos['usuario']]);
        $result= $consultaID->fetch(PDO::FETCH_OBJ);
        if($result > 0){
            return 'repet';
        }
        
         //realizamor el insert del usuario
         $stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla(nombres,apellidos,direccion,correo,telefono_fijo,celular,dni,fecha_nacimiento,nacionalidad,usuario,clave,rol,estado,foto) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
         $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listRol'],$datos['listEstado'],$datos['foto']]);
         
         //hacemos la consulta para obtener el id
         $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE usuario = ?');
         $consultaID->execute([$datos['usuario']]);
         $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);

        
         if($respuesta == true)
         {
            //realizamos el insert a la tabla profesor
            $stmt2 = Conexion::conectar()->prepare ("INSERT INTO profesor(id_usuario,titulo,notas) VALUES (?,?,?)");
            $respuesta2 = $stmt2->execute([$resultConsulta->usuario_id,$datos['titulo_profesor'],$datos['notas_profesor']]);
            //print_r($stmt2->errorInfo());
            if($respuesta2 == true)
            {
                return "ok";
            }else{
                return "error";
            }
         }
         else{
             return "error";
         }
         
        $respuesta->close();
        $respuesta =null;
    }

    static public function mdlEditarProfesores($tabla,$datos){
        


        $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET nombres = ?, apellidos = ?, direccion = ?, correo = ?, telefono_fijo = ?, celular = ?, dni = ?,fecha_nacimiento= ? ,nacionalidad = ?, usuario = ?, clave = ?, rol = ?, estado = ?, foto = ? WHERE usuario_id = ?");
        $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listRol'],$datos['listEstado'],$datos['foto'],$datos['idusuario']]);
        print_r($stmt->errorInfo());
        $stmt2 = Conexion::conectar()->prepare("UPDATE profesor SET titulo = ?, notas = ? WHERE id_usuario = ?");
        $respuesta2 = $stmt2 ->execute($datos['profesor_titulo'],$datos['notas_profesor'],$datos['idusuario']);
          
        
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

    static public function mdlDescativarProfesor($valor,$tabla){
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
