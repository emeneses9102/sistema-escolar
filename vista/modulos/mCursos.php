<div class="app-title mb-0">
  <div>
    <h3 id="tituloCurso"><i class="fas fa-school"></i> Cursos</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fas fa-school fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Registrar Cursos</a></li>
  </ul>
</div>
<div class="row user">
  <div class="col-md-2">
    <div class="tile p-0">
      <ul class="nav flex-column nav-tabs user-tabs">
        <li class="nav-item"><a class="nav-link active" href="#listarCursos" data-toggle="tab" id="listadeCursos">Listar Cursos</a></li>
        <li class="nav-item"><a class="nav-link " href="#agregarCurso" data-toggle="tab" id="linkAgregar">Agregar Cursos</a></li>
        <li class="nav-item"><a class="nav-link disabled" href="#editarCurso" data-toggle="tab" id="linkEditar">Editar Cursos</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-10">
    <div class="tab-content">
      <div class="tab-pane active" id="listarCursos">
        <div class="tile user-settings">
          <h4 class="line-head">Listar cursos</h4>
        </div>
        <div class="row" id="listProfesor">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered  m-auto" id="tablaCursos">
                    <thead class="text-center ">
                      <tr>
                        <th>Acciones</th>
                        <th>Orden</th>
                        <th>Código</th>
                        <th>Curso</th>
                        <th>Nombre corto</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php
                      $item = null;
                      $valor = null;
                      $orden = 1;
                      $cursos = Controladorcursos::ctrMostrarCursos($item, $valor);
                      foreach ($cursos as $value) {
                        //$estado = ($value['estado']==1)? '<span class="badge badge-success">Activo</span>': '<span class="badge badge-danger">Inactivo</span>';
                        echo '<tr>
                                <th><button class="btn btn-primary btn-sm mt-1" title="Editar" onclick="editarCurso('.$value["idCursos"].')"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar"  onclick="eliminarCurso('.$value["idCursos"].')"><i class="fas fa-trash-alt"></i></button></th>
                                <td>' . $orden . '</td>
                                <td>' . $value['codigo_curso'] . '</td>
                                <td>' . $value['nombre_curso'] . '</td>
                                <td>' . $value['nombre_corto'] . '</td>
                                
                                
                              </tr>
                          ';
                        $orden++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="agregarCurso">
        <div class="tile user-settings">
          <h4 class="line-head">Registrar curso</h4>
          <form action="" method="POST" id="frmCursos">
            <div class="form-group">
              <div class="form-group row">
                <div class="col-md-7">
                  <label for="nombre_curso">Nombre:</label>
                  <input id="nombre_curso" class="form-control" type="text" name="nombre_curso" required>
                </div>
                <div class="col-md-3">
                  <label for="nombre_curso">Nombre corto:</label>
                  <input id="nombrec_curso" class="form-control" type="text" name="nombrec_curso">
                </div>
                <div class="col-md-2">
                  <label for="codigo_curso">Código:</label>
                  <input id="codigo_curso" class="form-control" type="text" name="codigo_curso" required>
                </div>
                <div class="col-md-12">
                  <label for="descripcion_curso">Descripción:</label>
                  <textarea name="descripcion_curso" id="descripcion_curso" cols="20" rows="3" class="form-control"></textarea>
                </div>
              </div>


              <div class="form-inline">
                <button type="submit" class="btn btn-primary btn-lg ml-auto">Registrar</button>
                <button class="btn btn-warning btn-lg ml-1" id="btnLimpiar"><i class="fas fa-eraser m-0"></i></button>
              </div>
              <?php
              $crearCurso = new ControladorCursos();
              $crearCurso->ctrCrearCurso();
              ?>
            </div>
          </form>
          </div>
          



        
        <!--CREAR SECCIONES-->

      </div>
      <div class="tab-pane fade" id="editarCurso">
        <div class="tile user-settings">
          <h4 class="line-head">Editar curso</h4>
          <form action="" method="POST" id="efrmCursos">
            <div class="form-group">
              <div class="card border-primary mb-3">
                <div class="card-body">
                  <h5 class="card-title">Detalles del curso</h5>
                  <div class="form-group row">
                    <div class="col-md-7">
                      <input type="text" id="idCurso" name="idCurso" hidden>
                      <label for="enombre_curso">Nombre:</label>
                      <input id="enombre_curso" class="form-control" type="text" name="enombre_curso" required>
                    </div>
                    <div class="col-md-3">
                      <label for="enombrec_curso">Nombre corto:</label>
                      <input id="enombrec_curso" class="form-control" type="text" name="enombrec_curso">
                    </div>
                    <div class="col-md-2">
                      <label for="ecodigo_curso">Código:</label>
                      <input id="ecodigo_curso" class="form-control" type="text" name="ecodigo_curso" required>
                    </div>
                    <div class="col-md-12">
                      <label for="edescripcion_curso">Descripción:</label>
                      <textarea name="edescripcion_curso" id="edescripcion_curso" cols="20" rows="3" class="form-control"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-inline">
              <button type="submit" class="btn btn-primary btn-lg ml-auto">Actualizar</button>
              <button class="btn btn-warning btn-lg ml-1" id="btnCancelar"><i class="fa fa-window-close m-0"></i></button>
            </div>
            <?php
            $actualizarCurso = new ControladorCursos();
            $actualizarCurso->ctrActualizarCurso();
            ?>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>


<!--MODAL DETALLES GRADO-->




