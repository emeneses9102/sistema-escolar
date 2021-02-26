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
}

if(isset($_POST["id_deuda"]))
{
    
    $editar = new ajaxListaDeuda();
    $editar->id_deuda = $_POST["id_deuda"];
    $editar->ajaxListarDeudaUsuario();
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