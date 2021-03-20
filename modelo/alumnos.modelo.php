<?php

require_once "conexion.php";

class ModeloAlumnos{

    //MostrarUsuarios
    static public function mdlMostrarAlumnos($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla as u 
            INNER JOIN alumno a
            ON a.id_usuario = u.usuario_id
            INNER JOIN rol r 
            ON u.rol=r.rol_id
            LEFT JOIN apoderado AS ap
            ON a.id_apoderado = ap.id_apoderado
            WHERE u.$item =:$item AND u.estado !=0");
            $stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetch();
        }
        else
        {//usamos esta consulta para listar todos los usuarios
            $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla AS u
            INNER JOIN alumno a
            ON a.id_usuario = u.usuario_id
            LEFT JOIN apoderado AS ap
            ON a.id_apoderado = ap.id_apoderado
            ORDER BY u.usuario_id asc
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetchAll();
            
        }
    }
   

    static public function mdlIngresarAlumnos($tabla,$datos,$datos_apoderado){
        //validamos si el usuario se repite
        $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE dni = ? or usuario=?');
        $consultaID->execute([$datos['dni'],$datos['usuario']]);
        $result= $consultaID->fetch(PDO::FETCH_OBJ);
        
        if($result > 0){
            return 'repet';
        }else{
        //realizamor el insert del usuario
        
        $stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla(nombres,apellidos,direccion,correo,telefono_fijo,celular,dni,fecha_nacimiento,nacionalidad,usuario,clave,rol,estado,foto) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listRol'],$datos['listEstado'],$datos['foto']]);
        print_r($stmt->errorInfo());

        //hacemos la consulta para obtener el id
        $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE usuario = ?');
        $consultaID->execute([$datos['usuario']]);
        $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);

        //Validamos dni apoderado que no se repita
        $query = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
        $query->execute([$datos_apoderado['dni-ap']]);
        $sql= $query->fetch(PDO::FETCH_OBJ);
        
        //realizamos el insert a la tabla apoderado
        if(!($sql > 0)){
            $query = Conexion::conectar()->prepare ("INSERT INTO apoderado(ocupacion_apoderado,tipo_apoderado, nombres_apoderado,apellidos_apoderado, dni_apoderado, correo_apoderado, telefono_apoderado, direccion_apoderado) VALUES (?,?,?,?,?,?,?,?)");
            $respuesta2= $query->execute([$datos_apoderado['ocupacion-ap'],$datos_apoderado['tipo-ap'],$datos_apoderado['nombre-ap'],$datos_apoderado['apellidos-ap'],$datos_apoderado['dni-ap'],$datos_apoderado['correo-ap'],$datos_apoderado['telefono-ap'],$datos_apoderado['direccion-ap']]);

             //hacemos la consulta para obtener el id
            $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
            $consultaAP->execute([$datos_apoderado['dni-ap']]);
            $resultConsulta1= $consultaAP->fetch(PDO::FETCH_OBJ);

             //realizamos el insert a la tabla alumno
             $cod =(strlen($resultConsulta->usuario_id)>1)?"N0-0":"N0-00";
             $cod_matricula=$cod.$resultConsulta->usuario_id;
             $stmt2 = Conexion::conectar()->prepare ("INSERT INTO alumno(id_apoderado,id_usuario,cod_matricula) VALUES (?,?,?)");
             $respuesta3 = $stmt2->execute([$resultConsulta1->id_apoderado,$resultConsulta->usuario_id,$cod_matricula]);
             //print_r($stmt2->errorInfo());
            if($respuesta == true && $respuesta2 == true)
            {
                return "ok";
            }
            else{
                return "error";
            }
        }else{
            //realizamos el insert a la tabla alumno relacionando al apoderado existente
            $cod =(strlen($resultConsulta->usuario_id)>1)?"N0-0":"N0-00";
            $cod_matricula=$cod.$resultConsulta->usuario_id;
            $stmt2 = Conexion::conectar()->prepare ("INSERT INTO alumno(id_apoderado,id_usuario,cod_matricula) VALUES (?,?,?)");
            $respuesta2 = $stmt2->execute([$sql->id_apoderado,$resultConsulta->usuario_id,$cod_matricula]);
            if($respuesta == true && $respuesta2 == true)
            {
                return "ok";
            }
            else{
                return "error";
            }
        }
        
    }
    }

    static public function mdlEditarAlumnos($tabla,$datos,$datos_apoderado){
        $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET nombres = ?, apellidos = ?, direccion = ?, correo = ?, telefono_fijo = ?, celular = ?, dni = ?,fecha_nacimiento= ? ,nacionalidad = ?, usuario = ?, clave = ?, rol = ?, estado = ?, foto = ? WHERE usuario_id = ?");
        $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listRol'],$datos['listEstado'],$datos['foto'],$datos['idusuario']]);
        
        
        if($datos_apoderado != 'empty'){
            $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE usuario_id = ?');
            $consultaID->execute([$datos['idusuario']]);
            $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);
            //Validamos si existe algun apoderado

            $consultaAp = Conexion::conectar()->prepare('SELECT * FROM alumno WHERE id_usuario = ?');
            $consultaAp->execute([$datos['idusuario']]);
            $rConsulta= $consultaAp->fetch(PDO::FETCH_OBJ);
          
            if($rConsulta->id_apoderado != null || $rConsulta->id_apoderado != "")
            {//si hay apoderado, entonces lo actualizamos
                
                $consultaAP1 = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE id_apoderado = ?');
                $consultaAP1->execute([$rConsulta->id_apoderado]);
                $respuestaConsulta = $consultaAP1->fetch(PDO::FETCH_OBJ);
                if($respuestaConsulta->dni_apoderado !=$datos_apoderado['dni-ap'] ){
                    $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                    $consultaAP->execute([$datos_apoderado['dni-ap']]);
                    
                    if($consultaAP->rowCount()>0){
                        return "repet-dni";
                    }
                }

                $query = Conexion::conectar()->prepare ("UPDATE apoderado SET ocupacion_apoderado = ?, tipo_apoderado = ?, nombres_apoderado = ?, apellidos_apoderado = ?, dni_apoderado = ?, correo_apoderado = ?, telefono_apoderado = ?, direccion_apoderado = ? WHERE id_apoderado = ?");

                $respuesta2= $query->execute([$datos_apoderado['ocupacion-ap'],$datos_apoderado['tipo-ap'],$datos_apoderado['nombre-ap'],$datos_apoderado['apellidos-ap'],$datos_apoderado['dni-ap'],$datos_apoderado['correo-ap'],$datos_apoderado['telefono-ap'],$datos_apoderado['direccion-ap'],$rConsulta->id_apoderado]);
                
                if($respuesta == true && $respuesta2 == true)
                {
                    return "ok";
                }
                else{
                    return "error";
            }
            }else{//si no hay apoderado, lo agregamos
                //validamos el dni
                $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                $consultaAP->execute([$datos_apoderado['dni-ap']]);
                
                if($consultaAP->rowCount()>0){
                    return "repet-dni";
                }


                $query = Conexion::conectar()->prepare ("INSERT INTO apoderado(ocupacion_apoderado,tipo_apoderado, nombres_apoderado,apellidos_apoderado, dni_apoderado, correo_apoderado, telefono_apoderado, direccion_apoderado) VALUES (?,?,?,?,?,?,?,?)");

                $respuesta2= $query->execute([$datos_apoderado['ocupacion-ap'],$datos_apoderado['tipo-ap'],$datos_apoderado['nombre-ap'],$datos_apoderado['apellidos-ap'],$datos_apoderado['dni-ap'],$datos_apoderado['correo-ap'],$datos_apoderado['telefono-ap'],$datos_apoderado['direccion-ap']]);
                
                
                $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                $consultaAP->execute([$datos_apoderado['dni-ap']]);
                $resultConsulta1= $consultaAP->fetch(PDO::FETCH_OBJ);

                //realizamos el update a la tabla alumno
                $stmt2 = Conexion::conectar()->prepare ("UPDATE  alumno SET id_apoderado = ? WHERE id_usuario = ?");
                $respuesta3 = $stmt2->execute([$resultConsulta1->id_apoderado,$resultConsulta->usuario_id]);
                //print_r($stmt2->errorInfo());



                if($respuesta == true && $respuesta2 == true && $respuesta3 == true)
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

    static public function mdlDescativarAlumno($valor,$tabla){
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
    static public function mdlMostrarDatoAlumno($valor,$tabla){
        $stmt = Conexion::conectar()->prepare('SELECT * FROM usuario AS u
        INNER JOIN alumno AS a 
        ON a.id_usuario = u.usuario_id
        INNER JOIN apoderado AS ap
        ON a.id_apoderado = ap.id_apoderado
        LEFT JOIN matricula AS m
        ON a.idAlumno = m.idAlumno
        INNER JOIN seccion_grados AS sg
        ON m.idSeccion_Grados = sg.idSeccion_Grados
        INNER JOIN grados AS g
        ON sg.idGrados = g.idGrados
        WHERE usuario_id = 34');
        $stmt->execute([]);
        //print_r($stmt->errorInfo());
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
