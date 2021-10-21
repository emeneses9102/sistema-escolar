
<div class="tab-pane" id="user-settings">
    <div class="tile user-settings">
      <h4 class="line-head">Datos del Alumno</h4>
      <form id="formUsuario" name="formUsuario" action="">
        <input type="hidden" name="idusuario" id="idusuario" value="">
        <div class="form-group row">
          <div class="col-md-12"><label for="">Nombres y Apellidos:</label></div>
          <div class="col-md-6">
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombres" >
          </div>
          <div class="col-md-6">
          <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" >
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <label for="">Dirección</label>
            <div class="input-group">
              <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">
            </div>
          </div>
          <div class="col-md-6">
            <label for="">Teléfonos:</label>
            <div class="row">
              <div class="col-md-6">
                <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span></div>
                <input type="phone" class="form-control" name="telefono" id="telefono" placeholder="Teléfono fijo" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span></div>
                  <input type="phone" class="form-control" name="celular" id="celular" placeholder="Celular">
                </div>
              </div>
            </div>
          </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                    <label for="">Datos:</label>
                    <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI">
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputFile">Cargar foto:</label>
                        <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp">
                        <small class="form-text text-muted" id="fileHelp">Cargue una fotografía para el alumno</small>
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="">Usuario y Contraseña:</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
                    </div>
                    <div class="col-md-6">
                      <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña">
                    </div>  
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="listRol">Rol:</label>
                      <select class="form-control" name="listRol" id="listRol" >
                          <option value="4" <?php echo ($result['rol'] == 4)? 'selected':'' ?>>Alumno</option>
                          <option value="1" <?php echo ($result['rol'] == 1)? 'selected':'' ?>>Directivo</option>
                          <option value="2" <?php echo ($result['rol'] == 2)? 'selected':'' ?>>Administrativo</option>
                          <option value="3" <?php echo ($result['rol'] == 3)? 'selected':'' ?>>Profesor</option>       
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="listEstado">Estado:</label>
                      <select class="form-control"name="listEstado" id="listEstado">
                          <option value="1" <?php echo ($result['estado'] == 1)? 'selected':'' ?>>Activo</option>
                          <option value="2" <?php echo ($result['estado'] == 2)? 'selected':'' ?>>Inactivo</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="listEstado">Nacionalidad:</label>
                      <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" placeholder="Nacionalidad">
                    </div>
                    <div class="col-md-3">
                    <label for="listEstado">Fecha de nacimiento:</label>
                      <input class="form-control" id="date" type="date" name="date"placeholder="Seleccionar fecha">
                    </div>
                  </div>

          <!--ESPACIO PARA LOS DATOS DEL RESPONSABLE-->
          <hr class="my-4">
          <h4 class="line-head">Datos del Apoderado</h4>
          <div class="form-group row">
            <div class="col-md-12"><label for="">Nombres y apellidos del apoderado :</label></div>
            <div class="col-md-6">
            <input type="text" class="form-control" name="nombre-ap" id="nombre-ap" placeholder="Nombres" value="">
            </div>
            <div class="col-md-6">
            <input type="text" class="form-control" name="apellidos-ap" id="apellidos-ap" placeholder="Apellidos" value="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="">Dirección</label>
              <div class="input-group">
                <input type="text" class="form-control" name="direccion-ap" id="direccion-ap" placeholder="Dirección" value="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                <label for="">Número de contacto:</label>
                  <div class="input-group">
                  <input type="phone" class="form-control" name="telefono-ap" id="telefono-ap" placeholder="Número de contacto" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="">Correo:</label>
                  <div class="input-group">      
                    <input type="mail" class="form-control" name="correo-ap" id="correo-ap" placeholder="Correo" value="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label for="">Tipo de relación:</label>
              <div class="input-group">
              <input type="text" class="form-control" name="tipo-ap" id="tipo-ap" placeholder="Tipo" value="">
              </div>
            </div>
            <div class="col-md-4">
              <label for="">DNI:</label>
              <div class="input-group">
              <input type="text" class="form-control" name="dni-ap" id="dni-ap" placeholder="Documento" value="">
              </div>
            </div>
            <div class="col-md-4">
            <label for="">Profesión/Ocupación</label>
              <div class="input-group">
              <input type="text" class="form-control" name="profesion-ap" id="profesion-ap" placeholder="Profesión" value="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" id="action" class="btn btn-primary" >Guardar</button>
          </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario-> ctrCrearUsuario();

        ?>

        </form>
      </div>
 </div>