<?php 
require_once "conexion.php";
class ModeloCobros{
    static public function mdlRegistrarCobro($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo,monto,cob_nivel,detalle,fecha_vencimiento) VALUES (?,?,?,?,?)");
        $respuesta = $stmt->execute([$datos['cod_pago'],$datos['monto'],$datos['cob_niveles'],$datos['detalle_pago'],$datos['fecha_vencimiento'] ]);
       
    
        //Actualizamos alumno_cobros
        $stmt2 = Conexion :: conectar()->prepare("SELECT * FROM alumno_cobros AS ac
        INNER JOIN alumno a
         ON ac.idAlumno = a.idAlumno
         
         INNER JOIN usuario u
         ON a.id_usuario = u.usuario_id
         INNER JOIN cobros c
         ON ac.idCobro = c.idCobros
         INNER JOIN niveles AS n
         ON c.cob_nivel = n.idNiveles
         WHERE n.idNiveles=?
      GROUP BY ac.idAlumno
      ");
      $stmt2->execute([$datos['cob_niveles']]);    
      if($stmt2->rowCount()>0){
          
        $respuesta2 = $stmt2->fetchALL(PDO::FETCH_OBJ);
        $select = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo =?");
        $select ->execute([$datos['cod_pago']]);
        $selectRpta = $select->fetch(PDO::FETCH_OBJ);
        foreach($respuesta2 as $value){
            $insert = Conexion::conectar()->prepare("INSERT INTO alumno_cobros(idAlumno,idCobro,montoCobrar) VALUES (?,?,?)");
            $insert->execute([$value->idAlumno, $selectRpta->idCobros, $datos['monto']]);   
        }
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
    
    static public function mdlMostrarcobros($item,$valor,$tabla){
        if($valor !=""){
            $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla 
            INNER JOIN niveles
            ON $tabla.cob_nivel = niveles.idNiveles
             WHERE $item = $valor");

            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        else{
            $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla as c 
                                                INNER JOIN niveles as n
                                                ON c.cob_nivel = n.idNiveles ORDER BY c.cob_nivel asc
                                                ");
            
            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
    }

    static public function mdlActualizarCobro($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = ? ,monto = ? ,cob_nivel = ? ,detalle = ?,fecha_vencimiento = ? WHERE idCobros= ?");
        $respuesta = $stmt->execute([$datos['cod_editpago'],$datos['monto'],$datos['cob_niveles'],$datos['detalle_pago'],$datos['fecha_vencimiento'], $datos['id_editCobro'] ]);
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

    static public function mdlEliminarCobro($item,$valor,$tabla){
       
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = $valor ");
        $respuesta = $stmt -> execute();

        if($respuesta == true )
        {
            return "ok";
        }
        else
        {
            return "error";
        }
        $respuesta->close();
        $respuesta =null;
    }
        
}