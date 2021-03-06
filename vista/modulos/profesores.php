<div class="app-title">
  <div>
    <h3 id="tituloProfesor"><i class="fa fa-user"></i> Lista de Profesores</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Registrar Profesor</a></li>
  </ul>
</div>
<div class="container-fluid mb-2" id="botonesProfesor" style="margin-top: -10px;">
  <div class="form-inline">
    <button class="btn btn-primary" type="button" onclick="openModalProfesor()"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Profesor</button>
    <button class="btn btn-info ml-auto" type="button" onclick=""><i class="fa fa-table" aria-hidden="true"></i> Importar Excel</button>
  </div>

</div>
<div class="row" id="listProfesor">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="tableprofesores">
            <thead>
              <tr>
                <th>Acciones</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Celular</th>
                <th>DNI</th>
                <th>Usuario</th>
                <th>Cargo</th>
                <th>Título</th>
                <th>Estatus</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php
              $item = null;
              $valor = null;
              $profesores = ControladorProfesores::ctrMostrarProfesor($item, $valor);
              foreach ($profesores as $value) {
                $estado = ($value['estado'] == 1) ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';
                echo '<tr>
                      <th><button class="btn btn-primary btn-sm mt-1" title="Editar" onclick="editarProfesor(' . $value["usuario_id"] . ')"><i class="fas fa-user-edit"></i></button>
                      <button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar"  onclick="desactivarProfesor(' . $value["usuario_id"] . ')"><i class="fas fa-user-times"></i></button></th>
                      <th>' . $value['nombres'] . '</th>
                      <th>' . $value['apellidos'] . '</th>
                      <th>' . $value['celular'] . '</th>
                      <th>' . $value['dni'] . '</th>
                      <th>' . $value['usuario'] . '</th>
                      <th>Profesor</th>
                      <th>' . $value['titulo']  . '</th>
                      <th id="estado_' . $value["usuario_id"] . '">' . $estado . '</th>
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

<!--DATOS DEL PROFESOR-->
<div class="tab-pane" id="DatosProfesor">
  <div class="tile user-settings">
    <h4 class="line-head">Datos del Profesor</h4>
    <form id="formProfesor" name="formProfesor" method="post" enctype="multipart/form-data" rol="form" class="needs-validation" novalidate>

      <div class="form-group row mb-1">

        <div class="col-md-3">
          <label for="">Nombres:</label>
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombres" required>
        </div>
        <div class="col-md-3">
          <label for="">Apellidos:</label>
          <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" required>
        </div>
        <div class="col-md-3 pt-4">
          <input class="form-control-file nuevaFoto" id="nuevaFoto" name="nuevaFoto" type="file" aria-describedby="fileHelp">
          <small class="form-text text-muted" id="fileHelp">Cargue una fotografía para el alumno</small>
        </div>
        <div class="col-md-3 text-center">
          <img src="vista/images/user_default.png" id="imgPerfil" alt="" class="img-thumbnail p-2 previsualizar" width="100px">
          <input type="text" name="fotoActual" id="fotoActual" hidden>
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
            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span></div>
                <input type="phone" class="form-control" name="telefono" id="telefono" placeholder="Teléfono fijo">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span></div>
                <input type="phone" class="form-control" name="celular" id="celular" placeholder="Celular" required>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-3">
          <label for="">Datos:</label>
          <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI" required>
        </div>
        <div class="col-md-3">
          <label for="listEstado">Fecha de nacimiento:</label>
          <input class="form-control" id="date" type="date" name="date" placeholder="Seleccionar fecha" required>
        </div>
        <div class="col-md-3">
          <label for="listEstado">Nacionalidad:</label>
          <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" placeholder="Nacionalidad">
        </div>
        <div class="col-md-3">
          <label for="listEstado">Correo:</label>
          <input type="mail" class="form-control" name="correo" id="correo" placeholder="Correo">
        </div>
      </div>


      <div class="form-group row">

        <div class="col-md-3">
          <label for="">Usuario:</label>
          <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required>
        </div>
        <div class="col-md-3">
          <label for="">Contraseña:</label>
          <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña" required>
          <input type="password" class="form-control" name="claveActual" id="claveActual" hidden>
        </div>
        <div class="col-md-3">
          <label for="titulo_profesor">Título:</label>
          <input type="text" class="form-control" name="titulo_profesor" id="titulo_profesor" placeholder="Título" required>
        </div>
        <div class="col-md-3">
          <label for="listEstado">Estado:</label>
          <select class="form-control" name="listEstado" id="listEstado">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
        </div>


      </div>
      <div class="form-group row">
        <div class="col-md-12 ">
          <label for="">Notas:</label>
          <textarea class="ml-lg-2 form-control" name="notas_profesor" id="notas_profesor" cols="30" rows="10"></textarea>
        </div>
      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModalProfesor()" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="action" class="btn btn-primary btnGuardar">Guardar</button>

      </div>

      <?php

      $crearProfesor = new ControladorProfesores();
      $crearProfesor->ctrCrearProfesor();
      ?>
    </form>
  </div>
</div>

<!-- EDITAR USUARIO-->
<div class="tab-pane" id="EditDatosProfesor">
  <div class="tile user-settings">
    <h4 class="line-head">Datos del Alumno</h4>
    <form id="editFormUsuario" name="editFormUsuario" method="post" enctype="multipart/form-data" rol="form">
      <input type="hidden" name="idusuario" id="idusuario" value="">
      <div class="form-group row mb-1">

        <div class="col-md-3">
          <label for="">Nombres:</label>
          <input type="text" class="form-control" name="editNombre" id="editNombre" placeholder="Nombres">
        </div>
        <div class="col-md-3">
          <label for="">Apellidos:</label>
          <input type="text" class="form-control" name="editApellidos" id="editApellidos" placeholder="Apellidos">
        </div>
        <div class="col-md-3 pt-4">
          <input class="form-control-file nuevaFoto" id="editNuevaFoto" name="editNuevaFoto" type="file" aria-describedby="fileHelp">
          <small class="form-text text-muted" id="fileHelp">Cargue una fotografía para el alumno</small>
        </div>
        <div class="col-md-3 text-center">
          <img src="vista/images/user_default.png" id="editImgPerfil" alt="" class="img-thumbnail p-2 previsualizar" width="100px">
          <input type="text" name="editFotoActual" id="editFotoActual">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Dirección</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editDireccion" id="editDireccion" placeholder="Dirección">
          </div>
        </div>
        <div class="col-md-6">
          <label for="">Teléfonos:</label>
          <div class="row">
            <div class="col-md-6">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span></div>
                <input type="phone" class="form-control" name="editTelefono" id="editTelefono" placeholder="Teléfono fijo">
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span></div>
                <input type="phone" class="form-control" name="editCelular" id="editCelular" placeholder="Celular">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-3">
          <label for="">Datos:</label>
          <input type="text" class="form-control" name="editDni" id="editDni" placeholder="DNI">
        </div>
        <div class="col-md-3">
          <label for="listEstado">Fecha de nacimiento:</label>
          <input class="form-control" id="editDate" type="date" name="editDate" placeholder="Seleccionar fecha">
        </div>
        <div class="col-md-3">
          <label for="listEstado">Nacionalidad:</label>
          <input type="text" class="form-control" name="editNacionalidad" id="editNacionalidad" placeholder="Nacionalidad">
        </div>
        <div class="col-md-3">
          <label for="listEstado">Correo:</label>
          <input type="mail" class="form-control" name="editCorreo" id="editCorreo" placeholder="Correo">
        </div>
      </div>


      <div class="form-group row">

        <div class="col-md-3">
          <label for="">Usuario:</label>
          <input type="text" class="form-control" name="editUsuario" id="editUsuario" placeholder="Usuario" readonly>
        </div>
        <div class="col-md-3">
          <label for="">Contraseña:</label>
          <input type="password" class="form-control" name="editClave" id="editClave" placeholder="Contraseña">
          <input type="password" class="form-control" name="editClaveActual" id="editClaveActual" hidden>
        </div>
        <div class="col-md-3">
          <label for="titulo_profesor">Título:</label>
          <input type="text" class="form-control" name="editTitulo_profesor" id="editTitulo_profesor" placeholder="Título">
        </div>
        <div class="col-md-3">
          <label for="listEstado">Estado:</label>
          <select class="form-control" name="editListEstado" id="editListEstado">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-12 ">
              <label for="" >Notas:</label>
              <textarea class="ml-lg-2 form-control" name="editNotas_profesor" id="editNotas_profesor" cols="30" rows="10"></textarea>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModalProfesor()" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btnEdit" class="btn btn-primary btnGuardar">Actualizar</button>

      </div>

      <?php

      $editarProfesor = new ControladorProfesores();
      $editarProfesor->ctrEditarProfesor();
      ?>
    </form>
  </div>
</div>