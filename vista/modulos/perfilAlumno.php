<?php 
    $valor = 34;
    
    $result = ControladorAlumnos :: ctrMostrarDatoAlumno($valor);
    
?>

<div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="<?php echo (!empty($_SESSION['foto'])) ? $_SESSION['foto'] : "vista/images/user_default.png" ?>">
              <h4><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellidos'] ?></h4>
              <p><?php echo $result['nombre_grado']?></p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Información importante</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Configuración</a></li>
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
                    <p><span for="" class="h6">Nombres y apellidos: </span> <span ><?php echo $result['nombres'] ." ". $result['apellidos'] ?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Fecha nacimiento: </span><span><?php echo $result['fecha_nacimiento']?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Dirección: </span> <span ><?php echo $result['direccion']?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Nacionalidad: </span> <span ><?php echo $result['nacionalidad']?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Teléfono Fijo: </span> <span ><?php echo $result['telefono_fijo']?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Número de celular: </span> <span ><?php echo $result['celular']?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Grado Actual: </span> <span><?php echo $result['nombre_grado']?></span></p>
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
                    <p><span for="" class="h6">Nombres y apellidos: </span> <span ><?php echo $result['nombres_apoderado'] .' '. $result['apellidos_apoderado'] ?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Relación: </span><span><?php echo $result['tipo_apoderado']?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Dirección: </span> <span ><?php echo $result['direccion_apoderado']?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Nacionalidad: </span> <span ><?php echo $result['nacionalidad']?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Teléfono Fijo: </span> <span ><?php echo $result['telefono_fijo']?></span></p>
                  </div>
                  <div class="col-md-6">
                    <p><span class="h6">Número de celular: </span> <span ><?php echo $result['celular']?></span></p>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Datos del Alumno</h4>
                <form id="formUsuario2" name="formUsuario2" action="">
                  <input type="hidden" name="idusuario2" id="idusuario2" value="">
                  <div class="form-group row">
                    <div class="col-md-12"><label for="">Nombres y Apellidos:</label></div>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="nombre2" id="nombre2" placeholder="Nombres" value="<?php echo $result['nombres']?>">
                    </div>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="apellidos2" id="apellidos2" placeholder="Apellidos" value="<?php echo $result['apellidos']?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="">Dirección</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="direccion2" id="direccion2" placeholder="Dirección" value="<?php echo $result['direccion']?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="">Teléfonos:</label>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span></div>
                          <input type="phone" class="form-control" name="telefono2" id="telefono2" placeholder="Teléfono fijo" value="<?php echo $result['telefono_fijo']?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span></div>
                            <input type="phone" class="form-control" name="celular2" id="celular2" placeholder="Celular" value="<?php echo $result['celular']?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                    <label for="">DNI:</label>
                    <input type="text" class="form-control" name="dni2" id="dni2" placeholder="DNI"  value="<?php echo $result['dni']?>">
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
                      <input type="text" class="form-control" name="usuario2" id="usuario2" placeholder="Usuario" value="<?php echo $result['usuario']?>">
                    </div>
                    <div class="col-md-6">
                      <input type="password" class="form-control" name="clave2" id="clave2" placeholder="Contraseña">
                    </div>  
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="listRol">Rol:</label>
                      <select class="form-control" name="listRol2" id="listRol2" >
                          <option value="4" <?php echo ($result['rol'] == 4)? 'selected':'' ?>>Alumno</option>
                          <option value="1" <?php echo ($result['rol'] == 1)? 'selected':'' ?>>Directivo</option>
                          <option value="2" <?php echo ($result['rol'] == 2)? 'selected':'' ?>>Administrativo</option>
                          <option value="3" <?php echo ($result['rol'] == 3)? 'selected':'' ?>>Profesor</option>       
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="listEstado">Estado:</label>
                      <select class="form-control"name="listEstado2" id="listEstado2">
                          <option value="1" <?php echo ($result['estado'] == 1)? 'selected':'' ?>>Activo</option>
                          <option value="2" <?php echo ($result['estado'] == 2)? 'selected':'' ?>>Inactivo</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="listEstado">Nacionalidad:</label>
                      <input type="text" class="form-control" name="nacionalidad2" id="nacionalidad2" placeholder="Nacionalidad" value="<?php echo $result['nacionalidad']?>">
                    </div>
                    <div class="col-md-3">
                    <label for="listEstado">Fecha de nacimiento:</label>
                      <input class="form-control" id="date2" type="date" name="date2"placeholder="Seleccionar fecha" value="<?php echo $result['fecha_nacimiento']?>">
                    </div>
                  </div>

                  <!--ESPACIO PARA LOS DATOS DEL RESPONSABLE-->
                  <hr class="my-4">
                  <h4 class="line-head">Datos del Apoderado</h4>
                  <div class="form-group row">
                    <div class="col-md-12"><label for="">Nombres y apellidos del apoderado :</label></div>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="nombre-ap" id="nombre-ap" placeholder="Nombres" value="<?php echo $result['nombres_apoderado']?>" >
                    </div>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="apellidos-ap" id="apellidos-ap" placeholder="Apellidos" value="<?php echo $result['apellidos_apoderado']?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="">Dirección</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="direccion-ap" id="direccion-ap" placeholder="Dirección" value="<?php echo $result['direccion_apoderado']?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6">
                        <label for="">Número de contacto:</label>
                          <div class="input-group">
                          <input type="phone" class="form-control" name="telefono-ap" id="telefono-ap" placeholder="Número de contacto" value="<?php echo $result['telefono_apoderado']?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="">Correo:</label>
                          <div class="input-group">      
                            <input type="mail" class="form-control" name="correo-ap" id="correo-ap" placeholder="Correo" value="<?php echo $result['correo_apoderado']?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-4">
                      <label for="">Tipo de relación:</label>
                      <div class="input-group">
                      <input type="text" class="form-control" name="tipo-ap" id="tipo-ap" placeholder="Tipo" value="<?php echo $result['tipo_apoderado']?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="">Documento de identidad:</label>
                      <div class="input-group">
                      <input type="text" class="form-control" name="dni-ap" id="dni-ap" placeholder="Documento" value="<?php echo $result['dni_apoderado']?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                    <label for="">Profesión/Ocupación</label>
                      <div class="input-group">
                      <input type="text" class="form-control" name="profesion-ap" id="profesion-ap" placeholder="Profesión" value="<?php echo $result['ocupacion_apoderado']?>">
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="action" class="btn btn-primary" >Guardar</button>
                  </div>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
   