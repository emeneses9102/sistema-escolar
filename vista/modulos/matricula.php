<div class="app-title mb-2">
    <div>
        <h3 id="tituloAlumno"><i class="fas fa-school"></i> Matrícula </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-school fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Matrícula</a></li>
    </ul>
</div>
<div class="user" id="matriculainfo">
    <div class="form-inline mb-2">
        <div class="container-button ml-auto">
            <button class="btn btn-success mr-2" onclick="mostrarformAlu()"><i class="fa fa-user-circle" aria-hidden="true"></i>Nuevo Alumno</button>
            <button class="btn btn-info "  data-toggle="modal" data-target="#mBuscarAlumno"><i class="fa fa-search" aria-hidden="true" ></i> Buscar Alumno</button>
            <button class="btn btn-warning "  data-toggle="modal" data-target="#mGrupos"><i class="fa fa-search" aria-hidden="true" ></i> Matrícula Grupos</button>
        </div>
    </div>
    <div class="col-md-12 tile ">
        <h3 class="tile-title">Realizar matrícula</h3>
       <form action="" id="frmMatricula">
            <div class="row mx-md-4" id="form-matricula">
                <div class=" col-md-3 form-group">
                    <label for="">Nombres:</label>
                    <input type="text" class="form-control" name="matricula_nombre" id="matricula_nombre" readonly required>
                </div>
                <div class=" col-md-3 form-group">
                    <label for="">Apellidos:</label>
                    <input type="text" class="form-control"  name="matricula_apellidos" id="matricula_apellidos" readonly required>
                </div>
                <div class=" col-md-4 form-group">
                    <label for="">Apoderado:</label>
                    <input type="text" class="form-control"  name="matricula_apoderado" id="matricula_apoderado" readonly required>
                </div>
                <div class=" col-md-2 form-group">
                    <label for="">Código de Alumno:</label>
                    <input type="text" class="form-control"  name="matricula_codAlumno" id="matricula_codAlumno" readonly required>
                </div>
                <h5 class="col-md-12 mt-3">Agregar Alumno a grado <hr></h5>
                <div class="col-md-4 row">
                    <div class="col-md-12 form-group">
                      <?php
                      $item = null;
                      $valor = null;
                      $mostrarNiveles = ControladorNiveles::ctrMostrarNiveles($item, $valor);
                      //var_dump($mostrarNiveles);
                      ?>
                      <label for="nivel">Nivel:</label>
                      <select id="nivel" class="form-control" type="select" name="nivel" required>
                          <option value=""></option>
                          <?php foreach ($mostrarNiveles as $nivel) {     ?>
                              <option value="<?php echo $nivel['idNiveles'] ?>"><?php echo $nivel['nombre_nivel'] ?></option>
                          <?php
                          }
                          ?>
                      </select>
                    </div>
                    <div class="col-md-12 form-group">
                      <label for="grado">Grado:</label>
                      <select id="grado" class="form-control mgrado" type="text" name="grado" required>
                      </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="seccion">Sección:</label>
                        <select id="seccion" class="form-control" type="text" name="seccion" required></select>
                    </div>
                </div>
                <div class="col-md-8 ">
                    <p class="h5">Detalles:</p>
                    <h6 class="text-center ">Primer grado de Primaria Sección A</h6>
                    <div class="form-group container row mt-4">
                        <label for="" class="col-md-3 mt-2 text-md-right">N° de matriculados:</label>	
                        <input type="text" class="form-control col-md-3">
                        <label for="" class="col-md-3 mt-2 text-md-right">Tutor:</label>	
                        <input type="text" class="form-control col-md-3">
                        <div class="col-md-12 mt-4 text-center">
                            <button class="btn btn-info btn-sm ">Ver Lista de Alumnos</button>
                        </div>
                    </div>
                </div>
                <div class="form-inline col-md-12">
                <button type="button" class="btn btn-primary ml-auto" id="btnRegistrarMat">Registrar</button>
                <button class="btn btn-danger ml-2" id="btnCancelarMat">Cancelar</button>
                </div>
            </div>
            
       </form>
    </div>
</div>
<!--MODAL ALUMNO-->
<div class="tab-pane" id="DatosAlumno">
  <div class="tile user-settings">
    <h4 class="line-head">Datos del Alumno</h4>
    <form id="formAlumno" name="formAlumno"method="post" enctype="multipart/form-data" rol="form"class="needs-validation" novalidate>
      
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
          <label for="dateAlumno">Fecha de nacimiento:</label>
          <input class="form-control" id="dateAlumno" type="date" name="dateAlumno" placeholder="Seleccionar fecha" required>
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
          <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña"required>
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
          <a class="btn btn-primary mr-1 text-white" data-toggle="modal" data-target="#BuscarApoderado"><i class="fas fa-search" aria-hidden="true"></i></a>
          <a class="btn btn-warning text-white"><i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>
      </div>
      
      <div class="form-group row">
        <div class="col-md-12"><label for="">Nombres y apellidos del apoderado :</label></div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="nombre-ap" id="nombre-ap" placeholder="Nombres" value=""required>
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" name="apellidos-ap" id="apellidos-ap" placeholder="Apellidos" value=""required>
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
                <input type="phone" class="form-control" name="telefono-ap" id="telefono-ap" placeholder="Número de contacto"required  value="">
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
            <input type="text" class="form-control" name="tipo-ap" id="tipo-ap" placeholder="Tipo" value=""required>
          </div>
        </div>
        <div class="col-md-4">
          <label for="">DNI:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="dni-ap" id="dni-ap" placeholder="Documento" value=""required>
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
        <button type="button" class="btn btn-secondary" onclick="closeAlumMatri()" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="action" class="btn btn-primary btnGuardar">Guardar</button>
        
      </div>

      <?php
        
        $crearAlumno = new ControladorAlumnos();
        $crearAlumno->ctrCrearAlumno();
      ?>
    </form>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mBuscarAlumno" tabindex="-1" aria-labelledby="BuscarAlumnoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="BuscarAlumnoLabel">Buscar Alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--------->
      <div class="modal-body">
        
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="matriculaAlumnos">
            <thead>
              <tr>
                <th>Acciones</th>
                <th>Código</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Apoderado</th>
                
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = null;
              $valor = null;
              $usuarios = ControladorAlumnos::ctrMostrarAlumnoList($item,$valor);
              foreach($usuarios as $value){
                  if($value['estado']!=1 || $value['idSeccion_Grados']!= ""){
                    continue;
                  }else{
                    
                    $apoderado = ($value['nombres_apoderado'] == "")?"-":$value['nombres_apoderado']." ".$value['apellidos_apoderado'];
                    echo'<tr>
                            
                          <td><button class="btn btn-primary btn-sm mt-1" title="Agregar" name="'.$value["idAlumno"].'" id="Mat_Alumno"><i class="fas fa-user-edit"></i></button>
                          </td> 
                          <td>'.$value["cod_matricula"].'</td>
                          <td>'.$value["nombres"].'</td>
                          <td>'.$value['apellidos'].'</td>
    
                          <td>'.$value['usuario'].'</td>
                          <td >'.$apoderado.'</td>
                          
                        </tr>
                    ';
                  }
               
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <!--------->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
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

<!-- Modal Grupos -->
<div class="modal fade" id="mGrupos" tabindex="-1" aria-labelledby="GruposLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="GrupoaLabel">Matrícula Grupal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--------->
      <div class="modal-body">
        <div class="card border-primary mb-3">
          <div class="card-body">
            <small class="form-label">* Seleccione la sección a matricular</small>
            <div class=" row">
              <div class="col-md-4 form-group">
                <?php
                $item = null;
                $valor = null;
                $mostrarNiveles = ControladorNiveles::ctrMostrarNiveles($item, $valor);
                //var_dump($mostrarNiveles);
                ?>
                <label for="nivelG" class="font-weight-bold">Nivel:</label>
                <select id="nivelG" class="form-control" type="select" name="nivelG" required>
                    <option value=""></option>
                    <?php foreach ($mostrarNiveles as $nivel) {     ?>
                        <option value="<?php echo $nivel['idNiveles'] ?>"><?php echo $nivel['nombre_nivel'] ?></option>
                    <?php
                    }
                    ?>
                </select>
              </div>
              <div class="col-md-4 form-group">
                <label for="gradoG" class="font-weight-bold">Grado:</label>
                <select id="gradoG" class="form-control gradoG" type="text" name="gradoG" required>
                </select>
              </div>
              <div class="col-md-4 form-group">
                  <label for="seccionG" class="font-weight-bold">Sección:</label>
                  <select id="seccionG" class="form-control" type="text" name="seccionG" required></select>
              </div>
            </div>
            <div class="form-inline">
              <button class="btn btn-info ml-auto" id="btnMatricula">Registrar</button>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-bordered  m-auto" id="matriculaGrupos">
            <thead class="text-center">
              <tr>
                <th class="px-4"><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                
                <th>Código</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Cohorte</th>
                
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $item = null;
              $valor = null;
              $usuarios = ControladorAlumnos::ctrMostrarAlumnoList($item,$valor);
              foreach($usuarios as $value){
                  if($value['estado']!=1 || $value['idSeccion_Grados']!= "" || $value['rol']!= 4){
                    continue;
                  }else{
                    
                    $apoderado = ($value['nombres_apoderado'] == "")?"-":$value['nombres_apoderado']." ".$value['apellidos_apoderado'];
                    echo'<tr>
                          <td><input type="checkbox" name="id[]" value="'.$value["cod_matricula"].'"></td> 
                          <td>'.$value["cod_matricula"].'</td>
                          <td>'.$value["nombres"].'</td>
                          <td>'.$value['apellidos'].'</td>
                          <td>'.$value['usuario'].'</td>
                          <td>'.$value['cohorte'].'</td>  
                        </tr>
                    ';
                  }
               
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <!--------->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

