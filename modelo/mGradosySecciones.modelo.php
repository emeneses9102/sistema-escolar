<?php 
require_once "conexion.php";
class ModeloGradosySecciones{
    
    static public function mdlCrearGrado($tabla,$datos){
        $consultaID = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idNiveles = ? AND nombre_grado = ? ");
        $consultaID->execute([$datos['niveles'], $datos['nombreGrado']]);
        $consultaID->fetch(PDO::FETCH_OBJ);
        if($consultaID->rowCount()>0){
            return 'repet';
        }


        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idNiveles, nombre_grado) VALUES (?,?)");
        $respuesta = $stmt->execute([$datos['niveles'], $datos['nombreGrado']]);
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
    
    static public function mdlMostrarGrados($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("SELECT * from $tabla INNER JOIN niveles ON $tabla.idNiveles = niveles.idNiveles WHERE $tabla.idNiveles = ?");
        $stmt -> execute([$datos]);
        $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
    }

    static public function MdlActualizarGrados($tabla,$datos){
        if($datos['nombreGrado']==""){
            return "empty";
        }
        //validamos si el grado se repite
        $smt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre_grado= ? AND idNiveles=?");
        $smt -> execute([$datos['nombreGrado'], $datos['eniveles']]);
        $respuesta = $smt->fetch(PDO::FETCH_OBJ);
        
        if($respuesta != null){
            return "repet";
        }else{
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_grado = ?, idNiveles = ? WHERE idGrados = ?");
            $respuesta =$stmt ->execute([$datos['nombreGrado'], $datos['eniveles'], $datos['idGrado']]);
            
            if($respuesta == true){
                return "ok";
            }else{
                return "error";
            }

        }

    }

    static public function MdlEliminarGrado($valor,$tabla){
        $stmt2 = Conexion::conectar()->prepare("DELETE FROM seccion WHERE id_grado= ? ");
        $respuesta2 = $stmt2 -> execute([$valor]);
        
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idGrados= ? ");
        $respuesta = $stmt -> execute([$valor]);
        
        

        if($respuesta == true && $respuesta2 == true){
            return "ok";
        }else{
            return "error";
        }
         
    }

    static public function mdlCrearSeccion($tabla,$datos){
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_seccion, letraCodigo) VALUES (?,?)");
        $respuesta = $stmt->execute([$datos['nombreSeccion'], $datos['letraCodigo']]);
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
    

    static public function MdlRegistrarSeccion($tabla, $dato1, $dato2){
        //validamos usuario
        $consultaID = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idSeccion = ? AND idGrados = ?");
        $consultaID->execute([$dato1,$dato2]);
        $result= $consultaID->fetch(PDO::FETCH_OBJ);
        if($consultaID->rowCount()>0){
            return 'repet';
        }
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idSeccion,idGrados) VALUES (?,?)");
        $respuesta = $stmt->execute([$dato1,$dato2 ]);
       
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

    static public function MdlMostrarSecciones($tabla, $datos){
        if($datos == ""){
            $stmt = Conexion::conectar()->prepare("SELECT * from $tabla ");
            $stmt -> execute();
            $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * from seccion_grados AS sg 
                                                    INNER JOIN seccion s
                                                    ON sg.idSeccion = s.idSeccion
                                                    WHERE idGrados = ? ORDER BY s.nombre_seccion ASC");
            $stmt -> execute([$datos]);
            $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //print_r($stmt->errorInfo());
        }
        
        
        
        return $respuesta;

    }

    static public function MdlMostrarSecciones_Grados($tabla, $datos){
        
            $stmt = Conexion::conectar()->prepare("SELECT  idSeccion_Grados, nombre_grado, nombre_seccion, nombre_nivel,s.idSeccion 
                                                    FROM $tabla AS  sg
                                                    INNER JOIN grados AS g
                                                    ON sg.idGrados = g.idGrados
                                                    INNER JOIN seccion AS s
                                                    ON sg.idSeccion = s.idSeccion
                                                    INNER JOIN niveles n
                                                    ON g.idNiveles = n.idNiveles
                                                    WHERE g.idGrados= ?
                                                    ORDER BY nombre_grado ASC");
            $stmt -> execute([$datos]);
            $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //print_r($stmt->errorInfo());
        
        return $respuesta;

    }

    static public function MdlMostrarSD($idGrado,$idSeccion){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM seccion AS s
                                                WHERE  s.idSeccion NOT IN 
                                                (SELECT idSeccion FROM seccion_grados WHERE idGrados= ?)");
         $stmt -> execute([$idGrado]);
         $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
         //print_r($stmt->errorInfo());
         return $respuesta;                                       
    }

    static public function MdlEliminarSG($tabla,$dato){
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idSeccion_Grados =?");
            $respuesta= $stmt -> execute([$dato]);
            //print_r($stmt->errorInfo());
            if($respuesta == true){
                return "ok";
            }else{
                return "error";
            }
    }


    
}