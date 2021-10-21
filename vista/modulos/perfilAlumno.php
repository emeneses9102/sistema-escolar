<?php
$valor = $_SESSION['usuario_id'];

$result = ControladorAlumnos::ctrMostrarDatoAlumno($valor);

?>

<div class="row user">
  <div class="col-md-12">
    <div class="profile">
      <div class="info"><img class="user-img" id="user-img2" src="<?php echo (!empty($_SESSION['foto'])) ? $_SESSION['foto'] : "vista/images/user_default.png" ?>">
        <h4><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellidos'] ?></h4>
        <p><?php echo $result['nombre_grado'] ?></p>
      </div>
      <div class="cover-image"></div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="tile p-0">
      <ul class="nav flex-column nav-tabs user-tabs">
        <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Información importante</a></li>
        <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab" onclick="editarAlumno(<?php echo $valor ?>)">Configuración</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-9">
    <div class="tab-content">
      <div class="tab-pane active" id="user-timeline">
        <div class="timeline-post">
          <div class="post-media">
            <div class="content">
              <h4><a href="#">Datos del Alumno</a></h4>
              <p class="text-muted"><small>Última conexión: 10 de diciembre a las 9:30</small></p>
            </div>
          </div>
          <div class="post-content row pl-2">
            <div class="col-md-6">
              <p><span for="" class="h6">Nombres y apellidos: </span> <span><?php echo $result['nombres'] . " " . $result['apellidos'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Fecha nacimiento: </span><span><?php echo $result['fecha_nacimiento'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Dirección: </span> <span><?php echo $result['direccion'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Nacionalidad: </span> <span><?php echo $result['nacionalidad'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Teléfono Fijo: </span> <span><?php echo $result['telefono_fijo'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Número de celular: </span> <span><?php echo $result['celular'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Grado Actual: </span> <span><?php echo $result['nombre_grado'] ?></span></p>
            </div>



          </div>

        </div>
        <div class="timeline-post">
          <div class="post-media">
            <div class="content">
              <h4><a href="#">Datos del Apoderado</a></h4>
            </div>
          </div>
          <div class="post-content row pl-2">
            <div class="col-md-6">
              <p><span for="" class="h6">Nombres y apellidos: </span> <span><?php echo $result['nombres_apoderado'] . ' ' . $result['apellidos_apoderado'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Relación: </span><span><?php echo $result['tipo_apoderado'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Dirección: </span> <span><?php echo $result['direccion_apoderado'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Nacionalidad: </span> <span><?php echo $result['nacionalidad'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Teléfono Fijo: </span> <span><?php echo $result['telefono_fijo'] ?></span></p>
            </div>
            <div class="col-md-6">
              <p><span class="h6">Número de celular: </span> <span><?php echo $result['celular'] ?></span></p>
            </div>


          </div>

        </div>
      </div>
      <div class="tab-pane fade" id="user-settings">
        <div class="tile user-settings">
          <h4 class="line-head">Datos del Alumno</h4>
          <form id="formUsuario2" name="formUsuario2" method="post" enctype="multipart/form-data" rol="form">
            <input type="hidden" name="idusuario2" id="idusuario2" value="">
            <div class="form-group row">
              <input type="text" class="form-control" name="idusuario" id="idusuario" value="<?php echo $_SESSION['usuario_id']; ?>" hidden>
              <div class="col-md-12"><label for="">Nombres y Apellidos * :</label></div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="editNombre" id="editNombre" placeholder="Nombres" value="<?php echo $result['nombres'] ?>" required>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="editApellidos" id="editApellidos" placeholder="Apellidos" value="<?php echo $result['apellidos'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="">Dirección</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="editDireccion" id="editDireccion" placeholder="Dirección" value="<?php echo $result['direccion'] ?>">
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Teléfonos:</label>
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span></div>
                      <input type="phone" class="form-control" name="editTelefono" id="editTelefono" placeholder="Teléfono fijo" value="<?php echo $result['telefono_fijo'] ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span></div>
                      <input type="phone" class="form-control" name="editCelular" id="editCelular" placeholder="Celular" value="<?php echo $result['celular'] ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label for="">DNI * :</label>
                <input type="text" class="form-control" name="editDni" id="editDni" placeholder="DNI" value="<?php echo $result['dni'] ?>" required>
              </div>
              <div class="col-md-6 row">
                <div class="col-md-6 pt-4">
                  <input class="form-control-file nuevaFoto" id="editNuevaFoto" name="editNuevaFoto" type="file" aria-describedby="fileHelp">
                  <small class="form-text text-muted" id="fileHelp">Cargue una fotografía para el alumno</small>
                </div>
                <div class="col-md-6 text-center">
                  <img src="vista/images/user_default.png" id="editImgPerfil" alt="" class="img-thumbnail p-2 previsualizar" width="100px">
                  <input type="text" name="editFotoActual" id="editFotoActual" hidden>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="">Usuario y Contraseña * :</label>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="editUsuario" id="editUsuario" placeholder="Usuario" value="<?php echo $result['usuario'] ?>" required>
              </div>
              <div class="col-md-6">
                <input type="password" class="form-control" name="editClave" id="editClave" placeholder="Contraseña">
                <input type="password" class="form-control" name="editClaveActual" id="editClaveActual" placeholder="Contraseña" value="<?php echo $result['clave'] ?>" hidden>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-4">
                <label for="listEstado">Correo:</label>
                <input type="text" class="form-control" name="editCorreo" id="editCorreo" placeholder="Correo" value="<?php echo $result['correo'] ?>">
              </div>
              <div class="col-md-4">
                <label for="listEstado">Nacionalidad:</label>
                <input type="text" class="form-control" name="editNacionalidad" id="editNacionalidad" placeholder="Nacionalidad" value="<?php echo $result['nacionalidad'] ?>">
              </div>
              <div class="col-md-4">
                <label for="listEstado">Fecha de nacimiento:</label>
                <input class="form-control" id="editDate" type="date" name="editDate" placeholder="Seleccionar fecha" value="<?php echo $result['fecha_nacimiento'] ?>">
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
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" id="action" class="btn btn-primary">Guardar</button>
            </div>
            <?php

            $editarAlumno = new ControladorAlumnos();
            $editarAlumno->ctrEditarAlumnosP();
            ?>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>