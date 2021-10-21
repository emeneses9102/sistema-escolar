<?php
require_once "../modelo/apoderado.modelo.php";
class ajaxDatosApoderado{
    public function ajaxDetalledatosapoderado(){
        $valor = $this->id_deudaPagoDatos;
        $tabla = "apoderado";
        $item="alu.id_usuario";
        $respuesta = ModeloApoderado::mdlDetalledatosapoderado($tabla,$item,$valor);
        //var_dump($respuesta);
        echo json_encode($respuesta);
    }

    public function ajaxDetApoderado(){
        $valor = $this->idApoderado;
        $tabla = "apoderado";
        $item="id_apoderado";
        $respuesta = ModeloApoderado::mdlMostrarApoderado($tabla,$item,$valor);
        //var_dump($respuesta);
        echo json_encode($respuesta);
    }

}
if(isset($_POST["id_deudaPagoDatos"]))
{
    $listar = new ajaxDatosApoderado();
    $listar->id_deudaPagoDatos = $_POST["id_deudaPagoDatos"];
    $listar->ajaxDetalledatosapoderado();
}

if(isset($_POST["idApoderado"]))
{
    $listar = new ajaxDatosApoderado();
    $listar->idApoderado = $_POST["idApoderado"];
    $listar->ajaxDetApoderado();
}

?>