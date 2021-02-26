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
                  <input type="text" class="form-control " id="id_institucion" name="id_institucion" hidden value="<?php echo ($respuesta == "vacio")? "":$respuesta[0]?>">
                    <label for="nombre_inst" class="col-form-label col-md-3 h5 text-md-right">Nombre de la institución :</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control " id="nombre_institucion" name="nombre_institucion" required value="<?php echo ($respuesta == "vacio")? "":$respuesta[1]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="razon_social" class="col-form-label col-md-3 h5 text-md-right">Razón social :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control "  id="razon_social" name="razon_social" value="<?php echo ($respuesta == "vacio")? "":$respuesta[2]?>">
                    </div>
                    <label for="ruc_institucion" class="col-form-label col-md-1 h5 text-md-right">RUC :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control " id="ruc_institucion" name="ruc_institucion"value="<?php echo ($respuesta == "vacio")? "":$respuesta[3]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slogan_institucion" class="col-form-label col-md-3 h5 text-md-right">Slogan :</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control " id="slogan_institucion" name="slogan_institucion" value="<?php echo ($respuesta == "vacio")? "":$respuesta[4]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="direccion_institucion" class="col-form-label col-md-3 h5 text-md-right">Dirección :</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control " id="direccion_institucion" name="direccion_institucion" value="<?php echo ($respuesta == "vacio")? "":$respuesta[5]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email_institucion" class="col-form-label col-md-3 h5 text-md-right">E-mail institucional :</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control " id="email_institucion" name="email_institucion"value="<?php echo ($respuesta == "vacio")? "":$respuesta[6]?>">
                    </div>
                    <label for="telefono_institucion" class="col-form-label col-md-1 h5 text-md-right">Teléfono :</label>
                    <div class="col-md-4">
                        <input type="tel" class="form-control " id="telefono_institucion" name="telefono_institucion" value="<?php echo ($respuesta == "vacio")? "":$respuesta[7]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rector_institucion" class="col-form-label col-md-3 h5 text-md-right">Nombre del Rector/Director  :</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control " id="rector_institucion" name="rector_institucion" required value="<?php echo ($respuesta == "vacio")? "":$respuesta[8]?>">
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
            <input type="text" class="form-control " id="id_pagina" name="id_pagina" hidden value="<?php echo ($respuesta == "vacio")? "":$respuesta[0]?>">

                <div class="form-group row">
                    <label for="nombre_pag" class="col-form-label col-md-3 h5 text-md-right">Nombre de la página :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control " id="nombre_pag" name="nombre_pag" value="<?php echo ($respuesta == "vacio")? "":$respuesta[1]?>">
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
                        <input type="text" class="form-control " id="nombre_logo" name="nombre_logo" value="<?php echo ($respuesta == "vacio")? "":$respuesta[2]?>">
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
     
    </div>
  </div>
</div>