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
    <button class="btn btn-info ml-auto" type="button" data-toggle="modal" data-target="#modalCSV" ><i class="fa fa-table" aria-hidden="true"></i> Importar Excel</button>
  </div>

</div>
<div class="row" id="listAlumno">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="tablealumnos">
            <thead>
              <tr class="text-center">
                <th>Acciones</th>
                <th>Apellidos y Nombres</th>
                <th>DNI</th>
                <th>Celular</th>
                <th>Nivel</th>
                <th>Grado</th>
                
                <th>Estatus</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = null;
              $valor = null;
              $usuarios = ControladorAlumnos :: ctrMostrarAlumno($item,$valor);
              foreach($usuarios as $value){
                if($value['rol']!=4){
                  continue;
                }
                $estado = ($value['estado']==1)?'<div class="toggle-flip"><label><input type="checkbox" checked onclick="estadoAlumno('.$value["usuario_id"].')"><span class="flip-indecator" data-toggle-on="Activo" data-toggle-off="Inactivo"></span></label></div>': '<div class="toggle-flip"><label><input type="checkbox" onclick="estadoAlumno('.$value["usuario_id"].')"><span class="flip-indecator" data-toggle-on="Activo" data-toggle-off="Inactivo"></span></label></div>';
                
                echo'<tr>
                      <th><button class="btn btn-primary btn-sm mt-1" title="Editar" onclick="editarAlumno('.$value["usuario_id"].')"><i class="fas fa-user-edit"></i></button>
                      <button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar"  onclick="modalEliminar('.$value["usuario_id"].')"><i class="fas fa-user-times"></i></button></th>

                      <th>'.$value['apellidos'].', '.$value["nombres"].'</th>
                      <th>'.$value['dni'].'</th>
                      <th>'.$value['celular'].'</th>
                      <th>'.$value['nombre_nivel'].'</th>
                      <th>'.$value['nombre_grado'].'</th>
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
    <form id="formAlumno" name="formAlumno"method="post" enctype="multipart/form-data" rol="form"class="needs-validation" novalidate>
      
      <div class="form-group row mb-1">
        
        <div class="col-md-3">
        <label for="">Nombres* :</label>
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombres" required>
        </div>
        <div class="col-md-3">
          <label for="">Apellidos* :</label>
          <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" required>
        </div>
        <div class="col-md-3 pt-4">
          <input class="form-control-file nuevaFoto" id="nuevaFoto" name="nuevaFoto" type="file" aria-describedby="fileHelp">
          <small class="form-text text-muted" id="fileHelp">Cargue una fotografía para el alumno</small>
        </div>
        <div class="col-md-3 text-center">
          <img src="vista/images/user_default.png" id="imgPerfil" alt="" class="img-thumbnail p-2 previsualizar" width="100px">
          <input type="text" name="fotoActual" id="fotoActual" hidden >
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
                <input type="phone" class="form-control" name="celular" id="celular" placeholder="Celular" >
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-3">
          <label for="">DNI* :</label>
          <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI" required>
        </div>
        <div class="col-md-3">
          <label for="dateAlumno">Fecha de nacimiento:</label>
          <input class="form-control" id="dateAlumno" type="date" name="dateAlumno" placeholder="Seleccionar fecha" >
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
          <label for="">Usuario* :</label>
          <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required>
        </div>
        <div class="col-md-3">
          <label for="">Contraseña* :</label>
          <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña"required>
          <input type="password" class="form-control" name="claveActual" id="claveActual" hidden>
        </div>
        <div class="col-md-3">
          <label for="cohorte">Cohorte:</label>
          <input type="text" class="form-control" name="cohorte" id="cohorte" placeholder="Cohorte">
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
        <h4 class="">Datos del Padre</h4>
        <div class="btn-group">
          <a class="btn btn-primary mr-1 text-white" data-toggle="modal" data-target="#BuscarApoderado"><i class="fas fa-search" aria-hidden="true"></i></a>
        </div>
      </div>
      
      <div class="form-group row">
        <div class="col-md-12"><label for="">Nombres y apellidos del Padre :</label></div>
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
                <input type="phone" class="form-control" name="telefono-ap" id="telefono-ap" placeholder="Número de contacto"  value="">
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
            <input type="text" class="form-control" name="ocupacion-ap" id="ocupacion-ap" placeholder="Profesión/Ocupación" value="">
          </div>
        </div>
      </div>

      <!--ESPACIO PARA LOS DATOS DEL RESPONSABLE 2-->
      <hr class="my-4">
      <div class="tile-title-w-btn line-head">
        <h4 class="">Datos de la madre</h4>
        <div class="btn-group">
          <a class="btn btn-primary mr-1 text-white" data-toggle="modal" data-target="#BuscarApoderado2"><i class="fas fa-search" aria-hidden="true"></i></a>
        </div>
      </div>
      
      <div class="form-group row">
        <div class="col-md-12"><label for="">Nombres y apellidos de la madre :</label></div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="nombre-ap2" id="nombre-ap2" placeholder="Nombres" value="">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="apellidos-ap2" id="apellidos-ap2" placeholder="Apellidos" value="">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Dirección</label>
          <div class="input-group">
            <input type="text" class="form-control" name="direccion-ap2" id="direccion-ap2" placeholder="Dirección" value="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <label for="">Número de contacto:</label>
              <div class="input-group">
                <input type="phone" class="form-control" name="telefono-ap2" id="telefono-ap2" placeholder="Número de contacto"  value="">
              </div>
            </div>
            <div class="col-md-6">
              <label for="">Correo:</label>
              <div class="input-group">
                <input type="mail" class="form-control" name="correo-ap2" id="correo-ap2" placeholder="Correo" value="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <label for="">Tipo de relación:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="tipo-ap2" id="tipo-ap2" placeholder="Tipo" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">DNI:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="dni-ap2" id="dni-ap2" placeholder="Documento" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">Profesión/Ocupación</label>
          <div class="input-group">
            <input type="text" class="form-control" name="ocupacion-ap2" id="ocupacion-ap2" placeholder="Profesión/Ocupación" value="">
          </div>
        </div>
      </div>

      <!--ESPACIO PARA LOS DATOS DEL RESPONSABLE 3-->
      <hr class="my-4">
      <div class="tile-title-w-btn line-head">
        <h4 class="">Datos del apoderado</h4>
        <div class="btn-group">
          <a class="btn btn-primary mr-1 text-white" data-toggle="modal" data-target="#BuscarApoderado3"><i class="fas fa-search" aria-hidden="true"></i></a>
        </div>
      </div>
      
      <div class="form-group row">
        <div class="col-md-12"><label for="">Nombres y apellidos del apoderado :</label></div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="nombre-ap3" id="nombre-ap3" placeholder="Nombres" value="">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="apellidos-ap3" id="apellidos-ap3" placeholder="Apellidos" value="">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Dirección</label>
          <div class="input-group">
            <input type="text" class="form-control" name="direccion-ap3" id="direccion-ap3" placeholder="Dirección" value="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <label for="">Número de contacto:</label>
              <div class="input-group">
                <input type="phone" class="form-control" name="telefono-ap3" id="telefono-ap3" placeholder="Número de contacto"  value="">
              </div>
            </div>
            <div class="col-md-6">
              <label for="">Correo:</label>
              <div class="input-group">
                <input type="mail" class="form-control" name="correo-ap3" id="correo-ap3" placeholder="Correo" value="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <label for="">Tipo de relación:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="tipo-ap3" id="tipo-ap3" placeholder="Tipo" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">DNI:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="dni-ap3" id="dni-ap3" placeholder="Documento" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">Profesión/Ocupación</label>
          <div class="input-group">
            <input type="text" class="form-control" name="ocupacion-ap3" id="ocupacion-ap3" placeholder="Profesión/Ocupación" value="">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModalAlumnos()" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="action" class="btn btn-primary btnGuardar" >Guardar</button>
      </div>
      

      <?php
        
        $crearAlumno = new ControladorAlumnos();
        $crearAlumno->ctrCrearAlumno();
      ?>
    </form>
  </div>
</div>

<!--MODAL EDITAR ALUMNO-->
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
          <label for="">Datos* :</label>
          <input type="text" class="form-control" name="editDni" id="editDni" placeholder="DNI" required>
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
          <label for="">Usuario* :</label>
          <input type="text" class="form-control" name="editUsuario" id="editUsuario" placeholder="Usuario"  >
        </div>
        <div class="col-md-3">
          <label for="">Contraseña* :</label>
          <input type="password" class="form-control" name="editClave" id="editClave" placeholder="Contraseña">
          <input type="password" class="form-control" name="editClaveActual" id="editClaveActual" hidden>
        </div>
        <div class="col-md-3">
          <label for="editCohorte">Cohorte:</label>
          <input type="text" class="form-control" name="editCohorte" id="editCohorte" placeholder="Cohorte">
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
        <h4 class="">Datos del Padre</h4>
        
      </div>
      
      <div class="form-group row">
        <div class="col-md-12"><label for="">Nombres y apellidos del Padre :</label></div>
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
          <label for="">DNI:</label>
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

      <!--ESPACIO PARA LOS DATOS DEL RESPONSABLE 2-->
      <hr class="my-4">
      <div class="tile-title-w-btn line-head">
        <h4 class="">Datos de la madre</h4>
        
      </div>
      
      <div class="form-group row">
        <div class="col-md-12"><label for="">Nombres y apellidos de la madre :</label></div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="editNombre-ap2" id="editNombre-ap2" placeholder="Nombres" value="">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="editApellidos-ap2" id="editApellidos-ap2" placeholder="Apellidos" value="">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Dirección</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editDireccion-ap2" id="editDireccion-ap2" placeholder="Dirección" value="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <label for="">Número de contacto:</label>
              <div class="input-group">
                <input type="phone" class="form-control" name="editTelefono-ap2" id="editTelefono-ap2" placeholder="Número de contacto" value="">
              </div>
            </div>
            <div class="col-md-6">
              <label for="">Correo:</label>
              <div class="input-group">
                <input type="mail" class="form-control" name="editCorreo-ap2" id="editCorreo-ap2" placeholder="Correo" value="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <label for="">Tipo de relación:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editTipo-ap2" id="editTipo-ap2" placeholder="Tipo" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">DNI:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editDni-ap2" id="editDni-ap2" placeholder="Documento" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">Profesión/Ocupación</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editOcupacion-ap2" id="editOcupacion-ap2" placeholder="Profesión/Ocupación" value="">
          </div>
        </div>
      </div>

      <!--ESPACIO PARA LOS DATOS DEL RESPONSABLE 3-->
      <hr class="my-4">
      <div class="tile-title-w-btn line-head">
        <h4 class="">Datos del Apoderado</h4>
        
      </div>
      
      <div class="form-group row">
        <div class="col-md-12"><label for="">Nombres y apellidos del apoderado :</label></div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="editNombre-ap3" id="editNombre-ap3" placeholder="Nombres" value="">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="editApellidos-ap3" id="editApellidos-ap3" placeholder="Apellidos" value="">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Dirección</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editDireccion-ap3" id="editDireccion-ap3" placeholder="Dirección" value="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <label for="">Número de contacto:</label>
              <div class="input-group">
                <input type="phone" class="form-control" name="editTelefono-ap3" id="editTelefono-ap3" placeholder="Número de contacto" value="">
              </div>
            </div>
            <div class="col-md-6">
              <label for="">Correo:</label>
              <div class="input-group">
                <input type="mail" class="form-control" name="editCorreo-ap3" id="editCorreo-ap3" placeholder="Correo" value="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <label for="">Tipo de relación:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editTipo-ap3" id="editTipo-ap3" placeholder="Tipo" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">DNI:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editDni-ap3" id="editDni-ap3" placeholder="Documento" value="">
          </div>
        </div>
        <div class="col-md-4">
          <label for="">Profesión/Ocupación</label>
          <div class="input-group">
            <input type="text" class="form-control" name="editOcupacion-ap3" id="editOcupacion-ap3" placeholder="Profesión/Ocupación" value="">
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
<!--MODAL BUSCAR APODERADO-->
<div class="modal fade" id="BuscarApoderado" tabindex="-1" aria-labelledby="BuscarApoderadoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="BuscarApoderadoLabel">Buscar Apoderado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="BuscaApoderado">
            <thead>
              <tr>
                <th>Acciones</th>
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Relación</th>
                <th>Teléfono</th>
                <th hidden>direccion</th>
                <th hidden>correo</th>
                <th hidden>ocupacion</th>
                
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = null;
              $valor = null;
              $apoderado = ControladorApoderado::ctrMostrarApoderado($item,$valor);
              foreach($apoderado as $value){

                    echo'<tr>
                            
                          <td><button class="btn btn-primary btn-sm mt-1" title="Agregar" name="'.$value["id_apoderado"].'" id="Bus_Aporado"><i class="fas fa-user-edit"></i></button>
                          </td> 
                          <td>'.$value["dni_apoderado"].'</td>
                          <td>'.$value["nombres_apoderado"].'</td>
                          <td>'.$value['apellidos_apoderado'].'</td>
                          <td>'.$value['tipo_apoderado'].'</td>
                          <td>'.$value['telefono_apoderado'].'</td>
                          <td hidden>'.$value['direccion_apoderado'].'</td>
                          <td hidden>'.$value['correo_apoderado'].'</td>
                          <td hidden>'.$value['ocupacion_apoderado'].'</td>
                        </tr>
                    ';
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

<!--MODAL BUSCAR APODERADO 2-->
<div class="modal fade" id="BuscarApoderado2" tabindex="-1" aria-labelledby="BuscarApoderadoLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="BuscarApoderadoLabel2">Buscar Apoderado 2</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="BuscaApoderado2">
            <thead>
              <tr>
                <th>Acciones</th>
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Relación</th>
                <th>Teléfono</th>
                <th hidden>direccion</th>
                <th hidden>correo</th>
                <th hidden>ocupacion</th>
                
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = null;
              $valor = null;
              $apoderado = ControladorApoderado::ctrMostrarApoderado($item,$valor);
              foreach($apoderado as $value){

                    echo'<tr>
                            
                          <td><button class="btn btn-primary btn-sm mt-1" title="Agregar" name="'.$value["id_apoderado"].'" id="Bus_Aporado2"><i class="fas fa-user-edit"></i></button>
                          </td> 
                          <td>'.$value["dni_apoderado"].'</td>
                          <td>'.$value["nombres_apoderado"].'</td>
                          <td>'.$value['apellidos_apoderado'].'</td>
                          <td>'.$value['tipo_apoderado'].'</td>
                          <td>'.$value['telefono_apoderado'].'</td>
                          <td hidden>'.$value['direccion_apoderado'].'</td>
                          <td hidden>'.$value['correo_apoderado'].'</td>
                          <td hidden>'.$value['ocupacion_apoderado'].'</td>
                        </tr>
                    ';
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

<!--MODAL BUSCAR APODERADO 3-->
<div class="modal fade" id="BuscarApoderado3" tabindex="-1" aria-labelledby="BuscarApoderadoLabel3" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="BuscarApoderadoLabel3">Buscar Apoderado 3</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="BuscaApoderado3">
            <thead>
              <tr>
                <th>Acciones</th>
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Relación</th>
                <th>Teléfono</th>
                <th hidden>direccion</th>
                <th hidden>correo</th>
                <th hidden>ocupacion</th>
                
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = null;
              $valor = null;
              $apoderado = ControladorApoderado::ctrMostrarApoderado($item,$valor);
              foreach($apoderado as $value){

                    echo'<tr>
                            
                          <td><button class="btn btn-primary btn-sm mt-1" title="Agregar" name="'.$value["id_apoderado"].'" id="Bus_Aporado3"><i class="fas fa-user-edit"></i></button>
                          </td> 
                          <td>'.$value["dni_apoderado"].'</td>
                          <td>'.$value["nombres_apoderado"].'</td>
                          <td>'.$value['apellidos_apoderado'].'</td>
                          <td>'.$value['tipo_apoderado'].'</td>
                          <td>'.$value['telefono_apoderado'].'</td>
                          <td hidden>'.$value['direccion_apoderado'].'</td>
                          <td hidden>'.$value['correo_apoderado'].'</td>
                          <td hidden>'.$value['ocupacion_apoderado'].'</td>
                        </tr>
                    ';
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>


<!--MODAL SUBIR CSV-->
<div class="modal fade" id="modalCSV" tabindex="-1" aria-labelledby="ModalLabelCSV" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelCSV">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" method="post" action="">
          CSV File:
          <input class="form-control-file" type="file" name="file" id="file">
          <div class="modal-footer">
          <input type="submit" value="importar" name="importar" class="btn btn-primary">
          </div>
          <?php
            $importarAlumno = new ModeloAlumnos();
            $importarAlumno->mdlImportarAlumnos();
          ?>
      </form>
      </div>
      
        
        
      
    </div>
  </div>
</div>

<!--MODAL validar Clave-->
<div class="modal fade" id="modalClave" tabindex="-1" aria-labelledby="ModalLabelClave" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelClave">Eliminar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Ingrese clave de seguridad</p>
        <input type="text" value="" name="deleteID" id="deleteID" hidden>
        <input type="text" id="claveSeguridad" name="claveSeguridad" class="form-control">
        
      </div>
      <div class="modal-footer">
      <input type="button" value="Aceptar" name="btnDeleteID" id="btnDeleteID" class="btn btn-primary">
      </div>
      
        
        
      
    </div>
  </div>
</div>