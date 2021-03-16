<?php

require_once "../controlador/listaDeuda.controlador.php";
require_once "../modelo/listaDeuda.modelo.php";
class ajaxListaDeuda{
   

    public function ajaxListarDeudaUsuario(){
        $valor = $this->id_deuda;
        $tabla = "alumno_cobros";
        $item="id_usuario";
        $respuesta = ModeloListaDeuda::mdlMostrarDeudores($tabla,$item,$valor);
        //var_dump($respuesta);
        echo json_encode($respuesta);
    }

    public function ajaxListarDeudaUsuarioPagos(){
        $valor = $this->id_deudaPago;
        $tabla = "alumno_cobros";
        $item="id_usuario";
        $respuesta = ModeloListaDeuda::mdlMostrarPagosDeudores($tabla,$item,$valor);
        //var_dump($respuesta);
        echo json_encode($respuesta);
    }
    public function ajaxListarDeudaUsuarioPagosojo(){
        $valor = $this->id_deudaPago1;
        $tabla = "alumno_cobros";
        $item="id_usuario";
        $respuesta = ModeloListaDeuda::mdlMostrarPagosDeudoresojo($tabla,$item,$valor);
        //var_dump($respuesta);
        echo json_encode($respuesta);
    }

    public function ajaxActualizarCobro(){
        $idCobro = $this->idCobro_;
        $monto = $this->monto;
        $tabla="alumno_cobros";
        $respuesta = ModeloListaDeuda::mdlActualizarcobro($idCobro,$monto,$tabla);
        return $respuesta;
    }

    public function ajaxExonerarCobro(){
        $id_Cobro = $this->id_cobro;
        $tabla="alumno_cobros";
        $respuesta = ModeloListaDeuda::mdlExonerarCobro($id_Cobro,$tabla);
        //var_dump($respuesta);
        echo $respuesta;
    }

    public function ajaxValidarPago(){
        $idv = $this->idAlumno_cobros;
        $montopagado = $this->monto_pagado;
        $tabla="alumno_cobros";
        $respuesta = ModeloListaDeuda::mdlValidarPago($montopagado,$idv,$tabla);
        //var_dump($respuesta);
        echo $respuesta;
    }

    public function ajaxBuscarxNiveles(){
        $valor = $this->idNivelD;
        $item="n.idNiveles";
        $tabla = "alumno_cobros";
        $respuesta = ModeloListaDeuda::mdlMostrarxID($tabla, $item, $valor);
        //var_dump($respuesta);
        echo json_encode($respuesta);
    }

    public function ajaxBuscarxGrados(){
        $valor = $this->idGradoD;
        $item="g.idGrados";
        $tabla = "alumno_cobros";
        $respuesta = ModeloListaDeuda::mdlMostrarxID($tabla, $item, $valor);
        //var_dump($respuesta);
        echo json_encode($respuesta);
    }
    public function ajaxBuscarxMeses(){
        $valor = $this->idmesesD;
        $item="MONTH(fecha_vencimiento)";
        $tabla = "alumno_cobros";
        $respuesta = ModeloListaDeuda::mdlMostrarxID($tabla, $item, $valor);
        //var_dump($respuesta);
        echo json_encode($respuesta);
    }

    public function ajaxBuscarxApellido(){
        $valor = "'".$this->apellidoD."'";
        $item="u.apellidos";
        $tabla = "alumno_cobros";
        $respuesta = ModeloListaDeuda::mdlMostrarxID($tabla, $item, $valor);
        //var_dump($respuesta);
        echo json_encode($respuesta);
    }
}

if(isset($_POST["id_deuda"]))
{
    
    $editar = new ajaxListaDeuda();
    $editar->id_deuda = $_POST["id_deuda"];
    $editar->ajaxListarDeudaUsuario();
}
if(isset($_POST["id_deudaPago"]))
{
    $editar = new ajaxListaDeuda();
    $editar->id_deudaPago = $_POST["id_deudaPago"];
    $editar->ajaxListarDeudaUsuarioPagos();
}
if(isset($_POST["id_deudaPago1"]))
{
    $editar = new ajaxListaDeuda();
    $editar->id_deudaPago1 = $_POST["id_deudaPago1"];
    $editar->ajaxListarDeudaUsuarioPagosojo();
}

if(isset($_POST["idCobro_"]))
{
    
    $editar = new ajaxListaDeuda();
    $editar->idCobro_ = $_POST["idCobro_"];
    $editar->monto = $_POST["monto"];
    $editar->ajaxActualizarCobro();
}

if(isset($_POST["id_cobro"]))
{  
    $editar = new ajaxListaDeuda();
    $editar->id_cobro = $_POST["id_cobro"];
    $editar->ajaxExonerarCobro();
}

if(isset($_POST["idNivelD"]))
{  
    $editar = new ajaxListaDeuda();
    $editar->idNivelD = $_POST["idNivelD"];
    $editar->ajaxBuscarxNiveles();
}

if(isset($_POST["idGradoD"]))
{  
    $editar = new ajaxListaDeuda();
    $editar->idGradoD = $_POST["idGradoD"];
    $editar->ajaxBuscarxGrados();
}

if(isset($_POST["idmesesD"]))
{  
    $editar = new ajaxListaDeuda();
    $editar->idmesesD = $_POST["idmesesD"];
    $editar->ajaxBuscarxMeses();
}

if(isset($_POST["apellidoD"]))
{  
    $editar = new ajaxListaDeuda();
    $editar->apellidoD = $_POST["apellidoD"];
    $editar->ajaxBuscarxApellido();
}

if(isset ($_POST["idAlumno_cobros"]) && isset ($_POST["monto_pagado"]))
{ 
    $validarpago = new ajaxListaDeuda();
    $validarpago->idAlumno_cobros = $_POST["idAlumno_cobros"];
    $validarpago->monto_pagado = $_POST["monto_pagado"];
    $validarpago->ajaxValidarPago();
    
}