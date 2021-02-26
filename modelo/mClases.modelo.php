<?php
require_once "conexion.php";
class ModeloClases{
    static public function mdlCrearClase($tabla,$datos){
        $consultaID = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idSeccion_Grados = ? OR codigo_clase = ?");
        $consultaID->execute([$datos['idSeccion_grados'],$datos['codigoClase']]);
        $result= $consultaID->fetch(PDO::FETCH_OBJ);
        //print_r($consultaID->errorInfo());
        if($consultaID->rowCount()>0){
            return 'repet';
        }

        $stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla(codigo_clase,nombre_aula,idSeccion_Grados) VALUES (?,?,?)");
        $respuesta = $stmt->execute([$datos['codigoClase'],$datos['nombre_clase'],$datos['idSeccion_grados']]);
        //print_r($stmt->errorInfo());
        if($respuesta == true)
            {
                return "ok";
            }
            else{
                return "error";
            }
    }

    static public function MdlMostrarclases($tabla, $item, $valor){
        if($valor != ""){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $item = $valor");
            
            $stmt -> execute();
       
           return $stmt->fetch(PDO::FETCH_OBJ);
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT  * FROM clases AS c
            INNER JOIN seccion_grados AS sg
            ON c.idSeccion_Grados = sg.idSeccion_Grados
            INNER JOIN grados AS g
            ON sg.idGrados = g.idGrados
            INNER JOIN niveles n
            ON g.idNiveles = n.idNiveles
            INNER JOIN seccion s
            ON sg.idSeccion = s.idSeccion");
            $stmt -> execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }

                                               
    }

    static public function mdlActualizarClases($tabla,$datos){
        $stmt = Conexion::conectar()->prepare ("UPDATE $tabla SET codigo_clase = ?,nombre_aula=? WHERE idClases = ?");
        $respuesta = $stmt->execute([$datos['ecodigo_clase'],$datos['enombre_clase'],$datos['idClase']]);
        //print_r($stmt->errorInfo());
        if($respuesta == true)
            {
                return "ok";
            }
            else{
                return "error";
            }
    }

    static public function mdlCrearDetalleCurso($tabla,$datos){
        $stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla(id_formato_calificacion,id_profesor,cod_curso_clase) VALUES (?,?,?)");
        $respuesta = $stmt->execute([$datos['idFormato_calif'],$datos['idProfesor_'],$datos['cod_curso']]);
        //print_r($stmt->errorInfo());
        if($respuesta == true)
            {
                $stmt = Conexion::conectar()->prepare ("SELECT * FROM $tabla WHERE cod_curso_clase=?");
                $stmt->execute([$datos['cod_curso']]);
                $respuesta =$stmt->fetch(PDO::FETCH_OBJ);


                $query = Conexion::conectar()->prepare ("UPDATE cursos_clases SET id_detalle_curso = ? WHERE cod_curso = ?");
                $respuesta2= $query->execute([$respuesta->id_detalle_curso,$datos['cod_curso'] ]);

                if($respuesta2 == true)
                {
                    return "ok";
                }
                else{
                    return "error1";
                }

            }
            else{
                return "error2";
            }
    }
}