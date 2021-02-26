<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fa fa-user"></i> Lista de Alumnos</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Registrar Alumnos</a></li>
  </ul>
</div>
<div class="container-fluid mb-2" id="botonesAlumno" style="margin-top: -10px;">
  <div class="form-inline">
    <button class="btn btn-primary" type="button" onclick="openModalAlumnos()"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Alumno</button>
    <button class="btn btn-info ml-auto" type="button" onclick=""><i class="fa fa-table" aria-hidden="true"></i> Importar Excel</button>
  </div>

</div>
<div class="row" id="listAlumno">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="tablealumnos">
            <thead>
              <tr>
                <th>Acciones</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>DNI</th>
                <th>Usuario</th>
                <th>Grado</th>
                <th>Apoderado</th>
                <th>Estatus</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = null;
              $valor = null;
              $usuarios = ControladorAlumnos :: ctrMostrarAlumno($item,$valor);
              foreach($usuarios as $value){
                $estado = ($value['estado']==1)? '<span class="badge badge-success">Activo</span>': '<span class="badge badge-danger">Inactivo</span>';
                echo'<tr>
                      <th><button class="btn btn-primary btn-sm mt-1" title="Editar" onclick="editarAlumno('.$value["usuario_id"].')"><i class="fas fa-user-edit"></i></button>
                      <button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar"  onclick="desactivarAlumno('.$value["usuario_id"].')"><i class="fas fa-user-times"></i></button></th>
                      <th>'.$value["nombres"].'</th>
                      <th>'.$value['apellidos'].'</th>
                      <th>'.$value['telefono_fijo'].'</th>
                      <th>'.$value['dni'].'</th>
                      <th>'.$value['usuario'].'</th>
                      <th>Grado</th>
                      <th>'.$value['nombres_apoderado']." ".$value['apellidos_apoderado'].'</th>
                      <th id="estado_'.$value["usuario_id"].'">'.$estado.'</th>
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

<!--MODAL ALUMNO-->
<div class="tab-pane" id="DatosAlumno">
  <div class="tile user-settings">
    <h4 class="line-head">Datos del Alumno</h4>
    <form id="formAlumno" name="formAlumno"method="post" enctype="multipart/form-data" rol="form" >
      
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
                <input type="phone" class="form-control" name="celular" id="celular" placeholder="Celular">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-3">
          <label for="">Datos:</label>
          <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI">
        </div>
        <div class="col-md-3">
          <label for="dateAlumno">Fecha de nacimiento:</label>
          <input class="form-control" id="dateAlumno" type="date" name="dateAlumno" placeholder="Seleccionar fecha">
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
          <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" >
        </div>
        <div class="col-md-3">
          <label for="">Contraseña:</label>
          <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña">
          <input type="password" class="form-control" name="claveActual" id="claveActual" hidden>
        </div>
        <div class="col-md-3">
          <label for="listRol">Rol:</label>
          <select class="form-control" name="listRol" id="listRol">
            <option value="4">Alumno</option>
            <option value="1">Directivo</option>
            <option value="2">Administrativo</option>
            <option value="3">Profesor</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="listEstado">Estado:</label>
          <select class="form-control" name="listEstado" id="listEstado">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
      </div>
      
        
      </div>

      <!--ESPACIO PARA LOS DATOS DEL RESPONSABLE-->
      <hr class="my-4">
      <div class="tile-title-w-btn line-head">
        <h4 class="">Datos del Apoderado</h4>
        <div class="btn-group">
          <a class="btn btn-warning text-white"><i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>
      </div>
      
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
          <label for="">Documento de identidad:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="dni-ap" id="dni-ap" placeholder="Documento" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">Profesión/Ocupación</label>
          <div class="input-group">
            <input type="text" class="form-control" name="ocupacion-ap" id="ocupacion-ap" placeholder="Profesión/Ocupación" value="">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModalAlumnos()" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="action" class="btn btn-primary btnGuardar">Guardar</button>
        
      </div>

      <?php
        
        $crearAlumno = new ControladorAlumnos();
        $crearAlumno->ctrCrearAlumno();
      ?>
    </form>
  </div>
</div>

<!--MODAL EDITAR aLUMNO-->
<div class="tab-pane" id="EditDatosAlumno">
  <div class="tile user-settings">
    <h4 class="line-head">Datos del Alumno</h4>
    <form id="editFormUsuario" name="editFormUsuario"method="post" enctype="multipart/form-data" rol="form" >
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
          <label for="listRol">Rol:</label>
          <select class="form-control" name="editListRol" id="editListRol">
            <option value="4">Alumno</option>
            <option value="1">Directivo</option>
            <option value="2">Administrativo</option>
            <option value="3">Profesor</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="listEstado">Estado:</label>
          <select class="form-control" name="editListEstado" id="editListEstado">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
      </div>
      
        
      </div>

      <!--ESPACIO PARA LOS DATOS DEL RESPONSABLE-->
      <hr class="my-4">
      <div class="tile-title-w-btn line-head">
        <h4 class="">Datos del Apoderado</h4>
        <div class="btn-group">
          <a class="btn btn-warning text-white"><i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>
      </div>
      
      <div class="form-group row">
        <div class="col-md-12"><label for="">Nombres y apellidos del apoderado :</label></div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="editNombre-ap" id="editNombre-ap" placeholder="Nombres" value="">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="editApellidos-ap" id="editApellidos-ap" placeholder="Apellidos" value="">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Dirección</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editDireccion-ap" id="editDireccion-ap" placeholder="Dirección" value="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <label for="">Número de contacto:</label>
              <div class="input-group">
                <input type="phone" class="form-control" name="editTelefono-ap" id="editTelefono-ap" placeholder="Número de contacto" value="">
              </div>
            </div>
            <div class="col-md-6">
              <label for="">Correo:</label>
              <div class="input-group">
                <input type="mail" class="form-control" name="editCorreo-ap" id="editCorreo-ap" placeholder="Correo" value="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <label for="">Tipo de relación:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editTipo-ap" id="editTipo-ap" placeholder="Tipo" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">Documento de identidad:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editDni-ap" id="editDni-ap" placeholder="Documento" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">Profesión/Ocupación</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editOcupacion-ap" id="editOcupacion-ap" placeholder="Profesión/Ocupación" value="">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModalAlumnos()" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btnEdit" class="btn btn-primary btnGuardar">Actualizar</button>
        
      </div>

      <?php
  
        $editarAlumno = new ControladorAlumnos();
        $editarAlumno->ctrEditarAlumnos();
      ?>
    </form>
  </div>
</div>