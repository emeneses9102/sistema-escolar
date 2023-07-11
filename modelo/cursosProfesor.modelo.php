<?php
require_once "conexion.php";

class ModeloCursosProfesor{
    //Mostrar Cursos
    static public function mdlMostrarCursos($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT cc.id_detalle_curso AS idCurso,cu.nombre_curso AS curso, n.nombre_nivel AS nivel, g.nombre_grado AS grado, s.nombre_seccion AS nseccion,
            (SELECT COUNT(a.idalumno) AS cantidad
            FROM matricula AS m
            INNER JOIN alumno AS a
            on m.idAlumno = a.idAlumno
            WHERE m.idSeccion_Grados = sg.idSeccion_Grados
            ) AS total_Alumnos
            FROM $tabla AS cc
            INNER JOIN cursos AS cu
            ON cc.idCursos = cu.idCursos
            INNER JOIN clases AS cl
            ON cc.idClases = cl.idClases
            left JOIN detalle_curso AS dc
            ON cc.id_detalle_curso = dc.id_detalle_curso
            INNER JOIN seccion_grados sg
            ON cl.idSeccion_Grados = sg.idSeccion_Grados
            INNER JOIN grados As g 
            ON sg.idGrados = g.idGrados
            INNER JOIN niveles AS n
            ON g.idNiveles = n.idNiveles
            INNER JOIN seccion AS s
            ON sg.idSeccion = s.idSeccion
            WHERE dc.$item = $valor
            ORDER BY idCurso asc");
            
            $stmt -> execute();
            return $stmt->fetchALL(PDO::FETCH_ASSOC);;
        }
       
    }
    static public function mdlMostrarCursosxID($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT sg.idSeccion_grados AS idSeccionGrado, cc.id_detalle_curso AS idCurso,cu.nombre_curso AS curso, n.nombre_nivel AS nivel, g.nombre_grado AS grado, s.nombre_seccion AS nseccion
            FROM $tabla AS cc
            INNER JOIN cursos AS cu
            ON cc.idCursos = cu.idCursos
            INNER JOIN clases AS cl
            ON cc.idClases = cl.idClases
            left JOIN detalle_curso AS dc
            ON cc.id_detalle_curso = dc.id_detalle_curso
            INNER JOIN seccion_grados sg
            ON cl.idSeccion_Grados = sg.idSeccion_Grados
            INNER JOIN grados As g 
            ON sg.idGrados = g.idGrados
            INNER JOIN niveles AS n
            ON g.idNiveles = n.idNiveles
            INNER JOIN seccion AS s
            ON sg.idSeccion = s.idSeccion
            WHERE cc.$item = $valor
            ORDER BY idCurso asc");
            
            $stmt -> execute();
            return $stmt->fetchALL(PDO::FETCH_ASSOC);;
        }
       
    }
    static public function mdlMostrarAlumnosCurso($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT a.idAlumno, u.nombres, u.apellidos
            FROM $tabla AS m
            INNER JOIN alumno AS a
            on m.idAlumno = a.idAlumno
            INNER JOIN usuario AS u
            ON a.id_usuario = u.usuario_id
            WHERE m.$item = $valor
            ORDER BY u.apellidos asc");
            
            $stmt -> execute();
            return $stmt->fetchALL(PDO::FETCH_ASSOC);;
        }
       
    }
    static public function mdlRegistrarCalificacion($tabla,$datos){
        $stmt2 = Conexion :: conectar()->prepare("SELECT * FROM $tabla WHERE nombre_nota = ? AND idPeriodo_academico = ? AND idDetalle_curso = ? ");
        $stmt2->execute([$datos['nombreCalificacion'], $datos['periodoVal'],$datos['id_curso_']]);    
        if($stmt2->rowCount()>0){
          return "repetido";
        }else{
          $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_nota,siglas_nota,peso_nota,subnota,detalle_nota,idPeriodo_academico,idDetalle_curso) VALUES (?,?,?,?,?,?,?)");
          $respuesta = $stmt->execute([$datos['nombreCalificacion'],$datos['siglasCalificacion'],$datos['pesoCalificacion'],$datos['chkSubNotas'],$datos['detalleCalificaciones'],$datos['periodoVal'],$datos['id_curso_']]);
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
    static public function mdlMostrarNotasParciales($tabla,$valor1,$valor2){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla
        WHERE idPeriodo_academico = $valor2 AND idDetalle_curso = $valor1 AND subnota =1
        ");
        $stmt -> execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    static public function mdlRegistrarCalificacionParcial($tabla,$datos){
        $stmt2 = Conexion :: conectar()->prepare("SELECT * FROM $tabla WHERE nombreNota_parcial = ? AND idConfNotas = ?");
        $stmt2->execute([$datos['nombreNotaParcial'],$datos['idConfNotas'] ]);    
        if($stmt2->rowCount()>0){
          return "repetido";
        }else{
          $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreNota_parcial,siglasNota_parcial,pesoNota_parcial,idConfNotas,detalleNota_parcial) VALUES (?,?,?,?,?)");
          $respuesta = $stmt->execute([$datos['nombreNotaParcial'],$datos['siglasNotaParcial'],$datos['pesoNotaParcial'],$datos['notaReferenciada'],$datos['detalleNotaParcial']]);
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