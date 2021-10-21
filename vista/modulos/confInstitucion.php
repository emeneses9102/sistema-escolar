<div class="app-title mb-0">
  <div>
    <h3 id="tituloCurso"><i class="fas fa-school"></i> Configurar Institución</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fas fa-school fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Configurar</a></li>
  </ul>
</div>

<div class="row user">    
  <div class="col-md-2">
    <div class="tile p-0">
      <ul class="nav flex-column nav-tabs user-tabs">
        <li class="nav-item"><a class="nav-link active" href="#confDatos" data-toggle="tab" id="confiDatos" >Configurar datos</a></li>
        <li class="nav-item"><a class="nav-link " href="#confAspecto" data-toggle="tab" id="confiAspecto">Configurar aspecto</a></li>
        <li class="nav-item"><a class="nav-link " href="#confPasarela" data-toggle="tab" id="confiPasarela">Configurar pasarela</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-10">
    <div class="tab-content">
      <div class="tab-pane active" id="confDatos">     
        <div class="tile user-settings">
          <h4 class="line-head">Configurar Datos</h4>
          <div class="container">
                <?php 
                  $mostrarDatos_inst = new ControladorInstitucion();
                  $respuesta=$mostrarDatos_inst->ctrMostrarDatos_Inst();
                  
                ?>
                
            <form action="" method="post">
                <div class="form-group row">
                  <input type="text" class="form-control " id="id_institucion" name="id_institucion" hidden value="<?php echo ($respuesta == "vacio")? "":$respuesta["id_institucion"]?>">
                    <label for="nombre_inst" class="col-form-label col-md-3 h5 text-md-right">Nombre de la institución :</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control " id="nombre_institucion" name="nombre_institucion" required value="<?php echo ($respuesta == "vacio")? "":$respuesta["nombre_institucion"]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="razon_social" class="col-form-label col-md-3 h5 text-md-right">Razón social :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control "  id="razon_social" name="razon_social" value="<?php echo ($respuesta == "vacio")? "":$respuesta["razonSocial_institucion"]?>">
                    </div>
                    <label for="ruc_institucion" class="col-form-label col-md-1 h5 text-md-right">RUC :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control " id="ruc_institucion" name="ruc_institucion"value="<?php echo ($respuesta == "vacio")? "":$respuesta["ruc_institucion"]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slogan_institucion" class="col-form-label col-md-3 h5 text-md-right">Slogan :</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control " id="slogan_institucion" name="slogan_institucion" value="<?php echo ($respuesta == "vacio")? "":$respuesta["slogan_institucion"]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="direccion_institucion" class="col-form-label col-md-3 h5 text-md-right">Dirección :</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control " id="direccion_institucion" name="direccion_institucion" value="<?php echo ($respuesta == "vacio")? "":$respuesta["direccion_institucion"]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email_institucion" class="col-form-label col-md-3 h5 text-md-right">E-mail institucional :</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control " id="email_institucion" name="email_institucion"value="<?php echo ($respuesta == "vacio")? "":$respuesta["email_institucion"]?>">
                    </div>
                    <label for="telefono_institucion" class="col-form-label col-md-1 h5 text-md-right">Teléfono :</label>
                    <div class="col-md-4">
                        <input type="tel" class="form-control " id="telefono_institucion" name="telefono_institucion" value="<?php echo ($respuesta == "vacio")? "":$respuesta["telefono_institucion"]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rector_institucion" class="col-form-label col-md-3 h5 text-md-right">Nombre del Rector/Director  :</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control " id="rector_institucion" name="rector_institucion" required value="<?php echo ($respuesta == "vacio")? "":$respuesta["rector_institucion"]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="clave_seguridad" class="col-form-label col-md-3 h5 text-md-right">Clave de seguridad  :</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control " id="clave_seguridad" name="clave_seguridad" required value="<?php echo ($respuesta == "vacio")? "":$respuesta["clave_seguridad"]?>">
                    </div>
                </div>
                <div class="form-inline">
                <button class="btn btn-primary ml-auto">Guardar Información</button>
                </div>
                <?php 
                  $guardarDatos_inst = new ControladorInstitucion();
                  $guardarDatos_inst->ctrGuardarDatos_Inst();
                ?>
            </form>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="confAspecto">     
        <div class="tile user-settings">
          <h4 class="line-head">Configurar Aspecto</h4>
          <div class="container">
              <?php 
                  $mostrarDatos_pag = new ControladorInstitucion();
                  $respuesta=$mostrarDatos_pag->ctrMostrarDatos_Pag();
                  
                ?>
                
            <form action="" method="POST">
              <input type="text" class="form-control " id="id_pagina" name="id_pagina" hidden value="<?php echo ($respuesta == "vacio")? "":$respuesta["id_configuracion"]?>">

                <div class="form-group row">
                    <label for="nombre_pag" class="col-form-label col-md-3 h5 text-md-right">Nombre de la página :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control " id="nombre_pag" name="nombre_pag" value="<?php echo ($respuesta == "vacio")? "":$respuesta["nombre_pagina"]?>">
                    </div>
                    <label for="nombre_pag" class="col-form-label col-md-2 h5 text-md-right">Cambiar ícono  :</label>
                    <div class=" col-md-3">
                        <div class="custom-file pt-1">
                            <input type="file" class="form-control-file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nombre_logo" class="col-form-label col-md-3 h5 text-lg-right">Texto - logo :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control " id="nombre_logo" name="nombre_logo" value="<?php echo ($respuesta == "vacio")? "":$respuesta["nombre_logo"]?>">
                    </div>
                    <div class="col-md-1 toggle-flip">
                        <label>
                            <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                        </label>
                    </div>
                    <label for="nombre_pag" class="col-form-label col-md-1 h5 text-lg-right">Logo :</label>
                    <div class=" col-md-3">
                        <div class="custom-file pt-1">
                            <input type="file" class="form-control-file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        </div>
                    </div>
                </div>

                <div class="form-inline">
                <button class="btn btn-primary ml-auto" id="btnAscpecto">Guardar Información</button>
                </div>
                <?php 
                  $guardarDatos_pag = new ControladorInstitucion();
                  $guardarDatos_pag->ctrGuardarDatos_Pag();
                ?>
            </form>
          </div>         
        </div>
      </div>
      <div class="tab-pane fade" id="confPasarela">
        <div class="tile user-settings">
          <h4 class="line-head">Configurar Pasarela de Pagos</h4>
          <div class="m-3">
            <div class="m-1">
              <form action="">
                
                <div class="form-group row">
                    <div class="pl-0 form-inline col-md-12">
                      <div class="">
                        <h5 class="col-md-12 "> Configuración Culqi</h5>
                      </div>
                      <div class="toggle-flip mr-md-3 ml-auto">
                        <label>
                          <input type="checkbox" onclick="estadoCulqi(<?php echo $respuesta['estado_culqi']?>)" <?php echo ($respuesta["estado_culqi"] == "0")? "":"checked"?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                        </label>
                      </div>
                    </div> 
                    <label for="llave_culqui" class="col-form-label col-md-1 h5 mt-3 ">Key Pública  :</label>
                    <div class="col-md-5 mt-3">
                        <input type="text" class="form-control " id="llave_publica" name="llave_publica" value="<?php echo ($respuesta == "vacio")? "":$respuesta["llave_publica"]?>">
                    </div>
                    <label for="llave_culqui" class="col-form-label col-md-1 h5 mt-3 pr-md-1">Key Privada  :</label>
                    <div class="col-md-5 mt-3">
                        <input type="text" class="form-control " id="llave_culqui" name="llave_culqui" value="<?php echo ($respuesta == "vacio")? "":$respuesta["llave_culqui"]?>">
                    </div>
                    <label for="titulo_culqui" class="col-form-label col-md-1 h5 mt-3">Título Culqi :</label>
                    <div class="col-md-5 mt-3">
                        <input type="text" class="form-control " id="titulo_culqui" name="titulo_culqui" value="<?php echo ($respuesta == "vacio")? "":$respuesta["titulo_culqui"]?>">
                    </div>
                    <label for="comision_culqi" class="col-form-label col-md-1 h5 mt-3">Comisión :</label>
                    <div class="col-md-2 mt-3">
                        <div class="input-group">
                          <input type="number" class="form-control " id="comision_culqi" name="comision_culqi" value="<?php echo ($respuesta == "vacio")? "":$respuesta["comision_culqi"]?>">
                        <div class="input-group-append"><span class="input-group-text">%</span></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-inline">
                  <button class="btn btn-primary ml-auto" id="btnCulqi">Guardar Culqi</button>
                  </div>
                  <hr>

                  <div class="form-group row mt-4">
                    <div class="pl-0 form-inline col-md-12">
                      <div>
                        <h5 class="col-md-12">Configuración Paypal</h5>
                      </div>
                      <div class="toggle-flip mr-md-3 ml-auto">
                          <label>
                            <input type="checkbox" onclick="estadoPaypal(<?php echo $respuesta['estado_paypal']?>)" <?php echo ($respuesta["estado_paypal"] == "0")? "":"checked"?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                          </label>
                      </div>
                    </div>
                    <label for="url_paypal" class="col-form-label col-md-1 h5 mt-3 pr-md-0">Titulo Paypal :</label>
                    <div class="col-md-5 mt-3">
                        <input type="text" class="form-control " id="titulo_paypal" name="titulo_paypal" value="<?php echo ($respuesta == "vacio")? "":$respuesta["titulo_paypal"]?>">
                    </div>
                    <label for="url_paypal" class="col-form-label col-md-1 h5 mt-3">URL Paypal :</label>
                    <div class="col-md-5 mt-3">
                        <input type="text" class="form-control " id="url_paypal" name="url_paypal" value="<?php echo ($respuesta == "vacio")? "":$respuesta["url_paypal"]?>">
                    </div>
                    <label for="comision_paypal" class="col-form-label col-md-1 h5 mt-3">Comisión :</label>
                    <div class="col-md-2 mt-3">
                        <div class="input-group">
                          <input type="number" class="form-control " id="comision_paypal" name="comision_paypal" value="<?php echo ($respuesta == "vacio")? "":$respuesta["comision_paypal"]?>">
                        <div class="input-group-append"><span class="input-group-text">%</span></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-inline">
                  <button class="btn btn-primary ml-auto" id="btnPaypal">Guardar Paypal</button>
                  </div>
                  <div class="form-group row mt-5">
                      <h5 class="col-md-12"> Registrar Cuentas</h5>
                      <div class="col-md-5 mt-3">
                        <div class="row">
                          <label class="col-md-12 h6">Nueva Cuenta</label>
                          <div class="col-md-9 mb-2">
                            <input type="text" class="form-control mt-1" id="titular_cuenta" name="titular_cuenta" placeholder="Titular de la cuenta">
                            <input type="text" class="form-control mt-2" id="nueva_cuenta" name="nueva_cuenta" placeholder="Número de cuenta">
                            <input type="text" class="form-control mt-2" id="numero_CCI" name="numero_CCI" placeholder="Número CCI">
                            <input type="text" class="form-control mt-2" id="nombre_banco" name="nombre_banco" placeholder="Nombre del Banco">
                          </div>
                          <div class="col-md-3 "  id="section_botones">
                            <button  class=" btn btn-info  mb-1" id="addCuenta"><i class="fas fa-plus-circle" aria-hidden="true" title="Agregar Cuenta"></i></button>
                            <button type="button" class=" btn btn-warning mb-1" id="updateCuenta" style="display: none;"><i class="far fa-edit" aria-hidden="true" title="Editar Cuenta"></i></button>
                            <button type="button" class=" btn btn-danger mb-1" id="deleteCuenta" style="display: none;"><i class="fas fa-trash-alt" aria-hidden="true" title="Eliminar Cuenta"></i></button>
                            <button type="button" class=" btn btn-secondary mb-1" id="cancelarCTA"><i class="fas fa-ban" aria-hidden="true" title="Cancelar"></i></button>
                          </div>
                        </div>
                      </div>
                      <?php 
                        $mostrarDatos_cuentas= new ControladorInstitucion();
                        $cuentas_inst=$mostrarDatos_cuentas->ctrMostrarDatos_cuentas();
                        
                      ?>
                      <div class="col-md-7 mt-3">
                        <label class="col-md-12 h6">Listado de cuentas</label>
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-hover table-bordered  m-auto text-center" id="tableconfPasarela">
                              <thead>
                                <tr>
                                  <th>Banco</th>
                                  <th>Número de cta</th>
                                  <th>CCI</th>
                                  <th>Titular</th>
                                  <th>Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                <?php
                                  
                                  foreach ($cuentas_inst as $cuenta) {
                                    if($cuenta ==""){
                                      continue;
                                    }
                                    ?>
                                    <tr>
                                      <td><?php echo ($respuesta == "vacio")? "":$cuenta["nombre_banco"]?></td>
                                      <td><?php echo ($respuesta == "vacio")? "":$cuenta["numero_cuenta"]?></td>
                                      <td><?php echo ($respuesta == "vacio")? "":$cuenta["cci_cuenta"]?></td>
                                      <td><?php echo ($respuesta == "vacio")? "":$cuenta["titular_cuenta"]?></td>
                                      <td><button type="button" class="btn btn-warning btn-sm" onclick="sendCuenta(<?php echo $cuenta['idCuentas']?>)">Editar</button></td>
                                    </tr> 
                                  <?php
                                  }
                                  ?>
                              </tbody>
                            </table>
                          </div>
                        <input type="text" id="cuentaAntigua" hidden>
                        
                        </div>
                      </div>
                      
                  </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

