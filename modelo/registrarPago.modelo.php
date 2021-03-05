<?php

require_once "conexion.php";

class ModeloRegistrarPago{

    static public function mdlBuscarAlumno($value,$alumnoBuscar){
        if($value=="nombre"){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario AS u
            INNER JOIN alumno a
            ON a.id_usuario = u.usuario_id
            INNER JOIN apoderado ap
            ON a.id_apoderado = ap.id_apoderado
            WHERE nombres LIKE '%$alumnoBuscar%' OR apellidos LIKE '%$alumnoBuscar%'");
            $stmt -> execute();

        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario AS u
                                                INNER JOIN alumno a
                                                ON a.id_usuario = u.usuario_id
                                                INNER JOIN apoderado ap
                                                ON a.id_apoderado = ap.id_apoderado
                                                WHERE $value = $alumnoBuscar ");
        $stmt -> execute();
        }
        
        
        $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
    }

    static public function mdlBuscarAlumnoxID($idAlumnoBuscar,$tabla,$campo){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS u
        INNER JOIN alumno a
        ON a.id_usuario = u.usuario_id
        LEFT JOIN apoderado ap
        ON a.id_apoderado = ap.id_apoderado
        Left JOIN matricula AS m
        ON a.idAlumno = m.idAlumno
        left JOIN seccion_grados AS sg
        ON m.idSeccion_Grados = sg.idSeccion_Grados
        left JOIN grados AS g
        ON sg.idGrados = g.idGrados
        left JOIN niveles AS n
        ON g.idNiveles = n.idNiveles
        WHERE $campo = $idAlumnoBuscar");
        $stmt -> execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respuesta;
    }
}