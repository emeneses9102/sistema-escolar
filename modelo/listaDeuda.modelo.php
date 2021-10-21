<?php
require_once "conexion.php";
class ModeloListaDeuda{
    static public function mdlMostrarDeudores($tabla,$item,$valor){
        if($item != null)
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS ac
            INNER JOIN cobros AS c
            ON ac.idCobro = c.idCobros
            INNER JOIN alumno AS a
            ON ac.idAlumno = a.idAlumno
            WHERE ac.estado!=2 AND $item = $valor");
            $stmt -> execute();
       
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
   
        }
        else
        {//usamos esta consulta para listar todos los usuarios
            $stmt = Conexion::conectar()->prepare("SELECT  a.idAlumno,ap.nombres_apoderado, ap.apellidos_apoderado, CONCAT(ap2.nombres_apoderado,' ', ap2.apellidos_apoderado) AS apoderado2 , CONCAT(ap3.nombres_apoderado,' ', ap3.apellidos_apoderado) AS apoderado3,u.usuario_id,idAlumno_cobros,u.nombres,u.apellidos,u.dni,u.celular,u.correo,g.nombre_grado,ac.estado,COUNT(a.idAlumno)AS conteo,sum(case when ac.estado = 2 then 1 ELSE 0 end)AS pagos FROM $tabla AS ac
           INNER JOIN alumno a
            ON ac.idAlumno = a.idAlumno
            LEFT JOIN apoderado ap
            ON a.id_apoderado = ap.id_apoderado
            LEFT JOIN apoderado ap2
            ON a.id_apoderado2 = ap2.id_apoderado
            LEFT JOIN apoderado ap3
            ON a.id_apoderado3 = ap3.id_apoderado
            INNER JOIN usuario u
            ON a.id_usuario = u.usuario_id
            INNER JOIN cobros c
            ON ac.idCobro = c.idCobros
            INNER JOIN niveles AS n
            ON c.cob_nivel = n.idNiveles
            INNER JOIN matricula AS m
            ON a.idAlumno = m.idAlumno
            INNER JOIN seccion_grados sg
            ON m.idSeccion_Grados = sg.idSeccion_Grados
            INNER JOIN grados g
            ON sg.idGrados = g.idGrados
            INNER JOIN seccion s
            ON sg.idSeccion = s.idSeccion  GROUP BY  a.idAlumno 
            order by u.nombres asc
            ");
        
            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetchAll();
            
        }
        
        
    }

    static public function mdlMostrarDatos($tabla,$item,$valor){
        
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT( u.nombres,' ', u.apellidos) AS NombreCompleto, u.celular, u.dni, u.correo,
        CONCAT (ap.nombres_apoderado, ' ',ap.apellidos_apoderado) AS NombrePadre, ap.dni_apoderado AS dni_padre, ap.correo_apoderado AS correo_padre, ap.telefono_apoderado AS telefono_padre,
        CONCAT (ap2.nombres_apoderado, ' ',ap2.apellidos_apoderado) AS NombreMadre, ap2.dni_apoderado AS dni_madre, ap2.correo_apoderado AS correo_madre, ap2.telefono_apoderado AS telefono_madre,
        CONCAT (ap3.nombres_apoderado, ' ',ap3.apellidos_apoderado) AS NombreApoderado, ap3.dni_apoderado AS dni_apoderado, ap3.correo_apoderado AS correo_apoderado, ap3.telefono_apoderado AS telefono_apoderado,
        m.*, sg.*, g.*,n.*
        FROM $tabla AS a
        INNER JOIN usuario AS u
        ON u.usuario_id = a.id_usuario
        LEFT JOIN apoderado AS ap
        ON a.id_apoderado = ap.id_apoderado
        LEFT JOIN apoderado AS ap2
        ON a.id_apoderado2 = ap2.id_apoderado
        LEFT JOIN apoderado AS ap3
        ON a.id_apoderado3 = ap3.id_apoderado
        INNER JOIN matricula AS m
        ON a.idAlumno = m.idAlumno
        INNER JOIN seccion_grados AS sg
        ON m.idSeccion_Grados = sg.idSeccion_Grados
        INNER JOIN grados AS g
        ON sg.idGrados = g.idGrados
        INNER JOIN niveles AS n
        ON g.idNiveles = n.idNiveles
        WHERE a.$item = $valor");
        $stmt -> execute();
        //print_r($stmt->errorInfo());
        return $stmt->fetch(PDO::FETCH_ASSOC);
}

    static public function mdlMostrarPagosDeudores($tabla,$item,$valor){
        
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS ac
            INNER JOIN cobros AS c
            ON ac.idCobro = c.idCobros
            INNER JOIN alumno AS a
            ON ac.idAlumno = a.idAlumno
            WHERE $item = $valor AND ac.estado = 2");
            $stmt -> execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function mdlMostrarPagosDeudoresojo($tabla,$item,$valor){
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS ac
        INNER JOIN cobros AS c
        ON ac.idCobro = c.idCobros
        INNER JOIN alumno AS a
        ON ac.idAlumno = a.idAlumno
        WHERE $item = $valor AND ac.estado!=2 ");
        $stmt -> execute();
   
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}

    static public function mdlActualizarCobro($id,$monto,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET montoCobrar = $monto WHERE idAlumno_cobros = ?");
         $respuesta = $stmt -> execute([$id]);
        
         if($respuesta == true){
             return "ok";
         }else{
             return "error";
         }
         $respuesta->close();
        $respuesta =null;
    }
    static public function mdlValidarPago($montopagado,$id,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 2, monto_pagado = ? WHERE idAlumno_cobros = ?");
         $respuesta = $stmt -> execute([$montopagado, $id]);
        
         if($respuesta == true){
             return "ok";
         }else{
             return "error";
         }
         $respuesta->close();
        $respuesta =null;
    }

    static public function mdlRechazarPago($id,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 1 WHERE idAlumno_cobros = ?");
         $respuesta = $stmt -> execute([$id]);
        
         if($respuesta == true){
             return "ok";
         }else{
             return "error";
         }
         $respuesta->close();
        $respuesta =null;
    }

    static public function mdlExonerarCobro($id,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 2 WHERE idAlumno_cobros = ?");
         $respuesta = $stmt -> execute([$id]);
        
         if($respuesta == true){
             return "ok";
         }else{
             return "error";
         }
        $respuesta->close();
        $respuesta =null;
    }

    static public function mdlMostrarxID($tabla,$item,$valor){
        
            $stmt = Conexion::conectar()->prepare("SELECT  a.idAlumno,u.usuario_id,idAlumno_cobros,u.nombres,u.apellidos,u.dni,u.celular,u.correo,g.nombre_grado,ac.estado,n.idNiveles,g.idGrados, c.fecha_vencimiento, COUNT(a.idAlumno)AS conteo,sum(case when ac.estado = 2 then 1 ELSE 0 end)AS pagos FROM $tabla AS ac
           INNER JOIN alumno a
            ON ac.idAlumno = a.idAlumno
            LEFT JOIN apoderado ap
            ON a.id_apoderado = ap.id_apoderado
            INNER JOIN usuario u
            ON a.id_usuario = u.usuario_id
            INNER JOIN cobros c
            ON ac.idCobro = c.idCobros
            INNER JOIN niveles AS n
            ON c.cob_nivel = n.idNiveles
            INNER JOIN matricula AS m
            ON a.idAlumno = m.idAlumno
            INNER JOIN seccion_grados sg
            ON m.idSeccion_Grados = sg.idSeccion_Grados
            INNER JOIN grados g
            ON sg.idGrados = g.idGrados
            INNER JOIN seccion s
            ON sg.idSeccion = s.idSeccion  
            WHERE $item  = $valor 
            GROUP BY  a.idAlumno 
            order by u.nombres asc
            ");
            
        
            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetchAll();
        
    }
}