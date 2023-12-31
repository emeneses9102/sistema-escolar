<?php 
require_once "conexion.php";

class ModeloReporteCobros{
    static public function mdlCantidadTotalCobros($value1,$value2,$value,$valorr,$valorrr){

        $condicional;
        if($value == 0){
            $condicional = " ";
        }else{
            $condicional = "AND gra.idNiveles =".$value." ";
        }

        $condicional1;

        if($valorr == 0){
            $condicional1 = " ";
        }else{
            $condicional1 = "AND gra.idGrados =".$valorr." ";
        }

        $condicional2;

        if($valorrr == 0){
            $condicional2 = " ";
        }else{
            $condicional2 = "AND sec.idSeccion =".$valorrr." ";
        }

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS TotalCobros FROM matricula AS mat
        INNER JOIN alumno AS alu ON mat.idAlumno = alu.idAlumno
        INNER JOIN alumno_cobros  as aluco ON  alu.idAlumno = aluco.idAlumno
        INNER JOIN cobros AS co ON  aluco.idCobro = co.idCobros 
        INNER JOIN seccion_grados AS secgra ON mat.idSeccion_Grados = secgra.idSeccion_Grados
        INNER JOIN grados AS gra ON secgra.idGrados = gra.idGrados
        INNER JOIN seccion AS sec ON secgra.idSeccion = sec.idSeccion
        INNER JOIN niveles AS ni ON  gra.idNiveles = ni.idNiveles
        WHERE co.fecha_vencimiento BETWEEN '$value1' AND '$value2' ".$condicional." ".$condicional1." ".$condicional2." ; ");
        $stmt -> execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respuesta;

    }


    static public function mdlCantidadTotalCobrosPagados($value1,$value2,$value,$valorr,$valorrr){
        $condicional;
        if($value == 0){
            $condicional = ";";
        }else{
            $condicional = "AND gra.idNiveles =".$value." ";
        }

        $condicional1;

        if($valorr == 0){
            $condicional1 = " ";
        }else{
            $condicional1 = "AND gra.idGrados =".$valorr." ";
        }

        $condicional2;

        if($valorrr == 0){
            $condicional2 = " ";
        }else{
            $condicional2 = "AND sec.idSeccion =".$valorrr.";";
        }

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS TotalCobrosPagados FROM matricula AS mat
        INNER JOIN alumno AS alu ON mat.idAlumno = alu.idAlumno
        INNER JOIN alumno_cobros  as aluco ON  alu.idAlumno = aluco.idAlumno
        INNER JOIN cobros AS co ON  aluco.idCobro = co.idCobros 
        INNER JOIN seccion_grados AS secgra ON mat.idSeccion_Grados = secgra.idSeccion_Grados
        INNER JOIN grados AS gra ON secgra.idGrados = gra.idGrados
        INNER JOIN seccion AS sec ON secgra.idSeccion = sec.idSeccion
        INNER JOIN niveles AS ni ON  gra.idNiveles = ni.idNiveles
        WHERE co.fecha_vencimiento BETWEEN '$value1' AND '$value2' AND aluco.estado=2 ".$condicional." ".$condicional1." ".$condicional2);
        $stmt -> execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respuesta;
    }

    static public function mdlCantidadTotalCobrosgraficocircular($value,$value1,$value2,$value3,$value4){

        $condicional;
        if($value == 0){
            $condicional = " ";
        }else{
            $condicional = "WHERE gra.idNiveles =".$value." ";
        }

        $condicional1;

        if($value1 == 0){
            $condicional1 = " ";
        }else{
            $condicional1 = "AND gra.idGrados =".$value1." ";
        }

        $condicional2;

        if($value2 == 0){
            $condicional2 = " ";
        }else{
            $condicional2 = "AND sec.idSeccion =".$value2." ";
        }

        $condicional3;

        if($value3 == 0){
            $condicional3 = " ";
        }else if($value == 0 && !($value3 == 0)){
            $condicional3 = "WHERE co.fecha_vencimiento BETWEEN '$value3' AND '$value4'";
        }else{
            $condicional3 = "AND co.fecha_vencimiento BETWEEN '$value3' AND '$value4'";
        }

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS TotalCobros FROM matricula AS mat
        INNER JOIN alumno AS alu ON mat.idAlumno = alu.idAlumno
        INNER JOIN alumno_cobros  as aluco ON  alu.idAlumno = aluco.idAlumno
        INNER JOIN cobros AS co ON  aluco.idCobro = co.idCobros 
        INNER JOIN seccion_grados AS secgra ON mat.idSeccion_Grados = secgra.idSeccion_Grados
        INNER JOIN grados AS gra ON secgra.idGrados = gra.idGrados
        INNER JOIN seccion AS sec ON secgra.idSeccion = sec.idSeccion
        INNER JOIN niveles AS ni ON  gra.idNiveles = ni.idNiveles "
        .$condicional." ".$condicional1." ".$condicional2." ".$condicional3." ; ");
        $stmt -> execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respuesta;

    }

    static public function mdlCantidadTotalCobrosPagadosgraficocircular($value,$value1,$value2,$value3,$value4){
        $condicional;
        if($value == 0){
            $condicional = " ";
        }else{
            $condicional = "AND gra.idNiveles =".$value." ";
        }

        $condicional1;

        if($value1 == 0){
            $condicional1 = " ";
        }else{
            $condicional1 = "AND gra.idGrados =".$value1." ";
        }

        $condicional2;

        if($value2 == 0){
            $condicional2 = " ";
        }else{
            $condicional2 = "AND sec.idSeccion =".$value2." ";
        }

        $condicional3;

        if($value3 == 0){
            $condicional3 = " ";
        }else{
            $condicional3 = "AND co.fecha_vencimiento BETWEEN '$value3' AND '$value4'";
        }

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS TotalCobrosPagados FROM matricula AS mat
        INNER JOIN alumno AS alu ON mat.idAlumno = alu.idAlumno
        INNER JOIN alumno_cobros  as aluco ON  alu.idAlumno = aluco.idAlumno
        INNER JOIN cobros AS co ON  aluco.idCobro = co.idCobros 
        INNER JOIN seccion_grados AS secgra ON mat.idSeccion_Grados = secgra.idSeccion_Grados
        INNER JOIN grados AS gra ON secgra.idGrados = gra.idGrados
        INNER JOIN seccion AS sec ON secgra.idSeccion = sec.idSeccion
        INNER JOIN niveles AS ni ON  gra.idNiveles = ni.idNiveles
        WHERE aluco.estado=2 ".$condicional." ".$condicional1." ".$condicional2." ".$condicional3." ; ");
        $stmt -> execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respuesta;
    }

    static public function mdlNivelNom($value1,$value2,$value3){

        $condicional;
        $condicional1;
        $condicional2;
        $condicional3;
        if($value2 == 0){
            $condicional = " ";
            $condicional1 = " ";
        }else{
            $condicional = ",gra.nombre_grado";
            $condicional1 = "AND gra.idGrados=".$value2." ";

            if($value3 == 0){
                $condicional2 = " ";
                $condicional3 = " ";
            }else{
                $condicional2 = ",sec.nombre_seccion";
                $condicional3 = "AND sec.idSeccion=".$value3." ";
            }
        }
        
        if($value3 == 0){

        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT ni.nombre_nivel ".$condicional."
        FROM niveles AS ni 
        INNER JOIN grados AS gra ON ni.idNiveles=gra.idNiveles  
        WHERE gra.idNiveles='$value1' ".$condicional1." ; ");
        $stmt -> execute();
        return $stmt->fetchAll();

        }else{

        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT gra.nombre_grado ".$condicional2." 
        FROM grados AS gra
        INNER JOIN seccion_grados AS sec_gra ON gra.idGrados = sec_gra.idGrados 
        INNER JOIN seccion AS sec ON sec_gra.idSeccion = sec.idSeccion  
        WHERE gra.idGrados='$value2' ".$condicional3." ; ");
        $stmt -> execute();
        return $stmt->fetchAll();

        }

    }

    static public function mdlIngresoSoles($value,$value1,$value2,$value3,$value4){

        $condicional;
        if($value == 0){
            $condicional = " ";
        }else{
            $condicional = "AND gra.idNiveles =".$value." ";
        }

        $condicional1;

        if($value1 == 0){
            $condicional1 = " ";
        }else{
            $condicional1 = "AND gra.idGrados =".$value1." ";
        }

        $condicional2;

        if($value2 == 0){
            $condicional2 = " ";
        }else{
            $condicional2 = "AND sec.idSeccion =".$value2." ";
        }

        $stmt = Conexion::conectar()->prepare("SELECT SUM(aluco.monto_pagado) AS monto_pagado FROM matricula AS mat
        INNER JOIN alumno AS alu ON mat.idAlumno = alu.idAlumno
        INNER JOIN alumno_cobros  as aluco ON  alu.idAlumno = aluco.idAlumno
        INNER JOIN cobros AS co ON  aluco.idCobro = co.idCobros 
        INNER JOIN seccion_grados AS secgra ON mat.idSeccion_Grados = secgra.idSeccion_Grados
        INNER JOIN grados AS gra ON secgra.idGrados = gra.idGrados
        INNER JOIN seccion AS sec ON secgra.idSeccion = sec.idSeccion
        INNER JOIN niveles AS ni ON  gra.idNiveles = ni.idNiveles 
        WHERE  co.fecha_vencimiento BETWEEN '$value3' AND '$value4' ".$condicional." ".$condicional1." ".$condicional2." ; ");
        $stmt -> execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respuesta;

    }
}
?>