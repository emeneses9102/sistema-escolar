<?php
require_once "conexion.php";

class ModeloCursosProfesor{
    //Mostrar Cursos
    static public function mdlMostrarCursos($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT cu.nombre_curso AS curso, n.nombre_nivel AS nivel, g.nombre_grado AS grado, s.nombre_seccion AS nseccion
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
            WHERE dc.$item = $valor");
            
            $stmt -> execute();
            return $stmt->fetchALL(PDO::FETCH_ASSOC);;
        }
       
    }
}