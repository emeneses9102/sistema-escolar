<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fa fa-user"></i> Lista de Alumnos con deudas</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Alumnos-Deudas</a></li>
  </ul>
</div>
<div class="row" id="listDeudores">

  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="col-md-12 row">
          <?php
          $valor = "all";

          $mostrarGrados = ControladorGradosySecciones::ctrMostrarGrados($valor);
          //var_dump($mostrarNiveles);
          ?>
          <?php
          $item = null;
          $valor = null;
          $mostrarNiveles = ControladorNiveles::ctrMostrarNiveles($item, $valor);
          //var_dump($mostrarNiveles);
          ?>


          <div class="form-group col-md-3">
            <label for="" class="h6">Niveles</label>
            <select name="nivelesD" id="nivelesD" class="form-control">
              <option></option>
              <?php foreach ($mostrarNiveles as $nivel) { ?>

                <option value="<?php echo $nivel['idNiveles'] ?>"><?php echo $nivel['nombre_nivel'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="" class="h6">Grados</label>
            <select name="GradosD" id="GradosD" class="form-control">
              <option></option>
              <?php foreach ($mostrarGrados as $grado) { ?>
                <option value="<?php echo $grado['idGrados'] ?>"><?php echo $grado['nombre_grado'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="" class="h6">Meses</label>
            <select name="mesesD" id="mesesD" class="form-control">
              <option></option>
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Nombiembre</option>
              <option value="12">Diciembre</option>

            </select>
          </div>

          <div class="form-group col-md-3">
            <label for="" class="h6">Buscar Apeliido</label>
            <div class="input-group-prepend">
              <input type="text" class="form-control" id="txtApellidoD">
              <div class="input-group-append"><span class="input-group-text btn" onclick="buscarxApellido()"><i class="fa fa-search" aria-hidden="true"></i></span></div>
            </div>
          </div>

        </div>
        <hr>
        <br>
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="tablaDeudas">
            <thead class="text-center">
              <tr>
                <th>Acciones</th>
                <th>Alumno</th>
                <th>DNI</th>
                <th>celular</th>
                <th>Correo</th>
                <th>Grado</th>
                <th>Padre</th>
                <th>Madre</th>
                <th>Apoderado</th>
                <th>Pagos</th>

              </tr>
            </thead>
            <tbody class="text-center">
              <?php
              $codigo = "";
              $item = null;
              $valor = null;
              $usuarios = ControladorListaDeuda::ctrMostrarDeudores($item, $valor);
              foreach ($usuarios as $value) {

                $apoderado = $value['nombres_apoderado'].' ' . $value['apellidos_apoderado'];
                $estado = ($value['estado'] == 1) ? '<span class="badge badge-danger">Pendiente</span>' : '<span class="badge badge-success">Cancelado</span>';
                echo '<tr>
                      <td><button class="btn btn-primary btn-sm mt-1" title="Editar Pago" id="editPago" name ="' . $value["usuario_id"] . '" onclick="editarPago(' . $value["usuario_id"] . ')"><i class="fas fa-user-edit"></i></button><button class="btn btn-success btn-sm mt-1 ml-2" title="Enviar notificación" id="sendNotificacion"><i class="fas fa-envelope"></i></button></td>
                     
                      <td>' . $value["nombres"] . ' ' . $value['apellidos'] . '</td>
                      <td>' . $value['dni'] . '</td> 
                      <td>' . $value['celular'] . '</td>
                      <td>' . $value['correo'] . '</td>
                      <td>' . $value['nombre_grado'] . '</td>
                      <td>' . $apoderado  . '</td>
                      <td>' . $value['apoderado2']  . '</td>
                      <td>' . $value['apoderado3']  . '</td>
                      <td>' . $value['pagos'] . ' de ' . $value['conteo'] . '</td>
                      
                    </tr>
                ';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row" id="editarDeuda">
  <div class="col-md-12">
    <div class="tile ">
      <h4 class="line-head">Editar Cobros</h4>
      <div class="container mt-4">
        <div class="row ">
          <div class="card col-md-12 pt-2 mb-3 card-descripcion">
            <div class="card-body row pb-0">
              <div class="col-md-12">
                <input type="text" id="id_deuda" hidden>
                <p>
                  <label for="" class="h6">Nivel: </label>
                  <label for="" id="gradoAlumno"></label> - 
                  <label for="" id="nivelAlumno"></label>
                </p>
              </div>
              <div class="col-md-3">
                <input type="text" id="id_deuda" hidden>
                <p>
                  <label for="" class="h6">Alumno: </label>
                  <label for="" id="nombreAlumno"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">DNI: </label>
                  <label for="" id="documento_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Correo: </label>
                  <label for="" id="correo_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Celular: </label>
                  <label for="" id="telAlumno"></label>
                </p>
              
              </div>
              
              
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Padre: </label>
                  <label for="" id="padre_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">DNI: </label>
                  <label for="" id="dniPadre_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Correo: </label>
                  <label for="" id="correoPadre_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Celular: </label>
                  <label for="" id="celularPadre_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Madre: </label>
                  <label for="" id="madre_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">DNI: </label>
                  <label for="" id="dniMadre_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Correo: </label>
                  <label for="" id="correoMadre_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Celular: </label>
                  <label for="" id="celularMadre_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Apoderado: </label>
                  <label for="" id="apoderado_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">DNI: </label>
                  <label for="" id="dniApoderado_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Correo: </label>
                  <label for="" id="correoApoderado_"></label>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <label for="" class="h6">Celular: </label>
                  <label for="" id="celularApoderado_"></label>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-5">
            <label for="" class="h5">Pagos pendientes</label>
            <div class="table-responsive">
              <table class="table text-center" id="tablaDeudores">
                <thead class="table-warning">
                  <tr>
                    <th>Código de Pago</th>
                    <th>Detalle</th>
                    <th>Fecha Venc.</th>
                    <th>Monto</th>
                    <th>Monto a cobrar</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="">


                </tbody>
              </table>
            </div>
            <hr>
          </div>

          <div class="col-md-12">
            <label for="" class="h5">Pagos Realizados</label>
            <div class="table-responsive">
              <table class="table text-center" id="tablaDeudoresPagados">
                <thead class="table-primary">
                  <tr>
                    <th>Código de Pago</th>
                    <th>Detalle</th>
                    <th>Fecha de pago</th>
                    <th>Método de pago</th>
                    <th>Banco</th>
                    <th>Monto pagado</th>
                    <th>Pago - Comprobante</th>
                    <th>Estado del comprobante</th>
                  </tr>
                </thead>
                <tbody id="">


                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="form-inline mt-4">
          <button class="btn btn-info" id="btnInfo">Regresar</button>

        </div>
      </div>

    </div>
  </div>
</div>

<!--Modal ver detalles del pago-->
<div class="modal fade" id="modalDetallePago" tabindex="-1" aria-labelledby="detallePago" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detallePago">Detalle del pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <h6>Detalle del pago:</h6>
            <p class="pl-1" id="detalleDelPago"></p>
          </div>
          <div class="col-md-6">
            <h6>Fecha del pago:</h6>
            <p class="pl-1" id="fechaDelPago">10/05/2020</p>
          </div>
          <div class="col-md-6">
            <h6>Monto:</h6>
            <p class="pl-1" id="montoDelPago">S/ 250.00</p>
          </div>
          <div class="col-md-6">
            <h6>Medio:</h6>
            <p class="pl-1" id="medioDelPago">Paypal</p>
          </div>
          <div class="col-md-12">
            <h6>Comentarios:</h6>
            <p class="pl-1" id="comentariosPago">comentarios</p>
          </div>
          <div class="col-md-12">
            <h6>Comprobante:</h6>
            <a href="" id="hrefImagenDetalle" class="zoom" target="_blank"><img src="" alt="" id="imagenDelPago" class="img-fluid"></a>
          </div>
          <div class="col-md-12 mt-3 p-1">
            <embed src="" id="pdfDelPago" class="" type="application/pdf" width="100%" height="600px" />
          </div>
          <div class="col-md-12 d-flex justify-content-center">
            <a class="btn btn-primary mt-2" id="pdfCompleto2" href="" target="_blank">Ver PDF</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!--Modal ver detalles del pago boton ojo -->
<div class="modal fade" id="modalDetallePagoOjo" tabindex="-1" aria-labelledby="detallePago" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detallePago">Detalle del pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <h6>Detalle del pago:</h6>
            <p class="pl-1" id="detalleDelPago1"></p>
          </div>
          <div class="col-md-6">
            <h6>Fecha del pago:</h6>
            <p class="pl-1" id="fechaDelPago1">10/05/2020</p>
          </div>
          <div class="col-md-6">
            <h6>Monto:</h6>
            <p class="pl-1" id="montoDelPago1">S/ 250.00</p>
          </div>
          <div class="col-md-6">
            <h6>Medio:</h6>
            <p class="pl-1" id="medioDelPago1">Paypal</p>
          </div>
          <div class="col-md-12">
            <h6>Comentarios:</h6>
            <p class="pl-1" id="comentariosPago1">comentario</p>
          </div>
          <div class="col-md-12">
            <h6>Comprobante:</h6>
            <a href="" id="hrefImagenDetalle1" class="zoom" target="_blank"><img src="" alt="" id="imagenDelPago1" class="img-fluid"></a>
          </div>
          <div class="col-md-12 mt-3 p-1">
            <embed src="" id="pdfDelPago1" class="" type="application/pdf" width="100%" height="600px" />
          </div>
          <div class="col-md-12 d-flex justify-content-center">
            <a class="btn btn-primary mt-2" id="pdfCompleto" href="" target="_blank">Vista completa</a>
          </div>
          <input type="text" id="validarpagoname" name="validarpagoname" hidden>
          <div class="col-md-12">
            <h6>Ingrese Monto</h6>
            <input type="text" id="montovalidarpago" name="montovalidarpago" required>
          </div>
          <div class="col-md-12 mt-2 d-flex justify-content-center">
            <button type="submit" id="validarpago" class="btn btn-primary mr-2" onclick="validarCobro();">Validar Pago
            </button>
            <button type="submit" id="validarpago2" class="btn btn-danger ml-2" onclick="validarCobro2();">Rechazar Pago
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalGenerarComprobante" tabindex="-1" aria-labelledby="generarComprobante" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="generarComprobante">Generar Comprobante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Llenar el combo de apoderados-->

        <form id="MailGenerarComprobante" method="post" target='_self' enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
              <a href="https://ww1.sunat.gob.pe/ol-ti-itfesimpopciones/FESimpSunat.htm" class="btn btn-primary" target="_black">Generar comprobante</a>
            </div>
            <input type="text" class="pl-1" id="idalumnocobroscomprobante" name="idalumnocobroscomprobante" readonly hidden>
            <div class="col-md-12">
              <h6>Correo:</h6>
              <input type="text" class="pl-1 form-control" id="correoapoderado" name="correoapoderado">
            </div>
            <div class="col-md-12 mt-3 d-flex flex-row">
              <input type="text" for="archivocomprobante" name='archivocomprobante1' id="archivocomprobante1" readonly>
              <button class="btn btn-primary" type="button" onclick="abrir('archivocomprobante');"><i class="fas fa-upload"></i></button>
              <input type="file" class="d-none" onchange="contar1('archivocomprobante','archivocomprobante1');" name='archivocomprobante' id="archivocomprobante">
            </div>
            <div class="col-md-12 mt-3">
              <h6>Comprobante:</h6>
              <a href="" id="hrefImagenDelComprobante" class="zoom" target="_blank"><img src="" alt="" id="imagenDelComprobante" class="img-fluid"></a>
            </div>
            <div class="col-md-12 mt-3 p-1">
              <embed src="" id="pdfDelComprobante" class="" type="application/pdf" width="100%" height="600px" />
            </div>
            <div class="col-md-12 d-flex justify-content-center">
              <a class="btn btn-primary mt-2" id="pdfCompleto3" href="" target="_blank">Ver PDF</a>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
              <input type="submit" class="btn btn-primary mt-2" id="btnEnviarMail" value="Enviar comprobante">
            </div>
          </div>

        </form>

      </div>

    </div>
  </div>
</div>