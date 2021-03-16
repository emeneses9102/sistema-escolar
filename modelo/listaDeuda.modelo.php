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
            WHERE $item = $valor AND ac.estado = 1");
            $stmt -> execute();
       
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
           
            
            
        }
        else
        {//usamos esta consulta para listar todos los usuarios
            $stmt = Conexion::conectar()->prepare("SELECT  a.idAlumno,u.usuario_id,idAlumno_cobros,u.nombres,u.apellidos,u.dni,u.celular,u.correo,g.nombre_grado,ac.estado,COUNT(a.idAlumno)AS conteo,sum(case when ac.estado = 2 then 1 ELSE 0 end)AS pagos FROM $tabla AS ac
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
            ON sg.idSeccion = s.idSeccion  GROUP BY  a.idAlumno 
            order by u.nombres asc
            ");
            $stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        
            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetchAll();
            
        }
        
        
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
        WHERE $item = $valor AND ac.estado = 1");
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