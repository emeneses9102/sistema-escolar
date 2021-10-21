<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fas fa-file-invoice-dollar mr-1"></i>Consolidado de Tesorería</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fas fa-file-invoice-dollar"></i></li>
    <li class="breadcrumb-item"><a href="#">Pagos pendientes</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <input type="text" id="id_deudaAlumno" value="<?php echo $_SESSION['usuario_id'] ?>" hidden>
    <form action="">
      <div class="tile">
        <?php
        $item = "usuario_id";
        $valor = $_SESSION['usuario_id'];
        $cobrosAlum = ControladorPagoPendiente::ctrMostrarCobrosxAlumno($item, $valor);
        if (!empty($cobrosAlum)) {
        ?>
          <div>
            <h4 class="tile-title">Pagos pendientes</h4>
            <div class="container form-inline">
              <button type="button" class="btn btn-warning ml-auto" data-toggle="modal" data-target="#modalNumeroCuentas" id="numero_cuentas">Cuentas bancarias de pago</button>
            </div>
            <div class="table-responsive container">
              <table class="table text-center" id="table_pagosPendientes">
                <thead class="table-warning">
                  <tr>
                    <th>N° Documento</th>
                    <th>Detalle</th>
                    <th>Fecha Venc.</th>
                    <th>Monto a pagar</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php


                  foreach ($cobrosAlum as $value) {
                    $alerta = ($value["estado"] == "3") ? "<i class='fa fa-info-circle ml-2' aria-hidden='true' title='Enviado a revisión' style='color:#de4747; font-size: 1.6em;'></i>" : "";
                    echo '<tr>
                                      
                                        <td>' . $value["codigo"] . '</td>
                                        <td>' . $value['detalle'] . '</td>
                                        <td>' . $value['fecha_vencimiento'] . '</td>
                                        <td>' . $value['montoCobrar'] . '</td>
                                        <td><button type="button"   class="btn btn-primary btn-sm ml-2 px-1 btnPago" onclick="mostrarModal(' . $value['idAlumno_cobros'] . ')"data-toggle="modal" data-target="#pagoModal"><i class="fas fa-dollar-sign pr-1"></i>Pagar</button><div class="" style="display:inline-block; vertical-align: middle;">' . $alerta . '</div></td>
                                        </tr>';
                  }
                  ?>

                </tbody>
              </table>

            </div>
          </div>
          <hr>
        <?php } else { ?>
          <h5 class="text-center">Usted no cuenta con pagos pendientes</h5>
        <?php } ?>
        <?php
        $item = "usuario_id";
        $valor = $_SESSION['usuario_id'];
        $cobrosAlumR = ControladorPagoPendiente::ctrMostrarCobrosRxAlumno($item, $valor);
        if (!empty($cobrosAlumR)) {
        ?>
          <hr>
          <div>

            <h4 class="tile-title">Pagos realizados</h4>
            <div class="table-responsive container">
              <table class="table" id="table_pagosRealizados">
                <thead class="table-info">
                  <tr>
                    <th>N° documento</th>
                    <th>Concepto</th>
                    <th>Fecha de pago</th>
                    <th>Importe</th>
                    <th>Método de pago</th>
                    <th>Pagado</th>
                    <th>Pago - Comprobante</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  foreach ($cobrosAlumR as $value) {
                    echo '<tr>
                        <td>' . $value["codigo"] . '</td>
                        <td>' . $value['detalle'] . '</td>
                        <td>' . $value['fecha_pago'] . '</td>
                        <td>' . $value['montoCobrar'] . '</td>
                        <td>' . $value['tipo_pago'] . '</td>
                        <td>' . $value['monto_pagado'] . '</td>
                        <td><button type="button" class="btn btn-warning btn-sm px-1" onclick="detallesPagoAlumno(' . $value['idAlumno_cobros'] . ')" title="Ver detalles del voucher"><i class="fas fa-hand-holding-usd mx-1"></i></button>
                        <button type="button" class="btn btn-info btn-sm px-1" onclick="comprobantePagoAlumno(' . $value['idAlumno_cobros'] . ')" title="Ver detalles de la factura"><i class="fas fa-file-invoice-dollar mx-1"></i></button>
                        
                      </tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php } ?>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="pagoModal" tabindex="-1" aria-labelledby="pagoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title " id="pagoModalLabel">Formas de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
      $mostrarDatos_pag = new ControladorInstitucion();
      $respuesta = $mostrarDatos_pag->ctrMostrarDatos_Pag();
      ?>
      <div class="modal-body row">
        <div class="d-none" id="titulodeposito">
          <h5 class="text-center">Se ha enviado un comprobante de depósito</h5>
        </div>
        <input type="text" id="idPago" hidden value="">
        <input type="text" id="detalle" hidden value="">
        <input type="text" id="montoPagar" hidden value="">
        <div class="col-md mt-3 d-flex justify-content-center">
          <div class="row">
            <button class="btn btn-lg button_pagos col-12 text-muted" data-toggle="modal" data-target="#modalEnvioCuenta" onclick="mostrarDatosApoderado()"><i style="font-size:40px;" class="fas fa-university"></i></button>
            <p class="text-center col-12 h6">Pago por depósito</p>
          </div>
        </div>
        <?php
        if ($respuesta["estado_culqi"] == '1') {
        ?>
          <div class="" id="botonculqui">
            <div class="row">
              <button class="btn btn-lg button_pagos col-12" id="btn-culqi"><img src="vista/images/Visa-MasterCard.png" alt="" width="100%" style="max-width:90%;" class="img-fluid"></button>
              <p class="text-center col-12 h6">Pago con tarjeta</p>

            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($respuesta["estado_paypal"] == '1') {
        ?>
          <div class="col-md mt-5 d-flex justify-content-center" id="botonpaypal">
            <div id="paypal-button-container"></div>
          </div>
        <?php
        }
        ?>

      </div>

      <div class="container">
        <?php
        if ($respuesta["estado_culqi"] == '1') {
        ?>
          <p class="mb-0"><small for="" class=" form-text text-muted">* El pago con tarjeta tiene una comisión de: <?php echo $respuesta["comision_culqi"] ?>% </small></p>
        <?php
        }
        ?>

        <?php
        if ($respuesta["estado_paypal"] == '1') {
        ?>
          <p class="mt-0"><small for="" class=" form-text text-muted">* El pago con Paypal tiene una comisión de: <?php echo $respuesta["comision_paypal"] ?>% </small></p>
        <?php
        }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>
<!------MODAL SUBIR VOUCHER--------------->
<div class="modal fade" id="modalEnvioCuenta" tabindex="-1" aria-labelledby="envioCuenta" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="envioCuenta">Subir Voucher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <form id="MailPagoPendiente" method="post" target='_self' enctype="multipart/form-data" class="needs-validation" novalidate rol="form">
        <div class="modal-body row">
          <div class="container px-md-4 mx-md-5">
            <?php
            $mostrarBancos_cuentas = new ControladorInstitucion();
            $cuentas_inst = $mostrarBancos_cuentas->ctrMostrarBancos_cuentas();

            ?>

            <h5>Selecciona la cuenta Bancaria desitno: </h5>
            <select name="ctasBancarias" id="ctasBancarias" class="form-control">
              <?php
              foreach ($cuentas_inst as $cuenta) {
                if ($cuenta == "") {
                  continue;
                }
              ?>
                <option value=""><?php echo ($respuesta == "vacio") ? "" : $cuenta["nombre_banco"] ?></option>
              <?php
              }
              ?>
            </select>

            <div class="form-group">
              <label class="control-label" for="">Alumno</label>
              <input type="text" class="form-control" id="alumnocobro_nombreapellido" name="alumno" value="" required readonly>
            </div>

            <div class="form-group">
              <label class="control-label" for="">Detalle del pago</label></br>
              <input type="text" class="form-control" id="alumnocobro_detalle" name="detalle" value="" readonly>
            </div>
            <div class="form-group">
              <label class="control-label" for="">Grado y sección</label>
              <input type="text" class="form-control" id="alumnocobro_gradoseccion" name="grado_seccion" value="" readonly>
            </div>
            <input type="text" class="form-control" id="idImagen" name="codigoPago" hidden>
            <input type="text" class="form-control" id="dniCodigoPago" name="dniCodigoPago" value="" hidden>


            <div class="form-group">
              <label class="control-label" for="">Notas</label></br>
              <textarea class="form-control" type="text" rows="5" name="notas"></textarea></br>
            </div>

            <div class="form-group">
              <label class="control-label" for="">Suba la foto de su voucher:</label>
              <div class="form-group">
                <button class="btn btn-primary" type="button" onclick="abrir('files')">Escoger archivos</button>
                <input onchange="contar(this,'glosaArchivos')" type="file" class=" d-none" name='archivo1' id="files">
                <span id="glosaArchivos">Ningun archivo seleccionado</span><i style="font-size:14px;" class="fas fa-images ml-2"></i>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>

        <?php
        $enviarMail = new ControladorMailPagoPendiente();
        $enviarMail->ctrEnviarMail();
        ?>
      </form>

    </div>
  </div>
</div>

<!--Modal ver detalles del pago-->
<div class="modal fade" id="modalDetallePagoAlumno" tabindex="-1" aria-labelledby="detallePago" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detallePagoAlumno">Detalle del pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <h6>Detalle del pago:</h6>
            <p class="pl-1" id="detalleDelPagoAlumno"></p>
          </div>
          <div class="col-md-6">
            <h6>Fecha del pago:</h6>
            <p class="pl-1" id="fechaDelPagoAlumno">10/05/2020</p>
          </div>
          <div class="col-md-6">
            <h6>Monto:</h6>
            <p class="pl-1" id="montoDelPagoAlumno">S/ 250.00</p>
          </div>
          <div class="col-md-6">
            <h6>Medio:</h6>
            <p class="pl-1" id="medioDelPagoAlumno">Paypal</p>
          </div>
          <div class="col-md-12">
            <h6>Comprobante:</h6>
            <a href="" id="hrefImagenDetalleAlumno" class="zoom" target="_blank"><img src="" alt="" id="imagenDelPagoAlumno" class="img-fluid"></a>
          </div>
          <div class="col-md-12 mt-3 p-1">
            <embed src="" id="pdfDelPagoAlumno" class="" type="application/pdf" width="100%" height="600px" />
          </div>
          <div class="col-md-12 d-flex justify-content-center">
            <a class="btn btn-primary mt-2" id="pdfCompleto2Alumno" href="" target="_blank">Vista completa</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!--Modal ver numero de cuentas-->
<div class="modal fade" id="modalNumeroCuentas" tabindex="-1" aria-labelledby="numeroCuentas" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mNumeroCuentas">Número de cuentas Bancarias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <?php
          $mostrarDatos_cuentas = new ControladorInstitucion();
          $cuentas_inst = $mostrarDatos_cuentas->ctrMostrarDatos_cuentas();

          ?>
          <table class="table table-hover table-bordered  m-auto text-center">
            <thead>
              <tr>
                <th>Copy</th>
                <th>Titular</th>
                <th>Banco</th>
                <th>Número de cta</th>
                <th>CCI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($cuentas_inst as $cuenta) {
                if ($cuenta == "") {
                  continue;
                }
              ?>
                <tr>
                  <td><i class="fas fa-copy btn btnn" data-clipboard-text="<?php echo ($respuesta == "vacio") ? "" : $cuenta["numero_cuenta"] ?>" data-toggle="tooltip" data-placement="top" title="Copiar" id="copiar"></i></td>
                  <td><?php echo ($respuesta == "vacio") ? "" : $cuenta["titular_cuenta"] ?></td>
                  <td><?php echo ($respuesta == "vacio") ? "" : $cuenta["nombre_banco"] ?></td>
                  <td><?php echo ($respuesta == "vacio") ? "" : $cuenta["numero_cuenta"] ?></td>
                  <td><?php echo ($respuesta == "vacio") ? "" : $cuenta["cci_cuenta"] ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>



      </div>

    </div>
  </div>
</div>