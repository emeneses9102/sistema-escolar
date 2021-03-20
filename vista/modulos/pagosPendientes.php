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
       <form action="">
        <div class="tile">
        <?php 
                $item = "usuario_id";
                $valor = $_SESSION['usuario_id'];
                $cobrosAlum = ControladorPagoPendiente::ctrMostrarCobrosxAlumno($item,$valor);
                if (!empty($cobrosAlum)) {
                ?>
                <div>
                    <h4 class="tile-title">Pagos pendientes</h4>
                    <div class="table-responsive container">
                        <table class="table text-center">
                            <thead class="table-warning">
                                <tr>
                                    <th>N° Documento</th>
                                    <th>Detalle</th>
                                    <th>Fecha Venc.</th>
                                    <th>Monto</th>
                                    <th>Mora</th>
                                    <th>Monto a pagar</th>
                                    <th>$</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php

                              
                                foreach($cobrosAlum as $value){
                                  $alerta = ($value["estado"] == "3")?"<i class='fa fa-info-circle ml-2' aria-hidden='true' title='Enviado a revisión' style='color:#de4747; font-size: 1.6em;'></i>":"";
                                    echo'<tr>
                                      
                                        <td>'.$value["codigo"].'</td>
                                        <td>'.$value['detalle'].'</td>
                                        <td>'.$value['fecha_vencimiento'].'</td>
                                        <td>'.$value['monto'].'</td>
                                        <td>s/. 7.00</td>
                                        <td>'.$value['montoCobrar'].'</td>
                                        <td><button type="button"   class="btn btn-primary btn-sm px-1 btnPago" onclick="mostrarModal('.$value['idAlumno_cobros'].')"data-toggle="modal" data-target="#pagoModal"><i class="fas fa-shopping-cart pr-1"></i> Cancelar</button><div class="" style="display:inline-block; vertical-align: middle;">'.$alerta.'</div></td>
                                        </tr>';
                                }
                            ?>

                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <hr>
                <?php }else{?>
                  <h5 class="text-center">Usted no cuenta con pagos pendientes</h5>
                <?php } ?>
                <?php 
                $item = "usuario_id";
                $valor = $_SESSION['usuario_id'];
                $cobrosAlumR = ControladorPagoPendiente::ctrMostrarCobrosRxAlumno($item,$valor);
                if (!empty($cobrosAlumR)) {
                ?>
                <hr>
                  <div>
                  
                      <h4 class="tile-title">Pagos realizados</h4>
                      <div class="table-responsive container">
                          <table class="table">
                              <thead class="table-warning">
                                  <tr>
                                      <th>N° documento</th>
                                      <th>Concepto</th>
                                      <th>Fecha de pago</th>
                                      <th>Importe</th>
                                      <th>Método de pago</th>
                                      <th>Pagado</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php
                
                foreach($cobrosAlumR as $value){
                  echo'<tr>
                        <td>'.$value["codigo"].'</td>
                        <td>'.$value['detalle'].'</td>
                        <td>'.$value['fecha_pago'].'</td>
                        <td>'.$value['montoCobrar'].'</td>
                        <td>'.$value['tipo_pago'].'</td>
                        <td>'.$value['monto_pagado'].'</td>
                      </tr>';
                }
              ?>
              </tbody>
                          </table>
                      </div>
                  </div>
                <?php }?>
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
      <div class="modal-body row">
        <div class="d-none" id="titulodeposito">
          <h5 class="text-center">Se ha enviado un comprobante de depósito</h5>
        </div>
        <input type="text" id="idPago" hidden value="">
        <input type="text" id="detalle" hidden value="">
        <input type="text" id="montoPagar" hidden value="">
        <div class="col-md mt-3 d-flex justify-content-center">
          <div class="row">
            <button class="btn btn-lg button_pagos col-12 text-muted" data-toggle="modal" data-target="#modalEnvioCuenta" onclick="abc()" ><i style="font-size:40px;"class="fas fa-university"></i></button>
            <p class="text-center col-12 h6">Pago por depósito</p>
          </div>
        </div>
        <div class="" id="botonculqui">
          <div class="row">
            <button class="btn btn-lg button_pagos col-12" id="btn-culqi"><img src="vista/images/Visa-MasterCard.png" alt="" width="100%" style="max-width:90%;" class="img-fluid"></button>
            <p class="text-center col-12 h6">Pago con tarjeta</p>
          </div>
        </div>
        <div class="" id="botonpaypal">
          <div id="paypal-button-container"></div>
        </div>
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
        <h5>Cuentas Interbancarias: </h5>
        <h5 class="text-center">7878-7878-7878-78</h5>
        <?php $item = "usuario_id";
              $valor = $_SESSION['usuario_id'];
              $mostrarDatosAlumnoPago = ControladorPagoPendiente::ctrMostrarDatosPagoPendiente($item,$valor);?>
          <div class="form-group">
            <label class="control-label" for="">Alumno</label>
            <input type="text" class="form-control" name="alumno" value="<?php echo $mostrarDatosAlumnoPago["nombres"]." ".$mostrarDatosAlumnoPago["apellidos"]?> " required readonly>
          </div>
          <div class="form-group">
            <label class="control-label" for="">Código de alumno</label>
            <input type="text"class="form-control" name="codigo_alu"  value="<?php echo $mostrarDatosAlumnoPago["cod_matricula"]?>" required readonly>
          </div>
          <div class="form-group">
            <label class="control-label" for="">Detalle</label></br>
            <input type="text" class="form-control" name="detalle" value="<?php echo $mostrarDatosAlumnoPago["detalle"]?>" readonly>
          </div>
          <div class="form-group">
            <label class="control-label" for="">Grado y sección</label>
            <input type="text" class="form-control" name="grado_seccion" value="<?php echo $mostrarDatosAlumnoPago["nombre_grado"]." - ".$mostrarDatosAlumnoPago["nombre_seccion"]?>" readonly>
          </div>
            <input type="text" class="form-control" id="idImagen" name="codigoPago" hidden>
            <input type="text" class="form-control" id="dniCodigoPago" name="dniCodigoPago" value="<?php echo $_SESSION['dni']?>" hidden>
          

          <div class="form-group">
            <label class="control-label" for="">Notas</label></br>
            <textarea  class="form-control" type="text" rows="5" name="notas"></textarea></br>
          </div>

          <div class="form-group">
          <label class="control-label"for="">Suba la foto de su voucher:</label>
          <div class="form-group">
            <button class="btn btn-primary" type="button" onclick="abrir('files')">Escoger archivos</button>
            <input onchange="contar(this,'glosaArchivos')" type="file" class=" d-none"  name='archivo1'  id="files">
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


<!--
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
       <form action="">
        <div class="tile">
                <div>
                    <h4 class="tile-title">Pagos pendientes</h4>
                    <div class="table-responsive container">
                        <table class="table text-center">
                            <thead class="table-warning">
                                <tr>
                                    <th>N° Documento</th>
                                    <th>Detalle</th>
                                    <th>Fecha Venc.</th>
                                    <th>Saldo</th>
                                    <th>Mora</th>
                                    <th>TOTAL</th>
                                    <th>$</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001-COL-003</td>
                                    <td>Segunda mensualidad</td>
                                    <td>15/04/2021</td>
                                    <td>S/. 250.00</td>
                                    <td>S/. 7.00</td>
                                    <td><b>S/. 250.00</b></td>
                                    <td><button type="button" class="btn btn-primary btn-sm px-1 " data-toggle="modal" data-target="#pagoModal"><i class="fas fa-shopping-cart pr-1"></i> Cancelar</button></td>
                                </tr>
                                <tr>
                                    <td>001-COL-004</td>
                                    <td>Tercera mensualidad</td>
                                    <td>16/05/2021</td>
                                    <td>S/. 250.00</td>
                                    <td>S/. 7.00</td>
                                    <td><b>S/. 250.00</b></td>
                                    <td><button type="button" class="btn btn-primary btn-sm px-1" data-toggle="modal" data-target="#pagoModal"><i class="fas fa-shopping-cart pr-1"></i> Cancelar</button></td>
                                </tr>
                                <tr>
                                    <td>001-COL-005</td>
                                    <td>Cuarta mensualidad</td>
                                    <td>15/06/2021</td>
                                    <td>S/. 250.00</td>
                                    <td>S/. 7.00</td>
                                    <td><b>S/. 250.00</b></td>
                                    <td><button type="button" class="btn btn-primary btn-sm px-1" data-toggle="modal" data-target="#pagoModal"><i class="fas fa-shopping-cart pr-1"></i> Cancelar</button></td>
                                </tr>
                                <tr>
                                    <td>001-COL-006</td>
                                    <td>Cuota Aniversario </td>
                                    <td>17/06/2021</td>
                                    <td>S/. 50.00</td>
                                    <td>S/. 7.00</td>
                                    <td><b>S/. 50.00</b></td>
                                    <td><button type="button" class="btn btn-primary btn-sm px-1" data-toggle="modal" data-target="#pagoModal"><i class="fas fa-shopping-cart pr-1"></i> Cancelar</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <hr>
                <div>
                    <h4 class="tile-title">Pagos realizados</h4>
                    <div class="table-responsive container">
                        <table class="table">
                            <thead class="table-warning">
                                <tr>
                                    <th>Fecha Venc.</th>
                                    <th>Concepto</th>
                                    <th>N° documento</th>
                                    <th>Importe</th>
                                    <th>Pagado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12/03/2021</td>
                                    <td>Pago de Matrícula</td>
                                    <td>001-COL-001</td>
                                    <td>S/. 100.00</td>
                                    <td><b>S/. 100.00</b></td>
                                </tr>
                                <tr>
                                    <td>12/03/2021</td>
                                    <td>Pago de Primera Mensualidad</td>
                                    <td>001-COL-002</td>
                                    <td>S/. 250.00</td>
                                    <td><b>S/. 250.00</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="pagoModal" tabindex="-1" aria-labelledby="pagoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pagoModalLabel">Formas de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <div class="col-md mt-3 d-flex justify-content-center">
            <button class="btn btn-lg button_pagos"><img src="vista/images/Visa-MasterCard.png" alt="" width="100%" class="img-fluid"></button>
        </div>
        <div class="col-md mt-3 d-flex justify-content-center">
            <button class="btn btn-lg button_pagos"><img src="vista/images/logo-niubiz.png" alt="" width="100%" class="img-fluid"></button>
        </div>
        <div class="col-md mt-3 d-flex justify-content-center">
            <button class="btn btn-lg button_pagos"><img src="vista/images/paypal.png" alt="" width="100%" class="img-fluid"></button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

-->
