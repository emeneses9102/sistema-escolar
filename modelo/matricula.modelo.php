<?php
require_once "conexion.php";
class ModeloMatricula{
    static public function mdlRegistrarMatricula($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_alumno,idAlumno,idSeccion_Grados) VALUES (?,?,?)");
        $rpta = $stmt->execute([$datos['matCod_Alumno'],$datos['matID_Alumno'],$datos['matidSeccion']]);
       
        $stmt2 = Conexion::conectar()->prepare("SELECT * FROM cobros WHERE cob_nivel =?");
        $stmt2->execute([$datos['matidNivel']]);
        $respuesta2=$stmt2->fetchALL(PDO::FETCH_ASSOC);
        //var_dump($respuesta2);
        //print_r($stmt->errorInfo());
        foreach($respuesta2 as $item)
        {
            $stmt1 = Conexion::conectar()->prepare("INSERT INTO alumno_cobros(idAlumno,idCobro,montoCobrar) VALUES (?,?,?)");
            $stmt1->execute([$datos['matID_Alumno'],$item['idCobros'],$item['monto']]);
            
        }

        if($rpta == true)
        {
            return "ok";
        }
        else{
            return "error";
        }
        

        
        $rpta->close();
        $rpta =null;
    }

    static public function mdlRegistrarMatriculaGrupo($Grupo,$SeccionID,$id_nivel){
        foreach ($Grupo as $alumno) {
            $stmt = Conexion::conectar()->prepare("SELECT idAlumno FROM alumno WHERE cod_matricula =?");
            $stmt->execute([$alumno]);
            $respuesta=$stmt->fetch(PDO::FETCH_OBJ);

            $stmt = Conexion::conectar()->prepare("INSERT INTO matricula(cod_alumno,idAlumno,idSeccion_Grados) VALUES (?,?,?)");
            $rpta = $stmt->execute([$alumno,$respuesta->idAlumno,$SeccionID]);
        
            $stmt2 = Conexion::conectar()->prepare("SELECT * FROM cobros WHERE cob_nivel =?");
            $stmt2->execute([$id_nivel]);
            $respuesta2=$stmt2->fetchALL(PDO::FETCH_ASSOC);
            //var_dump($respuesta2);
            foreach($respuesta2 as $item)
            {
                $stmt1 = Conexion::conectar()->prepare("INSERT INTO alumno_cobros(idAlumno,idCobro,montoCobrar) VALUES (?,?,?)");
                $stmt1->execute([$respuesta->idAlumno,$item['idCobros'],$item['monto']]);
            }    
        }
        if($rpta == true)
            {
                return "ok";
            }
        else{
            return "error";
        }
        
    }
}



