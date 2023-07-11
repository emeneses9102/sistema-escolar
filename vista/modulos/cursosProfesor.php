<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fa fa-user"></i> Listado de Cursos</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Lista de cursos</a></li>
  </ul>
</div>
<div class="tab-content">
  <div class="tab-pane active" id="listCursosProfesor">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3>Clases y cursos</h3>
          <hr>
          <div class="tile-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered  m-auto" id="tableCursosProfesor">
                <thead>
                  <tr class="text-center">
                    <th>Acciones </th>
                    <th>Nombre del curso</th>
                    <th>Nivel</th>
                    <th>Grado</th>
                    <th>Sección</th>
                    <th>Total de alumnos</th>
                    <th>Estatus</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php
                  $item = "id_profesor";
                  $valor = $_SESSION['usuario_id'];
                  $cursos = ControladorCursosProfesor::ctrMostrarCursos($item, $valor);
                  foreach ($cursos as $value) {

                    echo '<tr>
                        <th>
                          <button class="btn btn-primary  mt-1" title="ver curso" onclick="verClaseProfesor('.$value["idCurso"].')">Ir</button>
                        </th>

                        <th>' . $value['curso'] . '</th>
                        <th>' . $value['nivel'] . '</th>
                        <th>' . $value['grado'] . '</th>
                        <th>' . $value['nseccion'] . '</th>
                        <th>' . $value['total_Alumnos'] . '</th>
                        <th><span class="badge badge-primary">Activo</span></th>
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
  </div>
  <div class="tab-pane fade" id="editarCursoProfesor">
    <div class="tile user-settings">
      <div class="form-inline mb-2">
        <h4 class="">Detalles del curso</h4>
        <div class="ml-auto">
          <label for="" class="btn btn-lg pb-0" onclick="regresarCurso()">
            <i class="fas fa-angle-double-left h3"></i>
          </label>
        </div>
      </div>
      <form action="" method="POST" id="detalle_curso">
        <div class="form-group">
          <div class="card  mb-3 ">
            <div class="card-body">
              <div class="form-inline mb-5">
                <div class="">
                  <h4 class="card-title" id="titulo_curso"></h4>
                  <input type="text" id="id_curso_" hidden>
                </div>
                <div class="ml-auto mr-4">
                  <h5>Sección: <small class='text-muted' id="seccion_curso"></small>   </h5>
                </div>
                <div class="mr-4">
                  <h5>Grado: <small class='text-muted' id="grado_curso"></small></h5>
                </div>
                <div class="mr-4">
                  <h5>Nivel: <small class='text-muted' id="nivel_curso"></small></h5>
                </div>
              </div>
              <div class=" row">
              <?php
                    $item = null;
                    $valor = null;
                    $mostrarPeriodos = ControladorPeriodos::ctrMostrarPeriodos($item, $valor);
                    //var_dump($mostrarPeriodos);
                ?>
              <div class="col-md-4 mt-2">
                  <select id="periodoAcademico" class="form-control" type="text" name="periodoAcademico" required>
                    <?php foreach ($mostrarPeriodos as $periodo) { ?>
                        <option value="<?php echo $periodo['idPeriodoAcademico']?>"><?php echo strtoupper($periodo['nombrePeriodo']) ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-1 mt-2">
                  <button class="btn btn-info btn-sm form-control"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                <div class="col-md-7 mt-2 form-inline">
                  <button type="button" class="btn btn-primary btn-lg ml-auto" data-toggle="modal" data-target="#modalConfNotas" id="btnConfNotas">Configurar Notas</button>
                </div>
               
                
              </div>
              <hr>
              <div class="container table-responsive px-2">
                <table class="table" id="tabla_alumnosCurso">
                  <thead>
                    <tr>
                      <th>Nombres y apellidos </th>
                      <th></th>
                      <th></th>
                      <th class="p-0">Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="GS_disponibles">

                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </form>
    </div>
    <!--CREAR SECCIONES-->

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalConfNotas" tabindex="-1" aria-labelledby="modalConfNotas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detallesModallLabel">CONFIGURAR NOTAS - <span id="periodoText"></span></h5>
                <input type="text" id="periodoVal" hidden >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="col-lg-12">
                <div class="bs-component">
                  <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#confCalificaciones" id="tab_notas">Configurar nota</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#confCalificacionesParciales" id="tab_parciales">Promedios parciales</a></li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show pt-4" id="confCalificaciones">
                      <form action="" method="POST" id="formConfCalificaciones">
                        <div class="form-group ">
                          <div class="row mt-3">
                            <div class="col-md-3 pt-1">
                              <label for="nombreCalificacion"><b>Nombre de calificación:</b></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nombreCalificacion" name="nombreCalificacion" required>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-md-3 pt-1">
                              <label for="siglasCalificacion"><b>Siglas de la calificación:</b></label>
                            </div>
                            <div class="col-md-3">
                              <input type="text" class="form-control" id="siglasCalificacion" name="siglasCalificacion" >
                            </div>
                            <div class="col-md-1 pt-1">
                              <label for="pesoCalificacion"><b>Peso:</b></label>
                            </div>
                            <div class="col-md-2">
                              <input type="text" class="form-control" id="pesoCalificacion" name="pesoCalificacion" >
                            </div>
                            <div class="col-md-2 pt-1">
                              <label for="chkSubNotas"><b>Sub notas</b></label>
                            </div>
                            <div class="col-md-1 pl-md-0">
                              <div class="toggle lg">
                                <label>
                                  <input type="checkbox" id="chkSubNotas"><span class="button-indecator"></span>
                                </label>
                              </div>
                            </div>
                          </div>     
                          <div class="row mt-3">
                            <div class="col-md-3 pt-1">
                              <label for="detalleCalificaciones"><b>Detalle:</b></label>
                            </div>
                            <div class="col-md-9 pt-1">
                              <textarea name="detalleCalificaciones" id="detalleCalificaciones" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn_Cerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn_GuardarCalificaciones" class="btn btn-primary">Guardar</button>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade pt-4" id="confCalificacionesParciales">
                      <form action="" method="POST" id="formConfNotasParciales">
                        <div class="form-group ">
                          <div class="row mt-3">
                            <div class="col-md-3 pt-1">
                              <label for="nombreNotaParcial"><b>Nombre nota parcial:</b></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nombreNotaParcial" name="nombreNotaParcial" >
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-md-3 pt-1">
                              <label for="siglasNotaParcial"><b>Siglas de nota parcial:</b></label>
                            </div>
                            <div class="col-md-3">
                              <input type="text" class="form-control" id="siglasNotaParcial" name="siglasNotaParcial" >
                            </div>
                            <div class="col-md-3 pt-1">
                              <label for="pesoNotaParcial"><b>Peso de calificación:</b></label>
                            </div>
                            <div class="col-md-3">
                              <input type="text" class="form-control" id="pesoNotaParcial" name="pesoNotaParcial" >
                            </div>
                          </div> 
                          <div class="row mt-3">
                          <div class="col-md-3 pt-1">
                              <label for="notaReferenciada"><b>Nota referenciada:</b></label>
                            </div>
                            <div class="col-md-9">
                              <select name="notaReferenciada" id="notaReferenciada" class="form-control"></select>
                            </div>
                          </div>    
                          <div class="row mt-3">
                            <div class="col-md-3 pt-1">
                              <label for="detalleNotaParcial"><b>Detalle:</b></label>
                            </div>
                            <div class="col-md-9 pt-1">
                              <textarea name="detalleNotaParcial" id="detalleNotaParcial" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn_CerrarP" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn_GuardarNotaParcial" class="btn btn-primary">Guardar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>


              
            </div>
            
        </div>
    </div>
</div>