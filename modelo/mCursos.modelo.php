<?php
require_once "conexion.php";
class ModeloCursos{
     static public function mdlCrearCursos($tabla,$datos){
        $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre_curso = ? OR codigo_curso = ?");
        $consulta->execute([$datos['nombreCurso'],$datos['codigoCurso']]);
        $result= $consulta->fetch(PDO::FETCH_OBJ);
        if($consulta->rowCount()>0){
            return 'repet';
        }
        
        $stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla(nombre_curso,nombre_corto,codigo_curso,descripcion) VALUES (?,?,?,?)");
        $respuesta = $stmt->execute([$datos['nombreCurso'],$datos['nombreCorto'],$datos['codigoCurso'],$datos['descripcion']]);
        //print_r($stmt->errorInfo());
        if($respuesta == true)
            {
                return "ok";
            }
            else{
                return "error";
            }
     }

     static public function MdlMostrarcursos($tabla,$item,$valor){
         if($valor != ""){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $item = $valor");
            
            $stmt -> execute();
       
           return $stmt->fetch(PDO::FETCH_OBJ);
         }else{
             if($item!=""){
                $stmt = Conexion::conectar()->prepare("SELECT c.idCurso, c.nombre_curso, c.nombre_corto, c.codigo, CONCAT (u.nombre , ' ' , u.apellidos) AS nombre_profesor, s.nombre AS n_seccion,g.nombre_grado,n.nombre_nivel
                FROM $tabla AS c
                INNER JOIN usuarios AS u ON c.idProfesor = u.usuario_id
                INNER JOIN seccion AS s ON c.seccion = s.id_seccion
                INNER JOIN grados AS g ON c.grado = g.grado_id
                INNER JOIN niveles AS n ON g.id_nivel = n.idNivel
                 WHERE u.rol = 3 AND c.seccion = $item;
                ");
             }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
             }
            
            
            $stmt -> execute();
       
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
         }

       
        


     }

     static public function mdlActualizarCursos($tabla,$datos){
       
       $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET nombre_curso = ?,nombre_corto=?,codigo_curso=?,descripcion=? WHERE idCursos = ?");
       $respuesta = $stmt->execute([$datos['nombreCurso'],$datos['nombreCorto'],$datos['codigoCurso'],$datos['descripcion'],$datos['idCurso']]);
       //print_r($stmt->errorInfo());
       if($respuesta == true)
           {
               return "ok";
           }
           else{
               return "error";
           }
     }

     static public function MdlEliminarcursos($tabla,$item,$valor){
        $stmt = Conexion::conectar()->prepare ("DELETE FROM $tabla WHERE $item = ?");
        $respuesta = $stmt->execute([$valor]);
        //print_r($stmt->errorInfo());
        if($respuesta == true)
            {
                return "ok";
            }
            else{
                return "error";
            }
     }

     static public function MdlAgregarCursoClase($tabla,$idCurso,$idClase){
        $stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla(idCursos,idClases) VALUES (?,?)");
        $respuesta = $stmt->execute([$idCurso,$idClase]);
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

     static public function MdlMostrarCursoClase($tabla,$item,$valor){
        
           $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS cs
                                                    INNER JOIN cursos AS c
                                                    ON cs.idCursos = c.idCursos
                                                    INNER JOIN clases AS cl
                                                    ON cs.idClases = cl.idClases
                                                    left JOIN detalle_curso AS dc
                                                    ON cs.id_detalle_curso = dc.id_detalle_curso

                                                    left JOIN usuario AS u
                                                    ON dc.id_profesor = u.usuario_id
                                                    left JOIN formato_calificaciones AS fc
                                                    ON dc.id_formato_calificacion = fc.idformato_calificaciones
                                                    WHERE cs.$item = $valor");
           
           $stmt -> execute();  
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
           
            

    }
    static public function MdlEliminarCursoClase($tabla,$id_CursoE,$id_ClaseE){
        //validamos si existe un detalle asignado
        $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idCursos = ? AND idClases = ?");
        $consulta->execute([$id_CursoE,$id_ClaseE]);
        $result= $consulta->fetch(PDO::FETCH_OBJ);
        


        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCursos = ? AND idClases = ?");
        $respuesta = $stmt -> execute([$id_CursoE,$id_ClaseE]);

        if($respuesta == true )
        {
            if($result->id_detalle_curso != "" || $result->id_detalle_curso != null){
                $idDetalle_curso = $result->id_detalle_curso;
                $stmt2 = Conexion::conectar()->prepare("DELETE FROM detalle_curso WHERE id_detalle_curso = $idDetalle_curso");
                $stmt2 -> execute();
            }
            return "ok";
        }
        else
        {
            return "error";
        }
        $respuesta->close();
        $respuesta =null;
    }

    static public function MdlMostrarNombreTipo($tabla,$item,$valor){
     $stmt2 = Conexion::conectar()->prepare("SELECT * FROM $tabla AS cs
                                             INNER JOIN cursos AS c
                                             ON cs.idCursos = c.idCursos
                                             INNER JOIN clases AS cl
                                             ON cs.idClases = cl.idClases
                                             LEFT JOIN detalle_curso AS dc
                                             ON cs.id_detalle_curso = dc.id_detalle_curso
                                             INNER JOIN usuario AS u
                                             ON dc.id_profesor = u.usuario_id
                                             INNER JOIN formato_calificaciones AS fc
                                             ON dc.id_formato_calificacion = fc.idformato_calificacion
                                             WHERE cs.$item = $valor");
        $stmt2 -> execute();
        return $stmt2->fetchAll(PDO::FETCH_ASSOC);
        }
        
 }