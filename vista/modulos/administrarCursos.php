<div class="app-title mb-0">
  <div>
    <h3 id="tituloUsuario"><i class="fa fa-book"></i> Configurar competencias por cursos</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-book fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#"> Configurar competencias</a></li>
  </ul>
</div>
<div class="row user">    
  <div class="col-md-2">
    <div class="tile p-0">
      <ul class="nav flex-column nav-tabs user-tabs">
        <li class="nav-item"><a class="nav-link active" href="#configurar" data-toggle="tab">Configurar</a></li>
        <li class="nav-item"><a class="nav-link" href="#vistaPrevia" data-toggle="tab">Vista Previa</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-10">
    <div class="tab-content">
      <div class="tab-pane active" id="configurar">
        <div class="tile user-settings">
          <h4 class="line-head">Configurar Competencias</h4>
          
          <div class="row">
            <div class="col-md-5">
              <h6>Selecione el curso</h6>
              
              <div class="form-group">
                <select name="" id="" class="form-control">
                  <option value="">Inicial</option>
                  <option value="">Primaria</option>
                  <option value="">Secundaria</option>
                </select>
              </div>
              <div class="form-group">
                <select name="" id="" class="form-control">
                  <option value="">1° de primaria</option>
                  <option value="">2° de primaria</option>
                  <option value="">3° de primaria</option>
                  <option value="">4° de primaria</option>
                  <option value="">5° de primaria</option>
                  <option value="">6° de primaria</option>
                </select>
              </div>
              <div class="form-group">
                <select name="" id="" class="form-control">
                  <option value="">Sección A</option>
                  <option value="">Sección B</option>
                </select>
              </div>
              <div class="form-group">
                <select name="" id="" class="form-control">
                  <option value="">Matemática</option>
                  <option value="">Comunicación</option>
                </select>
              </div>
            </div>
            <div class="col-md-7">
            <h6>Detalles del curso</h6>
              <div class="card mb-3 text-black bg-light">
                <div class="card-body row">
                  <div class="col-md-6">
                    <p>Curso : <span>Matemática</span></p>
                    <p>Sección : <span>'A'</span></p>
                    <p>Docente : <span>Juan Perez</span></p>
                  </div>
                  <div class="col-md-6">
                    <p>Nivel: <span>Primaria</span></p>
                    <p>Grado : <span>1° de Primaria</span></p>                  
                  </div>
                  <div class="col-md-12 form-inline">
                    <button class="btn btn-primary btn-sm ml-auto" data-toggle="collapse" href="#nuevaCompetencia" role="button" aria-expanded="false" aria-controls="nuevaCompetencia">Agegar Competencias</button>
                  </div>
                </div>
                <div class="card collapse m-2" id="nuevaCompetencia">
                  <h6 class="mt-2 ml-2">Nueva competencia</h6>
                  <div class="card-body py-0">
                    <div class="form-group row">
                      <div class="col-md-4 col-sm-6">
                        <input type="text" class="form-control" placeholder="Nombre">
                      </div>
                      <div class="col-md-4 col-sm -6">
                        <input type="text" class="form-control" placeholder="descripción">
                      </div>
                      <div class="col-lg-3 col-md-2 col-sm-6">
                        <input type="text" class="form-control" placeholder="Peso">
                      </div>
                      <div class="col-lg-1 col-md-2 col-sm-6">
                        <button class="btn btn-primary"><i class="fas fa-save    "></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <form>
          <h6>Selecione un año escolar</h6>
          <div class="row textcenter">
            
            <div class="table-responsive col-md-12">
              <table class="table table-hover">
                <thead classt="text-center">
                  <tr>
                    <th style="width: 38px;">#</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Peso</th>
                    <th>Detalle</th>
                  </tr>  
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input type="checkbox" >
                    </td>
                    <td>MatComp_1</td>
                    <td>Competencia 1</td>
                    <td>parcial</td>
                    <td>10%</td>
                    <td><button class="btn btn-warning"><i class="fa fa-search-plus" aria-hidden="true"></i></button></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox" ></td>
                    <td>MatComp_2</td>
                    <td>Competencia 2</td>
                    <td>examen bimestral</td>
                    <td>15%</td>
                    <td><button class="btn btn-warning"><i class="fa fa-search-plus" aria-hidden="true"></i></button></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox" ></td>
                    <td>MatComp_3</td>
                    <td>Competencia 3</td>
                    <td>examen trimestral</td>
                    <td>25%</td>
                    <td><button class="btn btn-warning"><i class="fa fa-search-plus" aria-hidden="true"></i></button></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td>MatComp_4</td>
                    <td>Competencia 4</td>
                    <td>final</td>
                    <td>50%</td>
                    <td><button class="btn btn-warning"><i class="fa fa-search-plus" aria-hidden="true"></i></button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
            
            <div class="row mb-10">
              <div class="col-md-12">
                <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                <button class="btn btn-danger" type="button"><i class="fa fa-fw fa-lg fa fa-trash"></i> Borrar</button>
                
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="vistaPrevia">
        
        <div class="timeline-post">
        <div class="pb-2">
          <h4 class="line-head">Modelo de calificación</h4>
        </div>
        <div class="table-responsive col-md-12">
              <table class="table table-bordered table-hover">
                <thead classt="text-center">
                  <tr>
                    
                    <th colspan="4" class="text-center">
                      Competencia 1
                    </th>
                    <th colspan="4" class="text-center">Competencia 2</th>
                    <th colspan="4" class="text-center">Competencia 3</th>
                    <th colspan="4" class="text-center">Competencia 4</th>
                    <th colspan="2" class="text-center">Promedio Final</th>
                    
                  </tr>  
                  <tr>
                    
                    <th>Ev 1</th>
                    <th>Ev 2</th>
                    <th>Ev 3</th>
                    <th>Prom</th>
                    <th>Ev 1</th>
                    <th>Ev 2</th>
                    <th>Ev 3</th>
                    <th>Prom</th>
                    <th>Ev 1</th>
                    <th>Ev 2</th>
                    <th>Ev 3</th>
                    <th>Prom</th>
                    <th>Ev 1</th>
                    <th>Ev 2</th>
                    <th>Ev 3</th>
                    <th>Prom</th>
                    <th>PF</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td><span class="badge badge-primary">Aprobado</span></td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td><span class="badge badge-danger">Desaprobado</span></td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
        
      </div>
    </div>
  </div>
</div>


<!--MODAL USUARIO-->
<div class="modal fade" id="modalAdministrarCurso" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Agregar Competencias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUsuario" name="formUsuario" action="">
          <input type="hidden" name="idusuario" id="idusuario" value="">
          <div class="form-group row">
            <div class="col-md-6"><label for="">Nombre de la competencia:</label></div>
            <div class="col-md-6">
            <input type="text" class="form-control" name="nombreComp" id="nombreComp" placeholder="Nombre competencia">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6"><label for="">Descripción:</label></div>
            <div class="col-md-6">
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
            <label for="">Peso:</label>
              
            </div>
           <div class="col-md-6">
           <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Peso">
           </div>
          </div>
         
         
          <div class="form-group">
            
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