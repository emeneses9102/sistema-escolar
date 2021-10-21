<?php
require_once "conexion.php";
class modeloListaCursos{
  static public function mdlMostrarListaCursos($tabla, $item, $valor){
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(dc.id_detalle_curso) AS numeroAlumnos,dc.id_detalle_curso, g.nombre_grado, n.nombre_nivel,s.nombre_seccion, u.nombres,u.apellidos, c.nombre_curso, sg.idSeccion_Grados,m.idAlumno FROM $tabla AS ccl
            INNER JOIN clases AS cl
            ON ccl.idClases = cl.idClases
            INNER JOIN seccion_grados AS sg
            ON cl.idSeccion_Grados = sg.idSeccion_Grados
            INNER JOIN grados AS g
            ON sg.idGrados = g.idGrados
            INNER JOIN seccion AS s
            ON sg.idSeccion = s.idSeccion
            INNER JOIN niveles AS n
            ON g.idNiveles = n.idNiveles
            INNER JOIN detalle_curso AS dc
            ON ccl.id_detalle_curso = dc.id_detalle_curso
            INNER JOIN profesor p
            ON dc.id_profesor = p.id_usuario
            INNER JOIN usuario AS u
            ON p.id_usuario = u.usuario_id
            INNER JOIN cursos AS c
            ON ccl.idCursos = c.idCursos
            LEFT JOIN matricula AS m
            ON cl.idSeccion_Grados = m.idSeccion_Grados
            GROUP BY dc.id_detalle_curso
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
    $stmt -> execute();
            //print_r($stmt->errorInfo());
    return $stmt->fetchAll();
  }

  static public function mdlFiltro1($tabla,$valor){
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(dc.id_detalle_curso) AS numeroAlumnos,dc.id_detalle_curso, g.nombre_grado, n.nombre_nivel,s.nombre_seccion, u.nombres,u.apellidos, c.nombre_curso, sg.idSeccion_Grados,m.idAlumno FROM $tabla AS ccl
            INNER JOIN clases AS cl
            ON ccl.idClases = cl.idClases
            INNER JOIN seccion_grados AS sg
            ON cl.idSeccion_Grados = sg.idSeccion_Grados
            INNER JOIN grados AS g
            ON sg.idGrados = g.idGrados
            INNER JOIN seccion AS s
            ON sg.idSeccion = s.idSeccion
            INNER JOIN niveles AS n
            ON g.idNiveles = n.idNiveles
            INNER JOIN detalle_curso AS dc
            ON ccl.id_detalle_curso = dc.id_detalle_curso
            INNER JOIN profesor p
            ON dc.id_profesor = p.id_usuario
            INNER JOIN usuario AS u
            ON p.id_usuario = u.usuario_id
            INNER JOIN cursos AS c
            ON ccl.idCursos = c.idCursos
            LEFT JOIN matricula AS m
            ON cl.idSeccion_Grados = m.idSeccion_Grados
            WHERE n.nombre_nivel = ?
            GROUP BY dc.id_detalle_curso
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
    $stmt -> execute([$valor]);
            //print_r($stmt->errorInfo());
    return $stmt->fetchAll();
  }

  static public function mdlFiltro2($tabla,$valor,$codNivel){
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(dc.id_detalle_curso) AS numeroAlumnos,dc.id_detalle_curso, g.nombre_grado, n.nombre_nivel,s.nombre_seccion, u.nombres,u.apellidos, c.nombre_curso, sg.idSeccion_Grados,m.idAlumno FROM $tabla AS ccl
            INNER JOIN clases AS cl
            ON ccl.idClases = cl.idClases
            INNER JOIN seccion_grados AS sg
            ON cl.idSeccion_Grados = sg.idSeccion_Grados
            INNER JOIN grados AS g
            ON sg.idGrados = g.idGrados
            INNER JOIN seccion AS s
            ON sg.idSeccion = s.idSeccion
            INNER JOIN niveles AS n
            ON g.idNiveles = n.idNiveles
            INNER JOIN detalle_curso AS dc
            ON ccl.id_detalle_curso = dc.id_detalle_curso
            INNER JOIN profesor p
            ON dc.id_profesor = p.id_usuario
            INNER JOIN usuario AS u
            ON p.id_usuario = u.usuario_id
            INNER JOIN cursos AS c
            ON ccl.idCursos = c.idCursos
            LEFT JOIN matricula AS m
            ON cl.idSeccion_Grados = m.idSeccion_Grados
            WHERE n.nombre_nivel = ? AND g.nombre_grado = ?
            GROUP BY dc.id_detalle_curso
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
    $stmt -> execute([$codNivel, $valor ]);
            //print_r($stmt->errorInfo());
    return $stmt->fetchAll();
  }

  static public function mdlFiltro3($tabla,$valor,$codNivel,$codGrado){
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(dc.id_detalle_curso) AS numeroAlumnos,dc.id_detalle_curso, g.nombre_grado, n.nombre_nivel,s.nombre_seccion, u.nombres,u.apellidos, c.nombre_curso, sg.idSeccion_Grados,m.idAlumno FROM $tabla AS ccl
            INNER JOIN clases AS cl
            ON ccl.idClases = cl.idClases
            INNER JOIN seccion_grados AS sg
            ON cl.idSeccion_Grados = sg.idSeccion_Grados
            INNER JOIN grados AS g
            ON sg.idGrados = g.idGrados
            INNER JOIN seccion AS s
            ON sg.idSeccion = s.idSeccion
            INNER JOIN niveles AS n
            ON g.idNiveles = n.idNiveles
            INNER JOIN detalle_curso AS dc
            ON ccl.id_detalle_curso = dc.id_detalle_curso
            INNER JOIN profesor p
            ON dc.id_profesor = p.id_usuario
            INNER JOIN usuario AS u
            ON p.id_usuario = u.usuario_id
            INNER JOIN cursos AS c
            ON ccl.idCursos = c.idCursos
            LEFT JOIN matricula AS m
            ON cl.idSeccion_Grados = m.idSeccion_Grados
            WHERE n.nombre_nivel = ? AND g.nombre_grado = ? AND s.nombre_seccion = ?
            GROUP BY dc.id_detalle_curso
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
    $stmt -> execute([$codNivel, $codGrado, $valor ]);
            //print_r($stmt->errorInfo());
    return $stmt->fetchAll();
  }
  
}