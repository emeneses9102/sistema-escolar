<?php

require_once "conexion.php";

class ModeloAlumnos{

    //MostrarUsuarios
    static public function mdlMostrarAlumnos($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT u.*, a.*, r.*, ap.*, ap2.id_apoderado AS id_apoderado2, ap2.nombres_apoderado AS nombres_apoderado2, ap2.apellidos_apoderado AS apellidos_apoderado2,
            ap2.ocupacion_apoderado AS ocupacion_apoderado2, ap2.tipo_apoderado AS tipo_apoderado2, ap2.dni_apoderado AS dni_apoderado2, ap2.correo_apoderado AS correo_apoderado2,
            ap2.telefono_apoderado AS telefono_apoderado, ap2.direccion_apoderado AS direccion_apoderado2, ap3.id_apoderado AS id_apoderado3, ap3.nombres_apoderado AS nombres_apoderado3, ap3.apellidos_apoderado AS apellidos_apoderado3, ap3.ocupacion_apoderado AS ocupacion_apoderado3, ap3.tipo_apoderado AS tipo_apoderado3, ap3.dni_apoderado AS dni_apoderado3, ap3.correo_apoderado AS correo_apoderado3, ap3.telefono_apoderado AS telefono_apoderado3, ap3.direccion_apoderado AS direccion_apoderado3 FROM $tabla as u 
            INNER JOIN alumno a
            ON a.id_usuario = u.usuario_id
            INNER JOIN rol r 
            ON u.rol=r.rol_id
            LEFT JOIN apoderado AS ap
            ON a.id_apoderado = ap.id_apoderado
            LEFT JOIN apoderado AS ap2
            ON a.id_apoderado2 = ap2.id_apoderado
            LEFT JOIN apoderado AS ap3
            ON a.id_apoderado3 = ap3.id_apoderado
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
            LEFT JOIN matricula AS m
            ON m.idAlumno = a.idAlumno
            LEFT JOIN seccion_grados AS sg
            ON m.idSeccion_Grados = sg.idSeccion_Grados
            LEFT JOIN seccion AS s
            ON sg.idSeccion = s.idSeccion
            LEFT JOIN grados AS g
            ON sg.idGrados = g.idGrados
            LEFT JOIN niveles AS n
            ON g.idNiveles = n.idNiveles
            ORDER BY u.usuario_id asc
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetchAll();
            
        }
    }

    static public function mdlMostrarAlumnosList($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT u.*, a.*, r.*, ap.*, ap2.id_apoderado AS id_apoderado2, ap2.nombres_apoderado AS nombres_apoderado2, ap2.apellidos_apoderado AS apellidos_apoderado2, ap2.ocupacion_apoderado AS ocupacion_apoderado2, ap2.tipo_apoderado AS tipo_apoderado2, ap2.dni_apoderado AS dni_apoderado2, ap2.correo_apoderado AS correo_apoderado2, ap2.telefono_apoderado AS telefono_apoderado2, ap2.direccion_apoderado AS direccion_apoderado2, ap3.id_apoderado AS id_apoderado3, ap3.nombres_apoderado AS nombres_apoderado3, ap3.apellidos_apoderado AS apellidos_apoderado3, ap3.ocupacion_apoderado AS ocupacion_apoderado3, ap3.tipo_apoderado AS tipo_apoderado3, ap3.dni_apoderado AS dni_apoderado3, ap3.correo_apoderado AS correo_apoderado3, ap3.telefono_apoderado AS telefono_apoderado3, ap3.direccion_apoderado AS direccion_apoderado3 FROM $tabla as u 
            INNER JOIN alumno a
            ON a.id_usuario = u.usuario_id
            INNER JOIN rol r 
            ON u.rol=r.rol_id
            LEFT JOIN apoderado AS ap
            ON a.id_apoderado = ap.id_apoderado
            LEFT JOIN apoderado AS ap2
            ON a.id_apoderado2 = ap2.id_apoderado
            LEFT JOIN apoderado AS ap3
            ON a.id_apoderado3 = ap3.id_apoderado
            WHERE u.$item =:$item AND u.estado !=0");
            $stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetch();
        }
        else
        {//usamos esta consulta para listar todos los usuarios
            $stmt = Conexion::conectar()->prepare("SELECT u.rol,u.nombres, u.apellidos,u.estado,a.cod_matricula, u.usuario,ap.nombres_apoderado,ap.apellidos_apoderado,a.cohorte, a.idAlumno,m.idSeccion_Grados  FROM $tabla AS u
            INNER JOIN alumno a
            ON a.id_usuario = u.usuario_id
            LEFT JOIN apoderado AS ap
            ON a.id_apoderado = ap.id_apoderado
            LEFT JOIN matricula AS m
            ON m.idAlumno = a.idAlumno
            ORDER BY u.usuario_id asc
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetchAll();
            
        }
    }
   

    static public function mdlIngresarAlumnos($tabla,$datos,$datos_apoderado,$datos_apoderado2,$datos_apoderado3){
        //validamos si el usuario se repite
        $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE dni = ? or usuario=?');
        $consultaID->execute([$datos['dni'],$datos['usuario']]);
        $result= $consultaID->fetch(PDO::FETCH_OBJ);
        
        if($result > 0){
            return 'repet';
        }else{
        //realizamor el insert del usuario
        
            $stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla(nombres,apellidos,direccion,correo,telefono_fijo,celular,dni,fecha_nacimiento,nacionalidad,usuario,clave,estado,foto) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listEstado'],$datos['foto']]);
            //print_r($stmt->errorInfo());
            
            //hacemos la consulta para obtener el id
            $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE usuario = ?');
            $consultaID->execute([$datos['usuario']]);
            $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);

            //validamos apoderado vacio
            if($datos_apoderado == "empty" && $datos_apoderado2 == "empty"&& $datos_apoderado3 == "empty"){
               //realizamos el insert a la tabla alumno relacionando al apoderado existente
               $cod =(strlen($resultConsulta->usuario_id)>1)?"N0-0":"N0-00";
               $cod_matricula=$cod.$resultConsulta->usuario_id;
               $stmt2 = Conexion::conectar()->prepare ("INSERT INTO alumno(id_usuario,cod_matricula,cohorte) VALUES (?,?,?)");
               $respuesta2 = $stmt2->execute([$resultConsulta->usuario_id,$cod_matricula,$datos['cohorte']]);
                if($respuesta == true && $respuesta2 == true)
                {
                    return "ok";
                }
                else{
                    return "error";
                }
            }

            //Validamos dni apoderado que no se repita
            $query = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
            $query->execute([$datos_apoderado['dni-ap']]);
            $sql= $query->fetch(PDO::FETCH_OBJ);

            //Validamos dni apoderado que no se repita2
            $query2 = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
            $query2->execute([$datos_apoderado2['dni-ap2']]);
            $sql2= $query2->fetch(PDO::FETCH_OBJ);

            //Validamos dni apoderado que no se repita3
            $query3 = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
            $query3->execute([$datos_apoderado3['dni-ap3']]);
            $sql3= $query3->fetch(PDO::FETCH_OBJ);
        
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
                $stmt2 = Conexion::conectar()->prepare ("INSERT INTO alumno(id_apoderado,id_usuario,cod_matricula,cohorte) VALUES (?,?,?,?)");
                $respuesta3 = $stmt2->execute([$resultConsulta1->id_apoderado,$resultConsulta->usuario_id,$cod_matricula,$datos['cohorte']]);
                //print_r($stmt2->errorInfo());
                if($respuesta == true && $respuesta2 == true)
                {
                    return "ok";
                }
                else{
                    return "error";
                }
            }
            if(!($sql2 > 0)){
                $query = Conexion::conectar()->prepare ("INSERT INTO apoderado(ocupacion_apoderado,tipo_apoderado, nombres_apoderado,apellidos_apoderado, dni_apoderado, correo_apoderado, telefono_apoderado, direccion_apoderado) VALUES (?,?,?,?,?,?,?,?)");
                $respuestaAP= $query->execute([$datos_apoderado2['ocupacion-ap2'],$datos_apoderado2['tipo-ap2'],$datos_apoderado2['nombre-ap2'],$datos_apoderado2['apellidos-ap2'],$datos_apoderado2['dni-ap2'],$datos_apoderado2['correo-ap2'],$datos_apoderado2['telefono-ap2'],$datos_apoderado2['direccion-ap2']]);

                //hacemos la consulta para obtener el id
                $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                $consultaAP->execute([$datos_apoderado2['dni-ap2']]);
                $resultConsulta1= $consultaAP->fetch(PDO::FETCH_OBJ);

                //realizamos el insert a la tabla alumno
                $cod =(strlen($resultConsulta->usuario_id)>1)?"N0-0":"N0-00";
                $cod_matricula=$cod.$resultConsulta->usuario_id;
                $stmt2 = Conexion::conectar()->prepare ("INSERT INTO alumno(id_apoderado,id_usuario,cod_matricula,cohorte) VALUES (?,?,?,?)");
                $respuesta3 = $stmt2->execute([$resultConsulta1->id_apoderado,$resultConsulta->usuario_id,$cod_matricula,$datos['cohorte']]);
                //print_r($stmt2->errorInfo());
                if($respuesta == true && $respuestaAP == true)
                {
                    return "ok";
                }
                else{
                    return "error";
                }
            }
            if(!($sql3 > 0)){
                $query = Conexion::conectar()->prepare ("INSERT INTO apoderado(ocupacion_apoderado,tipo_apoderado, nombres_apoderado,apellidos_apoderado, dni_apoderado, correo_apoderado, telefono_apoderado, direccion_apoderado) VALUES (?,?,?,?,?,?,?,?)");
                $respuestaAP= $query->execute([$datos_apoderado3['ocupacion-ap3'],$datos_apoderado3['tipo-ap3'],$datos_apoderado3['nombre-ap3'],$datos_apoderado3['apellidos-ap3'],$datos_apoderado3['dni-ap3'],$datos_apoderado3['correo-ap3'],$datos_apoderado3['telefono-ap3'],$datos_apoderado3['direccion-ap3']]);

                //hacemos la consulta para obtener el id
                $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                $consultaAP->execute([$datos_apoderado3['dni-ap3']]);
                $resultConsulta1= $consultaAP->fetch(PDO::FETCH_OBJ);

                //realizamos el insert a la tabla alumno
                $cod =(strlen($resultConsulta->usuario_id)>1)?"N0-0":"N0-00";
                $cod_matricula=$cod.$resultConsulta->usuario_id;
                $stmt2 = Conexion::conectar()->prepare ("INSERT INTO alumno(id_apoderado,id_usuario,cod_matricula,cohorte) VALUES (?,?,?,?)");
                $respuesta3 = $stmt2->execute([$resultConsulta1->id_apoderado,$resultConsulta->usuario_id,$cod_matricula,$datos['cohorte']]);
                //print_r($stmt2->errorInfo());
                if($respuesta == true && $respuestaAP == true)
                {
                    return "ok";
                }
                else{
                    return "error";
                }
            }
            else{
                //realizamos el insert a la tabla alumno relacionando al apoderado existente
                $cod =(strlen($resultConsulta->usuario_id)>1)?"N0-0":"N0-00";
                $cod_matricula=$cod.$resultConsulta->usuario_id;
                $stmt2 = Conexion::conectar()->prepare ("INSERT INTO alumno(id_apoderado,id_apoderado2,id_usuario,cod_matricula,cohorte) VALUES (?,?,?,?,?)");
                $respuesta2 = $stmt2->execute([$sql->id_apoderado,$sql2->id_apoderado,$resultConsulta->usuario_id,$cod_matricula,$datos['cohorte']]);
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

    static public function mdlEditarAlumnos($tabla,$datos,$datos_apoderado, $datos_apoderado2, $datos_apoderado3){
        $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET nombres = ?, apellidos = ?, direccion = ?, correo = ?, telefono_fijo = ?, celular = ?, dni = ?,fecha_nacimiento= ? ,nacionalidad = ?, usuario = ?, clave = ?, estado = ?, foto = ? WHERE usuario_id = ?");
        $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listEstado'],$datos['foto'],$datos['idusuario']]);
        
        if($datos_apoderado != 'empty' || $datos_apoderado2 != 'empty'|| $datos_apoderado3 != 'empty'){
            $error=2;
            $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE usuario_id = ?');
            $consultaID->execute([$datos['idusuario']]);
            $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);
            //realizamos el update a la tabla alumno
            $stmt2 = Conexion::conectar()->prepare ("UPDATE  alumno SET cohorte = ? WHERE id_usuario = ?");
            $respuesta3 = $stmt2->execute([$datos['cohorte'],$resultConsulta->usuario_id]);
            //print_r($stmt2->errorInfo());

            if($datos_apoderado != 'empty'){
                
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
                        $error--;
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
                        $error--;
                    }
                    else{
                        return "error";
                    }
                }

                
            }

            if($datos_apoderado2 != 'empty'){
                
                //Validamos si existe algun apoderado

                $consultaAp2 = Conexion::conectar()->prepare('SELECT * FROM alumno WHERE id_usuario = ?');
                $consultaAp2->execute([$datos['idusuario']]);
                $rConsulta2= $consultaAp2->fetch(PDO::FETCH_OBJ);
            
                if($rConsulta2->id_apoderado2 != null || $rConsulta2->id_apoderado2 != "")
                {//si hay apoderado, entonces lo actualizamos
                    
                    $consultaAP1 = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE id_apoderado = ?');
                    $consultaAP1->execute([$rConsulta2->id_apoderado2]);
                    $respuestaConsulta = $consultaAP1->fetch(PDO::FETCH_OBJ);
                    if($respuestaConsulta->dni_apoderado !=$datos_apoderado2['dni-ap2'] ){
                        $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                        $consultaAP->execute([$datos_apoderado2['dni-ap2']]);
                        
                        if($consultaAP->rowCount()>0){
                            return "repet-dni";
                        }
                    }

                    $query = Conexion::conectar()->prepare ("UPDATE apoderado SET ocupacion_apoderado = ?, tipo_apoderado = ?, nombres_apoderado = ?, apellidos_apoderado = ?, dni_apoderado = ?, correo_apoderado = ?, telefono_apoderado = ?, direccion_apoderado = ? WHERE id_apoderado = ?");

                    $respuesta2= $query->execute([$datos_apoderado2['ocupacion-ap2'],$datos_apoderado2['tipo-ap2'],$datos_apoderado2['nombre-ap2'],$datos_apoderado2['apellidos-ap2'],$datos_apoderado2['dni-ap2'],$datos_apoderado2['correo-ap2'],$datos_apoderado2['telefono-ap2'],$datos_apoderado2['direccion-ap2'],$rConsulta2->id_apoderado2]);
                    print_r($query->errorInfo());
                    if($respuesta == true && $respuesta2 == true)
                    {
                        $error--;
                    }
                    else{
                        return "error";
                }
                }else{//si no hay apoderado, lo agregamos
                    //validamos el dni
                    $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                    $consultaAP->execute([$datos_apoderado2['dni-ap2']]);
                    
                    if($consultaAP->rowCount()>0){
                        return "repet-dni";
                    }


                    $query = Conexion::conectar()->prepare ("INSERT INTO apoderado(ocupacion_apoderado,tipo_apoderado, nombres_apoderado,apellidos_apoderado, dni_apoderado, correo_apoderado, telefono_apoderado, direccion_apoderado) VALUES (?,?,?,?,?,?,?,?)");

                    $respuesta2= $query->execute([$datos_apoderado2['ocupacion-ap2'],$datos_apoderado2['tipo-ap2'],$datos_apoderado2['nombre-ap2'],$datos_apoderado2['apellidos-ap2'],$datos_apoderado2['dni-ap2'],$datos_apoderado2['correo-ap2'],$datos_apoderado2['telefono-ap2'],$datos_apoderado2['direccion-ap2']]);
                    
                    
                    $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                    $consultaAP->execute([$datos_apoderado2['dni-ap2']]);
                    $resultConsulta1= $consultaAP->fetch(PDO::FETCH_OBJ);

                    //realizamos el update a la tabla alumno
                    $stmt2 = Conexion::conectar()->prepare ("UPDATE  alumno SET id_apoderado2 = ? WHERE id_usuario = ?");
                    $respuesta3 = $stmt2->execute([$resultConsulta1->id_apoderado,$resultConsulta->usuario_id]);
                    //print_r($stmt2->errorInfo());



                    if($respuesta == true && $respuesta2 == true && $respuesta3 == true)
                    {
                        $error--;
                    }
                    else{
                        return "error";
                    }
                }  
            }

            //Revisar
            if($datos_apoderado3 != 'empty'){
               
                //Validamos si existe algun apoderado

                $consultaAp3 = Conexion::conectar()->prepare('SELECT * FROM alumno WHERE id_usuario = ?');
                $consultaAp3->execute([$datos['idusuario']]);
                $rConsulta3= $consultaAp3->fetch(PDO::FETCH_OBJ);
            
                if($rConsulta3->id_apoderado3 != null || $rConsulta3->id_apoderado3 != "")
                {//si hay apoderado, entonces lo actualizamos
                    
                    $consultaAP1 = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE id_apoderado = ?');
                    $consultaAP1->execute([$rConsulta3->id_apoderado3]);
                    $respuestaConsulta = $consultaAP1->fetch(PDO::FETCH_OBJ);
                    if($respuestaConsulta->dni_apoderado !=$datos_apoderado3['dni-ap3'] ){
                        $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                        $consultaAP->execute([$datos_apoderado3['dni-ap3']]);
                        
                        if($consultaAP->rowCount()>0){
                            return "repet-dni";
                        }
                    }

                    $query = Conexion::conectar()->prepare ("UPDATE apoderado SET ocupacion_apoderado = ?, tipo_apoderado = ?, nombres_apoderado = ?, apellidos_apoderado = ?, dni_apoderado = ?, correo_apoderado = ?, telefono_apoderado = ?, direccion_apoderado = ? WHERE id_apoderado = ?");

                    $respuesta2= $query->execute([$datos_apoderado3['ocupacion-ap3'],$datos_apoderado3['tipo-ap3'],$datos_apoderado3['nombre-ap3'],$datos_apoderado3['apellidos-ap3'],$datos_apoderado3['dni-ap3'],$datos_apoderado3['correo-ap3'],$datos_apoderado3['telefono-ap3'],$datos_apoderado3['direccion-ap3'],$rConsulta3->id_apoderado3]);
                    print_r($query->errorInfo());
                    if($respuesta == true && $respuesta2 == true)
                    {
                        $error--;
                    }
                    else{
                        return "error";
                }
                }else{//si no hay apoderado, lo agregamos
                    //validamos el dni
                    $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                    $consultaAP->execute([$datos_apoderado3['dni-ap3']]);
                    
                    if($consultaAP->rowCount()>0){
                        return "repet-dni";
                    }


                    $query = Conexion::conectar()->prepare ("INSERT INTO apoderado(ocupacion_apoderado,tipo_apoderado, nombres_apoderado,apellidos_apoderado, dni_apoderado, correo_apoderado, telefono_apoderado, direccion_apoderado) VALUES (?,?,?,?,?,?,?,?)");

                    $respuesta2= $query->execute([$datos_apoderado3['ocupacion-ap3'],$datos_apoderado3['tipo-ap3'],$datos_apoderado3['nombre-ap3'],$datos_apoderado3['apellidos-ap3'],$datos_apoderado3['dni-ap3'],$datos_apoderado3['correo-ap3'],$datos_apoderado3['telefono-ap3'],$datos_apoderado3['direccion-ap3']]);
                    
                    
                    $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                    $consultaAP->execute([$datos_apoderado3['dni-ap3']]);
                    $resultConsulta1= $consultaAP->fetch(PDO::FETCH_OBJ);

                    //realizamos el update a la tabla alumno
                    $stmt2 = Conexion::conectar()->prepare ("UPDATE  alumno SET id_apoderado3 = ? WHERE id_usuario = ?");
                    $respuesta3 = $stmt2->execute([$resultConsulta1->id_apoderado,$resultConsulta->usuario_id]);
                    //print_r($stmt2->errorInfo());



                    if($respuesta == true && $respuesta2 == true && $respuesta3 == true)
                    {
                        $error--;
                    }
                    else{
                        return "error";
                    }
                }  
            }

            if($error == 0)
            {
                return "ok";
            }
        }else{
            $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE usuario_id = ?');
            $consultaID->execute([$datos['idusuario']]);
            $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);
            //realizamos el update a la tabla alumno
            $stmt2 = Conexion::conectar()->prepare ("UPDATE  alumno SET cohorte = ? WHERE id_usuario = ?");
            $respuesta3 = $stmt2->execute([$datos['cohorte'],$resultConsulta->usuario_id]);
            //print_r($stmt2->errorInfo());
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

    //Para revisar
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

    static public function mdlEliminarAlumno($valor,$tabla,$claveSeguridad){
        
        
        $consultaClave = Conexion::conectar()->prepare('SELECT * FROM institucion');
        $consultaClave->execute();
        $resultConsulta= $consultaClave->fetch(PDO::FETCH_OBJ);
        
        if($resultConsulta->clave_seguridad == $claveSeguridad){
            $stmt = Conexion::conectar()->prepare ("DELETE FROM $tabla WHERE usuario_id = ?");
            $respuesta = $stmt->execute([$valor]);
            
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
        else{
            return "pass";
        }

        
    }

    static public function mdlMostrarDatoAlumno($valor,$tabla){
        $stmt = Conexion::conectar()->prepare('SELECT * FROM usuario AS u
        INNER JOIN alumno AS a 
        ON a.id_usuario = u.usuario_id
        LEFT JOIN apoderado AS ap
        ON a.id_apoderado = ap.id_apoderado
        LEFT JOIN apoderado AS ap2
        ON a.id_apoderado2 = ap2.id_apoderado
        LEFT JOIN apoderado AS ap3
        ON a.id_apoderado3 = ap3.id_apoderado
        LEFT JOIN matricula AS m
        ON a.idAlumno = m.idAlumno
        LEFT JOIN seccion_grados AS sg
        ON m.idSeccion_Grados = sg.idSeccion_Grados
        LEFT JOIN grados AS g
        ON sg.idGrados = g.idGrados
        WHERE usuario_id = ?');
        $stmt->execute([$valor]);
        //print_r($stmt->errorInfo());
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static public function mdlEditarDatosAlumnoPerfil($tabla,$datos,$datos_apoderado,$datos_apoderado2, $datos_apoderado3){
        $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET nombres = ?, apellidos = ?, direccion = ?, telefono_fijo = ?, celular = ?, dni = ?,fecha_nacimiento= ? ,nacionalidad = ?, usuario = ?, clave = ?, rol = ?, estado = ?, foto = ? WHERE usuario_id = ?");
        $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['listRol'],$datos['listEstado'],$datos['foto'],$datos['idusuario']]);
        
        if($datos_apoderado != 'empty'){
        $consultaAp = Conexion::conectar()->prepare('SELECT * FROM apoderado AS apo INNER JOIN alumno AS alu ON apo.id_apoderado = alu.id_apoderado INNER JOIN usuario AS usu ON alu.id_usuario=usu.usuario_id WHERE usu.usuario_id = ?');
        $consultaAp->execute([$datos['idusuario']]);
        $ConsultaApod= $consultaAp->fetch(PDO::FETCH_OBJ);

        if($ConsultaApod->dni_apoderado !=$datos_apoderado['dni-ap'] ){
            $consultaAP2 = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
            $consultaAP2->execute([$datos_apoderado['dni-ap']]);
            
            if($consultaAP2->rowCount()>0){
                return "repet-dni";
            }
        }

        $query = Conexion::conectar()->prepare ("UPDATE apoderado SET ocupacion_apoderado = ?, tipo_apoderado = ?, nombres_apoderado = ?, apellidos_apoderado = ?, dni_apoderado = ?, correo_apoderado = ?, telefono_apoderado = ?, direccion_apoderado = ? WHERE id_apoderado = ?");
        $respuesta2= $query->execute([$datos_apoderado['ocupacion-ap'],$datos_apoderado['tipo-ap'],$datos_apoderado['nombre-ap'],$datos_apoderado['apellidos-ap'],$datos_apoderado['dni-ap'],$datos_apoderado['correo-ap'],$datos_apoderado['telefono-ap'],$datos_apoderado['direccion-ap'],$ConsultaApod->id_apoderado]);
    
        if($respuesta == true && $respuesta2 == true){
            return "ok";
        }else{
            return "error";
        }
        }
        if($respuesta == true){
            return "ok";
        }else{
            return "error";
        }
    }

    static public function mdlImportarAlumnos(){
        if(isset($_POST['importar'])){
           
           $filename=$_FILES["file"]["name"];
           $info = new SplFileInfo($filename);
           $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
           if($extension == 'csv')
           {
            $filename = $_FILES['file']['tmp_name'];
            $handle = fopen($filename, "r");
        
            while( ($data = fgetcsv($handle, 1000, ",") ) !== FALSE )
            {
               echo "Apeliidos: ".$data[0]."<br>";
               echo "Nombres: ".$data[1]."<br>";
               echo "DNI: ".$data[2]."<br>";
               echo "Usuario: ".$data[3]."<br>";
               echo "Constraseña: ".$data[4]."<br>";
               echo "Email: ".$data[5]."<br>";
               echo "Celular: ".$data[6]."<br>";
               echo "cohorte: ".$data[7]."<br>";
               echo "<br>";
               //validamos si el usuario se repite
                $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE dni = ? or usuario=?');
                $consultaID->execute([$data[2],$data[3]]);
                $result= $consultaID->fetch(PDO::FETCH_OBJ);
                
                if($result){
                    $data[3]= ($result->usuario == $data[3] )?'UR'.date("His"):$data[3];
                    $data[2]= ($result->dni == $data[2] )?'DR'.date("His"):$data[2];
                }
                $clave = password_hash($data[4],PASSWORD_DEFAULT);

                $stmt = Conexion::conectar()->prepare ("INSERT INTO usuario(nombres,apellidos,correo,celular,dni,usuario,clave) VALUES (?,?,?,?,?,?,?)");
                $respuesta = $stmt->execute([$data[1],$data[0],$data[5],$data[6],$data[2],$data[3],$clave]);
                //print_r($stmt->errorInfo());
                
                //hacemos la consulta para obtener el id
                $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE usuario = ?');
                $consultaID->execute([$data[3]]);
                $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);

                
                $cod =(strlen($resultConsulta->usuario_id)>1)?"N0-0":"N0-00";
                $cod_matricula=$cod.$resultConsulta->usuario_id;
                $stmt2 = Conexion::conectar()->prepare ("INSERT INTO alumno(id_usuario,cod_matricula,cohorte) VALUES (?,?,?)");
                $respuesta2 = $stmt2->execute([$resultConsulta->usuario_id,$cod_matricula, $data[7]]);
                if($respuesta == true && $respuesta2 == true)
                {
                     echo '<script>
                    swal.fire({
                        type:"success",
                        title : "Alumnos Registrados",
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
                        title : "Hubieron errores",
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
    }

    static public function mdlEstadoAlumno($valor,$tabla){
        $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE usuario_id = ?');
        $consultaID->execute([$valor]);
        $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);

        if($resultConsulta->estado == 1){
            $estado = 2;
        }else{
            $estado = 2;
        }
        $estado = ($resultConsulta->estado== 1)?2:1;

        
        
        $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET estado = ?  WHERE usuario_id = ?");
        $respuesta = $stmt->execute([$estado,$valor]);
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

    static public function mdlEditarAlumnosP($tabla,$datos,$datos_apoderado, $datos_apoderado2, $datos_apoderado3){
        $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET nombres = ?, apellidos = ?, direccion = ?, correo = ?, telefono_fijo = ?, celular = ?, dni = ?,fecha_nacimiento= ? ,nacionalidad = ?, usuario = ?, clave = ?, foto = ? WHERE usuario_id = ?");
        $respuesta = $stmt->execute([$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['correo'],$datos['telefono'],$datos['celular'],$datos['dni'],$datos['fecha_nacimiento'],$datos['nacionalidad'],$datos['usuario'],$datos['clave'],$datos['foto'],$datos['idusuario']]);
        
        if($datos_apoderado != 'empty' || $datos_apoderado2 != 'empty'|| $datos_apoderado3 != 'empty'){
            //echo '<script>alert("no vacio")</script>';
            $error=2;
            $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE usuario_id = ?');
            $consultaID->execute([$datos['idusuario']]);
            $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);
            //realizamos el update a la tabla alumno
            $stmt2 = Conexion::conectar()->prepare ("UPDATE  alumno SET cohorte = ? WHERE id_usuario = ?");
            $respuesta3 = $stmt2->execute([$datos['cohorte'],$resultConsulta->usuario_id]);
            //print_r($stmt2->errorInfo());
            if($datos_apoderado != 'empty'){
                
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
                        $error--;
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
                        $error--;
                    }
                    else{
                        return "error";
                    }
                }

                
            }

            if($datos_apoderado2 != 'empty'){
                
                //Validamos si existe algun apoderado

                $consultaAp2 = Conexion::conectar()->prepare('SELECT * FROM alumno WHERE id_usuario = ?');
                $consultaAp2->execute([$datos['idusuario']]);
                $rConsulta2= $consultaAp2->fetch(PDO::FETCH_OBJ);
            
                if($rConsulta2->id_apoderado2 != null || $rConsulta2->id_apoderado2 != "")
                {//si hay apoderado, entonces lo actualizamos
                    
                    $consultaAP1 = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE id_apoderado = ?');
                    $consultaAP1->execute([$rConsulta2->id_apoderado2]);
                    $respuestaConsulta = $consultaAP1->fetch(PDO::FETCH_OBJ);
                    if($respuestaConsulta->dni_apoderado !=$datos_apoderado2['dni-ap2'] ){
                        $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                        $consultaAP->execute([$datos_apoderado2['dni-ap2']]);
                        
                        if($consultaAP->rowCount()>0){
                            return "repet-dni";
                        }
                    }

                    $query = Conexion::conectar()->prepare ("UPDATE apoderado SET ocupacion_apoderado = ?, tipo_apoderado = ?, nombres_apoderado = ?, apellidos_apoderado = ?, dni_apoderado = ?, correo_apoderado = ?, telefono_apoderado = ?, direccion_apoderado = ? WHERE id_apoderado = ?");

                    $respuesta2= $query->execute([$datos_apoderado2['ocupacion-ap2'],$datos_apoderado2['tipo-ap2'],$datos_apoderado2['nombre-ap2'],$datos_apoderado2['apellidos-ap2'],$datos_apoderado2['dni-ap2'],$datos_apoderado2['correo-ap2'],$datos_apoderado2['telefono-ap2'],$datos_apoderado2['direccion-ap2'],$rConsulta2->id_apoderado2]);
                    print_r($query->errorInfo());
                    if($respuesta == true && $respuesta2 == true)
                    {
                        $error--;
                    }
                    else{
                        return "error";
                }
                }else{//si no hay apoderado, lo agregamos
                    //validamos el dni
                    $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                    $consultaAP->execute([$datos_apoderado2['dni-ap2']]);
                    
                    if($consultaAP->rowCount()>0){
                        return "repet-dni";
                    }


                    $query = Conexion::conectar()->prepare ("INSERT INTO apoderado(ocupacion_apoderado,tipo_apoderado, nombres_apoderado,apellidos_apoderado, dni_apoderado, correo_apoderado, telefono_apoderado, direccion_apoderado) VALUES (?,?,?,?,?,?,?,?)");

                    $respuesta2= $query->execute([$datos_apoderado2['ocupacion-ap2'],$datos_apoderado2['tipo-ap2'],$datos_apoderado2['nombre-ap2'],$datos_apoderado2['apellidos-ap2'],$datos_apoderado2['dni-ap2'],$datos_apoderado2['correo-ap2'],$datos_apoderado2['telefono-ap2'],$datos_apoderado2['direccion-ap2']]);
                    
                    
                    $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                    $consultaAP->execute([$datos_apoderado2['dni-ap2']]);
                    $resultConsulta1= $consultaAP->fetch(PDO::FETCH_OBJ);

                    //realizamos el update a la tabla alumno
                    $stmt2 = Conexion::conectar()->prepare ("UPDATE  alumno SET id_apoderado2 = ? WHERE id_usuario = ?");
                    $respuesta3 = $stmt2->execute([$resultConsulta1->id_apoderado,$resultConsulta->usuario_id]);
                    //print_r($stmt2->errorInfo());



                    if($respuesta == true && $respuesta2 == true && $respuesta3 == true)
                    {
                        $error--;
                    }
                    else{
                        return "error";
                    }
                }  
            }

            //Revisar
            if($datos_apoderado3 != 'empty'){
               
                //Validamos si existe algun apoderado

                $consultaAp3 = Conexion::conectar()->prepare('SELECT * FROM alumno WHERE id_usuario = ?');
                $consultaAp3->execute([$datos['idusuario']]);
                $rConsulta3= $consultaAp3->fetch(PDO::FETCH_OBJ);
            
                if($rConsulta3->id_apoderado3 != null || $rConsulta3->id_apoderado3 != "")
                {//si hay apoderado, entonces lo actualizamos
                    
                    $consultaAP1 = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE id_apoderado = ?');
                    $consultaAP1->execute([$rConsulta3->id_apoderado3]);
                    $respuestaConsulta = $consultaAP1->fetch(PDO::FETCH_OBJ);
                    if($respuestaConsulta->dni_apoderado !=$datos_apoderado3['dni-ap3'] ){
                        $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                        $consultaAP->execute([$datos_apoderado3['dni-ap3']]);
                        
                        if($consultaAP->rowCount()>0){
                            return "repet-dni";
                        }
                    }

                    $query = Conexion::conectar()->prepare ("UPDATE apoderado SET ocupacion_apoderado = ?, tipo_apoderado = ?, nombres_apoderado = ?, apellidos_apoderado = ?, dni_apoderado = ?, correo_apoderado = ?, telefono_apoderado = ?, direccion_apoderado = ? WHERE id_apoderado = ?");

                    $respuesta2= $query->execute([$datos_apoderado3['ocupacion-ap3'],$datos_apoderado3['tipo-ap3'],$datos_apoderado3['nombre-ap3'],$datos_apoderado3['apellidos-ap3'],$datos_apoderado3['dni-ap3'],$datos_apoderado3['correo-ap3'],$datos_apoderado3['telefono-ap3'],$datos_apoderado3['direccion-ap3'],$rConsulta3->id_apoderado3]);
                    print_r($query->errorInfo());
                    if($respuesta == true && $respuesta2 == true)
                    {
                        $error--;
                    }
                    else{
                        return "error";
                }
                }else{//si no hay apoderado, lo agregamos
                    //validamos el dni
                    $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                    $consultaAP->execute([$datos_apoderado3['dni-ap3']]);
                    
                    if($consultaAP->rowCount()>0){
                        return "repet-dni";
                    }


                    $query = Conexion::conectar()->prepare ("INSERT INTO apoderado(ocupacion_apoderado,tipo_apoderado, nombres_apoderado,apellidos_apoderado, dni_apoderado, correo_apoderado, telefono_apoderado, direccion_apoderado) VALUES (?,?,?,?,?,?,?,?)");

                    $respuesta2= $query->execute([$datos_apoderado3['ocupacion-ap3'],$datos_apoderado3['tipo-ap3'],$datos_apoderado3['nombre-ap3'],$datos_apoderado3['apellidos-ap3'],$datos_apoderado3['dni-ap3'],$datos_apoderado3['correo-ap3'],$datos_apoderado3['telefono-ap3'],$datos_apoderado3['direccion-ap3']]);
                    
                    
                    $consultaAP = Conexion::conectar()->prepare('SELECT * FROM apoderado WHERE dni_apoderado = ?');
                    $consultaAP->execute([$datos_apoderado3['dni-ap3']]);
                    $resultConsulta1= $consultaAP->fetch(PDO::FETCH_OBJ);

                    //realizamos el update a la tabla alumno
                    $stmt2 = Conexion::conectar()->prepare ("UPDATE  alumno SET id_apoderado3 = ? WHERE id_usuario = ?");
                    $respuesta3 = $stmt2->execute([$resultConsulta1->id_apoderado,$resultConsulta->usuario_id]);
                    //print_r($stmt2->errorInfo());



                    if($respuesta == true && $respuesta2 == true && $respuesta3 == true)
                    {
                        $error--;
                    }
                    else{
                        return "error";
                    }
                }  
            }

            if($error == 0)
            {
                return "ok";
            }
        }else{
            $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE usuario_id = ?');
            $consultaID->execute([$datos['idusuario']]);
            $resultConsulta= $consultaID->fetch(PDO::FETCH_OBJ);
            //realizamos el update a la tabla alumno
            $stmt2 = Conexion::conectar()->prepare ("UPDATE  alumno SET cohorte = ? WHERE id_usuario = ?");
            $respuesta3 = $stmt2->execute([$datos['cohorte'],$resultConsulta->usuario_id]);
            //print_r($stmt2->errorInfo());
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
}