<?php
require_once "../controlador/institucion.controlador.php";
require_once "../modelo/institucion.modelo.php";

class AjaxInstitucion {
  public function ajaxRegistrarCuenta(){
    $respuesta = ControladorInstitucion::ctrRegistrarcuenta();
        //var_dump($respuesta);
    echo $respuesta;
  }
  public function ajaxActualizarCuentas(){
    $tabla="cuentas";
    $respuesta = ModeloInstitucion::MdlMostrarCuentas($tabla);
        //var_dump($respuesta);
    echo json_encode($respuesta);
  }
  public function ajaxActualizarCuentaExistente(){
    $nCuenta = $this->nCuenta;
    $aCuenta = $this->aCuenta;
    $respuesta = ModeloInstitucion::mdlActualizarCuenta($nCuenta,$aCuenta);
        //var_dump($respuesta);
    echo $respuesta;
  }
  public function ajaxEliminarCuenta(){
    $dCuenta = $this->dCuenta;
    $respuesta = ModeloInstitucion::mdlEliminarCuenta($dCuenta);
        //var_dump($respuesta);
    echo $respuesta;
  }
  public function ajaxDatosCulqui(){
    $llave = $this->llave;
    $titulo = $this->titulo;
    $llave_publica = $this->llave_publica;
    $comision_culqi = $this->comision_culqi;
    $respuesta = ModeloInstitucion::mdlDatosCulqui($llave,$titulo,$llave_publica,$comision_culqi);
        //var_dump($respuesta);
    echo $respuesta;
  }

  public function ajaxDatosPaypal(){
    $titulo_paypal = $this->titulo_paypal;
    $url_paypal = $this->url_paypal;
    $comision_paypal = $this->comision_paypal;
    $respuesta = ModeloInstitucion::mdlDatosPaypal($titulo_paypal,$url_paypal,$comision_paypal);
        //var_dump($respuesta);
    echo $respuesta;
  }

  public function ajaxInformacionPago(){
    $tabla="configuracion";
    $respuesta = ModeloInstitucion::MdlInformacionPago($tabla);
        //var_dump($respuesta);
    echo json_encode($respuesta);
  }

  public function ajaxDatoCuenta(){
    $tabla="cuentas";
    $idCuenta = $this->idCuenta;
    $respuesta = ModeloInstitucion::MdlMostrarDatoCuenta($tabla,$idCuenta);
        //var_dump($respuesta);
    echo json_encode($respuesta);
  }

  public function ajaxEstadoCulqi(){
    $estadoCulqi = $this->estadoCulqi;
    $respuesta = ModeloInstitucion::mdlEstadoCulqi($estadoCulqi);
        //var_dump($respuesta);
    echo $respuesta;
  }

  public function ajaxEstadoPaypal(){
    $estadoPaypal = $this->estadoPaypal;
    $respuesta = ModeloInstitucion::mdlEstadoPaypal($estadoPaypal);
        //var_dump($respuesta);
    echo $respuesta;
  }
}






if(isset($_POST["cuenta"]))
{
    $registrar = new AjaxInstitucion();
    $registrar->cuenta = $_POST["cuenta"];
    $registrar->ajaxRegistrarCuenta();
}

if(isset($_POST["actualizarCuenta"]))
{
    $actualizar = new AjaxInstitucion();
    $actualizar->ajaxActualizarCuentas();
}

if(isset($_POST["nCuenta"]))
{
    $actualizar = new AjaxInstitucion();
    $actualizar->nCuenta = $_POST["nCuenta"];
    $actualizar->aCuenta = $_POST["aCuenta"];
    $actualizar->ajaxActualizarCuentaExistente();
}

if(isset($_POST["dCuenta"]))
{
    $eliminar = new AjaxInstitucion();
    $eliminar->dCuenta = $_POST["dCuenta"];
    $eliminar->ajaxEliminarCuenta();
}

if(isset($_POST["llave"]))
{
    $culqui = new AjaxInstitucion();
    $culqui->llave = $_POST["llave"];
    $culqui->titulo = $_POST["titulo"];
    $culqui->llave_publica = $_POST["llave_publica"];
    $culqui->comision_culqi = $_POST["comision_culqi"];
    $culqui->ajaxDatosCulqui();
}
if(isset($_POST["titulo_paypal"]))
{
    $paypal = new AjaxInstitucion();
    $paypal->titulo_paypal = $_POST["titulo_paypal"];
    $paypal->url_paypal = $_POST["url_paypal"];
    $paypal->comision_paypal = $_POST["comision_paypal"];
    $paypal->ajaxDatosPaypal();
}

if(isset($_POST["culqui"]))
{
    $datos = new AjaxInstitucion();
    $datos->ajaxInformacionPago();
}

if(isset($_POST["idCuenta"]))
{
    $datos = new AjaxInstitucion();
    $datos->idCuenta = $_POST["idCuenta"];
    $datos->ajaxDatoCuenta();
}

if(isset($_POST["estadoCulqi"]))
{
    $datos = new AjaxInstitucion();
    $datos->estadoCulqi = $_POST["estadoCulqi"];
    $datos->ajaxEstadoCulqi();
}

if(isset($_POST["estadoPaypal"]))
{
    $datos = new AjaxInstitucion();
    $datos->estadoPaypal = $_POST["estadoPaypal"];
    $datos->ajaxEstadoPaypal();
}